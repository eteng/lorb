<?php

Class indexController Extends baseController {

public function index() {
	/*** set a template variable ***/
        $this->registry->template->welcome = 'System Development...';
	/*** load the index template ***/
        $this->registry->template->show('index');
}

}

?>
