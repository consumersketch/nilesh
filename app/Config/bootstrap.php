<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));
define('COMMON_EMAIL','nileshratangupta@gmail.com');
define('WEBSITE_NAME', 'Test');
define('ADMIN_EMAIL', 'nileshratangupta@gmail.com');
define('ADMIN_EMAIL_NAME', 'Nilesh');
define('SERVER_NAME', $_SERVER['SERVER_NAME']);
define('SITE_URL', 'http://' . SERVER_NAME . '/nilesh/');
define('NOTIFY_URL', SITE_URL."paypal_ipn/process");
define('ADMIN_URL', 'http://' . SERVER_NAME . '/nilesh/admin/');
define('SERVER_ADDRESS', $_SERVER['SERVER_ADDR']);
define('SERVER_PORT', $_SERVER['SERVER_PORT']);
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('REMOTE_PORT', $_SERVER['REMOTE_PORT']);
define('REQUEST_TIME', $_SERVER['REQUEST_TIME']);
define('PAGINATION_LIMIT', 20);
define('PAGINATION_LIMIT_ADMIN', -1);
define('PAGINATION_LIMIT_ADMIN_AJAX', -1);
define('PAGINATION_LIMIT_FRONT', 5);
define('FALSE_VALUE', false);
define('SUB_DIRECTORY', '/nilesh/');
define('REQUEST_URL', '/admin');
define('WEBSITE_URL', SITE_URL);
define('RESOURCES_DIRECTORY', '/img/admin/');
define('FRONT_RESOURCES_DIRECTORY', '/img/front/');
define("UPLOADURL", $_SERVER['DOCUMENT_ROOT'] . SUB_DIRECTORY . '/app/webroot/files/');
define('USERDIR','usersphotos/');
define("ASSETS_URL", '/nilesh/assets/');
define("FRONT_ASSETS_URL", '/');
define("DOWNLOADURL", SUB_DIRECTORY . '/app/webroot/files/');
define("PHYSICAL_IMAGE_PATH", SUB_DIRECTORY . '/app/webroot/');
define('UPLOAD_DEFAULT','files/');
define("UPLOAD_AVATARS", "upload_photo/");
define("UPLOAD_DOCUMENT", "upload_document/");
define("UPLOAD_EXCEL", "uplaod_excel/");

define('WWW_ROOT_EMAIL_ATTACHED', ROOT . DS . APP_DIR . DS . WEBROOT_DIR);
define('UPLOADS', "uploads/");
define('CURRENCY_SYMBOL', "$");
define('DEFAULT_PAYMENT_ID', "");
define('LOGIN_SUC_MSG', 'You have successfully logged in');
define('LOGIN_NOT_SUC_MSG', 'Invalid email id or password, try again');
define('REG_SUC_MSG', 'You have successfully registered');
define('REG_NOT_SUC_MSG', 'You have not successfully registered, try again');
define('DUPLICATE_USER_MSG', 'Email-id already registered please try another');
define('CURRENCY_CODE', '');
define('ADMIN_EMAIL_ID', '');
define('USER_DELETED', 'User successfully deleted');
define('USER_NOT_DELETED', 'User not deleted');
define('USER_UPDATE', 'User successfully updated');
define('DTFORMAT','d/m/Y');
define('SQL2VIEWDTFORMAT','%d-%m-%Y');
define('DTDBFORMAT','Y-m-d');
define('TMDBFORMAT','H:i:s');
define('TMFRFORMAT','g:i A');
define('DBFORMAT','Y-m-d');
define('EXTENTIONS','jpg,jpeg,png');
define('FILESIZE','1MB');
define('FILESIZE_TXT','File size must be less then 1MB');
define('LASTMONTHTODATE','1');
define('THISMONTH','2');
define('THISYEAR','3');
define('LASTYEAR','4');

//CakePlugin::load('AjaxMultiUpload', array('bootstrap' => true));


Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));


App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
	'engine' => 'File',
	'types' => array('notice', 'info', 'debug'),
	'file' => 'debug',
));
CakeLog::config('error', array(
	'engine' => 'File',
	'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
	'file' => 'error',
));