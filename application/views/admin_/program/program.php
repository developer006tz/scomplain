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
<a href="{$url}add-program" class="btn btn-primary"><i class="fas fa-plus"></i>Add</a>
</div>
</div>
</div>
<div class="table-responsive">
 <table class="table border-0 star-student table-hover table-center mb-0 table-striped responsive" id="program_table">
<thead class="student-thread">
<tr>
<th>
<div class="form-check check-tables">
<input class="form-check-input" type="checkbox" value="something">
</div>
</th>
<th>S/N</th> 
<th>Program Name</th>
<th>Prog ID</th>
<th>NTA Level</th>
<th class="text-start">Action</th>
</tr>
</thead>
<tbody>

 <?php if (!empty($program)): ?>
                          
                        <?php
                        $i = 1;
                  foreach($program as $prog){?>

                        <tr>
                          <td>
                        <div class="form-check check-tables">
                        <input class="form-check-input" type="checkbox" value="something">
                        </div>
                        </td>
                          <td> <?= $i ?> </td>
                          <td> <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->prog_name ?></a> </td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->prog_id ?></a></td>
                          <td><a href="#" data-toggle="modal" data-target=".bs-example-modal-sm"><?= $prog->ntaLevel ?></a></td>
                          <td>
                            <a href="{$url}edit-program/<?= $prog->prog_id ?>" class="btn btn-sm bg-success me-2">edit</a>
                            <button type="button" class="btn btn-sm bg-info me-2" data-toggle="modal" data-target=".bs-example-modal-sm">view</button>
                            <button class="btn btn-sm bg-danger delete-btn" id="delete-btn" data-id="<?= $prog->prog_id ?>" onclick="deleteRecord(this)"><i class="fa fa-trash-o"></i> Delete </button>
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
</div>
</div>
</div>
</div>
</div>
</div>
<script>
    $(document).ready(function() {
    $('#program_table').DataTable({
        responsive: true,
        dom: '<"row"<"col-md-6"l><"col-md-6 text-end"Bf>>' +
     '<"row"<"col-md-12"tr>>' +
     '<"row"<"col-md-6"i><"col-md-6"p>>',
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: [
            {
                extend: 'pdfHtml5',
                className: 'btn btn-primary',
                text: '<i class="fas fa-file-pdf"></i> Export to PDF',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'csvHtml5',
                className: 'btn btn-primary',
                text: '<i class="fas fa-file-csv"></i> Export to CSV',
                exportOptions: {
                    columns: [ 1, 2, 3, 4 ]
                }
            }
        ]
    });
});
</script>

<script>
   //delete by pure javascript
  function deleteRecord(button) {
    var id = button.getAttribute('data-id');
    var test = 'test'
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: `You won't ${id} be able to revert this!`,
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
