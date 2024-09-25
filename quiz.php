<!DOCTYPE html>
<html>
<head>
<title>quiz</title></head>
<body style = "background-image: linear-gradient(#4facfe,#00f2fe)">
<h1>quiz</h1>
<section><h1>
<!--<form action="" method="post">
<h1> start the quiz</h1>
<input type ="submit"  name ="start"value="start">
<!--</form>-->
<?php 
$counter=0;
//if(isset($_POST['start']))
//{
   
	 $con=pg_connect("host=192.168.16.252 port=5432 dbname=AG19 user=AG19");
	//$q="update question set counter=0";
	//pg_query($con,$q);
	//echo"heloo";
		//echo"<section style='background-image: linear-gradient(#4facfe,#00f2fe)'>";
    $sql="select * from question order by random() limit 5";
    $res=pg_query($con,$sql);	
	if(pg_num_rows($res)>0)
	{
    		$row=pg_fetch_assoc($res);
    	//<h1>question <br><?php /*echo $row['qid'];   */   
	$id=$row['qid'];

	echo"<div align=center style='border-radius: 10px;
margin-bottom: 2%;padding:10px 12px;box-sizing:border-box;border:0.5rem solid black ;
grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));box-shadow: 0.5rem 1rem rgba(1, 1, 1, 0.1);'>";

	echo"<h1 style='font-size: 2rem;'>" .$row['question']."</h1>";
	echo"<form method='post'>";
	$op1=$row['option_a'];
	$op2=$row['option_b'];
	$op3=$row['option_c'];
	$op4=$row['option_d'];
	echo"<p style='font-size: 2rem;'>";
	$a="<br><input type='radio' name ='r1' value='$op1'>$op1</INPUT><br>";
	$b="<input type='radio' name ='r1' value='$op2'>$op2</INPUT><br>";
	$c="<input type='radio' name ='r1' value='$op3'>$op3</INPUT><br>";
	$d="<input type='radio' name ='r1' value='$op4'>$op4</INPUT><br>";
	echo $a,$b,$c,$d;
	echo "<input type='hidden' name='qid' value='$id'>";
	echo"<input type= submit name=submit value='submit'  style='display: inline-block;
background: black;
margin-top: 1rem;
color:white;
font-size: 1.7rem;
padding:1rem 3rem;
cursor: pointer;'>";
	echo"</p></form>";
}
	else
	{ echo"no questions found in db";
	}


	if(isset($_POST['submit']))
	{
		$qid=$_POST['qid'];
		$userans = $_POST['r1'];//echo $userans;
		$sql1="update question  set userans = '$userans' where qid=$qid";//update
		$r=pg_query($con,$sql1);
		/*if($r){
			echo"updated";}
		else{
			echo"error";
		}
*/
		$sql2="SELECT * FROM question where qid=$qid";//checking
		$r1=pg_query($con,$sql2);
		$row3 = pg_fetch_assoc($r1);
   		if($row3['answer']==$row3['userans'])
		{	//echo $qid;
		 	$sql2="update question set counter=counter+1 where qid=$qid";
			if(pg_query($con,$sql2))
			{
				echo"<h1>CORRECT ANSWER 👍<br></h1>";
				//echo "counter=$row3['counter']";
				$counter++;
			}
			else{
			echo"error";
			}
		}
		else
		{
			echo "<h1>INCORRECT ANSWER 👎<BR></h1>";
		}
	}


	$sql3="select SUM(counter) as score from question";
	$result=pg_query($con,$sql3);
	$row= pg_fetch_assoc($result);
	echo"<h1>score is   ".$row['score']."</h1>";
	//$q="update question set counter=0";
	pg_query($con,$q);
	pg_close();
echo pg_last_error();
//}
//echo"</section></body>";
?>

<!--</form>--></h1>
<a href="home.html" class="btn">BACK</a></section>
</body>
</html>

