<?php

include('class/class_course.php');

$insertdata=new DB_couurse();
if(isset($_POST['insert']))
{

$short_name=$_POST['short_name'];
$full_name=$_POST['full_name'];
$creation_date=$_POST['creation_date'];


$sql=$insertdata->insert($short_name,$full_name,$creation_date);
if($sql)
{

echo "<script>alert('Record inserted successfully');</script>";

}
else
{

echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
}
?> 