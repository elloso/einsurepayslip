<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery-3.7.0.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>" type="text/javascript" ></script>
<script src="<?php echo base_url('assets/js/fontawesome.all.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/datatables/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/datatables/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/datatables/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/datatables/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/datatables/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/datatables/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert211.js'); ?>"></script>
<?php if (!empty($this->session->flashdata('success'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('success'); ?>",
            icon: 'success',
            showCloseButton: true
        });
    </script>
<?php elseif (!empty($this->session->flashdata('error'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('error'); ?>",
            icon: 'error',
            showCloseButton: true
        });
    </script>
<?php endif; ?>


<script>
    document.getElementById('percentage').addEventListener('input', function() {
        var value = parseFloat(this.value);
        if (isNaN(value) || value < 0 || value > 100) {
            this.value = '';
        }
    });
</script>  
<script>
    document.getElementById('taxpercentage').addEventListener('input', function() {
        var value = parseFloat(this.value);
        if (isNaN(value) || value < 0 || value > 100) {
            this.value = '';
        }
    });
</script>  
<script>
  const currentYear = new Date().getFullYear();
  const startYear = currentYear - 10; 
  const yearSelect = document.getElementById('yearSelect');
  for (let year = currentYear; year >= startYear; year--) {
    let option = document.createElement('option');
    option.value = year;
    option.textContent = year;
    yearSelect.appendChild(option);
  }
</script>
<script>
    $(document).ready(function() {
        $('#user-salesrep-table').DataTable({});
    });
</script>
<script>
    $(document).ready(function() {
        $('#user-account-table').DataTable({});
    });
</script>
<script>
    $(document).ready(function() {
        $('#txtforms_fullname').on('blur', function() {
            var fullname = $(this).val();
            
            $.ajax({
                url: "<?php echo base_url('SalesRepController/check_name_exists'); ?>",
                method: "POST",
                data: { txtforms_fullname: fullname },
                dataType: "json",
                success: function(data) {
                    if (data.exists) {
                        alert('The sales representative already exists.');
                        $('#proceedButton').prop('disabled', true);
                    } else {
                        $('#proceedButton').prop('disabled', false);
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#txtforms_fullname').on('blur', function() {
            var fullname = $(this).val();
            $.ajax({
                url: "<?php echo base_url('validate-fullname'); ?>",
                method: "POST",
                data: { txtforms_fullname: fullname },
                dataType: "json",
                success: function(data) {
                        if (data.exists) {
                            $("#fullname_validate").css("color", "red").text("Sales Representative name already exists.");
                            $("#proceedButton").css("pointer-events", "none");
                        } else {
                            $("#fullname_validate").css("color", "green").text("Proceed to Sales Representative creation.");
                            $("#proceedButton").css("pointer-events", "auto");
                        }
                    },
                    error: function() {
                        $("#fullname_validate").css("color", "red").text('Some error');
                    }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#repSelect').change(function() {
            var repName = $(this).val();

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('get-bonusbyrepname'); ?>',
                data: { repName: repName },
                dataType: 'json',
                success: function(response) {
                    if (response.bonus !== undefined) {
                        $('#bonusInput').val(response.bonus);
                    } else {
                        $('#bonusInput').val('No bonus found');
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#clientNumber').on('input', function() {
            const numberOfClients = $(this).val();
            const clientNamesContainer = $('#clientNamesContainer');
            clientNamesContainer.empty(); 

            for (let i = 0; i < numberOfClients; i++) {
                clientNamesContainer.append(`
                <div class="row justify-content-center" >
                    <div class="col-lg-4 col-xl-4 mb-2 mx-auto">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="txtForms_clientname[]" placeholder="Client Name ${i + 1}">
                        </div>
                    </div>
                </div>
                `);
            }
        });
    });
</script>
<script>
function showDetails(salesrep_id) {
    $.ajax({
        url: '<?php echo base_url('show-salesrepdata') ?>', 
        type: 'POST',
        data: { salesrepid: salesrep_id },
        success: function(response) {
            $('#salesprofileModal .modal-body').html(response); 
            $('#salesprofileModal').modal('show'); 
        },
        error: function() {
            alert('Error fetching data.');
        }
    });
}
</script>
<script>
function showDetailsUserData(account_id) {
    $.ajax({
        url: '<?php echo base_url('show-useraccountdata') ?>', 
        type: 'POST',
        data: { accountid: account_id },
        success: function(response) {
            $('#useraccountModal .modal-body').html(response); 
            $('#useraccountModal').modal('show'); 
        },
        error: function() {
            alert('Error fetching data.');
        }
    });
}
</script>




</body>
</html>