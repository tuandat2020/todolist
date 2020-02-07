<div class="card">
  <div class="card-header">
    <a href="?c=todos" class="float-right btn btn-primary btn-sm">List Todos</a>
  </div>
  <div class="card-body">
  </div>
  <div class="col-sm-12">
    <form action="?c=todos&a=save" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Work Name <span class="text-danger">*</span></label>
        <input type="text" name="workname" id="workname" class="form-control" placeholder="Enter work name">
      </div>
      <div class="form-group">
        <label>Starting Date <span class="text-danger">*</span></label>
        <input type="date" name="startingdate" id="startingdate" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="Enter starting date">
      </div>
      <div class="form-group">
        <label>Ending Date <span class="text-danger">*</span></label>
        <input type="date" name="endingdate" id="endingdate" max="3000-12-31" min="1000-01-01" class="form-control" placeholder="Enter ending date">
      </div>
      <div class="form-group">
        <label>Status <span class="text-danger">*</span></label>
        <select class="browser-default custom-select" name="status">
          <?php
          foreach ($this->constant::STATUS as $key => $value) {
            echo '<option value="' . $key . '">' . $value . '</option>';
          };
          ?>
        </select>
      </div>
      <div class="form-group">
        <input type="button" name="btn-create" id="btn-create" class="btn btn-primary" value="Create Todo">
      </div>
    </form>
  </div>
</div>

<script>
  var ValidateCreate = new function() {
    this.models = {
      inputWorkName: '#workname',
      inputStartingDate: '#startingdate',
      inputEndingDate: '#endingdate',
      btnCreate: '#btn-create',
    };

    this.init = function() {
      $(ValidateCreate.models.btnCreate).click(function() {
        ValidateCreate.events.validate();
      });
    };

    this.events = {
      validate: function(e) {
        if ($(ValidateCreate.models.inputWorkName).val() == "" || $(ValidateCreate.models.inputStartingDate).val() == "" || $(ValidateCreate.models.inputEndingDate).val() == "") {
          alert("All input not null.");
          return false;
        }
        if ($(ValidateCreate.models.inputStartingDate).val() > $(ValidateCreate.models.inputEndingDate).val()) {
          alert("Starting Date <= Ending Date.");
          return false;
        }
        $("form")[0].submit();
      }
    };
  };

  $(document).ready(function() {
    ValidateCreate.init();
  });
</script>