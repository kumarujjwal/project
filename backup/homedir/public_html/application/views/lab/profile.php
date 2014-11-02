<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Zeros</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
      
        <!-- bootstrap wysihtml5 - text editor -->
         <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" type="text/css" />
        <!-- Theme style -->
         <link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.css" type="text/css" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url('home'); ?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Zeros
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                       
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('name');?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <p>
                                       <?php echo $this->session->userdata('name');?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('profile/'); ?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('user/logout_action');?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                    
                        <div class="pull-left info">
                            <p><?php echo 'Hello '.$this->session->userdata('name'); ?></p>

                    
                        </div>
                    </div>
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo base_url('home'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('upload'); ?>">
                                <i class="fa fa-th"></i> <span>Upload Report</span> 
                            </a>
                        </li> 
                        <li>
                            <a href="<?php echo base_url('user/search'); ?>">
                                <i class="fa fa-th"></i> <span>Find Doctors</span> 
                            </a>
                        </li>  
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
               

                <!-- Main content -->
                <section class="content">
                    <div class='row'>
                    <div class='col-lg-8 col-lg-offset-2 col-xs-12'>
                        <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Profile</h3>
                                    <button class='btn btn-sm  pull-right' style='margin-top:5px'>Edit</button>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form" action='<?php echo base_url('profile/saveChanges');?>' method='POST'>
                                        <!-- text input -->
                                        <div class="form-group" >
                                            <label>Name</label>
                                            <input type="text" class="form-control editable" placeholder="Name" name="name" value='<?php echo $name?>' disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>User name</label>
                                            <input type="text" class="form-control" name="username" value='<?php echo $username?>' disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value='<?php echo $email ?>'disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Address Line 1</label>
                                            <input type="text" class="form-control editable"  name="addr1" placeholder="Line 1" value='<?php echo $addrline1?>' disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Address Line 2</label>
                                            <input type="text" class="form-control editable"  name="addr2" placeholder="Line 1" value='<?php echo $addrline2?>' disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control editable" name="city" placeholder="Line 1" value='<?php echo $city?>' disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control editable" name="state" placeholder="Line 1" value='<?php echo $state?>' disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Pin</label>
                                            <input type="text" class="form-control editable"  name="pin" placeholder="Line 1" value='<?php echo $pin?>' disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control editable" name="phone"  placeholder="Line 1" value='<?php echo $phone?>' disabled>
                                        </div>
                                        <div class="form-group">
                                           <input type="submit"  name="" class="form-control editable btn btn-primary"  disabled>
                                        </div>
                                    </form>
                                </div><!-- /.box-body -->
                            </div>
                    </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
       
        
        <!-- Sparkline -->
        
        <!-- jvectormap -->
        
        <!-- jQuery Knob Chart -->
        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?=base_url()?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?=base_url()?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

       <script type="text/javascript">
       $('document').ready(function(){
            $('button').click(function(){
                $('.editable').each(function(){
                    $(this).attr('disabled',false);
                });
            });


       });
       </script>
        

    </body>
</html>