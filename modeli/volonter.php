<?php
class Volonter{
    public $idVolonter;
    public $username;
    public $email;
    public $password;

    public function __construct($idVolonter=null,$username=null,$email=null,$password=null){
        $this->idVolonter=$idVolonter;
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
    }

    public static function prijavaVolontera($vol, mysqli $conn){
$query="SELECT * FROM volonter WHERE username='$vol->username' and email='$vol->email' and password='$vol->password'";
return $conn->query($query);
    }
}


?>