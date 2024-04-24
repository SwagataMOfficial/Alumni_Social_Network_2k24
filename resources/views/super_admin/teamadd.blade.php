@include('super_admin.sidenavbar')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>team add</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
  
  .form-container {
      border: 1px solid #ced4da;
      border-radius: 5px;
      padding: 30px;
      margin: 20px auto;
      max-width: 500px;
      background-color:#87CEEB;
     
    }

  </style>
</head>


<body>
<div class="content-wrapper all">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>Team</b></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  <div class="sky-background">
    <div class="container">
      <div class="row md-8">
        <div class="col-md-10 form-container">
          <form>
          <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputname" placeholder="Name">
              </div>
</div>
            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Password:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
              </div>
            </div>
           
            
            <div class="row">
              <div class="col-sm-10 offset-sm-5">
                <button type="submit" class="btn btn-primary">Add</button>
             
                <button type="cancel" class="btn btn-secondary">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
