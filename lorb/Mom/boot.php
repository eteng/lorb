<?
/*** include the controller class ***/
 include __SITE_PATH .'/system/'.'controller_base.class.php';

 /*** include the registry class ***/
 include __SITE_PATH .'/system/'.'registry.class.php';

 /*** include the router class ***/
 include __SITE_PATH .'/system/'.'router.class.php';

 /*** include the template class ***/
 include __SITE_PATH .'/system/'.'template.class.php';

 /*** auto load model classes ***/
 function __autoload($class_name) {
    $filename = strtolower($class_name).'.Model.php';
    $file = __SITE_PATH . '/model/' . $filename;

    if (file_exists($file) == false)
    {
        return false;
    }
  include ($file);
}

 /*** a new registry object ***/
 //$registry = new Registry();
 
 /**creating the database reg obj***/
 //$registry->db = db::getInstance();

 //echo 'here';
?>