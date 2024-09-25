<?php
$con=pg_connect("host=127.0.0.1 dbname=AG19 user=postgres password=root");
if($con)
{
    echo"connected";

}
else{
    echo "not connected";
}
?>