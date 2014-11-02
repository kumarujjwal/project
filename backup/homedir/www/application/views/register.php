<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Zeros | Register</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Register Here</div>
            <form  id='reg_form' action='register_action' method='POST' autocomplete="off"> 
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="name" id='name'class="form-control" placeholder="Full name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" id='user_name'class="form-control" placeholder="User name"/>
                    </div>
                    <div class="form-group" id='user_type'>
                        <select class="form-control" name='type'>
                            <option value="" disabled selected>Select user type</option>
                            <option value='PATIENT'>Patient</option>
                            <option value='DOCTOR'>Doctor</option>
                            <option value="LAB">Laboratory</option>
                        </select>
                    </div>
                    <div class="form-group" >
                        <input type="email" id='email_id' name="email" class="form-control" placeholder="Email ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id ='password_1' class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" id ='password_2' class="form-control" placeholder="Retype password"/>
                    </div>
                     <div class="form-group">
                       <p id='pass_check'></p>
                    </div>
                </div>
                <div class="footer">                    

                    <button type="submit" id='submit'class="btn bg-olive btn-block">Sign me up</button>

                    <a href="login" class="text-center">I already have a membership</a>
                </div>
            </form>

           
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        $('document').ready(function(){
            $('#password_2').keyup(function(){
                var pass2=$('#password_2').val();
                var pass1=$('#password_1').val();
                if(pass1 != pass2)
                {
                    $('#pass_check').html('<span style="color:red">Passwords donot match</span>');
                }
                else 
                {
                     $('#pass_check').html('<span style="color:green">Passwords matched</span>')
                }

            });
        });

        $('#user_name').keyup(function(){
            var user_name=$(this).val();
            $.ajax({
                url : '<?php echo base_url("user/user_exists"); ?>',
                type: "POST",
                data : 'username='+user_name,
                success:function(data){
                    if(data)
                    {
                        $('#user_name_check').html('<span style="color:green">Username Available</span>');
                    }
                    else
                    {
                        $('#user_name_check').html('<span style="color:red">Username unavailable</span>');
                    }
                }
            });

        });
       
        
        </script>

    </body>
</html>