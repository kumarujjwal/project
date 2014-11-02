<?php  require 'header.php' ?>

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


      <?php  require 'footer.php' ?>