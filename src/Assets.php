<?php

namespace WenpriseSpaceName;

class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets()
    {
        if (MWP_DEV_MODE) {
            // Development mode - use Vite dev server
            wp_enqueue_script('_b-dev-server', 'http://localhost:3000/@vite/client', [], null);
            wp_enqueue_script('_b-main', 'http://localhost:3000/assets/js/main.js', [], null);
            wp_enqueue_style('_b-styles', 'http://localhost:3000/assets/css/style.scss', [], null);
        } else {
            // Production mode - use compiled assets
            $manifest = json_decode(file_get_contents(SPACENAME_URL . 'dist/manifest.json'), true);

            // Enqueue main script
            if (isset($manifest[ 'assets/js/main.js' ])) {
                wp_enqueue_script(
                    '_b-scripts',
                    SPACENAME_URL . 'dist/' . $manifest[ 'assets/js/main.js' ][ 'file' ],
                    [],
                    null,
                    true
                );
            }

            // Enqueue main style
            if (isset($manifest[ 'assets/css/style.scss' ])) {
                wp_enqueue_style(
                    '_b-styles',
                    SPACENAME_URL . 'dist/' . $manifest[ 'assets/css/style.scss' ][ 'file' ],
                    [],
                    null
                );
            }
        }
    }
}