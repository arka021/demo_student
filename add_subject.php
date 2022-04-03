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
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
            
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Short Name</label>
                    <select type="text" class="form-control" name="c_short_name" id="c_short_name" placeholder="Enter Short Name">
                    
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Course Full Name</label>
                    <select type="text" class="form-control" name="c_full_name" id="c_full_name" placeholder="Enter Full Name">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Subject 1</label>
                    <input type="text" name="subject_1" class="form-control" id="Subject_1" placeholder="Subject 1" >
                    
                  </div>
                    
                  <div class="form-group">
                    <label for="exampleInputFile">Subject 2</label>
                    <input type="text" name="subject_2" class="form-control" id="Subject_2" placeholder="Subject 2" >
                    
                    </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Subject 3</label>
                    <input type="text" name="subject_3" class="form-control" id="subject_3" placeholder="Subject 3">
                    
                    </div>
                  </div>
                  
                  
                </div>
               

                <div class="card-footer">
                  <button type="button" id="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
 
          </div>
        
         
          
        </div>
        
      </div>
    </section>
  
  </div>





<?php include("footer.php"); ?>

<script>
$(document).ready(function(){
  sub_data();


  $("#submit").click(function(){

    // var ar = $('form').serializeArray();
    // console.log(ar);
   
    $.ajax({
      url:'insert_sub.php',
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
})

  function sub_data(){
    $.ajax
    ({
    type:'GET',
    url : 'hello.php',
    // data: {
    //   my_data: my_data
    // },
    success: function(response){
      // console.log(response);
      $.each(response, function(key,value)
      {
        // console.log(value['Full_Name']);
        $('#c_short_name').append
        (
          
          '<option>'+value['Short_Name']+'</option>'
                
          )
        $('#c_full_name').append
        (
          '<option>'+value['Full_Name']+'</option>'
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