<?php

class Delight_Application {

    public static function is_localhost() {
        return isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
    }
    
    public static function redirect(string $target) {
        echo "<script>window.location = '" . $target . "';</script>";
        exit;
    }

    public static function set_cookie($name, $value, $expiration, ?string $path = '/') {
        echo "<script>$.cookie('" . $name . "', '" . $value . "', { expires: " . $expiration . ", path: '" . $path . "' })</script>";
    }

    public static function remove_cookie($name, ?string $path = '/') {
        if (!isset($_COOKIE[$name])) return;
        echo "<script>$.removeCookie('" . $name . "', { path: '" . $path . "' })</script>";
    }

    public static function prepare_url($url) {
        $slashes = '';
        while(!file_exists($slashes . '.htaccess')) $slashes .= '../';
        $result = $slashes . $url;
        return $result;
    }

}
