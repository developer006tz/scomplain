<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Departments</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Departments</li>
</ul>
</div>
</div>
</div>


<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Departments</h3>
</div>
<div class="col-auto text-end float-end ms-auto download-grp">
<a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> pdf</a>
<a href="{$url}add-department" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
</div>
</div>
</div>

 <table class="table border-0 star-student datatable table-hover table-center mb-0 table-striped" id="departments_table">
<thead class="student-thread">
<tr>
<th>
<div class="form-check check-tables">
<input class="form-check-input" type="checkbox" value="something">
</div>
</th>
<th>S/N</th> 
<th>dept Name</th>
<th>dept Code</th>
<th class="text-start">Action</th>
</tr>
</thead>
<tbody>

 <?php if (!empty($department)): ?>
                          
                        <?php
                        $i = 1;
                  foreach($department as $dept){?>

                        <tr>
                          <td>
                        <div class="form-check check-tables">
                        <input class="form-check-input" type="checkbox" value="something">
                        </div>
                        </td>
                          <td> <?= $i ?> </td>
                          <td> <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $dept->dept_name ?></a> </td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $dept->dept_code ?></a></td>
                          <td>
                            <a href="{$url}edit-department/<?= $dept->dept_id ?>" class="btn btn-sm bg-success me-2">edit</a>
                            <button type="button" class="btn btn-sm bg-info me-2" data-toggle="modal" data-target=".bs-example-modal-sm">view</button>
                            <button class="btn btn-sm bg-danger delete-btn" id="delete-btn" data-id="<?= $dept->dept_id ?>" onclick="deleteRecord(this)"><i class="fa fa-trash-o"></i> Delete </button>
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
</div>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
                // $('#departments_table').DataTable();
                let table = new DataTable('#departments_table', {
                    responsive: true
                });
            });
</script>

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
