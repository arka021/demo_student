<?php
    $conn = mysqli_connect('localhost','root');
    mysqli_select_db($conn,'demo_student');

    if(isset($_POST['course_d']))
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


        if(isset($_POST['subject_d'])){

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

          if(isset($_POST['first_name']))
            {
                $course = $_POST['course'];
                $subject = $_POST['subject'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $mobile_number =$_POST['mobile_number'];
                $country = $_POST['country'];
                $password = $_POST['password'];
                $graduation = $_POST['graduation'];
                $email_id = $_POST['email_id'];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $address = $_POST['rpassword'];
                $address = $_POST['address'];


$sql = "INSERT INTO `student`(`course`, `subject`, `first_name`, `last_name`, `graduation`, `mobile_number`, `email_id`, `country`, `state`, `password`, `city`, `address`) VALUES ('$course','$subject','$first_name','$last_name','$graduation','$mobile_number','$email_id','$country','$state','$address','$city','$password')";


                
               $y = mysqli_query($conn,$sql);
            //     header('location:hello.php');
            if($y){
                echo  "success ";
            }else{
                echo "no successs";
            }
        }





        
        if(isset($_POST['getstudent']))
        {
            $query = "SELECT * FROM `student`";
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