
<div class="container justify-content-center align-items-center container_table p-5" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Account Management</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-account-table" class="table table-hover">
                    <div>
                        <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#account_user_modal">
                            Add User
                        </button>
                    </div>
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">User Type</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($Users as $User): ?>
                            <tr>   
                                <?php 
                                    if($User->user_type == 0){
                                        $Account = "Guest"; 
                                    }
                                    if($User->user_type == 1){
                                        $Account = "Admin"; 
                                    }
                                ?> 
                                <td><?php echo $User->full_name ?></td>
                                <td><?php echo $User->username ?></td>
                                <td><?php echo $User->email ?></td>
                                <td><?php echo $Account ?></td>
                                <td class="text-center">
                                    <a class="p-2 text-primary" title="View-Edit" style="cursor: pointer;">
                                        <i class="fa-solid fa-pen-to-square" onclick="showDetailsUserData('<?php echo $User->user_id ?>')"></i>
                                    </a>
                                    <a href="<?php echo base_url('deleteuseraccount/' . md5($User->user_id)) ?>" class="p-2 text-danger" title="Delete" style="cursor: pointer;" onclick="return confirm('Are you sure you want to delete this User <?php echo $User->full_name ?>?');">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Account registration -->
<form action="<?php echo base_url('save-newuser') ?>" method="post">
    <div class="modal fade" id="account_user_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="account_user_modalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 mb-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter Fullname" name="txtform_fullname" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 mb-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter Username" name="txtform_username" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6 mb-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" placeholder="Enter Password" name="txtform_password" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 mb-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" placeholder="Enter Email Address" name="txtform_email" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6 mb-2">
                                <select class="form-select" name="useraccounttpe" required>
                                    <option style="text-align:center;" readonly>Account User Type</option>
                                    <option value="1">Admin</option>
                                    <option value="0">Guest</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <!-- End Modal body -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal For Edit -->
<div class="modal fade" id="useraccountModal" tabindex="-1" aria-labelledby="useraccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="useraccountModalLabel">Sales Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
     
  </div>
</div>


