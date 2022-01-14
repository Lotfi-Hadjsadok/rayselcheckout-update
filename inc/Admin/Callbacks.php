<?php

namespace Inc\Admin;

class Callbacks
{
    public function main_settings_page()
    {
        require_once plugin_dir_path(__FILE__) . 'partials/settings_page.php';
    }
    public function render_field($args)
    {
        $value = get_option('rc_settings');
        echo "<input type='" . $args['type'] . "' value='" . ($value[$args['label']] ?: $args['default']) . "' name='rc_settings[" . $args['label'] . "]' />";
    }
    public function render_checkbox($args)
    {
        $value = get_option('rc_settings', array($args['label'] => $args['default']));
        echo "<input type='checkbox' " . ($value[$args['label']] ? 'checked' : '') . " value='1'  class='" . $args['class'] . "' name='rc_settings[" . $args['label'] . "]' />";
    }
}
