
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
            <label for="recipient-name" class="col-form-label">Subject 1:</label>
            <input type="text" class="form-control" name="e_subject_1"  id="e_subject_1" placeholder="Subject 1">
            
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject 2:</label>
            <input type="text" class="form-control" name="e_subject_2"  id="e_subject_2" placeholder="Subject 2">
            
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Subject 3:</label>
            <input type="text" class="form-control" name="e_subject_3" id="e_subject_3" placeholder="Subject 3">
            <input type="text" class="form-control" id="e_subject_id" name="e_subject_id"  hidden>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"   id="save_subject">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- data model end -->
   
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject Form</h1>
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

 
 
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table_id" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S No</th>
                    <th>Course Short Name</th>
                    <th>Course Full Name</th>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="student_sub">
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S No</th>
                    <th>Course Short Name</th>
                    <th>Course Full Name</th>
                    <th>Subject 1</th>
                    <th>Subject 2</th>
                    <th>Subject 3</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
  
  </div>
  

<?php include("footer.php"); ?>


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

<script type="text/javascript">

$(document).ready(function(){
  getsubject();

// edit data-------
$(document).on('click',".edit_suject",function(){
      // console.log("click edit");
      var subject_id = $(this).closest('tr').find('.sub_id').text();
      // console.log(subject_id);
      $.ajax({
        type:'POST',
        url:'insert_sub.php',
        data: {
          subject_data:true,
          subject_id: subject_id
        },
        success: function(data){
          // console.log(data);
          $.each(data,function(key, subject_edit){
            $('#e_subject_id').val(subject_edit['id']);
            $('#e_short_name').val(subject_edit['s_short_name']);
            $('#e_full_name').val(subject_edit['s_full_name']);
            $('#e_subject_1').val(subject_edit['Subject_1']);
            $('#e_subject_2').val(subject_edit['Subject_2']);
            $('#e_subject_3').val(subject_edit['Subject_3']);
            console.log(subject_edit);
          })
          // ('#exampleModal').model('show');
          
        }
      })
    })

    // save data 


    $(document).on('click',"#save_subject", function(){
      // console.log("save btn click");
      var save_id = $("#e_subject_id").val();
      var e_short_name = $("#e_short_name").val();
      var e_full_name = $("#e_full_name").val();
      var e_subject_1 = $("#e_subject_1").val();
      var e_subject_2 = $("#e_subject_2").val();
      var e_subject_3 = $("#e_subject_3").val();

      // console.log(save_id);
      // var ar = $('form').serializeArray();
      // console.log(ar);
      $.ajax({
        type:'POST',
        url:'insert_sub.php',
        data:{
          save_subject:true,
          save_id:save_id,
          e_short_name:e_short_name,
          e_full_name:e_full_name,
          e_subject_1:e_subject_1,
          e_subject_2:e_subject_2,
          e_subject_3:e_subject_3

        },
        success: function(datasave){
            // console.log(datasave);
           alert("Successfully! edit data.");
           $('input').val('');
           
        }
      })
    })
    // save data end 


// edit data end------

})




  function getsubject(){
    $.ajax
    ({
    type:'POST',
    url : 'insert_sub.php',
    data: {
      my_data: true
    },
    
    success:function(mysub){
      // console.log(mysub);
      $.each(mysub, function(key,value){
        $('.student_sub').append
        (
          '<tr>'+
                '<td class="sub_id">'+value['id']+'</td>'+
                '<td>'+value['s_short_name']+'</td>'+
                '<td>'+value['s_full_name']+'</td>'+
                '<td>'+value['Subject_1']+'</td>'+
                '<td>'+value['Subject_2']+'</td>'+
                '<td>'+value['Subject_3']+'</td>'+
                
                '<td>'+
                    '<button href="" class="badge btn-info edit_suject" id="#exampleModal" data-toggle="modal" data-target="#exampleModal">EDIT</button>'+
                    '<button href="" class="badge btn-danger" id="delete_sub">DELETE</button>'
                    
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