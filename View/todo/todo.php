<div class="card">
  <div class="card-header">
    <a href="?c=todos&a=new" class="float-right btn btn-primary btn-sm"><i class="fa fa-fw fa-plus-circle"></i> New Todos</a>
  </div>
  <div class="card-body">
  </div>
  <div class="col-sm-12">
    <table class="table table-striped table-bordered">
      <thead>
        <tr class="bg-primary text-white">
          <th>Sr#</th>
          <th>Work Name</th>
          <th>Starting Date</th>
          <th>Ending Date</th>
          <th>Status</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $s  =  '';
        foreach ($this->model->Lists() as $val) {
          $s++;
        ?>
          <tr>
            <td><?php echo $s; ?></td>
            <td><?php echo $val->workname; ?></td>
            <td><?php echo $val->startingDateFormat; ?></td>
            <td><?php echo $val->endingDateFormat; ?></td>
            <td><?php echo $this->constant::STATUS[$val->status]; ?></td>
            <td align="center">
              <a href="?c=todos&a=Edit&id=<?php echo $val->id; ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
              <a href="?c=todos&a=Delete&id=<?php echo $val->id; ?>" class="text-danger" onClick="return confirm('Are you sure to delete this todo?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>