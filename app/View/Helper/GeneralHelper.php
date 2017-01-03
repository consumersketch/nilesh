<?php
/**
 * Created by JetBrains PhpStorm.
 * User: proses
 * Date: 1/1/14
 * Time: 7:44 PM
 * To change this template use File | Settings | File Templates.
 */
class GeneralHelper extends AppHelper
{
    public $helpers = array('Session');

    public function first_letter_capitalized($text = null)
    {
        $result = '';
        $sentence_text = ucwords(strtolower($text));
        $result = preg_replace('#[.-][a-z]#e', 'strtoupper(\'$0\')', $sentence_text);
        return $result;
    }

    public function shortens_string_by_words($str, $number)
    {
        $array_str = explode(" ", $str);
        if (isset($array_str[$number])) {
            return implode(" ", array_slice($array_str, 0, $number));
        }
        return $str;
    }
 public function getDateDiff($val1,$val2=DATECALCULATIONFORMEMBERS) {

		$dt1 = date("Y-m-d",strtotime($val1)); 
		$dt2 = date($val2);
		$datetime1 = new DateTime($dt1);
		$datetime2 = new DateTime($dt2);
		return  $datetime1->diff($datetime2)->y;
	}

	public function base64_to_jpeg($base64_string) {
		$src = 'data: image/png;base64,'.$base64_string;
		return $src; 
	}
	
	public function file_size($size = '') { 
		switch(strtolower($size)) {
			case "small":
			case "profile":
				return '<small><strong>Max Dimensions</strong>: 247(w) X 203(h),<br /> <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "banner":
				return '<small><strong>Max Dimensions</strong>: 800(w) X 120(h), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "committee":
				return '<small><strong>file Dimensions</strong>: 500(w) X 500(h) (must be square), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "content":
				return '<small><strong>file Dimensions</strong>: 800(w) X 200(h), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "event_select_file":
				return '<small><strong>file Dimensions</strong>: 800(w) X 200(h), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "event_sponsor_file":
				return '<small><strong>file Dimensions</strong>: 200(w) X 200(h)(must be square), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "event_architect_file":
				return '<small><strong>file Dimensions</strong>: 200(w) X 200(h) (must be square), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "event_gallery":
				return '<small><strong>file Dimensions</strong>: 500(w) X 500(h) (must be square), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "footer_image":
				return '<small><strong>file Dimensions</strong>: 800(w) X 170(h), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			case "pdf_upload_image":
				return '<small><strong>Max File Size:</strong> 1MB , <strong>Allowed File Extensions: </strong> (PDF)</small>';
			break;
			case "product_image":
			return '<small><strong>file Dimensions</strong>: 800(w) X 150(h), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';			
			break;
			case "small_banner":
			return '<small><strong>file Dimensions</strong>: 300(w) X 250(h), <strong>Max File Size:</strong> 1MB , <br /><strong>Allowed File Extensions: </strong> (JPEG,JPG,PNG)</small>';
			break;
			
		}
	}
	
	
	public function showFormHelper($text = '') { 
		switch(strtolower($text)) {
			case "restaurant_title":
				return '<small><strong>Please provide Restaurant Full Name</strong></small>';
			break;
			case "restaurant_about":
				return '<small><strong>Please provide Restaurant Description</strong></small>';
			break;
			
			

		}
	}
	
	public function showError($errors,$field) {
		if(isset($errors[$field][0]) && $errors[$field][0]!='') {
			echo '<div class="error-message">'.$errors[$field][0].'</div>';
		}
	}
    
    public function db2date($date) {
        return date('d/m/Y',strtotime($date));
    } // end of function
	
	public function getVars($key,$array) {
		if(isset($array[$key])) {
			return $array[$key];
		}
	}
}