<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    
    public $obj;
    public $layout;
    public $external_layout_path = "";

    public function setLayout($layout_name, $external_path = false)
    {
        $this->obj =& get_instance();
        $this->layout = $layout_name;
        $this->external_layout_path = $external_path;
    }
    
    public function view($view, $data=null, $return=false)
    {

        $loadedData = array();
        $loadedData['layout_content'] = $this->obj->load->view($view,$data,true);
        if($return){
            if(is_string($this->external_layout_path))
              $output = $this->obj->load->my_view($this->layout, $this->external_layout_path, $loadedData, true);
            else
              $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        } else {
            if(is_string($this->external_layout_path))
              $this->obj->load->my_view($this->layout, $this->external_layout_path, $loadedData, false);
            else
              $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
}
?>  