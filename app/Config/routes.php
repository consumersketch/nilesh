<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'Invoices', 'action' => 'index', 'admin' => false));
//Router::connect('/Invoices/getData', array('controller' => 'Invoices', 'action' => 'getData', 'admin' => false));

//Router::connect('admin/acl', array('plugin' => 'acl', 'controller' => 'acl', 'action' => 'index', 'admin' => true));
/*Router::connect('/bid/*', array('controller' => 'products', 'action' => 'view'), array('slug' => '[a-zA-Z0-9_-]+'));
Router::connect('/profile/*', array('controller' => 'users', 'action' => 'profile'), array('id' => '[0-9]'));
Router::connect('/thankyou', array('controller' => 'users', 'action' => 'thankyou', 'admin' => false));
Router::connect('/thank-you', array('controller' => 'SecondOpinions', 'action' => 'thankyou', 'admin' => false));
Router::connect('/admin', array('controller' => 'users', 'action' => 'login', 'admin' => true));
Router::connect('/activate', array('controller' => 'users', 'action' => 'activate', 'admin' => false));
Router::connect('/recover', array('controller' => 'users', 'action' => 'recover', 'admin' => false));
Router::connect('/login', array('controller' => 'users', 'action' => 'login', 'admin' => false));
Router::connect('/registration', array('controller' => 'users', 'action' => 'registration', 'admin' => false));
Router::connect('/product/*', array('controller' => 'products', 'action' => 'view'), array('slug' => '[a-zA-Z0-9_-]+'));
Router::connect('/checkout/*', array('controller' => 'UserBids', 'action' => 'checkout'),
    array('slug' => '[a-zA-Z0-9_-]+'));*/

Router::parseExtensions('html', 'rss');

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
