<?php

$id =$_POST["id"];
$cn = mysqli_connect("localhost","root","","hr");
$rslt =mysqli_query($cn , "select employee_id , last_name from employees where department_id=$id");
$arr=[];
while($row= mysqli_fetch_assoc($rslt))
{
	$arr[$row["employee_id"]] =$row["last_name"];
}
die(json_encode($arr));
