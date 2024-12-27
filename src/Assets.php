<?php
namespace WenpriseSpaceNameAssets;

class Assets {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function enqueue_assets() {
        if (MWP_DEV_MODE) {
            // Development mode - use Vite dev server
            wp_enqueue_script('mwp-dev-server', 'http://localhost:3000/@vite/client', array(), null);
            wp_enqueue_script('mwp-main', 'http://localhost:3000/assets/js/main.js', array(), null);
            wp_enqueue_style('mwp-styles', 'http://localhost:3000/assets/css/style.scss', array(), null);
        } else {
            // Production mode - use compiled assets
            $manifest = json_decode(file_get_contents(MWP_PLUGIN_PATH . 'dist/manifest.json'), true);
            
            // Enqueue main script
            if (isset($manifest['assets/js/main.js'])) {
                wp_enqueue_script(
                    'mwp-scripts',
                    MWP_PLUGIN_URL . 'dist/' . $manifest['assets/js/main.js']['file'],
                    array(),
                    null,
                    true
                );
            }
            
            // Enqueue main style
            if (isset($manifest['assets/css/style.scss'])) {
                wp_enqueue_style(
                    'mwp-styles',
                    MWP_PLUGIN_URL . 'dist/' . $manifest['assets/css/style.scss']['file'],
                    array(),
                    null
                );
            }
        }
    }
}