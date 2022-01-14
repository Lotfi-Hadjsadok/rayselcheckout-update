<?php

namespace Inc\Includes;

class Activate
{
    public static function activate()
    {
        if (!get_option('rc_settings')) {
            update_option('rc_settings', array());
        }
    }
}
