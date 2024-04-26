@include('sub_admin.sub_sidenavbar')

<style>
  .team-members {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  @media (max-width: 768px) {
    .team-members {
      flex-direction: column;
      align-items: flex-start;
    }
  }
  .all{
    
  background-color: rgba(255, 255, 255, 0.5); /* white color with 50% opacity */
}

  
</style>
<div class="content-wrapper all">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>User Verification</b></h1>
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
     
           
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr style="color:red">
                            <th>Student_id</th>
                            <th>Name</th>
                            <th>Email</th>
                             <th>Verification_document</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>34424433</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>College id_card</td>
                          <td><a href="{{route('subadmin.verification_view')}}"><button type="button" class="btn btn-primary">View</button></a></td>
                        </tr>
                        <tr>
                            <td>34424433</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>Aadhar Card</td>
                          <td><a href="{{route('subadmin.verification_view')}}"><button type="button" class="btn btn-primary">View</button></a></td>
                        </tr>
                        <tr>
                            <td>34424433</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>Pan Card</td>
                          <td><a href="{{route('subadmin.verification_view')}}"><button type="button" class="btn btn-primary">View</button></a></td>
                        </tr>
                        <tr>
                            <td>34424433</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>College Id_card</td>
                          <td><a href="{{route('subadmin.verification_view')}}"><button type="button" class="btn btn-primary">View</button></a></td>
                        </tr>
                        <tr>
                            <td>34424433</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>passport</td>
                          <td><a href="{{route('subadmin.verification_view')}}"><button type="button" class="btn btn-primary">View</button></a></td>
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