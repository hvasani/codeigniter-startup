<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Robert
 * Date: 30.04.2012
 * Time: 14:39
 * To change this template use File | Settings | File Templates.
 */
class Model_site_settings extends CI_Model {

  public $reflection = null;

  public function __construct(){
    parent::__construct();

    $this->reflection = new ReflectionObject($this);
  }

  const SITE_TITLE   = "Basic CI";

  const SITE_META_CONTENT_LANGUAGE_SHORT  = "en";
  const SITE_META_CONTENT_LANGUAGE        = "English";
  const SITE_META_ROBOTS                  = "";
  const SITE_META_KEYWORDS                = "";
  const SITE_META_DESCRIPTION             = "";
    
  const ERROR_STRING = "Not Found";

  /**
   * Use this function to render settings,
   * Maybe you'll move them in the database or somewhere else, making the transition easy
   * @static
   * @param string $setting_name
   * @return string
   */
  public function getSetting($setting_name){
    $setting_name = ucwords($setting_name);

    return ($this->reflection->hasConstant($setting_name) ?
        $this->reflection->getConstant($setting_name) : self::ERROR_STRING);
  }
    
}