<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 */

/*
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/*
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/*
 * The full path to the directory which holds "src", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/*
 * The actual directory name for the application directory. Normally
 * named 'src'.
 */
define('APP_DIR', 'src');

/*
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR . DS);

/*
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/*
 * File path to the webroot directory.
 *
 * To derive your webroot from your webserver change this to:
 *
 * `define('WWW_ROOT', rtrim($_SERVER['DOCUMENT_ROOT'], DS) . DS);`
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/*
 * Path to the tests directory.
 */
define('TESTS', ROOT . DS . 'tests' . DS);

/*
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' . DS);

/*
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' . DS);

/*
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' . DS);

/*
 * Path to the resources directory.
 */
define('RESOURCES', ROOT . DS . 'resources' . DS);

/*
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');

/*
 * Path to the cake directory.
 */
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
define('CAKE', CORE_PATH . 'src' . DS);



define('UNDEL', 0);
define('DEL_FLAG', 1);
define('ACTIVE', 1);
define('INACTIVE', 0);
define('PAGINATE', 10);
define('GET_NEW', 0);
define('HANDED', 1);

define('ADMIN', 1);
define('USER', 2);

define('TEAM_ACCESS_SYS', [4, 6, 18]);


define('DOMAIN', env('URL_DOMAIN', 'itsj-group.com.vn'));

define('STATUS_DEVICE', [
    '0' => 'New',
    '1' => 'Old'
]);

define('DEVICE_IMAGE', 0);

define('TRANSFER', 0);

define('USING', 1);

define('RETURNED', 2);

define('ALL', 3);

define('STATUS_ASSIGN', [
    '0' => 'Transferred',
    '1' => 'Using',
    '2' => 'Returned',
    '3' => 'All'
]);

define('SITE_ROOT', realpath(dirname(__FILE__)));


define('ADMIN_ID', 1);

define('BASE_URL', env('BASE_URL', "http://device-management.itsj-group.local/"));

define('CHANGED', 0);
define('OWNING', 1);

define('NOT_ASSIGNED', 0);
define('ASSIGNED', 1);

define('TIMESHEET_BASE_URL', env('TIMESHEET_BASE_URL', "http://timesheet.itsj-group.local/"));

define('STATUS_DEVICE_ASSIGN', [
    '0' => 'Not Assigned',
    '1' => 'Assign',
]);
