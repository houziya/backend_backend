<?php

class Session
{
    private static function generateCryptoKey($uid)
    {
        $strong = true;
        return sha1(openssl_random_pseudo_bytes(16, $strong) . $uid);
    }

    private static function sessionKey($uid)
    {
        return Us\User\SESSION . $uid;
    }

    public static function generate($uid)
    {
        return self::generateCryptoKey($uid);
    }

    public static function reset($uid, $expire = 0)
    {
        $key = self::generate($uid);
        $result = false;
        for ($i=0; $i<10; $i++) {
            if ($result) {
            	break;
            }
            $result = Yii::$app->redis->set(self::sessionKey($uid), $key, $expire);
        }
        return $key;
    }

    public static function getSession($uid)
    {
    	return Yii::$app->redis->get(self::sessionKey($uid));
    }

    public static function verify($uid, $key)
    {
        return Predicates::equals(Yii::$app->redis->get(self::sessionKey($uid)), Preconditions::checkNotNull($key));
    }

    public static function delete($uid)
    {
        return Yii::$app->redis->del(self::sessionKey($uid));
    }

    public static function generateTube($uid)
    {
        return self::generateCryptoKey($uid) . ":" . self::generateCryptoKey($uid);
    }

    private static function tubeSessionKey($uid)
    {
        return Us\User\SESSION_TUBE . $uid;
    }

    public static function resetTube($uid, $expire = 0)
    {
        $key = self::generateTube($uid);
        $result = false;
        $retry = 10;
        while ($retry-- > 0 && !$result) {
            $result = Yii::$app->redis->set(self::tubeSessionKey($uid), $key, $expire);
        }
        if (!$result) {
            Protocol::internalError();
        }
        return $key;
    }

    public static function verifyTube($uid, $key)
    {
        return Predicates::equals(Yii::$app->redis->get(self::tubeSessionKey($uid)), Preconditions::checkNotNull($key));
    }
}

?>
