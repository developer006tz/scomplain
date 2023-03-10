<div class="right_col" role="main">
          <div class="">
            <a href="{$url}add-program" class="btn btn-primary">add</a>
            <div class="page-title" style="display:flex;justify-content:center;">
            
              <div class="title_left">
                
                <h3 style="display:flex;justify-content:center;">{heading}</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row" style="display:flex;justify-content:center;">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="x_panel  center">
                <div class="x_title">
                  <h2>{sub-heading}</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <!-- start form for validation -->
                  
                  
                  <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
							 <th><input type="checkbox" id="check-all" class="flat"></th>
						  </th>       <th>S/N</th>  
                          <th>Program Name</th>
                          <th>Program Id</th>
                          <th>Capacity</th>
                          <th>NIT Level</th>
                          <th>Department</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php if (!empty($program)): ?>
                          
                        <?php
                        $i = 1;
                  foreach($program as $prog){?>

                        <tr>
                          <td>
							            <th><input type="checkbox" id="check-all" class="flat"></th>
                            </td>
                          <td> <?= $i ?> </td>
                          <td> <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->prog_name ?></a> </td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->prog_id ?></a></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->capacity ?></a></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->ntaLevel ?></a></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->department ?></a></td>
                          <td>
                            <a href="{$url}edit-program/<?= $prog->prog_id ?>" class="btn btn-xs btn-primary">edit</a>
                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">view</button>
                            <button class="btn btn-danger btn-xs delete-btn" id="delete-btn" data-id="<?= $prog->prog_id ?>" onclick="deleteRecord(this)"><i class="fa fa-trash-o"></i> </button>
                          </td>
                        </tr>
                        <?php $i++; } ?>
                        <?php else: ?>
                                <tr>
                                  <td colspan="6" class="text-center">No Program found</td>
                                </tr>
                                <?php endif; ?>
                      </tbody>
                    </table>
                  <!-- end form for validations -->
                  <!-- models -->
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">??</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">PROGRAMME</h4>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>stats name</th>
                                  <th>stats</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td><a href="#">Lecturers</a></td>
                                  <td><a href="#">200</a></td>
                                </tr>
                                <tr>
                                  <td><a href="#">students</a></td>
                                  <td><a href="#">10005</a></td>
                                </tr>
                                <tr>
                                  <td><a href="#">Complaints</a></td>
                                  <td> <a href="#">500</a> </td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <script>
  //delete by pure javascript
  function deleteRecord(button) {
    var id = button.getAttribute('data-id');
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '{$url}delete-program/' + id;
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            '',
            'success'
          )
        }
      })
  }
</script>


