<?php
// app/Controller/UsersController.php
class InvoicesController extends AppController
{ 
    var $name = 'Invoices';
    public $title = 'Manage Invoices';

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

    public function index()
    {
        $this->layout = 'front_login_layout';


        $this->Client = ClassRegistry::init('Client'); // init client
        $clients = $this->Client->get_clients();

        $this->set('clients',$clients); // set client

        $list = $this->Invoice->get_invoices(); // get invouce
        $this->set('results', $list);  // set invoices

    }// end of function


    public function getData() {
         $this->layout = 'ajax';
        $this->autoRender = false;

        $filter = ( isset($this->request->data['filter']) && $this->request->data['filter'] > 0) ? $this->request->data['filter'] : 0;
        $client_id =  isset($this->request->data['client_id']) ? $this->request->data['client_id'] : 0;
        $product_id = isset($this->request->data['product_id']) ? $this->request->data['product_id'] : 0;
        
        $data = array('filter'=>$filter,'client_id'=>$client_id,'product_id'=>$product_id);    

        $list = $this->Invoice->get_invoices($data); // get invouce
        $result = array(
                'status'=>true,
                'data'=>$list
            );

        
        echo json_encode($result);die;

    } // end of function

  

}