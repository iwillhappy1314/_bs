<?php

namespace WenpriseSpaceName;

trait LoggerTrait
{

    public function log($note, $message = null): void
    {
        $file_name = basename(str_replace('\\', '/', self::class)) . '.log';

        if (WP_DEBUG) {
            if ($message) {
                error_log($note . ': ' . print_r($message, true)  . "\r\n", 3, WP_CONTENT_DIR . '/' . $file_name);
            } else {
                error_log($note . "\r\n", 3, WP_CONTENT_DIR . '/' . $file_name);
            }
        }
    }

}
