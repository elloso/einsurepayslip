
<div class="container justify-content-center align-items-center container_table p-5" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Sales Representative Profile</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-accountablelist-table" class="table table-hover">
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
                            <td class="text-center"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
