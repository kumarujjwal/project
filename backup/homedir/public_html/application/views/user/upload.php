<?php require 'header.php' ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                 <div class="row">
                        <!-- left column -->
                        <div class="col-md-12 col-xs-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Upload Report</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php echo form_open_multipart('upload/patient_uploadreport');?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Report name</label>
                                            <input type="text" class="form-control" name="rname" id="exampleInputEmail1" placeholder="Enter report name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" name="userfile" id="exampleInputFile" required>
                                            <p class="help-block">Upload the report file.</p>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php require 'footer.php' ?>