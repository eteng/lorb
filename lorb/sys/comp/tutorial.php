<?php
require_once 'sys/comp.php';
/**
 * this is a tutorial component used to test the development of
 * ths system
 * @author Eteng Omini <e-t-e-n-g@hotmail.com> 
 */
class tutorial extends Comp{
    function init(){}
    function index(){
        echo "<h2>Welcome to Tutorialx</h2>";
        echo "<p>It Good to see you once again</p>";

    }
}
?>
