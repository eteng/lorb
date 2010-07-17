<?php
require_once 'AbstractSession.php';
/**this class is used for managing system session
 * @author Eteng Omini <e-t-e-n-g@hotmail.com> 
 */
class Session extends AbstractSession{

    protected function startSession(){
       parent::startSession();
    }
    public function validate_user(){

    }
}
?>
