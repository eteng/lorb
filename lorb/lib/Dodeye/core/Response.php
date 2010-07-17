<?php
/**
 * Description of response
 * @author Eteng omini <e-t-e-n-g@hotmail.com>
 */
class Response {
    private $_type = null;
    private $var = array(
        'content'=>null,
        'ready'=>false,
       );
    function  __set($name,  $value) {
        if(array_key_exists($name, $this->var))
             $this->var[$name] = $value;
        return $this;
    }
    function  __get($name) {
        if(array_key_exists($name, $this->var))
             return $this->var[$name];
    }
    function ready($ready = false){
        if(is_bool($ready)){
            $this->var['ready'] = $ready;
            if($ready == true){
                $this->send();
            }
        }
    }
    function isReady(){
        return $this->var['ready'];
    }
    function send(){
        header("Content-Type: {$this->whichContentType()}");
        print $this->content;
    }
    public function whichContentType(){
        return $this->_type;
    }
    public function useContentType( $type = 'html' ){
       $this->_extension = $type;
       switch($type){
        case "asf":     $this->_type = "video/x-ms-asf";                break;
        case "avi":     $this->_type = "video/x-msvideo";               break;
        case "bin":     $this->_type = "application/octet-stream";      break;
        case "bmp":     $this->_type = "image/bmp";                     break;
        case "cgi":     $this->_type = "magnus-internal/cgi";           break;
        case "css":     $this->_type = "text/css";                      break;
        case "dcr":     $this->_type = "application/x-director";        break;
        case "dxr":     $this->_type = "application/x-director";        break;
        case "dll":     $this->_type = "application/octet-stream";      break;
        case "doc":     $this->_type = "application/msword";            break;
        case "docx":    $this->_type = "application/msword";            break;
        case "exe":     $this->_type = "application/octet-stream";      break;
        case "gif":     $this->_type = "image/gif";                     break;
        case "gtar":    $this->_type = "application/x-gtar";            break;
        case "gz":      $this->_type = "application/gzip";              break;
        case "htm":     $this->_type = "text/html";                     break;
        case "html":    $this->_type = "text/html";                     break;
        case "iso":     $this->_type = "application/octet-stream";      break;
        case "jar":     $this->_type = "application/java-archive";      break;
        case "java":    $this->_type = "text/x-java-source";            break;
        case "jnlp":    $this->_type = "application/x-java-jnlp-file";  break;
        case "js":      $this->_type = "application/x-javascript";      break;
        case "jpg":     $this->_type = "image/jpg";                     break;
        case "jpe":     $this->_type = "image/jpg";                     break;
        case "jpeg":    $this->_type = "image/jpg";                     break;
        case "lzh":     $this->_type = "application/octet-stream";      break;
        case "mdb":     $this->_type = "application/mdb";               break;
        case "mid":     $this->_type = "audio/x-midi";                  break;
        case "midi":    $this->_type = "audio/x-midi";                  break;
        case "mov":     $this->_type = "video/quicktime";               break;
        case "mp2":     $this->_type = "audio/x-mpeg";                  break;
        case "mp3":     $this->_type = "audio/mpeg";                    break;
        case "mpg":     $this->_type = "video/mpeg";                    break;
        case "mpe":     $this->_type = "video/mpeg";                    break;
        case "mpeg":    $this->_type = "video/mpeg";                    break;
        case "pdf":     $this->_type = "application/pdf";               break;
        case "php":     $this->_type = "application/x-httpd-php";       break;
        case "php3":    $this->_type = "application/x-httpd-php3";      break;
        case "php4":    $this->_type = "application/x-httpd-php";       break;
        case "png":     $this->_type = "image/png";                     break;
        case "ppt":     $this->_type = "application/mspowerpoint";      break;
        case "qt":      $this->_type = "video/quicktime";               break;
        case "qti":     $this->_type = "image/x-quicktime";             break;
        case "rar":     $this->_type = "encoding/x-compress";           break;
        case "ra":      $this->_type = "audio/x-pn-realaudio";          break;
        case "rm":      $this->_type = "audio/x-pn-realaudio";          break;
        case "ram":     $this->_type = "audio/x-pn-realaudio";          break;
        case "rtf":     $this->_type = "application/rtf";               break;
        case "swa":     $this->_type = "application/x-director";        break;
        case "swf":     $this->_type = "application/x-shockwave-flash"; break;
        case "tar":     $this->_type = "application/x-tar";             break;
        case "tgz":     $this->_type = "application/gzip";              break;
        case "tif":     $this->_type = "image/tiff";                    break;
        case "tiff":    $this->_type = "image/tiff";                    break;
        case "torrent": $this->_type = "application/x-bittorrent";      break;
        case "txt":     $this->_type = "text/plain";                    break;
        case "wav":     $this->_type = "audio/wav";                     break;
        case "wma":     $this->_type = "audio/x-ms-wma";                break;
        case "wmv":     $this->_type = "video/x-ms-wmv";                break;
        case "xls":     $this->_type = "application/xls";               break;
        case "xml":     $this->_type = "application/xml";               break;
        case "7z":      $this->_type = "application/x-compress";        break;
        case "zip":     $this->_type = "application/x-zip-compressed";  break;
        default:        $this->_type = "application/force-download";    break;
        }

        //return $this;
   }
}
?>
