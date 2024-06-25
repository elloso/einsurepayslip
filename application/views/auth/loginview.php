<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Elite Insure</title>
<link rel="stylesheet" href="<?php echo base_url('assets/css/feather.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/vendor.bundle.base.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="icon" href="<?php echo base_url('assets/img/eliteinsure-bar-logo.png'); ?>" type="image/x-icon">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 20px;">
              <div class="brand-logo">
                <img src="<?php echo base_url('assets/img/eliteinsure_logo.png'); ?>" alt="logo">
              </div>
              <h2 class="ml-4">Payroll Software</h2>
              <form action="<?php echo base_url('authenticate-account'); ?>" method="POST" class="pt-3">
                  <div class="form-group">
                      <input type="text" class="form-control form-control-lg" placeholder="Username" name="txtUsername" required>
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" name="txtPassword" required>
                  </div>
                  <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                  <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show shadow text-black mt-3" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <?php
                    }
                  ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
