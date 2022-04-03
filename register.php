
<?php session_start() ?>
<?php
if($_SESSION["first_name"]) {
?>
<?php include("header.php"); ?>
<?php include("top.php");?>
<?php include("sidebar.php");?>

<div class="content-wrapper">
   
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subject Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <div class="col-md-12">
            
          <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Bootstrap4 Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <form>
            <div class="row">
              <form>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Select Course</label>
                  <select class="form-control select2bs4" id="my_full_name" name = "course" style="width: 100%;">
                    
                  </select>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputFile">First name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" >
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="first_name" placeholder="First Name" >
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Graduation" >
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Country</label>
                    <input type="text" name="country" class="form-control" id="country" placeholder="country" >
                </div>
                
                <div class="form-group">
                    <label for="exampleInputFile">Password</label>
                    <input type="text" name="password" class="form-control" id="password" placeholder="Retype Password" >
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">City</label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="City" ></textarea>
                </div>
                
                <!-- /.form-group -->
                
                
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              <div class="form-group">
                  <label>Select Subject</label>
                  <select class="form-control select2bs4" id="my_subject" name="subject" style="width: 100%;">
                    
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="exampleInputFile">Last name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" >
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="exampleInputFile">Graduation</label>
                    <input type="text" name="graduation" class="form-control" id="first_name" placeholder="Graduation" >
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Email Id </label>
                    <input type="text" name="email_id" class="form-control" id="email_id" placeholder="Email Id" >
                </div>
                
                <div class="form-group">
                    <label for="exampleInputFile">State</label>
                    <input type="text" name="state" class="form-control" id="Retype" placeholder="Retype Password" >
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Retype Password</label>
                    <input type="text" name="rpassword" class="form-control" id="address" placeholder="Address" ></textarea>
                </div>
                
                
                <div class="form-group">
                    <label for="exampleInputFile">Address</label>
                    <textarea type="text" name="address" class="form-control" id="address" placeholder="Address" ></textarea>
                </div>
              </div>
              <div class="card-footer">
                  <button type="button" id="save" name="save" class="btn btn-primary">Save</button>
              </div>
              <!-- /.col -->
              
            </div>
            <!-- /.row -->
            </form>
          </div>
          <!-- /.card-body -->
          
        </div>
 
          </div>
        
         
          
        </div>
        
      </div>
    </section>
  
  </div>
  <?php include("footer.php"); ?>
  <script type="text/javascript">
  $(document).ready(function(){
    course_data();
    subject_data();
    $("#save").click(function()
    {
          // var ar = $('form').serializeArray();
        // console.log(ar);
        $.ajax
        (
          {
            url:'myregister.php',
            type: 'POST',
            data:$('form').serializeArray(),
            
            success: function(studentData)
            {
              console.log(studentData);
              $('input').val('');
            }
          }
        )
    }
    );





  });

function course_data(){
      $.ajax({
        type:"POST",
        url:"myregister.php",
        data:{
          course_d: true,
        },
        success:function(mycourse){
          // console.log(mycourse);
          $.each(mycourse, function(key,value)
          {
            // console.log(value['Full_Name']);
            $('#my_full_name').append(
              '<option>'+value['Full_Name']+'</option>'
            )
          })
          
          
        }
      })
  }



  function subject_data(){
      $.ajax({
        type:"POST",
        url:"myregister.php",
        data:{
          subject_d: true,
        },
        success:function(mysubject){
          // console.log(mysubject);
          $.each(mysubject, function(key,value)
          {
            // console.log(value['Subject_1']);
            $('#my_subject').append(
              '<option>'+value['Subject_1']+'</option>'
            )
          })
          
          
        }
      })
    }
    
        
</script>
<?php
}else{ 
  echo "<h1>Please login first .</h1>";
}
?>
