@include('super_admin.sidenavbar')
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
            <h1 class="m-0"><b>Content Moderation </b></h1>
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
                            <th>Email</th>
                             <th>Ph No.</th>
                             <th>Through</th>
                             <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>01</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>3923451674</td>
                          <td>sub1</td>
                       <td><button type="button" class="btn btn-success">View Post</button>
                        <button type="button" class="btn btn-danger">Delete Post</button></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>3923451674</td>
                          <td>sub5</td>
                       <td><button type="button" class="btn btn-success">View Post</button>
                        <button type="button" class="btn btn-danger">Delete Post</button></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Samarpita Mukherjee</td>
                            <td>samarpita@gmail.com</td>
                          <td>3923451674</td>
                          <td>sub1</td>
                       <td><button type="button" class="btn btn-success">View Post</button>
                        <button type="button" class="btn btn-danger">Delete Post</button></td>
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