<?php
	if (isset($_POST['login'])) {
		if (!$_POST['user']) {
			echo "<h4 style='color:#FF4300;' class='alert'>Please enter your name</h4>";
		}
		elseif (!$_POST['pwd']) {
			echo "<h4 style='color:#FF4300;' class='alert'>Please enter password</h4>";
		}
		else
		{
			session_start();
			$_SESSION['user']=$_POST['user'];
			$name=$_POST['user'];
			$password=$_POST['pwd'];
			$conn = pg_connect("host=192.168.16.252 port=5432 dbname=AG19 user=AG19");
            		$result=pg_query($conn,"SELECT * FROM register WHERE username='$name' AND Password='$password'");
			if ($row=pg_fetch_array($result)) {
				header('Location:home.html');
			}
			else
			{
				echo "<h4 style='color:#FF4300;background-image: linear-gradient(#00f2fe,#0dcdd7); class='alert' >Wrong name or password</h4>";
				header('Location:login.html');
			}
		}
	}
?>




					        
