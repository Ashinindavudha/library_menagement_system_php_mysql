<?php

namespace Helpers;

class HTTP
{
    static $base = "http://localhost/library_menagement_system_php_mysql";

    public static function redirect($path, $query = "")
    {
        $url = static::$base . $path;
        if ($query) {
            $url .= "?$query";
        }

        header("location: $url");
        exit();
    }
}
