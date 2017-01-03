<?php
class UploadComponent extends Object
{

    // init
    var $errors = array();
    var $results = array();
    var $upload = false;
    var $permitted = array('image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/jpg', 'image/TIFF');
    var $maxfilesize = 1048576;
    var $cache_dir = 'img/cache';
    var $cache_width = 600;

    /**
     * uploads files to the file system
     * @dir    = directory to upload to
     */

    public function beforeRedirect()
    {
    }

    var $_methods = array();

    /**
     * Initializes AuthComponent for use in the controller
     *
     * @param object $controller A reference to the instantiating controller object
     * @return void
     * @access public
     */
    function initialize(&$controller)
    {

    }

    function startup(&$controller)
    {

    }

    function beforeRender(&$controller)
    {

    }

    function shutdown(&$controller)
    {

    }

    function do_upload($dir = null, $form = 'Files')
    {
        // init
        $absolute_url = WWW_ROOT . $dir;
        $relative_url = $dir;
        // create directories
        //$this->create_dir($dir);
        // loop through files
        if ($form != 'file') {
            foreach ($_FILES[$form]['name'] as $key => $file) {
                // convert filename
                $filename = preg_replace('/[^a-zA-Z0-9._ ]/', '', $_FILES[$form]['name'][$key]);
                // replace spaces with underscores
                $filename = strtolower(str_replace(' ', '_', $_FILES[$form]['name'][$key]));
                // assume filetype is false
                $typeOK = false;
                // check filetype is permitted
                if (in_array($_FILES[$form]['type'][$key], $this->permitted)) {
                    $typeOK = true;
                }

                // if file is over max limit
                if ($_FILES[$form]['error'][$key] == 2) {
                    $typeOK = true;
                }

                // if file not selected
                if ($_FILES[$form]['error'][$key] == 4) {
                    $typeOK = true;
                }

                // if type ok
                if ($typeOK) {
                    // switch based on error code
                    switch ($_FILES[$form]['error'][$key]) {
                        case 0:
                            // create unique filename and upload file
                            ini_set('date.timezone', 'Europe/London');
                            $now = date("YdmHis");
                            $full_url = $absolute_url . '/' . $now . '-' . $filename;
                            $url = $relative_url . '/' . $now . '-' . $filename;
                            $success = move_uploaded_file($_FILES[$form]['tmp_name'][$key], $full_url);
                            //echo $url."+".$full_url; die;
                            // if upload was successful
                            if ($success) {
                                $this->upload = true;
                                $this->results['urls'][] = $url;
                            } else {
                                $this->errors[] = "Error uploaded $filename. Please try again.";
                            }
                            break;
                        case 2:
                            // an error occured
                            $this->errors[] = "Error uploading $filename. File exceeds max file size (" . ($this->maxfilesize / 1048576) . "MB).";
                            break;
                        case 3:
                            // an error occured
                            $this->errors[] = "Error uploading $filename. Please try again.";
                            break;
                        case 4:
                            // no file uploaded
                            $this->results[] = "No File was selected.";
                            break;
                        default:
                            // an error occured
                            $this->errors[] = "System error uploading $filename. Contact website admin.";
                            break;
                    }
                } else {
                    // unacceptable file type
                    $this->errors[] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
                }
            }
        } else {

            // convert filename
            //$NewKey = 0;
            $filename_new = preg_replace('/[^a-zA-Z0-9._ ]/', '', $_FILES[$form]['name']);
            // replace spaces with underscores
            $filename_new = strtolower(str_replace(' ', '_', $_FILES[$form]['name']));
            // assume filetype is false
            $typesOK = false;
            // check filetype is permitted
            if (in_array($_FILES[$form]['type'], $this->permitted)) {
                $typesOK = true;
            }

            // if file is over max limit
            if ($_FILES[$form]['error'] == 2) {
                $typesOK = true;
            }

            // if file not selected
            if ($_FILES[$form]['error'] == 4) {
                $typesOK = true;
            }

            // if type ok
            if ($typesOK) {
                // switch based on error code
                switch ($_FILES[$form]['error']) {
                    case 0:
                        // create unique filename and upload file
                        ini_set('date.timezone', 'Europe/London');
                        $now = date("YdmHis");
                        $full_url_new = $absolute_url . '/' . $now . '-' . $filename_new;
                        $url_new = $relative_url . '/' . $now . '-' . $filename_new;
                        $success = move_uploaded_file($_FILES[$form]['tmp_name'], $full_url_new);
                        // if upload was successful
                        if ($success) {
                            $this->upload = true;
                            $this->results['urls'][] = $url_new;
                        } else {
                            $this->errors[] = "Error uploaded $filename_new. Please try again.";
                        }
                        break;
                    case 2:
                        // an error occured
                        $this->errors[] = "Error uploading $filename_new. File exceeds max file size (" . ($this->maxfilesize / 1048576) . "MB).";
                        break;
                    case 3:
                        // an error occured
                        $this->errors[] = "Error uploading $filename_new. Please try again.";
                        break;
                    case 4:
                        // no file uploaded
                        $this->results[] = "No File was selected.";
                        break;
                    default:
                        // an error occured
                        $this->errors[] = "System error uploading $filename_new. Contact website admin.";
                        break;
                }
            } else {
                // unacceptable file type
                $this->errors[] = "$filename_new cannot be uploaded. Acceptable file types: gif, jpg, png.";
            }
        }
        return $this->upload;
    }


