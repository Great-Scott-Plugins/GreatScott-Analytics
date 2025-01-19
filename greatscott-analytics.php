<?php
/**
 * Plugin Name: GreatScott Analytics
 * Plugin URI: https://greatscottplugins.com/analytics/
 * Description:
 * Author: GreatScottPlugins
 * Author URI: https://greatscottplugins.com
 * Version: 1.0.0
 * Text Domain: great-scott-analytics
 * Domain Path: /languages/
 * Min WP Version: 6.7.1
 * Requires PHP: 7.4
 *
 * Copyright (c) 2025 Great Scott Plugins
 *
 * GNU General Public License, Free Software Foundation <https://www.gnu.org/licenses/gpl-3.0.html>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     GreatScottPlugins\GreatScottAnalytics
 * @author      GreatScottPlugins
 * @copyright   Copyright (C) 2025 GreatScottPlugins. All rights reserved.
 **/

namespace GreatScottPlugins\GreatScottAnalytics;

use GreatScottPlugins\GreatScottAnalytics\Analytics\Base;
use GreatScottPlugins\GreatScottAnalytics\Analytics\RestApi;

require_once __DIR__ . '/vendor/autoload.php';

define('BASE_PATH', \plugin_dir_path(__FILE__));
define('BASE_URL', \plugin_dir_url(__FILE__));

Base::instance();
RestApi::instance();
