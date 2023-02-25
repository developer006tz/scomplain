<body class="nav-md">
    <?php if ($this->session->flashdata('success')){ ?>
                <script>

                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '<?= $this->session->flashdata('success') ?>',
                    showConfirmButton: false,
                    timer: 1500
                    })
                </script>
                <?php } elseif($this->session->flashdata('error')) {?>

                    <script>

                    Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: '<?= $this->session->flashdata('error') ?>',
                    showConfirmButton: false,
                    timer: 1500
                    })
                </script>

                <?php } ?>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><img src="{$url}assets/images/logo.png" alt="..." width="64" height="50" > <span>{stitle}</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <!-- <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{$url}assets/images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{name}</h2>
                        </div>
                    </div> -->
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="index2.html">Dashboard2</a></li>
                                        <li><a href="index3.html">Dashboard3</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-users"></i> Students <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="form.html">General Form</a></li>
                                        <li><a href="form_advanced.html">Advanced Components</a></li>
                                        <li><a href="form_validation.html">Form Validation</a></li>
                                        <li><a href="form_wizards.html">Form Wizard</a></li>
                                        <li><a href="form_upload.html">Form Upload</a></li>
                                        <li><a href="form_buttons.html">Form Buttons</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-building-o"></i>Departments<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{$url}departments">View</a></li>
                                        <li><a href="{$url}add-department">Add</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-graduation-cap"></i> Programmes <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="tables.html">Tables</a></li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-envelope"></i>Messages<span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="chartjs.html">Chart JS</a></li>
                                        
                                    </ul>
                                </li>
                               <?php if($this->session->userdata('user_type') == 'admin'){ ?>
                                <li><a><i class="fa fa-cog"></i>System settings <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    
                                    <li><a>Permissions<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu"><a href="{$url}user/view-role">view</a>
                                        </li>
                                        <li><a href="{$url}add-role">add</a>
                                        </li>
                                    </ul>
                                    </li>
                                    <li><a>complaint type<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li class="sub_menu"><a href="{$url}user/view-role">view</a>
                                        </li>
                                        <li><a href="{$url}add-complaint">add</a>
                                        </li>
                                    </ul>
                                    </li>
                                    <li><a href="#level1_2">Add Staff User</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } ?>
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{$url}logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>