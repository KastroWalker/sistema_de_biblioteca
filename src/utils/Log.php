<?php
class Log
{
    public static function createLog($message)
    {
        try {
            $pathLogs = $_SERVER['DOCUMENT_ROOT'] . "/logs/";
            $fileName = $pathLogs . date("Y-m-d") . ".log";

            if (!file_exists($pathLogs)) {
                mkdir($pathLogs);
            }

            error_log(
                $message . PHP_EOL,
                3,
                $fileName
            );
        } catch (Exception $ex) {
        }
    }
}
