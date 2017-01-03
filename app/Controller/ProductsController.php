<?php
// app/Controller/UsersController.php
class ProductsController extends AppController
{ 
    var $name = 'Products';
    public $title = 'Manage Products';

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index','getData');

        if(isset($this->Security) &&  ($this->RequestHandler->isAjax() || $this->RequestHandler->isPost())){
            $this->Security->validatePost = false;
            $this->Security->enabled = false;
            $this->Security->csrfCheck = false;
        }
    }


    public function getData() {
         $this->layout = 'ajax';
        $this->autoRender = false;
        $result = array();
        $client_id = isset($this->request->data['filter']) ? $this->request->data['filter'] : 0;


        $list = $this->Product->get_products($client_id); // get Products from Model
        
        if(!empty($list)) {
            $result = array(
                'status'=>true,
                'data'=>$list
            );

        }else{

            $result = array(
                'status'=>false,
                'data'=>array()
            );
        }

        
        echo json_encode($result);die;

    } // end of function

  

}