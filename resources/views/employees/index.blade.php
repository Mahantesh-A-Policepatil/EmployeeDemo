<!DOCTYPE html>
<html>
<head>
  <title>Laravel Bootstrap Datepicker Demo</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

</head>
  
<body>
<div style="margin-left:200px;"><h2>Employee List</h2></div>
<hr/>
<div class="container">


  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New Employee</button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">   
      
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Employee Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>         
        </div>
        <div class="modal-body">
           <form method="post" action="{{ url('employees/create') }}" enctype="multipart/form-data" id="basic-form">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="form-group">    
                  <label for="first_name">First Name:</label>
                  <input type="text" class="form-control" name="first_name"/>
              </div>
              <div class="form-group">    
                  <label for="last_name">Last Name:</label>
                  <input type="text" class="form-control" name="last_name"/>
              </div>

              <div class="form-group">    
                  <label for="date_of_birth">Date of Birth:</label>
                  <input class="date form-control" type="text" name="date_of_birth">
              </div>
              <div class="form-group">    
                  <label for="mobile">Mobile:</label>
                  <input class="form-control" type="text" name="mobile">
              </div>
              <div class="form-group">
                <label for="technology_id">Technology:</label>
                <select class="form-control select2" name='technology_id' id='technology_id'>
                   <option value="" >----- Select ----</option>
                   @foreach($technologiesData as $row)
                      <option value="{{$row->id}}" >{{$row->name}}</option>
                    @endforeach 
                </select>
              </div>

              <div class="form-group">    
                  <label for="summary">Summery:</label>
                  <textarea class="form-control" rows="3" cols="50" name="summary">
                  </textarea>
              </div>             
          
              </div>
               <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add Product</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
        </div>     
    </div>
  </div>
<div style="border: 1px solid;">
 <table class="table table-striped" style="margin-top:40px;">
  <thead>
      <tr>
        <td>ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Date of Birth</td>
        <td>Mobile</td>
        <td>Technology</td>
      </tr>
  </thead>
  <tbody>
      @foreach($employees as $employee)
      <tr>
          <td>{{ $loop->index+1 }}</td>
          <td>{{ $employee['first_name'] }}</td>
          <td>{{ $employee['last_name'] }}</td>
          <td>{{ $employee['date_of_birth'] }}</td>
          <td>{{ $employee['mobile'] }}</td>
          <td>{{ $employee['technology_name'] }}</td>           
      </tr>
      @endforeach
  </tbody>
</table>
</div>
<style>
  .error {
    color: red;
  }
</style>
<script type="text/javascript">
  $(document).ready(function () {
    $('.date').datepicker({
      format: "dd/mm/yyyy",
      autoclose: true
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function() {
  $("#basic-form").validate({
    rules: {
      first_name : {
        required: true,
        minlength: 3
      },
      last_name : {
        required: true,
        minlength: 3
      },
      date_of_birth: {
        required: true,
        date: true
      },
      mobile: {
        required: true,
        number: true
      },
      technology_id: {
        required: true,
        number: true
      }      
    }
  });
});
</script>
  
</div>
<hr/>
</body>
</html>
