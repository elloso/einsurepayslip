
<div class="container justify-content-center align-items-center container_table p-5" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Sales Representative Profile</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-salesrep-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Commission Rate</th>
                            <th class="text-center">Tax Rate</th>
                            <th class="text-center">Bonus</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lists as $list): ?>
                        <tr>    
                            <td class="text-center"><?php echo $list->full_name ?></td>
                            <td class="text-center"><?php echo $list->commission_rate."%" ?></td>
                            <td class="text-center"><?php echo $list->tax_rate."%"  ?></td>
                            <td class="text-center"><?php echo "$".$list->bonus ?></td>
                            <td class="text-center">
                                <a class="p-2 text-primary" title="View-Edit" style="cursor: pointer;">
                                    <i class="fa-solid fa-pen-to-square" onclick="showDetails('<?php echo $list->srep_userid ?>')"></i>
                                </a>
                                <a href="<?php echo base_url('deletesalesrepuser/' . md5($list->srep_userid)) ?>" class="p-2 text-danger" title="Delete" style="cursor: pointer;" onclick="return confirm('Are you sure you want to delete this User <?php echo $list->full_name ?>?');">
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
<!-- Modal For Edit -->
<div class="modal fade" id="salesprofileModal" tabindex="-1" aria-labelledby="salesprofileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="salesprofileModalLabel">Sales Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
     
  </div>
</div>




