<?php
namespace common\helps;
use Yii;
class Execution
{
    public static function withFallback($run, ...$fallbacks)
    {
        $current = $run;
        foreach ($fallbacks as $fallback) {
            try {
                return $current();
            } catch (Exception $e) {
                $current = $fallback;
            }
        }
        return $current();
    }

    public static function withRetry($run, $timeout = 1000, $retry = 16)
    {
        $deadline = Preconditions::checkNotNegative($timeout * 1000);
        if ($deadline == 0) {
            $deadline = PHP_INT_MAX;
        }
        $maxBackoff = min($deadline / 2, 1000000);
        $sleep = 50000;
        $lastException = null;
        $start = time();
        while ($deadline > 0 && ($retry--) > 0) {
            try {
                return $run();
            } catch (Exception $e) {
                if ($deadline < $sleep) {
                    $sleep = $deadline;
                }
                usleep($sleep);
                $deadline -= $sleep;
                if ($sleep < $maxBackoff) {
                    $sleep *= 2;
                    if ($sleep > $maxBackoff) {
                        $sleep = $maxBackoff;
                    }
                }
                $lastException = $e;
            }
        }
        if (Predicates::isNotNull($lastException)) {
            throw $lastException;
        }
    }

    public static function autoTransaction($db, $callable)
    {
        return Execution::withTransaction($db->beginTransaction(), $callable);
    }

    public static function withTransaction($transaction, $callable)
    {
        $commit = false;
        try {
            $result = $callable();
            $commit = true;
            return $result;
        } finally {
            if ($commit) {
                Execution::withFallback(function() use ($transaction) {
                    $transaction->commit();
                }, function() use ($transaction) {
                    $transaction->rollback();
                });
            } else {
                $transaction->rollback();
            }
        }
    }

    public static function autoUnlink($callable)
    {
        $unlink = [];
        try {
            return $callable(function ($path) use (&$unlink) {
                $unlink[] = $path;
            });
        } finally {
            foreach ($unlink as $path) {
                @unlink($path);
            }
        }
    }

    public static function profile($callable, $sink = NULL)
    {
        $start = gettimeofday(true);
        try {
            return $callable();
        } finally {
            $elapsed = intval((gettimeofday(true) - $start) * 1000000);
            if (Predicates::isNotNull($sink)) {
                $sink($elapsed, $callable);
            } else {
                echo var_export($callable, true) . " finished in $elapsed us";
            }
        }
    }
}

?>
