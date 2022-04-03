<?php session_start() ?>
<?php
if($_SESSION["first_name"]) {
?>
<?php include("header.php"); ?>
<?php include("top.php");?>
<?php include("sidebar.php");?>

<div class="content-wrapper">
  <!-- data model  -->
  
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course Short Name:</label>
            <input type="text" class="form-control" id="e_short_name" name="e_short_name" placeholder="Enter Short Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Full Name:</label>
            <input type="text" class="form-control" id="e_full_name" name="e_full_name" placeholder="Enter Full Name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Creation Date:</label>
            <input type="text" class="form-control" id="e_creation_date" name="e_creation_date" placeholder="Enter Creation Date" >
            <input type="text" class="form-control" id="e_course_id" name="e_course_id" placeholder="e_course_id" hidden>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"   id="save_data">Save</button>
      </div>
    </div>
  </div>
</div>
    
   
 
  <!-- // data model //-->
   
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

 
   
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <div class="save_d"></div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table_id" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S No</th>
                    <th>Short Name</th>
                    <th>Full Name</th>
                    <th>Create Data</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="studentData">
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
  
  </div>
  

<?php include("footer.php"); ?>


<!-- model data /scrip> -->

<script>
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>

<!-- model data /scrip> -->





<script>
  $(document).ready(function()
  {
    getdata();


    // edit data 
    


    $(document).on('click',".edit_data",function(){
      // console.log("click edit");
      var course_id = $(this).closest('tr').find('.course_id').text();
      // console.log(course_id);
      $.ajax({
        type:'POST',
        url:'c_edit.php',
        data: {
          course_data:true,
          course_id: course_id
        },
        success: function(data){
          // console.log(data);
          $.each(data,function(key, course_edit){
            $('#e_course_id').val(course_edit['id']);
            $('#e_short_name').val(course_edit['Short_Name']);
            $('#e_full_name').val(course_edit['Full_Name']);
            $('#e_creation_date').val(course_edit['Cretion_Date']);
            console.log(course_edit);
          })
          // ('#exampleModal').model('show');
          
        }
      })
    })
    $(document).on('click',"#save_data", function(){
      // console.log("save btn click");
      var save_id = $("#e_course_id").val();
      var e_short_name = $("#e_short_name").val();
      var e_full_name = $("#e_full_name").val();
      var e_creation_date = $("#e_creation_date").val();

      console.log(save_id);
      var ar = $('form').serializeArray();
      // console.log(ar);
      $.ajax({
        type:'POST',
        url:'c_edit.php',
        data:{
          save_p:true,
          save_id:save_id,
          e_short_name:e_short_name,
          e_full_name:e_full_name,
          e_creation_date:e_creation_date

        },
        success: function(datasave){
            // console.log(datasave);
           alert("Successfully! edit data.");
           $('input').val('');
           
        }
      })
    })





    // delete items 
    $(document).on('click',"#delete_data",function(){
      
      var delete_id = $(this).closest('tr').find('.course_id').text();
      // console.log(delete_id );
      alert(delete_id);
      $.ajax({
        type:'POST',
        url:'c_edit.php',
        data:{
          delete_p:true,
          delete_id: delete_id,
        },
        success: function(deletedata){
          console.log("successfully delete");
          location.reload();
        }
      })
    })




    // delete items close----------
  })






  // edit data -----------

  function getdata(){
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
        $('.studentData').append
        (
          '<tr>'+
                '<td class="course_id">'+value['id']+'</td>'+
                '<td>'+value['Short_Name']+'</td>'+
                '<td>'+value['Full_Name']+'</td>'+
                '<td>'+value['Cretion_Date']+'</td>'+
                
                '<td>'+
                    '<button href="" class="badge btn-info edit_data" id="#exampleModal" data-toggle="modal" data-target="#exampleModal">EDIT</button>'+
                    '<button href="" class="badge btn-danger" id="delete_data">DELETE</button>'
                    
                +'</td>'
                  +'</tr>'
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