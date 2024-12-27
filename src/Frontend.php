<?php

namespace WenpriseSpaceName;

class Frontend
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets()
    {
        wp_enqueue_style('_b', Helpers::get_assets_url('/dist/styles.css'));
        wp_enqueue_script('_b', Helpers::get_assets_url('/dist/main.js'), ['jquery'], SPACENAME_VERSION, true);

        wp_localize_script('_b', 'wenpriseSpaceNameFrontendSettings', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
    }
}