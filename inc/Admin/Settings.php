<?php

namespace Inc\Admin;

class Settings extends Callbacks
{
    public $fields;

    public function register()
    {
        $this->get_fields();
        add_action('admin_menu', array($this, 'settings_menu'));
        add_action('admin_init', array($this, 'settings_setup'));
    }
    public function settings_menu()
    {
        add_menu_page('Raysel Checkout', 'Raysel Checkout', 'manage_options', 'raysel_checkout', array($this, 'main_settings_page'), 'dashicons-cart', 10);
    }
    public function get_fields()
    {
        $this->fields = array(
            array(
                'id' => 'rc_activate',
                'title' => __('Activate', 'raysel-checkout'),
                'callback' => array($this, 'render_checkbox'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_activate',
                    'class' => 'toggle-ui'
                )
            ),
            array(
                'id' => 'rc_main_text',
                'title' => __('Main Text', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_main_text',
                    'default' => 'Welcome to our store',
                    'type' => 'text'
                )
            ),
            array(
                'id' => 'rc_main_text_color',
                'title' => __('Main Text Color', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_main_text_color',
                    'type' => 'color'
                )
            ),
            array(
                'id' => 'rc_secondary_text',
                'title' => __('Secondary Text', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_secondary_text',
                    'default' => 'Shipping fees 400 DA',
                    'type' => 'text'
                )
            ),
            array(
                'id' => 'rc_secondary_text_color',
                'title' => __('Secondary Text Color', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_secondary_text_color',
                    'type' => 'color'
                )
            ),
            array(
                'id' => 'rc_submit_text',
                'title' => __('Submit Text', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_submit_text',
                    'default' => 'Order',
                    'type' => 'text'
                )
            ),
            array(
                'id' => 'rc_order_email',
                'title' => __('Email for orders', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_order_email',
                    'default' => 'lotfihadjsadok@gmail.com',
                    'type' => 'email'
                )
            ),
            array(
                'id' => 'rc_order_number',
                'title' => __('Number for orders', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_order_number',
                    'default' => '0553397543',
                    'type' => 'number'
                )
            ),
            array(
                'id' => 'rc_submit_text_color',
                'title' => __('Submit Text Color', 'raysel-checkout'),
                'callback' => array($this, 'render_field'),
                'page' => 'raysel_checkout',
                'section' => 'raysel_main_section',
                'args' => array(
                    'label' => 'rc_submit_text_color',
                    'type' => 'color'
                )
            ),
        );
    }
    public function settings_setup()
    {
        register_setting('raysel_checkout_settings', 'rc_settings', '');
        add_settings_section('raysel_main_section', '', '', 'raysel_checkout');
        foreach ($this->fields as $field) {
            add_settings_field($field['id'], $field['title'], $field['callback'], $field['page'], $field['section'], $field['args']);
        }
    }
}
