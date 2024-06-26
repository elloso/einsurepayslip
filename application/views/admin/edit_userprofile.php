<form action="<?php echo base_url('update-account') ?>" method="POST">
<input type="hidden" class="form-control" name="txtforms_id" style="text-align:center;" value="<?php echo md5($Data->user_id) ?>">  
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 mb-2">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Enter Fullname" name="txtform_fullname" value="<?php echo $Data->full_name ?>" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-xl-6 mb-2">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-user-plus"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Enter Username" name="txtform_username" value="<?php echo $Data->username ?>" >
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 mb-2">
                <select class="form-select" name="useraccounttpe">
                    <?php 
                        if($Data->user_type == 0){
                            $Account = "Guest"; 
                        }if($Data->user_type == 1){
                            $Account = "Admin"; 
                        }
                    ?>
                    <option style="text-align:center;" value="<?php echo $Data->user_type ?>"readonly><?php echo $Account ?></option>
                    <option value="1">Admin</option>
                    <option value="0">Guest</option>
                </select>
            </div>
           
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-12 mb-2">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" class="form-control" placeholder="Enter Email Address" name="txtform_email" value="<?php echo $Data->email ?>" >
                </div>
            </div>
        </div>
            <div class="col-lg-12 col-xl-12 mb-2">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-key"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Enter New Password" name="txtform_password" >
                </div>
            </div>
            <div class="col-lg-12 col-xl-12 mb-2">
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-key"></i>
                    </span>
                    <input type="password" class="form-control" placeholder="Confirm New Password" name="txtconfirmform_password" >
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</form>