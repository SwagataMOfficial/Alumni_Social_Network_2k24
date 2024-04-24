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

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b>view Profile</b></h1>
</div>
          
        </div>
      </div>
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
                           <th>Student_id</th>
                            <th>Name</th>
                            <th>Email</th>
                      
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                             <td>132</td>
                            <td>Sayantani Bhar</td>
                            <td>samarpita@gmail.com</td>
                        
                       <td><button type="button" class="btn btn-success">
                        <a href="Sub_profile_view" style="color:white">View</button></td>
                      
                        </tr>
                        <tr>
                            <td>22</td>
                           
                            <td>Rita Devi</td>
                            <td>samarpita@gmail.com</td>
                            
                           <td><button type="button" class="btn btn-success">
                               <a href="Sub_profile_view" style="color:white">View</button></td>
                   
                        </tr>
                        <tr> <td>129</td>
                           
                            <td>Sumana Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                            <td><button type="button" class="btn btn-success">
                            <a href="Sub_profile_view" style="color:white">View</button></td>
                       
                        </tr>

                        <tr>
                            <td>54</td>
                            <td>Aradhyo Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                        
                            <td><button type="button" class="btn btn-success">  <a href="Sub_profile_view" style="color:white">View</button></td>
                     
                        </tr>
                        <tr>
                           <td>84</td>
                            <td>Koyel Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                         
                            <td><button type="button" class="btn btn-success"> <a href="Sub_profile_view" style="color:white">View</button></td>
                     
                        </tr>
                        <tr>
                            <td>144</td>
                            <td>Sujan Mukherjee</td>
                            <td>samarpita@gmail.com</td>
           
                          
                            <td><button type="button" class="btn btn-success">
                                <a href="Sub_profile_view" style="color:white">View</button></td>
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