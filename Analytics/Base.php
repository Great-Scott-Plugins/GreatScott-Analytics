<?php

namespace GreatScottPlugins\GreatScottAnalytics\Analytics;

use GreatScottPlugins\WordPressPlugin\Plugin;

class Base extends Plugin
{
    /**
     * Enqueue block editor assets.
     *
     * @action wp_enqueue_scripts
     */
    public function enqueueBlockEditorAssets()
    {
        Base::enqueueScript('great-scott-analytics/main');
    }

    /**
     * @action init, 1
     */
    public function registerAssets()
    {
        $asset_uri = \trailingslashit(BASE_URL) . 'assets/build/';
        $asset_root = \trailingslashit(BASE_PATH) . 'assets/build/';
        $asset_files = glob($asset_root . '*.asset.php');

        // Enqueue webpack loader.js, if it exists.
        if (true === is_readable($asset_root . 'loader.js')) {
            self::enqueueScript(
                'great-scott-analytics/runtime',
                $asset_uri . 'loader.js',
                [],
                filemtime($asset_root . 'loader.js')
            );
        }

        foreach ($asset_files as $asset_file) {
            $asset_script = require($asset_file);

            $asset_filename = basename($asset_file);

            $asset_slug_parts = explode('.asset.php', $asset_filename);
            $asset_slug = array_shift($asset_slug_parts);

            $asset_handle = sprintf('great-scott-analytics/%s', $asset_slug);

            $stylesheet_path = $asset_root . $asset_slug . '.css';
            $stylesheet_uri = $asset_uri . $asset_slug . '.css';

            $javascript_path = $asset_root . $asset_slug . '.js';
            $javascript_uri = $asset_uri . $asset_slug . '.js';

            if (true === is_readable($stylesheet_path)) {
                $style_dependencies = [];

                \wp_register_style(
                    $asset_handle,
                    $stylesheet_uri,
                    [],
                    $asset_script['version']
                );
            }

            if (true === is_readable($javascript_path)) {
                \wp_register_script(
                    $asset_handle,
                    $javascript_uri,
                    $asset_script['dependencies'],
                    $asset_script['version']
                );
            }
        }
    }

    /**
     * Enqueue script.
     *
     * @param string $handle
     * @param string $src
     * @param string[] $dependencies
     * @param string|bool|null $version
     * @param bool $in_footer
     *
     * @return void
     */
    public static function enqueueScript(
        string $handle,
        string $src = '',
        array  $dependencies = [],
               $version = false,
        bool   $in_footer = true
    )
    {
        $localizes = [];

        switch ($handle) {
            case 'great-scott-analytics/main':
                $localizes[] = [
                    'object_name' => 'GreatScottAnalytics',
                    'value' => [
                        'endpointCollect' => \rest_url('gs-analytics/v1/hit'),
                        'siteName' => \get_bloginfo('name'),
                        'siteNameEncoded' => md5(\get_bloginfo('name')),
                        'siteUrl' => \get_bloginfo('url'),
                    ],
                ];
                break;
        }

        \wp_enqueue_script($handle, $src, $dependencies, $version, $in_footer);

        if (0 < count($localizes)) {
            foreach ($localizes as $localize) {
                $object_name = $localize['object_name'] ?? '';
                $local_params = true === isset($localize['value']) && true === is_array($localize['value']) ?
                    $localize['value'] :
                    [];

                \wp_localize_script(
                    $handle,
                    $object_name,
                    $local_params
                );
            }
        }
    }

    /**
     * Enqueue style.
     *
     * @param string $handle
     * @param string $src
     * @param string[] $dependencies
     * @param string|bool|null $version
     * @param string $media
     *
     * @return void
     */
    public static function enqueueStyle($handle, string $src = '', $dependencies = [], $version = false, $media = 'all')
    {
        \wp_enqueue_style($handle, $src, $dependencies, $version, $media);
    }
}
