<?php
require_once 'sys/comp.php';
/**
 * Description of Blog
 * @author Eteng
 */
class Blog extends Comp{
    public function init(){
    }
    public function index(){
        print("<h1>Welcome to blogging 101</h1>");
        print "<a href='administrator'>admin</a>";
    }
}
?>
