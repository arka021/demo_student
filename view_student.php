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
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S No</th>
                    <th>Registration No </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody class="student_t">
                  
                  
                 <tfoot>
                 <tr>
                    <th>S No</th>
                    <th>Registration No </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
                    <th>Action</th>
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
$(document).ready(function() {
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script>
$(document).ready(function(){
  getStudent();
});
function getStudent(){
  $.ajax({
    type:'POST',
    url:'myregister.php',
    data:{
      getstudent:true
    },
    success:function(studentres){
      // console.log(studentres);
      $.each(studentres, function(key,value)
      {
      $('.student_t').append
        (
          '<tr>'+
                '<td class="sub_id">'+value['id']+'</td>'+
                '<td>'+value['course']+'</td>'+
                '<td>'+value['subject']+'</td>'+
                '<td>'+value['first_name']+'</td>'+
                '<td>'+value['last_name']+'</td>'+
                '<td>'+value['graduation']+'</td>'+
                '<td>'+value['mobile_number']+'</td>'+
                '<td>'+value['email_id']+'</td>'+
                '<td>'+value['country']+'</td>'+
                '<td>'+value['state']+'</td>'+
                '<td>'+value['password']+'</td>'+
                '<td>'+value['city']+'</td>'+
                '<td>'+value['address']+'</td>'+
                
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