    /**
     * loops through and creates all the directories
     * @dir = directory to create
     */
    function create_dir($dir)
    {
        // explode
        $explode = explode('/', $dir);
        $url = WWW_ROOT;

        // loop through
        foreach ($explode as $e) {
            $url .= $e . DS;
            if (!is_dir($url)) {
                mkdir($url);
                chmod($url, 0777);
            }
        }
    }


    /**
     * Get a list of files in tmp dir
     */
    function _get_uploaded_files($id = null)
    {
        // ignore these
        $ignore = array('.', '..', '.svn');
        // init
        $dir = WWW_ROOT . 'files';

        // if id is set
        if ($id != null) {
            $dir .= DS . $id;
        }
        // get files
        $files = @scandir($dir);

        // if files found
        if (!empty($files)) {
            // loop and check
            foreach ($files as $k => $f) {
                if (in_array($f, $ignore)) {
                    unset($files[$k]);
                }
            }
        }
        //pr($files); exit;
        return $files;
    }

    function resize_image($url, $width = '*', $height = '*')
    {
        // check url is absolute path
        if (!file_exists($url)) {
            // file path
            $path_ab = WWW_ROOT . $url;
        }

        // if file exists
        if (file_exists($path_ab)) {
            // get image details
            $details = getimagesize($path_ab);
            // if either width or height is an asterix
            if ($width == '*' || $height == '*') {
                if ($height == '*') {
                    // recalculate height
                    $height = ceil($width / ($details[0] / $details[1]));
                } else {
                    // recalculate width
                    $width = ceil(($details[0] / $details[1]) * $height);
                }
            } else {
                if (($details[1] / $height) > ($details[0] / $width)) {
                    $width = ceil(($details[0] / $details[1]) * $height);
                } else {
                    $height = ceil($width / ($details[0] / $details[1]));
                }
            }

            // include folder in filename
            $dir_path = preg_replace("/[^a-z0-9_]/", "_", strtolower(dirname($url)));
            $dir_path .= '-' . basename($url);

            // create new file names
            $file_rel = $this->cache_dir . DS . $width . 'x' . $height . '_' . $dir_path;
            $file_cached = WWW_ROOT . $this->cache_dir . DS . $width . 'x' . $height . '_' . $dir_path;

            // switch on file type
            switch ($details[2]) {
                // deal with jpg file
                case 2:
                    // get source file
                    $source = imagecreatefromjpeg($path_ab);
                    // create tmep image resource
                    $temp = imagecreatetruecolor($width, $height);
                    // resize the image
                    imagecopyresampled($temp, $source, 0, 0, 0, 0, $width, $height, $details[0], $details[1]);
                    // save the result to cache dir
                    $success = imagejpeg($temp, $file_cached, 90);
                    // destroy image resources
                    imagedestroy($source);
                    imagedestroy($temp);
                    break;
            }
        }
    }
}

?>