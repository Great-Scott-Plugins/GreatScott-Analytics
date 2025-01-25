<?php

namespace GreatScottPlugins\GreatScottAnalytics\Analytics\Admin;

use GreatScottPlugins\GreatScottAnalytics\Analytics\Base;
use GreatScottPlugins\WordPressPlugin\Singleton;
use GreatScottPlugins\WordPressPlugin\View;

class Settings extends Singleton
{
    /**
     * Add main settings menu.
     *
     * @action admin_menu
     */
    public function addMainSettingsMenu() {
        \add_menu_page(
            'GreatScott Analytics',
            'Analytics',
            'manage_options',
            'greatscott_analytics',
            [$this, 'renderMainSettingsPage'],
            'dashicons-admin-generic', // TODO: Add custom icon.
            99
        );
    }

    /**
     * Render main settings page.
     */
    public static function renderMainSettingsPage()
    {
        Base::enqueueScript('great-scott-analytics/admin-settings');
        Base::enqueueStyle('great-scott-analytics/admin-settings');

        View::includeTemplate(BASE_PATH . 'templates/admin/settings/main');
    }
}