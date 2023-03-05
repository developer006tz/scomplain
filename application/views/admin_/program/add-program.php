<div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">{heading}</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item captitalize"><a href="{$url}programs">{heading}</a></li>
                                <li class="breadcrumb-item active">{sub-heading}</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" id="program-add" novalidate>
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>{sub-heading}</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Program Name <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Program Id <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" name="id" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Program Capacity <span class="login-danger">*</span></label>
                                                <input type="text" class="form-control" name="capacity" required>
                                            </div>
                                        </div>
                                         <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Nta Level <span class="login-danger">*</span></label>
                                                <select class="form-control select"  name="nta" id="nta">
                                                <option value="0">--select--</option>
                                                <?php foreach($nta as $level => $label): ?>
                                                <option value="<?= $level; ?>"><?= $label; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-4">
                                            <div class="form-group local-forms">
                                                <label>Department <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="dept" id="dept">
                                                <option value="0">--select--</option>
                                                <?php foreach($department as $dept): ?>
                                                <option value="<?php echo $dept->dept_code; ?>"><?php echo $dept->dept_code; ?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="student-submit">
                                                <a href="{$url}program" class="btn btn-warning">cancel</a>
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
                    $('#program-add').validate({
                        rules: {
                            name: {
                                required: true,
                                minlength: 4
                            },
                            id: {
                                required: true,
                                minlength: 3
                            },
                            capacity: {
                                required: true,
                                minlength: 1,
                                number: true
                            },
                            nta: {
                               required :{
                                depends: function(element){
                                    if("0"==$("#nta").val()){
                                        $("#nta").val("");
                                    }
                                    return true
                                }
                            } 
                            },
                            dept: {
                               required :{
                                depends: function(element){
                                    if("0"==$("#dept").val()){
                                        $("#dept").val("");
                                    }
                                    return true
                                }
                            } 
                            }
                        },
                        messages: {
                            name: {
                                required: 'program name is required',
                                minlength: 'Name must be of min character 4'

                            },
                            id: {
                                 required: 'program ID is required',
                                 minlength: 'Name must be of min character 3'
                            },
                            capacity: {
                                 required: 'program ID is required',
                                 minlength: 'Name must be of min character 3',
                                 number: 'Only number is allowed'
                            },
                            nta: {
                                required: 'Choose NTA Lavel'
                            },
                            dept: {
                                required: 'Choose Department'
                            }
                        },
                        submitHandler: function(form,event){
                            event.preventDefault();
                            form.submit();
                        }
                    })
                })
            </script>