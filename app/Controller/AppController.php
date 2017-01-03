<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */


class AppController extends Controller
{
    public $components = array(
        'Acl',
        'Security',
        'Session',
        'Cookie',
        'Upload',
        'Paginator',
        'RequestHandler',
        'General',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('user_id' => 'username')
                )
            ),
            'loginRedirect' => array('controller' => 'Users', 'action' => 'dashboard', 'admin' => true),
            'logoutRedirect' => array('controller' => 'Users', 'action' => 'login', 'admin' => true),
          //  'authorize'=> array('Actions'),
            'authError'=> 'You are not authorized to view this page'
        ),
    );

    public $helpers = array('Html', 'Form', 'Text','General',  'Session', 'Js' => array("Jquery"), 'Time');

    public function beforeFilter()
    {
       // $this->Session->delete('Auth.Admin');
       // $this->Session->delete('Auth.User');
        //pr($this->Session->read('Auth'));

       // $this->RequestHandler->respondAs('text/x-json');
        if ($this->request->is('ajax'))
        {
            $this->Security->unlockedActions = array($this->request->action);
        } else {
            $this->Security->unlockedActions = array($this->request->action);
        }

          if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
        }
        $this->Auth->autoRedirect = false;

        // global key

                $global = array(
                    'relativedate'=>array(
                        ''=>'Select Relative ',
                        LASTMONTHTODATE=>'Last Month to date',
                        THISMONTH=>'This Month',
                        THISYEAR=>'This Year',
                        LASTYEAR=>'Last Year',
                    ),
                    
                );
                
                $this->global = $global;
                
                $this->set('global_relativedate',$global['relativedate']);


        // end global


        if (isset($this->params['admin']) && $this->params['prefix'] == 'admin' && $this->request->prefix == 'admin') {

            $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'login', 'admin' => true);
            $this->Auth->logoutRedirect = array('controller' => 'Users', 'action' => 'login', 'admin' => true);
            $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'dashboard' , 'admin' => true);
            AuthComponent::$sessionKey = 'Auth.Admin';
            $this->Auth->authenticate = array(
                'Form' => array(
                    'userModel' => 'User',
                )
            );

            $this->Auth->allow('admin_login', 'admin_forgot_password', 'admin_reset', 'admin_GetStateByCountry', 'admin_add');

          
            if ($this->Session->read('Auth.Admin')) {
                $user_id = $this->Session->read('Auth.Admin');
                $user_id = $user_id['id'];
                $this->set('session_user_id', $user_id);
                $this->set('authUser', $this->Session->read('Auth.Admin'));
            }
        } else {
            $this->Auth->allow('index', 'view', 'forgot_password', 'reset', 'register', 'dashboard', 'GetStateByCountry', 'GetCityByCountry','getData');
            //Configure AuthComponent For Front Side Login
            /*$this->Auth->loginAction = array('controller' => 'Users', 'action' => 'login', 'admin' => false);
            $this->Auth->logoutRedirect = array('controller' => 'Users', 'action' => 'login', 'admin' => false);
            $this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'dashboard', 'admin' => false);
            AuthComponent::$sessionKey = 'Auth.User';

            if ($this->Session->read('Auth.User')) {
                    $user_id = $this->Session->read('Auth.User');
                    $id = $user_id['id'];
                    $this->set('front_session_user_id', $id);
                    $this->set('front_auth_User', $this->Session->read('Auth.User'));
            } */
        }
    }
}