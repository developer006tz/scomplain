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
</head>
<style>
    *{
        padding: 0;
        margin: 0;
    }
     .main{
        width: 100%;
        height: calc(100vh - 40px) !important;
        padding: 0 !important;
        /* background: url('{$url}assets/auth/images/background.jpg'); */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
       
    }

    #container{
        margin-top: 40px;
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
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container" id="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        
                        <form method="POST" class="register-form" id="register">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="reg" id="reg" placeholder="Registration Number" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree_term" id="agree-term" class="agree-term" checked disabled/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>already member <a href="{$url}login" class="term-service">Login</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                            <div class="form-group">
                             <?php if ($this->session->flashdata('error')): ?>
                                <div class="bg-danger text-danger"><?= $this->session->flashdata('error') ?></div>
                                
                               
               
                        <?php endif; ?>
                    </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{$url}assets/images/logo.png" alt="sing up image"></figure>
                        <!-- <a href="{$url}login" class="signup-image-link">I am already member</a> -->
                       
                    </div>
                </div>
            </div>
        </section>

      
    </div>

    <!-- JS -->
   
    <script src="{$url}assets/auth/js/main.js"></script>
    
    <script>
        $("#register").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                reg: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 3
                },
                re_pass: {
                    required: true,
                    minlength: 3,
                    equalTo: "#password"
                },
                agree_term: "required"
            },
        submitHandler: function(form) {
            form.submit();
        }
        });

        
    </script>
    <script>
        $().ready(function() {
            $("label.error").css({
            //"border-bottom": "1px solid red",
           // "background-color": "lightpink",
            "color": "red"
            });

        });
    </script>
</body>

</html>