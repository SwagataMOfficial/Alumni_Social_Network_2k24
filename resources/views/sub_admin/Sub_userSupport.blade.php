@include('sub_admin.Sub_sidenavbar')

<style>
     /* Custom CSS to style the magenta button */
     .btn-magenta {
      color: black; /* Text color */
      background-color: #e600e6; /* Lighter magenta color */
      border-color: #ff69b4; /* Border color */
    }
    .btn-magenta:hover {
      background-color: #ff69b4; /* Darker magenta on hover */
      border-color: #e600e6; /* Darker border on hover */
    }
  </style>

<div class="content-wrapper all">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>User Support </b></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="team-members">
   
  </div>
     
           
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr style="color:red">
                            <th>ID No.</th>
                            <th>Name</th>
                            <th>Mail Id</th>
                             <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>04</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                        
                       <td><a href="{{route('subadmin.usersupport.view')}}">  <button type="button" class="btn btn-success" >view</button></a></td>
                        </tr>
                        <tr>
                            <td>07</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                        
                       <td> <button type="button" class="btn btn-success" > view</button></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                        
                       <td> <button type="button" class="btn btn-success" > view</button></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                        
                       <td> <button type="button" class="btn btn-success" > view</button></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                        
                       <td> <button type="button" class="btn btn-success"> view</button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            </div>
              </div>
            </div>