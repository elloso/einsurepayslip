<form action="<?php echo base_url('print-payrollSystem'); ?>" method="post" target="_blank">
<div class="container justify-content-center align-items-center container_table p-5" style="min-height: 40vh;">
    <div class="container shadow p-5" style="border-radius: 50px">
        <h1 style="text-align:center;">Create Payroll</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-5 mb-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                        <i class="fa-solid fa-users"></i>
                        </span>
                        <select class="form-control f-select" name="txtforms_fullname" id="repSelect" required>
                            <option style="text-align:center;" disabled selected>Choose Sales Representative</option>
                            <?php foreach ($Users as $User): ?>
                                <option value="<?php echo $User->full_name ?>"><?php echo $User->full_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                        <div class="col-lg-2 col-xl-2 mb-2">
                            <select class="form-select" name="monthSelect" required>
                                <option style="text-align:center;" readonly>Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-xl-3 mb-2">
                            <select class="form-select" name="periodSelect" required>
                                <option style="text-align:center;" readonly>Day Time Period</option>
                                <option value="1 - 15">1 - 15</option>
                                <option value="16 - 31">16 - 31</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-xl-2 mb-2">
                            <select class="form-select" name="yearSelect" id="yearSelect" required>
                            <option style="text-align:center;" readonly>Year</option>
                            </select>
                        </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-xl-3 mb-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-dollar-sign"></i>
                        </span>
                        <input type="text" id="bonusInput" class="form-control" placeholder="Bonuses" name="txtform_bonus" readonly>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-users"></i>
                        </span>
                        <input type="number" class="form-control" id="clientNumber" placeholder="Number of Clients" required>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div id="clientNamesContainer"></div>
                <div class="col-lg-4 col-xl-4 mb-2 mx-auto">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </span>
                            <input type="number" class="form-control" name="txtForms_onlinecommission" placeholder="Onlineinsure Gross Pay" required> 
                        </div>
                    </div>
            </div>
        </div>
        <hr><hr>
        <div style="text-align:center">
            <button type="submit" class="btn btn-danger" id="submitBtn" disable>Create Payroll</button>
        </div>
    </div>
    </div>
</form>


