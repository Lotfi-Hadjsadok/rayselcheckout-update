<?php

namespace Inc;

use Inc\Admin\Settings;

class Init
{
    public static function get_services()
    {
        return array(
            Settings::class,
        );
    }
    public static function start_services()
    {
        foreach (self::get_services() as $service) {
            $class = self::initiate($service);
            if (method_exists($class, 'register')) {
                $class->register();
            }
        }
    }
    public static function initiate($class)
    {
        return new $class;
    }
}
