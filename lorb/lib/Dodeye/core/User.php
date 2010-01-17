<?php
/**
 * Description of User
 *
 * @author sampris
 */
class User {

    public function addsalt($password){
        //not the salut raise is is of lenght 8
        $salt = substr(md5(uniqid(rand(),true)),0,8);
        $emcrypted = sha1($salt.$password);
        return array('password'=>$emcrypted,'salt' =>$salt);
    }
    private function generate_salt($num =3){
        $salt ='';
        for($i = 0; $i < $num; $i ++){
            $salt .= chr(rand(35,126));
        }
        return $salt;
    }
    public function emcryptPaword($password){
        $salt = $this->generate_salt();
        $emcrypted = md5(md5($password).$salt);
        return array('password' =>$emcrypted,'salt' =>$salt);
    }
    public function requireLogin(){

    }
}
?>
