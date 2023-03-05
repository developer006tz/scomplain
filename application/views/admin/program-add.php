
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{heading}</h3>
                
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{sub-heading}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                  <br />
                  <form class="form-horizontal form-label-left" method="POST" id="add-form" novalidate>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Name</label>
                      <div class="col-md-7 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="name" placeholder="Program Name" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Program Id</label>
                      <div class="col-md-7 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="id" placeholder="Program Id" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Capacity</label>
                      <div class="col-md-7 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="capacity" placeholder="Capacity" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">NTA LEVEL</label>
                      <div class="col-md-7 col-sm-9 col-xs-12">
                        <select class="form-control" name="nta"  id="nta" novalidate required>
                          <option value="0">Choose level</option>
                        <?php foreach($nta as $level => $label): ?>
                          <option value="<?= $level; ?>"><?= $label; ?></option>
                        <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                      <div class="col-md-7 col-sm-9 col-xs-12">
                        <select class="form-control" name="dept" id="dept" required>
                          <option value="0">---Choose department---</option>
                          <?php foreach($department as $dept): ?>
                          <option value="<?php echo $dept->dept_code; ?>"><?php echo $dept->dept_code; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<script>

  $().ready(function(){
    $("#add-form").submit(function(event) {
      event.preventDefault();
  $("#add-form").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        id: {
          required: true,
          minlength: 3
        },
        capacity: {
          required: true,
          minlength: 3
        },
        nta: {
          required: {
            depends: function(element) {
              if ($("#nta").val() == 0) {
                $("#nta").val("");
              }
              return true;
            }
          }
        },
        dept: {
          required: {
            depends: function(element) {
              if ($("#dept").val() == 0) {
                $("#dept").val("");
              }
              return true;
            }
          }
        },


      },
      messages: {
        name: {
          required: "Please enter a name",
          minlength: "Your name must consist of at least 3 characters"
        },
        id: {
          required: "Please enter a id",
          minlength: "Your id must consist of at least 3 characters"
        },
        capacity: {
          required: "Please enter a capacity",
          minlength: "Your capacity must consist of at least 3 characters"
        },
        nta: {
          required: "Please enter a nta"
        },
        dept: {
          required: "Please enter a dept"
        }
      },

      submitHandler: function(form) {
        form.submit();
      }
      

    })
});
});

  

</script>
        
