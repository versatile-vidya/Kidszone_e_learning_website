<?php
$conn = pg_connect("host=192.168.16.252 port=5432 dbname=AG19 user=AG19");
if (!$conn)
  {
    echo 'connection failed';
  die('Could not connect: ' . pg_error());
  }/*
$name="pratham";
$email="pratham@123";
$user_name="pratham";
$password = "123";
$password_confirm ="123";
*/
$name=$_GET['name'];
$email=$_GET['email'];
$user_name=$_GET['user'];
$password = $_GET['pwd'];
$password_confirm = $_GET['con_pwd'];
echo $name;


// echo $user_name;
if( $password != $password_confirm)
{
     echo "<b style='color:black;'>Error Occurred....Password not match!</b>";
} 
else
{
      $query=pg_query($conn,"insert into register (name,email,username,password) values ('$name','$email','$user_name','$password')" );
      if ($query) {	
	     // echo"hello";
          header('Location:login.html');
      } 
      else if(!$query)
      {
	echo pg_last_error();
          echo "<b style='color:black;'>Error Occurred!</b>";
	header('Location:login.html');
       }
}
?>
