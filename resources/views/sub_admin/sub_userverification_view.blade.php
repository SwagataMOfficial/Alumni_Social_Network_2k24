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
  .all {
    background-color: rgba(255, 255, 255, 0.5);
  }
  .online-dot {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 15px;
    height: 15px;
    background-color: green;
    border-radius: 50%;
    border: 2px solid white;
  }
 
 

</style>

<div class="content-wrapper all">
  <div class="page-content page-container" id="page-content">
    <div class="padding">
      <div class="card-body">
        <h2><b>Document for verification</b></h2>
        <!--First-->
        <div class="col-md-9 mb-6">
        <div class="card" style="width: 100%;">
    

          <div class="card-body">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex align-items-center mb-3">
                <div class="position-relative">
                  <img src="\assets\img\image.jpg" alt="Profile Pic" class="rounded-circle mr-1" width="50">
                  <span class="online-dot"></span>
                </div>
                <span class="card-text ml-auto" style="font-size: 25px">Aadhar Card</span>
              </div>
              
              <!-- contents img posts -->
              <div style="display: flex; justify-content: flex-end; align-items: center; height: 50%; margin-left: auto;">
                <img src="\assets\img\me-1.jpg" alt="Post Image" style="width: 90%;  height: auto;">
              </div>
              <div class="post-buttons mt-3 ml-auto d-flex justify-content-between flex-wrap">
    <button class="btn btn-danger mr-3 flex-grow-1">Rejected</button>
    <button class="btn btn-success ml-auto flex-grow-1">Approved</button>
</div>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
