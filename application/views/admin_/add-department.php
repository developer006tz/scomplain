<div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">{heading}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item captitalize"><a href="{$url}departments">{heading}</a></li>
                                <li class="breadcrumb-item active">{sub-heading}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" id="department-add" novalidate>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>{sub-heading}</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Department Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Department Code <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" name="code" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <a href="{$url}departments" class="btn btn-warning">cancel</a>
                                                <button type="submit" class="btn btn-primary">add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix" style="height: 250px">

            </div>

            <script>
                $().ready(function(){
                    $('#department-add').validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 4
                            },
                            code: {
                                required: true,
                                minlength: 3
                            }
                        },
                        messages: {
                            name: {
                                required: 'Department name is required',
                                minlength: 'Name must be of min character 4'

                            },
                            code: {
                                 required: 'Department name is required',
                                 minlength: 'Name must be of min character 3'
                            }
                        },
                        submitHandler: function(form,event){
                            event.preventDefault();
                            form.submit();
                        }
                    })
                })
            </script>