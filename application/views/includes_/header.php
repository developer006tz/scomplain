
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{title}</title>
    <!-- jquery -->
    <!-- <script src="{$url}node_modules\datatables.net-bs5\js\dataTables.bootstrap5.min.js"></script> -->
    <script src="{$url}assets/js/jquery-3.6.0.min.js"></script>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{$url}assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{$url}assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="{$url}assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="{$url}assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{$url}assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{$url}assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{$url}assets/css/style.css">
    <link rel="stylesheet" href="{$url}assets/css/main.css">
  <!-- sweetalart2 -->
    <script src="{$url}node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{$url}node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{$url}node_modules/toastr/build/toastr.min.css">

    <!-- jQuery Validate -->
<script src="{$url}assets/plugins/jquery.validate/jquery.validate.min.js"></script>

    <!-- datatables -->
    <!-- <link rel="stylesheet" href="{$url}node_modules\datatables.net-dt\css\jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="{$url}node_modules\datatables.net-bs5\css\dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="{$url}node_modules\datatables.net-responsive-bs5\css\responsive.bootstrap5.css"> -->
    <!-- <link rel="stylesheet" href="{$url}node_modules\datatables.net-buttons-bs5\css\buttons.bootstrap5.min.css"> -->
    <!-- <link rel="stylesheet" href="{$url}node_modules\datatables.net-searchbuilder-bs5\css\searchBuilder.bootstrap5.min.css"> -->
    <!-- <link rel="stylesheet" href="{$url}node_modules\datatables.net-select-bs5\css\select.bootstrap5.min.css"> -->

 
</head>
<style>
    
input.form-control.error {
    border: 1px solid red;
    background: #fff6f6;
}

input.form-control.valid {
    border: 1px solid green;
    background: #f6fff4;
}

select.error {
    border: 1px solid red;
    background: #fff6f6;
}

select.valid {
    border: 1px solid green;
    background: #f6fff4;
}

label.error{
    color: red;
}


</style>

<body>
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

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="{$url}assets\img\logo\main-logo2.png" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="{$url}assets\img\logo\main-logo2.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
               

                <li class="nav-item dropdown noti-dropdown me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="{$url}assets/img/icons/header-icon-05.svg" alt="">
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{$url}assets/img/profiles/avatar-02.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                                    approved <span class="noti-title">your estimate</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{$url}assets/img/profiles/avatar-11.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">International Software
                                                        Inc</span> has sent you a invoice in the amount of <span
                                                        class="noti-title">$218</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{$url}assets/img/profiles/avatar-17.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Hendry</span> sent
                                                    a cancellation request <span class="noti-title">Apple iPhone
                                                        XR</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="media d-flex">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                    src="{$url}assets/img/profiles/avatar-13.jpg">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">Mercury Software
                                                        Inc</span> added a new product <span class="noti-title">Apple
                                                        MacBook Pro</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{$url}assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{$url}assets/img/profiles/avatar-01.jpg" width="31"
                                alt="Jassa Rich">
                            <div class="user-text">
                                <h6>{name}</h6>
                                <p class="text-muted mb-0">{user_type}</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{$url}assets/img/profiles/avatar-01.jpg" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{name}</h6>
                                <p class="text-muted mb-0">{role}</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="inbox.html">Inbox</a>
                        <a class="dropdown-item" href="{$url}logout">Logout</a>
                    </div>
                </li>

            </ul>

        </div>
