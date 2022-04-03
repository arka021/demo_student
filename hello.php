<?php
    // include("class/class_course.php");
    // $Cousrse_in = new DB_couurse();
    
    $conn = mysqli_connect('localhost','root');
    mysqli_select_db($conn,'demo_student');
    
    //  extract($_POST);
    
    

    if(isset($_POST['short_name']))
    {
    $short_name =$_POST['short_name'];
    $full_name =$_POST['full_name'];
    $creation_date =$_POST['creation_date'];
    

    
        $sql= "INSERT INTO `course`(`Short_Name`, `Full_Name`, `Cretion_Date`) VALUES ('$short_name','$full_name','$creation_date')";
        mysqli_query($conn,$sql);
    //     header('location:hello.php');
    }

// echo "ok";
// print_r($_POST);

// if(isset($_GET['my_data']))
// {

    
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
    // }

?>


