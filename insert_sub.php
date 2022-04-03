<?php
$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,'demo_student');




 if(isset($_POST['c_short_name']))
 {
    $c_short_name =$_POST['c_short_name'];
    $c_full_name =$_POST['c_full_name'];
    $subject_1 =$_POST['subject_1'];
    $subject_2 =$_POST['subject_2'];
    $subject_3 =$_POST['subject_3']; 

 
     $sql= "INSERT INTO `subject`(`s_short_name`, `s_full_name`, `Subject_1`, `Subject_2`, `Subject_3`) VALUES ('$c_short_name','$c_full_name','$subject_1','$subject_2','$subject_3')";
     mysqli_query($conn,$sql);
 //     header('location:hello.php');
    echo "ok as ur wish";
 }

 if(isset($_POST['my_data'])){

   $query = "SELECT * FROM `subject`";
        $q = mysqli_query($conn,$query)or die("not connect");
        $subject_array = [];
        if(mysqli_num_rows($q) > 0)
        {
            foreach($q as $row)
            {
                array_push($subject_array,$row);

                
            }
            header('Content-type: application/json');
            echo json_encode($subject_array);
        }
        else{
            echo $return = "<h1>Not connect </h1>";
        }
 }



if(isset($_POST['subject_data'])){
   $userid = $_POST["subject_id"];
    $result_array = [];
    $query = "SELECT * FROM `subject` WHERE id='$userid'";
    $query_run = mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $row)
        {
            array_push($result_array,$row);
        }
        header('Content-type:application/json');
        echo json_encode($result_array);
    }
}
 if(isset($_POST['save_subject'])){

   // print_r($_POST);
   $save_id = $_POST['save_id'];
   $e_short_name =$_POST['e_short_name'];
   $e_full_name =$_POST['e_full_name'];
   $e_subject_1 =$_POST['e_subject_1'];
   $e_subject_2 =$_POST['e_subject_2'];
   $e_subject_3 =$_POST['e_subject_3'];

   $sql = "UPDATE `subject` SET `s_short_name`='$e_short_name',`s_full_name`='$e_full_name',`Subject_1`='$e_subject_1',`Subject_2`='$e_subject_2',`Subject_3`='$e_subject_3' WHERE `id`= '$save_id'";

   $sql_run = mysqli_query($conn,$sql)or die("not edit data ");
 }


if(isset($_POST['c_data'])){

   $query = "SELECT * FROM `subject`";
        $q = mysqli_query($conn,$query)or die("not connect");
        $subject_array = [];
        if(mysqli_num_rows($q) > 0)
        {
            foreach($q as $row)
            {
                array_push($subject_array,$row);

                
            }
            header('Content-type: application/json');
            echo json_encode($subject_array);
        }
        else{
            echo $return = "<h1>Not connect </h1>";
        }
 }
?>