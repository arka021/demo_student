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
              <li class="breadcrumb-item active">Course Form</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <div class="col-md-12">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              
              <span id="message"></span>
              <form id="form_data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Short Name</label>
                    <input type="text" class="form-control " id="short_name" name="short_name" placeholder="Enter Short Name">
                    <span id="short_name_error" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Course Full Name</label>
                    <input type="text" class="form-control " id="full_name" name="full_name" placeholder="Enter Full Name">
                    <span id="full_name_error" class="text-danger"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Cretion Date</label>
                    <input type="text" class="form-control " id="creation_date" name="creation_date" placeholder="Enter Full Name" >
                    <span id="creation_date_error" class="text-danger"></span>
                    </div>
                  </div>
                  
                </div>
               

                <div class="card-footer">
                  <button type="button"  name="submit" id ="submit" class="btn btn-primary" >SAVE</button>
                  
                </div>
              </form>
              
            </div>
          

          </div>
        
         
          
        </div>
        
      </div>
    </section>
  
  </div>




  


<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function(){
          
          

            $("#submit").click(function(){

             
            
                  $.ajax({
                    url:'hello.php',
                    type: 'POST',
                    data: $('form').serializeArray(),
                    // dataType: 'json',
                    success: function(data){
                      console.log(data);
                      $('input').val('');
                    }
                  })
                  // console.log($("form").serializeArray());
            
              });
          
        });
</script>
<?php
}else{ 
  echo "<h1>Please login first .</h1>";
}
?>
