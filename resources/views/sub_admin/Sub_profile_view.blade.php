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
    background-color: rgba(255, 255, 255, 0.5); /* white color with 50% opacity */
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

  .post-buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px; 
  }
  .post-buttons .btn {
    margin: 0 5px; 
  }

</style>

<div class="content-wrapper all">
  <div class="page-content page-container" id="page-content">
 <div class="padding">
 <div class="row container d-flex justify-content-center">
 <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
    <div class="card-body">
              <div class="team-members">
          <div class="container mt-2">
            <h2>All Posts</h2>
          <!--First-->
          <div class="col-md-12 mb-4">
        <div class="card">
             <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
            <div class="position-relative">
                            <img src="assets\img\image.jpg" alt="Profile Pic" class="rounded-circle mr-1" width="50">
                            <span class="online-dot"></span>
                  </div>
                          <!-- contents written-->
       <span class="card-text" style="font-size: 25px">Glad to announce that I have successfully completed C++ course</span>
             </div>
                        <!-- contents img posts-->
             <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
               <img src="assets\img\post.png" alt="Post Image" style="width: 90%; height: auto;">
                        </div>
                        <!-- Post buttons -->
             <div class="post-buttons">
                          <button class="btn btn-danger">Delete</button>
                          <button class="btn btn-warning"><b>Warning</b></button>
                 </div>
             </div>
             </div>
              <!-- Post Second -->
             <div class="col-md-12 mb-4">
        <div class="card">
             <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
            <div class="position-relative">
                            <img src="assets\img\image.jpg" alt="Profile Pic" class="rounded-circle mr-1" width="50">
                            <span class="online-dot"></span>
                  </div>
                          <!-- contents written-->
       <span class="card-text" style="font-size: 25px">Glad to announce that I have successfully completed C++ course</span>
             </div>
                        <!-- contents img posts-->
             <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
               <img src="assets\img\post.png" alt="Post Image" style="width: 90%; height: auto;">
                        </div>
                        <!-- Post buttons -->
             <div class="post-buttons">
                          <button class="btn btn-danger">Delete</button>
                          <button class="btn btn-warning"><b>Warning</b></button>
                 </div>
             </div>
             </div>
  </div>
  </div>
  </div>
  </div>
    </div>
     </div>
 </div>
 </div>
  </div>
</div>
