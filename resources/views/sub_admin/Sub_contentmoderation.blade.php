@include('sub_admin.Sub_sidenavbar')
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

  .text-red {
    color: red;
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
                             <th>Student_id</th>
                             <th>Reported_content</th>
                             <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>01</td>
                            <td>Sayantani Bhar</td>
                            <td>samarpita@gmail.com</td>
                         
                          <td>132</td>
                       <td><button type="button" class="btn btn-success">View</button></td>
                       <td>  <button type="button" class="btn btn-warning text-red"><b>Dismiss<b></button></td>
                        </tr>
                        <tr>
                            <td>02</td>
                            <td>Rita Devi</td>
                            <td>samarpita@gmail.com</td>
                            <td>22</td>
                       <td><button type="button" class="btn btn-success">View</button></td>
                       <td> <button type="button" class="btn btn-warning text-red"><b>Dismiss<b></button></td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Sumana Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                          <td>129</td>
                       <td><button type="button" class="btn btn-success">View</button></td>
                       <td> <button type="button" class="btn btn-warning text-red"><b>Dismiss<b></button></td>
                        </tr>

                        <tr>
                            <td>04</td>
                            <td>Aradhyo Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                          <td>54</td>
                       <td><button type="button" class="btn btn-success">View</button></td>
                       <td> <button type="button" class="btn btn-warning text-red"><b>Dismiss<b></button></td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>Koyel Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                          <td>84</td>
                       <td><button type="button" class="btn btn-success">View</button></td>
                       <td>    <button type="button" class="btn btn-warning text-red"><b>Dismiss<b></button></td>
                        </tr>
                        <tr>
                            <td>06</td>
                            <td>Sujan Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                          <td>144</td>
                       <td><button type="button" class="btn btn-success">View</button></td>
                       <td>   <button type="button" class="btn btn-warning text-red"><b>Dismiss<b></button></td>
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