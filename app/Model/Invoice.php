<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
class Invoice extends AppModel
{
    public $name = 'Invoice';
    public $useTable = 'invoices';
    //public $primaryKey = 'id';

	public function get_invoices($conditions = array('filter'=>0,'client_id'=>0,'product_id'=>0))
    {
        $sql = "SELECT Invoice.*,InvoiceItem.*,Product.*,DATE_FORMAT(Invoice.invoice_date, '%d-%m-%Y') as invoice_date
             FROM invoices Invoice 
                INNER JOIN  invoicelineitems InvoiceItem 
                    ON Invoice.invoice_num = InvoiceItem.invoice_num 
                LEFT JOIN products Product 
                    ON InvoiceItem.product_id = Product.product_id
                ";
        switch($conditions['filter']) {
            case LASTMONTHTODATE:
                $sql.=" WHERE Invoice.invoice_date BETWEEN  DATE_FORMAT(DATE_ADD( CURDATE() , INTERVAL -1 MONTH ), '%Y-%m-01') AND CURDATE() "; 
            break;
            case THISMONTH:
                $sql.=" WHERE Invoice.invoice_date BETWEEN  DATE_FORMAT(CURDATE() ,'%Y-%m-01') AND LAST_DAY(CURDATE()) "; // for this month from start to end

            break;
            case THISYEAR:
                $sql.=" WHERE YEAR(Invoice.invoice_date) = YEAR(CURDATE()) "; // forthis year
            break;
            case LASTYEAR:
                $sql.="WHERE YEAR(Invoice.invoice_date) = YEAR(DATE_ADD(CURDATE(),INTERVAL -1 YEAR)) ";
            break;

        }

            //pr($conditions);die;

            if(($conditions['product_id']!=0) || (strtolower($conditions['product_id'])!='all')) {
                    $sql.=" AND  InvoiceItem.product_id = '".$conditions['product_id']."' "; // adding product condition
            }

            if(($conditions['client_id']!=0) || (strtolower($conditions['client_id'])!='all')) {
                    $sql.=" AND  Invoice.client_id = '".$conditions['client_id']."' "; // adding client condition
            }

       // echo $sql;die;
         $sql.="ORDER BY Invoice.invoice_date ASC";       
        return $this->query($sql);
    }
    	
}