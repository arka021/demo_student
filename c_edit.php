<?php
// include("class/class_course.php");
// $Cousrse_in = new DB_couurse();



$conn = mysqli_connect('localhost','root');
mysqli_select_db($conn,'demo_student');


if(isset($_POST['course_data'])){
    // echo "ok edit";
    $userid = $_POST["course_id"];
    $result_array = [];
    $query = "SELECT * FROM `course` WHERE id='$userid'";
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
// else{
//     echo $return = "No Record Found";
// }

if(isset($_POST['save_p'])){
    $save_id = $_POST['save_id'];
    $e_short_name =$_POST['e_short_name'];
    $e_full_name =$_POST['e_full_name'];
    $e_creation_date =$_POST['e_creation_date'];

    $sql = "UPDATE `course` SET `Short_Name`='$e_short_name',`Full_Name`='$e_full_name',`Cretion_Date`='$e_creation_date' WHERE `id`= '$save_id'";

    $sql_run = mysqli_query($conn,$sql)or die("not edit data ");
}


if(isset($_POST['delete_p'])){

    $delete_id = $_POST['delete_id'];

    $sql = "DELETE FROM `course` WHERE `id`= '$delete_id'";

    $delete_run = mysqli_query($conn,$sql) or die("not deleteind");

    

}



if(isset($_POST['c_data']))
{

    
    $query = "SELECT * FROM `course`";
    $q = mysqli_query($conn,$query)or die("not connect");
    $result_array = [];
    if(mysqli_num_rows($q) > 0)
    {
        foreach($q as $row)
        {
            array_push($result_array,$row);

            
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    }
    else{
        echo $return = "<h1>Not connect </h1>";
    }
}

?>