<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
class Product extends AppModel
{
    public $name = 'Product';
    public $useTable = 'products';
    //public $primaryKey = 'id';

   


    
	public function get_products($client_id = 0)
    {

        $sql = "SELECT product_id,product_description FROM products Product WHERE Product.client_id = '$client_id' ";
        return $this->query($sql);
    }
    	
}