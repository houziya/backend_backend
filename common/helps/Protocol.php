<?php

use Yaf\Dispatcher;
use Yaf\Registry;

class Protocol
{
    const STATUS_OK = 200;
    const STATUS_TEMPORARY_REDIRECT = 307;
    const STATUS_BAD_REQUEST = 400;
    const STATUS_UNAUTHORIZED = 401;
    const STATUS_FORBIDDEN = 403;
    const STATUS_NOT_FOUND = 404;
    const STATUS_REQUEST_TIMEOUT = 408;
    const STATUS_UPGRADE_REQUIRED = 426;
    const STATUS_TOO_MANY_REQUEST = 429;
    const STATUS_INTERNAL_ERROR = 500;

    private static $version = NULL;
    private static $accessor = NULL;
    private static $responseSent = false;
    private static $responseCallStack = NULL;

    public static function version()
    {
        if (Predicates::isNull(self::$version)) {
            self::$version = self::optionalInt('version_api');
        }
        return self::$version;
    }

    private static function wrapArguments()
    {
        $request = Dispatcher::getInstance()->getRequest();
        if ($request->isPost()) {
            $arguments = $request->getPost();
            $fallback = $request->getQuery();
        } else if ($request->isGet()) {
            $arguments = $request->getQuery();
            $fallback = NULL;
        } else if ($request->isCli()) {
            $arguments = $request->getParams();
            $fallback = NULL;
        } else {
            throw new InvalidArgumentException("Not supported request method " . $request->getMethod());
        }
        return Accessor::wrap($arguments, $fallback);
    }

    public static function file($file)
    {
        return self::files()[$file];
    }

    public static function files()
    {
        return Dispatcher::getInstance()->getRequest()->getFiles();
    }

    public static function arguments()
    {
        if (Predicates::isNull(self::$accessor)) {
            self::$accessor = self::wrapArguments();
        }
        return self::$accessor;
    }

    public static function required($name)
    {
        return self::arguments()->required($name);
    }

    public static function optional($name, $default = NULL)
    {
        return self::arguments()->optional($name, $default);
    }

    public static function requiredInt($name)
    {
        return self::arguments()->requiredInt($name);
    }

    public static function optionalInt($name, $default = 0)
    {
        return self::arguments()->optionalInt($name, $default);
    }

    public static function requiredDouble($name)
    {
        return self::arguments()->requiredDouble($name);
    }

    public static function optionalDouble($name, $default = 0.0)
    {
        return self::arguments()->optionalDouble($name, $default);
    }

    public static function jsonReturn($code = 200, $payload = NULL, $notice = NULL, $message = NULL, $hint = NULL)
    {
        if (self::$responseSent) {
            $error = "Response has already been sent out eariler" . (Predicates::isNull(self::$responseCallStack) ? "" : " at \n" . var_export(self::$responseCallStack, true));
            error_log($error);
            throw new LogicException($error);
        }

        $response = array('c' => $code);
        if (Predicates::isNull($notice)) {
            $notice = "";
        }
        $response['n'] = $notice;
        if (Predicates::isNull($message)) {
            $message = "";
        }
        $response['m'] = $message;
        if (Predicates::isEmpty($payload)) {
            if(!Predicates::isEmpty($hint)) {
                $payload['result'] = false;
            }
        }
        if (Predicates::isNull($payload)) {
            $payload = new stdClass();
        }
        $response['p'] = $payload;
        if (Predicates::isEmpty($hint)) {
            $hint = "";
        }
        $response['h'] = $hint;
        $response['ts'] = self::dateToUnixTimeStamp();
        $response = json_encode($response);
        self::$responseSent = true;
        if (Yaf\Application::app()->getConfig()->development) {
            self::$responseCallStack = debug_backtrace();
        }
        echo $response;
        return $response;
    }

    public static function ok($payload = NULL, $notice = NULL, $message = NULL, $hint = NULL)
    {
        self::jsonReturn(self::STATUS_OK, $payload, $notice, $message, $hint);
    }

    public static function temporaryRedirect($payload = NULL, $notice = NULL, $message = NULL)
    {
        throw new UsException(self::STATUS_TEMPORARY_REDIRECT, $notice, $message, $payload);
    }

    public static function badRequest($payload = NULL, $notice = NULL, $message = NULL, $hint = NULL)
    {
        throw new UsException(self::STATUS_BAD_REQUEST, $notice, $message, $payload, $hint);
    }

    public static function unauthorized($payload = NULL, $notice = NULL, $message = NULL)
    {
        throw new UsException(self::STATUS_UNAUTHORIZED, $notice, $message, $payload);
    }

    public static function forbidden($payload = NULL, $notice = NULL, $message = NULL)
    {
        throw new UsException(self::STATUS_FORBIDDEN, $notice, $message, $payload);
    }

    public static function notFound($payload = NULL, $notice = NULL, $message = NULL)
    {
        throw new UsException(self::STATUS_NOT_FOUND, $notice, $message, $payload);
    }

    public static function requestTimeout($payload = NULL, $notice = '', $message = NULL)
    {
        throw new UsException(self::STATUS_REQUEST_TIMEOUT, $notice, $message, $payload);
    }

    public static function upgradeRequired($payload = NULL, $notice = NULL, $message = NULL)
    {
        throw new UsException(self::STATUS_UPGRADE_REQUIRED, $notice, $message, $payload);
    }

    public static function tooManyRequest($payload = NULL, $notice = NULL, $message = NULL)
    {
        throw new UsException(self::STATUS_TOO_MANY_REQUEST, $notice, $message, $payload);
    }

    public static function internalError($payload = NULL, $notice = NULL, $message = NULL)
    {
        throw new UsException(self::STATUS_INTERNAL_ERROR, $notice, $message, $payload);
    }

    public static function remoteAddress()
    {
        if (Predicates::isNotEmpty(@$_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        } elseif (Predicates::isNotEmpty(@$_SERVER['HTTP_CLIENT_IP'])) {
            $ip = explode(',', $_SERVER['HTTP_CLIENT_IP']);
        } elseif (Predicates::isNotEmpty(@$_SERVER['REMOTE_ADDR'])) {
            $ip = explode(',', $_SERVER['REMOTE_ADDR']);
        } else {
            throw new InvalidArgumentException('Could not get client ip address');
        }
        $ip = $ip[0];
        if (filter_var($ip, FILTER_VALIDATE_IP, [FILTER_FLAG_NO_PRIV_RANGE, FILTER_FLAG_NO_RES_RANGE])) {
            return $ip;
        } else {
            throw new InvalidArgumentException('Invalid client ip address ' . $ip);
        }
    }

    public static function userAgent()
    {
        return Preconditions::checkNotEmpty(@$_SERVER['HTTP_USER_AGENT']);
    }
    
    public static function getMethod()
    {
        return Dispatcher::getInstance()->getRequest()->method;
    }

    public static function dateToUnixTimeStamp ($date = 0)
    {
        if (!$date){
            return time()*1000;
        }
        return strtotime($date)*1000;
    }

    public static function origin()
    {
        return @$_SERVER["HTTP_ORIGIN"];
    }
}
?>
