<?php

namespace GreatScottPlugins\GreatScottAnalytics\Analytics\Admin;

use GreatScottPlugins\GreatScottAnalytics\Analytics\Base;
use GreatScottPlugins\WordPressPlugin\Singleton;
use GreatScottPlugins\WordPressPlugin\View;

class Settings extends Singleton
{
    /**
     * Add a custom body class for the admin analytics page.
     * @filter admin_body_class
     */
    public function addAdminBodyClass($classes)
    {
        if (true === isset($_GET['page']) && $_GET['page'] === 'greatscott_analytics') {
            $classes .= ' greatscottanalytics_page';
        }

        return $classes;
    }

    /**
     * Remove the "Thank you for creating with WordPress" footer text.
     * @filter admin_footer_text
     */
    public function removeAdminFooterText($text)
    {
        if (true === isset($_GET['page']) && $_GET['page'] === 'greatscott_analytics') {
            return View::template(BASE_PATH . 'templates/admin/settings/footer');
        }
        return $text;
    }

    /**
     * Add main settings menu.
     *
     * @action admin_menu
     */
    public function addMainSettingsMenu()
    {
        \add_menu_page(
            'GreatScott Analytics',
            'Analytics',
            'manage_options',
            'greatscott_analytics',
            [$this, 'renderMainSettingsPage'],
            'dashicons-admin-generic', // TODO: Add custom icon.
            99
        );

        Base::enqueueScript('great-scott-analytics/admin-settings');
        Base::enqueueStyle('great-scott-analytics/admin-settings');
    }

    /**
     * Render main settings page.
     */
    public static function renderMainSettingsPage()
    {
        View::includeTemplate(BASE_PATH . 'templates/admin/settings/main');
    }
}