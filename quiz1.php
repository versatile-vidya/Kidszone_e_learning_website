<html>
<head><title>quiz</title></head>
<?php
	
if (isset($_POST['submit'])) {
	$r1=$_POST['r1'];
	$r2=$_POST['r2'];
	$r3=$_POST['r3'];
	$r4=$_POST['r4'];
	$r5=$_POST['r5'];
	$counter=0;
	
	$conn = pg_connect("host=192.168.16.252 port=5432 dbname=AG19 user=AG19");
	if($r1=='b')
	{		
			 
			$sql="SELECT answer FROM quiz WHERE question='q1'";
			$result=pg_query($conn,$sql);
			
			if ($row=pg_fetch_assoc($result)) 
			{
				
				$counter +=1;
			}
			
	}
	if($r2=='c'){
			$sql="SELECT answer FROM quiz WHERE question='q2'";
			$result=pg_query($conn,$sql);
			
			if ($row=pg_fetch_assoc($result)) 
			{
				/*echo $row['answer'];**/
				$counter +=1;
			}
	}
	if($r3=='a'){
			$sql="SELECT answer FROM quiz WHERE question='q3'";
			$result=pg_query($conn,$sql);
			
			if ($row=pg_fetch_assoc($result)) 
			{
				/*echo $row['answer'];*/
				$counter +=1;
			}
	}
	if($r4=='d'){
			$sql="SELECT answer FROM quiz WHERE question='q4'";
			$result=pg_query($conn,$sql);
			   
			if ($row=pg_fetch_assoc($result)) 
			{
				/*echo $row['answer'];*/
				$counter +=1;
			}
	}
	if($r5=='b'){
			$sql="SELECT answer FROM quiz WHERE question='q5'";
			$result=pg_query($conn,$sql);
			
			if ($row=pg_fetch_assoc($result)) 
			{
				/*echo $row['answer'];*/
				$counter +=1;
		}
	}
	echo"<body background-image: linear-gradient(#00f2fe)";/*#4facfe)";,#00f2fe)";*/
	echo"<section style='background-color: skyblue;'>";
	echo"<div align=center style='flex-basis :4%;border-radius: 10px;
margin-bottom: 2%;padding:10px 12px;box-sizing:border-box;border:0.5rem solid black ;
grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));box-shadow: 0.5rem 1rem rgba(1, 1, 1, 0.1);background-image: linear-gradient(#4facfe,#00f2fe);
background-color: skyblue;
'><h1>Congrats</h1><br>";
	echo "<h2>YOU SCORED: <BR> ".$counter."<br>";
	echo" <h1> THANK YOU</h1>";
	echo "<a href='home.html' style='display: inline-block;
background: black;
margin-top: 1rem;
color:white;
font-size: 1.7rem;
padding:1rem 3rem;
cursor: pointer;'>back</a><br><br>";
	echo "<a href='quiz_ans.html' style='display: inline-block;
background: black;
margin-top: 1rem;
color:white;
font-size: 1.7rem;
padding:1rem 3rem;
cursor: pointer;'>Veiw answer</a>";
/*	echo" <button type=button onclick=<a href='home.html'></a>>back</button>"
*/	echo "</div></section></body>";		
/*echo $counter;*/
pg_close();
}
?>
