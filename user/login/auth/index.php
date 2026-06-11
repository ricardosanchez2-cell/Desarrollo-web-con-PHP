<?php

session_start();

if(isset($_SESSION['user_id'])){
    //usuario logeado
    header("Location: ../../../dashboard/");
    exit(); //siempre que haya un redireccionamiento
}
   
   $FromUsername = $_POST['username'];
   $FromPassword = $_POST['password'];
   
   
   $user = 'r@r.com';
   $pass = '123';

   if($user == $FromUsername && $pass == $FromPassword){
       $_SESSION['user_id'] = 1;
       $_SESSION['user_name'] = 'Alumno';
       header("Location: ../../../dashboard/");
    exit(); //siempre que haya un redireccionamiento
}

$_SESSION['error'] = ['login' => 'Usuario o contraseña incorrectos'];
header("Location: ../");
      
?>