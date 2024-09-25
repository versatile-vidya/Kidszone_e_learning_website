<?php 


if(isset($_POST['start']))
{
	echo"123";
    $con=pg_connect("host=192.168.16.252 port=5432 dbname=AG19 user=AG19");
	echo"heloo";
    $sql="select * from question order by random() limit 1";
    $res=pg_query($con,$sql);$x=0;
    while ($row=pg_fetch_assoc($res))
   {
	$id=$row['qid'];//echo$id;
	echo $row['question'];
	$op1=$row['option_a'];
	$op2=$row['option_b'];
	$op3=$row['option_c'];
	$op4=$row['option_d'];
	$a="<br><input type='radio' name='r1.$x' value='$op1'>$op1</INPUT><br>";
	$b="<input type='radio' name='r1.$x' value='$op2'>$op2</INPUT><br>";
	$c="<input type='radio' name='r1.$x' value='$op3'>$op3</INPUT><br>";
	$d="<input type='radio' name='r1.$x' value='$op4'>$op4</INPUT><br>";
	echo $a,$b,$c,$d;
	$userans=$_post['r1'.$x];
	echo $userans; 
	//$sql1="update question  set userans = '$userans' where qid=$qid";
	echo"<input type='submit' name='check' value='check'>";
//echo $answer;

   }
}
?>
