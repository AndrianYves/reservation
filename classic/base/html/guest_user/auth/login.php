<?php
require 'dbcon.php';
session_start();

if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT email,password FROM guest_user WHERE email =:email AND password =:password";
    $query= $db -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_ASSOC);

if($query->rowCount() > 0)
{   
    if(password_verify($password,$query['password']))
    {
        session_regenerate_id();
        $_SESSION['auth'] = true;
        $_SESSION['email'] = $row['email'];
        $_SESSION['login']=$_POST['email'];
        session_write_close();
        header('Location:guest.php');
    }else 
    {
        header('Location:index.php');
    } 
}
}
?>