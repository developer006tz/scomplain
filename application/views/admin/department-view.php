<div class="right_col" role="main">
          <div class="">
            <a href="{$url}add -department" class="btn btn-primary">add</a>
            <div class="page-title" style="display:flex;justify-content:center;">
            
              <div class="title_left">
                
                <h3 style="display:flex;justify-content:center;">{heading}</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row" style="display:flex;justify-content:center;">
              <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
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
                          <th>dept Name</th>
                          <th>dept Code</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                        <?php if (!empty($department)): ?>
                          
                        <?php
                        $i = 1;
                  foreach($department as $dept){?>

                        <tr>
                          <td>
							            <th><input type="checkbox" id="check-all" class="flat"></th>
                            </td>
                          <td> <?= $i ?> </td>
                          <td> <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $dept->dept_name ?></a> </td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $dept->dept_code ?></a></td>
                          <td>
                            <a href="#" class="btn btn-primary">edit</a>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">view</button>
                            <button class="btn btn-danger delete-btn" id="delete-btn" data-id="<?= $dept->dept_id ?>" onclick="deleteRecord(this)"><i class="fa fa-trash-o"></i> Delete </button>
                          </td>
                        </tr>
                        <?php $i++; } ?>
                        <?php else: ?>
                                <tr>
                                  <td colspan="6" class="text-center">No roles found</td>
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
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">DEPARTMENT CCT</h4>
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
          window.location.href = '{$url}delete-department/' + id;
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
