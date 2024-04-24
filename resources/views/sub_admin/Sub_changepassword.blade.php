@include('sub_admin.Sub_sidenavbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .custom-container {
      background-color:  #ffcccc;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input{
        width:100%;
    }
    .btn-magenta {
      color: black;
      background-color: #e600e6;
      border-color: #ff69b4;
    }	
    form i {
			margin-left: -30px;
			cursor: pointer;
		}
  </style>
</head>
<body>

<div class="content-wrapper all">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2><b>Change Password</b></h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="custom-container">
            <form action="/change-password" method="post">
              <div class="form-group">
                <label for="current-password">Current Password:</label>
                <input type="password" id="current-password" name="current-password" required><i class="bi bi-eye-slash toggle-password" data-target="#current-password"></i>
              </div>
              <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" required><i class="bi bi-eye-slash toggle-password" data-target="#new-password"></i>
              </div>
              <div class="form-group">
                <label for="confirm-password">Confirm New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required><i class="bi bi-eye-slash toggle-password" data-target="#confirm-password"></i>
              </div>
              <button type="button" class="btn btn-magenta"><b>update</b></button>
              <button type="button" class="btn btn-outline-info"><b>cancel</b></button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- JavaScript for password toggle -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const togglePasswordIcons = document.querySelectorAll('.toggle-password');
    togglePasswordIcons.forEach(icon => {
      icon.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const targetInput = document.querySelector(targetId);
        if (targetInput.type === 'password') {
          targetInput.type = 'text';
          this.classList.remove('bi-eye-slash');
          this.classList.add('bi-eye');
        } else {
          targetInput.type = 'password';
          this.classList.remove('bi-eye');
          this.classList.add('bi-eye-slash');
        }
      });
    });
  });
</script>

</body>
</html>
