<?php

namespace GreatScottPlugins\GreatScottAnalytics\Analytics;

use GreatScottPlugins\WordPressPlugin\Hooks\ActionDecoratorHooks;
use GreatScottPlugins\WordPressPlugin\Hooks\ApiDecoratorHooks;
use GreatScottPlugins\WordPressPlugin\Singleton;

/**
 * Analytics Rest API class.
 *
 * @package GreatScottPlugins\WordPressPlugin
 *
 * @api-namespace gs-analytics
 * @api-version   1
 */
class RestApi extends Singleton
{
    use ActionDecoratorHooks;
    use ApiDecoratorHooks;

    /**
     * Init.
     */
    public static function init()
    {
        self::setApiRoutes(
            [
                'hit' => [
                    'methods' => [
                        \WP_REST_Server::CREATABLE,
                        \WP_REST_Server::READABLE,
                    ],
                    'callback' => function (\WP_REST_Request $request) {
                        $params = $request->get_params();

                        $app_id = $params['appId'] ?? null;

                        $events = array_filter($params, function ($key) {
                            return is_numeric($key);
                        }, ARRAY_FILTER_USE_KEY);

                        // TODO: Ok, we receive the above events. Now put them somewhere.

                        return \rest_ensure_response(compact('app_id', 'events'));
                    },
                    'permission_callback' => '__return_true',
                ]
            ]
        );
    }
}
