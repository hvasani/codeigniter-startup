<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Operations
{
    /**
     * @static
     * @param $glue
     * @param $separator
     * @param $array
     * @return string
     */
    public static function arrayImplode( $glue, $separator, $array ) {
        if ( ! is_array( $array ) ) return $array;
        $string = array();
        foreach ( $array as $key => $val ) {
            if ( is_array( $val ) )
                $val = implode( ',', $val );
            $string[] = "{$key}{$glue}{$val}";

        }
        return implode( $separator, $string );
    }

    /**
     * @static
     * @param $options
     * @param $select_name
     * @param null $selected_option
     * @return string
     */
    public static function generateSelectFromArray($options , $select_name , $selected_option = null){
        $return = "";
        $return .= '<select id="'.$select_name.'" name="'.$select_name.'">';
        foreach($options as $value=>$name){
            $return .= '<option value="'.$value.'"';

            if($value == $selected_option)
                $return .= 'selected="selected"';

            $return .= '>'.$name.'</option>';
        }
        $return .= '</select>';

        return $return;
    }

    /**
     * Quick solution for preparing select elements
     * @static
     * @param $from  -> bidimensional array
     * @param $key   -> index of the new array
     * @param $value -> value of the new array
     * @return array
     */
    public static function composeKeyToValue($from , $key , $value){
        $ret = array();

        foreach($from as $f){
            if(isset($f[$key]) && isset($f[$value]))
                $ret[$f[$key]] = $f[$value];
        }

        return $ret;
    }

    /**
     * @static
     * @param $str
     * @return bool
     */
    public static function is_date( $str ){
          $stamp = strtotime( $str );

          if (!is_numeric($stamp))
          {
             return false;
          }
          $month = date( 'm', $stamp );
          $day   = date( 'd', $stamp );
          $year  = date( 'Y', $stamp );

          if (checkdate($month, $day, $year))
          {
             return true;
          }

          return false;
    }

    /**
     * @static
     * @param array|string $asset
     * @param string $force_base_url
     * @return string
     */
    public static function getAssetFileHTML($asset, $force_base_url = null){
      $return = "";
      
      if(is_array($asset))
        foreach($asset as $key=>$assets_list){
          if(!is_numeric($key))
            $return .= "\r\n".'<!-- '.$key.' -->'."\r\n";
          $return .= self::getAssetFileHTML($assets_list);
        }
      elseif(is_string($asset)){
        $file_extension = self::getFileExtension($asset);

        $file_path = (is_string($force_base_url) ? $force_base_url.$asset : $asset);

        switch($file_extension){
          case "js":
            $return .= '<script type="text/javascript" src="'.$file_path.'"></script>'."\r\n";
            break;
          case "css":
            $return .= '<link href="'.$file_path.'" type="text/css" rel="stylesheet" />'."\r\n";
            break;
          default:
            $return .= '<script type="text/javascript">alert("No pattern found for : '.$file_extension.' files.")</script>'."\r\n";
        }

      }

      return $return;
    }

    /**
     * @static
     * @param $filename
     * @param bool $comma
     * @return bool|string
     */
    public static function getFileExtension($filename, $comma = false) {
      if (strrpos($filename, '.')){
        $extension = substr($filename, strrpos($filename, '.'));

        return $comma ? $extension : substr($extension, 1);
      } else
         return false;

   }

}