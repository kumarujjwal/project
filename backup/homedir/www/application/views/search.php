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
                    <?php if($this->session->userdata('username') != null) { ?>
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success" id='message_count'></span>
                            </a>
                           
                        </li>
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
                        <?php } 
                        else {?>
                        	<li>
                        	    <a href="<?php echo base_url('user/login'); ?>">
                        	       
                        	        <span>Login</span>
                        	    </a>
                        	    
                        	</li>

                        <?php } ?>
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
                    
                    <?php if ($this->session->userdata('username') != null) {?>
                        <div class="pull-left info">
                            <p><?php echo 'Hello, '.$this->session->userdata('name'); ?></p>

                    
                        </div>
                    <?php } ?>
                    </div>
                    <!-- search form -->
                    
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
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
                  <form method="get" action="<?php echo base_url('user/search') ?>">
                  <div class='col-lg-4 col-xs-8 col-lg-offset-4 form-group'>
                        <input type="text" name="email" class="form-control" placeholder="Enter email"/>
                  </div>
                  <div class='col-lg-1 col-xs-2  form-group'>
                        <input type="submit" class="form-control" value='Search'/>
                  </div>
                  </form>
                </div>

                <?php if (sizeof($data) == 0) { ?>
                	<!-- No results -->
                	<div class="well">
                		No results found.
                	</div>
                <?php } else {?>
                	<?php foreach($data as $item): ?>
                		<div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title"><a target="_blank" href="<?php echo base_url('public_profile/index/'. $item['id']); ?>"><?php echo $item['name']; ?></a></h3>
                            </div>
                            <div class="box-body">
                                <p>
                                	<b>City</b> : <span>
                                		<?php
                                			if ($item['city']) {
                                				echo $item['city'];
                                			}
                                			else {
                                				echo 'Unspecified';
                                			}
                                		?>

                                	</span>
                                </p>


                            </div><!-- /.box-body --> 
                        </div>
                	<?php endforeach; ?>
                        
                <?php }?>

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
       window.setInterval(function(){
       		$.get('',function(data){
       			console.log(data);
       			if(data)
       			{
       				$('#message_count').html(date);
       			}
       		})
       },5000);
       </script>        

    </body>
</html>