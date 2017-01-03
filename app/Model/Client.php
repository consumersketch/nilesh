<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
class Client extends AppModel
{
    public $name = 'Client';
    public $useTable = 'clients';
    //public $primaryKey = 'id';

   


    
	public function get_clients()
    {
        $sql = "SELECT * FROM clients Client ";
        return $this->query($sql);
    }
    	
}