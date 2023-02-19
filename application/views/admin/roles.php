
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{page-heading}</h3>
              </div>

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 class="text">{sub-heading}</h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                      <a href="{$url}add-role" type="button" class="btn btn-primary " style="margin-left:10px;">add role</a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-lg-12 col-md-3 col-sm-6 col-xs-12">
                        <div class="role">
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th class="bg-light">Role</th>
                                  <th>Description</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if(!empty($roles)): ?>
                                <?php foreach ($roles as $role): ?>
                                <tr>
                                  <td><?= $role->name ?></td>
                                  <td><?= $role->description ?></td>
                                  <td >
                                   <a href="{$url}edit-role/<?= $role->id ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                   <button class="btn btn-danger btn-xs delete-btn" id="delete-btn" data-id="<?= $role->id ?>" onclick="deleteRecord(this)"><i class="fa fa-trash-o"></i> Delete </button>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                  <td colspan="3" class="text-center">No roles found</td>
                                </tr>
                                <?php endif; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12">
                        
                      </div>
                      
                    </div>

                    
                      

                      
                  </div>
                  <!-- x-content -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->



    <!-- <script>
      // delete by jquery
  $(document).ready(function() {
    $('.delete-btn').click(function() {
      var id = $(this).data('id');

      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '{$url}delete-role/' + id;
        }
      });
    });
  });
</script> -->

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
          window.location.href = '{$url}delete-role/' + id;
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