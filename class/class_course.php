<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'demo_student');
class DB_couurse
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}
//Data Insertion Function
	public function insert($short_name,$full_name,$creation_date)
	{
	$ret=mysqli_query($this->dbh,"INSERT INTO `course`(`Short_Name`, `Full_Name`, `Cretion_Date`) VALUES ('$short_name','$full_name','$creation_date')");
	return $ret;
	}
//Data read Function
public function fetchdata()
	{
	$result=mysqli_query($this->dbh,"select * from course");
	return $result;
	}
//Data one record read Function
public function fetchonerecord($userid)
	{
	$oneresult=mysqli_query($this->dbh,"select * from course where id=$userid");
	return $oneresult;
	}
//Data updation Function
public function update($short_name,$full_name,$creation_date)
	{
	$updaterecord=mysqli_query($this->dbh,"UPDATE `course` SET `Short_Name`='$short_name',`Full_Name`='$full_name',`Cretion_Date`='$creation_date'");
	return $updaterecord;
	}
//Data Deletion function Function
public function delete($rid)
	{
	$deleterecord=mysqli_query($this->dbh,"delete from course where id=$rid");
	return $deleterecord;
	}
}
?>