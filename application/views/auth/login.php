<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{title}</title>
    <!-- jquery -->
     <script src="{$url}assets/auth/vendor/jquery/jquery.min.js"></script>
    <script src="{$url}node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{$url}assets/auth/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{$url}assets/auth/css/style.css">
    <!-- sweetalart2 -->
    <script src="{$url}node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="{$url}node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- toastr -->
    <!-- <script src="{$url}node_modules/toastr/build/toastr.min.js"></script> -->
    <link rel="stylesheet" href="{$url}node_modules/toastr/build/toastr.min.css">
    
    
</head>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    .main{
        width: 100%;
        height: 100vh !important;
        padding: 0 !important;
        /* background: url('{$url}assets/auth/images/background.jpg'); */
        background-size: cover;
        background-color: inherit;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 1;
    }

    

  

    label.error {
    color: red;
}

input.error {
    color: red;
    border-bottom: 1px solid red;
}

input.valid {
    color: green;
}
</style>

<body>
    <?php
    $username = get_cookie('name');
    $password = get_cookie('password');
    ?>
  <div class="main">
   <!-- <div class="overlay">
</div> -->

        <!-- Sign up form -->
 

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container" id="signin-container">
                <?php if ($this->session->flashdata('error')){ ?>
                <script>
                    let timerInterval
                    Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    timer: 2000,
                    timerProgressBar: true,
                    text: "<?php echo $this->session->flashdata('error'); ?>",
                    didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                        })
                </script>
                <?php } ?>

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
                <?php } ?>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{$url}assets/images/logo.png" alt="sing up image"></figure>
                        <a href="{$url}register" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log in</h2>
                        <form method="POST" action="{$url}auth" class="register-form" id="login">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Reg Number" value="<?php echo $username; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
  
    <script src="{$url}assets/auth/js/main.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#login').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    password: {
                        required: true,
                        minlength: 2
                    }
                },
                messages: {
                    name: {
                        required: "Please enter Reg Number",
                        minlength: "Your username must consist of at least 5 characters"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>
</body>

</html>