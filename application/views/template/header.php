<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>Payroll Online System</title>
<link rel="icon" href="<?php echo base_url('assets/img/eliteinsure-bar-logo.png'); ?>" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/all.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/datatables/jquery.dataTables.min.css"'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/datatables/buttons.dataTables.min.css'); ?>">
<style>
    ::placeholder {
        font-style: italic;
    }
</style>
</head>
<body>
<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url('dashboard'); ?>" class="logo d-flex align-items-justify">
        <h1>Onlineinsure Payroll System</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa-solid fa-house mb-1 me-1" style="font-size: 15px;"></i>Home</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Salesrep
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Modal_Addsalesrep" style="cursor: pointer;">Add Salesrep Profile</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('add-salesrep'); ?>">Salesrep Profile</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url('view-payroll'); ?>"><i class="fa-solid fa-pencil me-1"></i>Create Payroll</a></li>
          <li><a href="#"><i class="fa-solid fa-file-lines me-1"></i>PDFs</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-tools me-1"></i>Settings
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="<?php echo base_url('accountsettings'); ?>">Account Settings<i class="fa-solid fa-user"></i></a></li>
                <li><a href="<?php echo base_url('logout-account'); ?>">Logout Account<i class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>
  <form action="<?php echo base_url('submit-salesrep'); ?>" method="post">
    <div class="modal fade" id="Modal_Addsalesrep" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_AddsalesrepLabel">New Sales Representative</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <input type="text" id="txtforms_fullname" class="form-control" name="txtforms_fullname" placeholder="Sales Representative (FirstName and LastName)" required>
                        </div>
                        <div class="mb-3">
                            <small><div id="fullname_validate"></div></small>
                        </div>
                        <div class="col-lg-12 col-xl-12 mb-3">
                            <input type="number" style="text-align: center;" class="form-control" name="txtforms_commission" placeholder="Enter Commission Percentage" step="0.00" max="100" id="percentage" required>
                        </div>
                        <div class="col-lg-12 col-xl-12 mb-3">
                            <input type="number" style="text-align: center;" class="form-control" name="txtforms_taxrate" placeholder="Enter Tax rate" step="0.00" max="100" id="taxpercentage" required>
                        </div>
                        <div class="col-lg-12 col-xl-12 mb-3">
                            <select class="form-control f-select" name="txtforms_bonus" required>
                                <option style="text-align:center;" readonly>--- Please Select Bonus ---</option>
                                <option value="100">$100</option>
                                <option value="200">$200</option>
                                <option value="300">$300</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="proceedButton" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>
