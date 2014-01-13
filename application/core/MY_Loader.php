<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

/**
 * Dev notes :
 * Edit carefully with what you will add.
 * You don't want to hack the MX_Loader
 */
class MY_Loader extends MX_Loader{

    function my_view($view,$view_path,$vars=array(),$return=false){
        $file_ext = pathinfo($view,PATHINFO_EXTENSION);
        $view = ($file_ext == '') ? $view.EXT : $view;
      
        $data=array(
            '_ci_path' => $view_path.'/'.$view,
            '_ci_vars' => $this->_ci_object_to_array($vars),
            '_ci_return' => $return
        );

        return $this->_ci_load($data);
    }
}



