<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
class Invoiceitem extends AppModel
{ 
    public $name = 'Invoiceitem';
    public $useTable = 'invoicelineitems';
    //public $primaryKey = 'id';

    var $validate = array();

    
	
}