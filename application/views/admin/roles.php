
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
                                   
                                    
                                    <form method="post" action="{$url}delete-role/<?= $role->id ?>">
                                     <a href="{$url}edit-role/<?= $role->id ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                      <button class="btn btn-danger btn-xs" id="delete-button"><i class="fa fa-trash-o"></i> Delete </button>
                                        <input type="hidden" name="confirm_delete" value="1">
                                    </form>
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

        <script>
        // Add a click event listener to the delete button
        document.getElementById('delete-button').addEventListener('click', function() {
            // Display a confirmation dialog box using SweetAlert2
            event.preventDefault();
            Swal.fire({
                title: 'Confirm Delete',
                text: 'Are you sure you want to delete this role?',
                icon: 'warning',
                showCancelButton: true,

                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'

            }).then((result) => {
                // If the user confirms the delete operation, submit the form
                if (result.isConfirmed) {
                    document.forms[0].submit();
                }
            });
        });
    </script>