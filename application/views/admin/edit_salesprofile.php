<form action="<?php echo base_url('update-salesrep'); ?>" method="POST">
    <input type="hidden" class="form-control" name="txtforms_id" style="text-align:center;" value="<?php echo md5($Data->srep_userid) ?>" >  
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="txtforms_fullname" style="text-align:center;" value="<?php echo $Data->full_name ?>" >  
                <label class="form-label fw-bold text-dark">Full Name:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="txtforms_commission" style="text-align:center;" value="<?php echo $Data->commission_rate ?>" >
                <label class="form-label fw-bold text-dark">Commission Rate:<small> (Percentage)</small></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="txtforms_taxrate" style="text-align:center;" value="<?php echo $Data->tax_rate?>" >
                <label class="form-label fw-bold text-dark">Tax Rate:<small> (Percentage)</small></label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <select class="form-control f-select" name="txtforms_bonus" required>
                    <option style="text-align:center;" readonly><?php echo $Data->bonus ?></option>
                    <option value="100">$100</option>
                    <option value="200">$200</option>
                    <option value="300">$300</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</form>