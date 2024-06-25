<form action="" method="post">

<div class="container justify-content-center align-items-center container_table p-5" style="min-height: 40vh;">
    <div class="container shadow p-5" style="border-radius: 50px">
        <h1 style="text-align:center;">Create Payroll</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6 mb-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                        <i class="fa-solid fa-users"></i>
                        </span>
                        <select class="form-control f-select" name="txtforms_bonus" required>
                            <option style="text-align:center;" disabled selected>Choose Sales Representative</option>
                            <option value="100">$100</option>
                            <option value="200">$200</option>
                            <option value="300">$300</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-3 mb-3">
                    <input id="txtAcceptedDate" class="form-control" name="txtAcceptedDate" type="date" style="text-align:center;" />
                </div>
            </div>
        </div>
        <hr><hr>
        <div style="text-align:center">
            <button type="submit" class="btn btn-primary" id="submitBtn">Create Payroll</button>
        </div>
    </div>
    </div>
</form>