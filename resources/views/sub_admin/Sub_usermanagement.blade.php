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

    .all {

        background-color: rgba(255, 255, 255, 0.5);
        /* white color with 50% opacity */
    }
</style>
<div class="content-wrapper all">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>User Management </b></h1>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>34424433</td>
                                            <td>Samarpita Mukherjee</td>
                                            <td>samarpita@gmail.com</td>
                                            <td>3923451674</td>
                                            <td><button type="button" class="btn btn-secondary">Suspend</button>

                                                <button type="button" class="btn btn-success">View</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>34424433</td>
                                            <td>Samarpita Mukherjee</td>
                                            <td>samarpita@gmail.com</td>
                                            <td>3923451674</td>
                                            <td><button type="button" class="btn btn-secondary">Suspend</button>

                                                <button type="button" class="btn btn-success">View</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>34424433</td>
                                            <td>Samarpita Mukherjee</td>
                                            <td>samarpita@gmail.com</td>
                                            <td>3923451674</td>
                                            <td><button type="button" class="btn btn-secondary">Suspend</button>

                                                <button type="button" class="btn btn-success">View</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>34424433</td>
                                            <td>Samarpita Mukherjee</td>
                                            <td>samarpita@gmail.com</td>
                                            <td>3923451674</td>
                                            <td><button type="button" class="btn btn-secondary">Suspend</button>

                                                <button type="button" class="btn btn-success">View</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>34424433</td>
                                            <td>Samarpita Mukherjee</td>
                                            <td>samarpita@gmail.com</td>
                                            <td>3923451675</td>
                                            <td><button type="button" class="btn btn-secondary">Suspend</button>

                                                <button type="button" class="btn btn-success">View</button>

                                            </td>
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
