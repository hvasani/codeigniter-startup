<?php
/**
 * Start Auto Completion for CI Libraries
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Lang $lang
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * @property CI_Javascript $javascript
 * @property CI_Jquery $jquery
 * @property CI_Utf8 $utf8
 * @property CI_Security $security
 * End Auto Completion for CI Libraries
 *
 * Start Auto Completion for My/Imported Libraries/Models
 *
 * @property Model_site_settings $model_site_settings
 * @property Layout $layout
 * 
 * End Auto Completion for My/Imported Libraries/Models
 */
class Bootstrap extends CI_Controller {

  public $render_settings = array(
    "site_title"  =>  false,
    "meta"        =>  array(),
    "assets"      =>  array(
           "styles"    =>  array(
             'assets/style/front.css'
              ),
           "scripts"   =>  array(
             'assets/scripts/jquery-1.6.2.min.js'
              ),
           "libraries" =>  array(
              "jQuery-UI" => array(
                'assets/scripts/libraries/jquery_ui/jquery-ui-1.8.16.custom.css',
                'assets/scripts/libraries/jquery_ui/jquery-ui-1.8.16.custom.min.js',
                ),
              ),
    ),
    'user_information' => array(),
  );

	public function __construct(){
    parent::__construct();
    $this->layout->setLayout('layout',$this->_getLayoutFolderPath());
	  $this->setDefaultRenderSettings();
  }

  public function _getLayoutFolderPath(){
    return APP_BASE.DIRECTORY_SEPARATOR.APPPATH."layouts".DIRECTORY_SEPARATOR;
  }

  private function setDefaultRenderSettings(){
    $this->render_settings['site_title'] = $this->model_site_settings->getSetting('SITE_TITLE');

    $this->render_settings['meta'] = array(
        array('name'    => 'Content-type',
              'content' => 'text/html; charset=utf-8',
              'type'    => 'equiv'),
        array('name'    => 'content-language',
              'content' => $this->model_site_settings->getSetting('SITE_META_CONTENT_LANGUAGE_SHORT')),
        array('name'    => 'language',
              'content' => $this->model_site_settings->getSetting('SITE_META_CONTENT_LANGUAGE')),
        array('name'    => 'robots',
              'content' => $this->model_site_settings->getSetting('SITE_META_ROBOTS')),
        array('name'    => 'keywords',
              'content' => $this->model_site_settings->getSetting('SITE_META_KEYWORDS')),
        array('name'    => 'description',
              'content' => $this->model_site_settings->getSetting('SITE_META_DESCRIPTION')),
      );

    $this->render_settings['user_information'] = array(
        'greet'   =>  'Welcome to Codeigniter!',
    );
  }
}