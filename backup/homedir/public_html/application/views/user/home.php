
<?php require 'header.php' ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                 <div class='row'>
                  <form method="get" action="<?php echo base_url('home') ?>">
                  <div class='col-lg-4 col-xs-8 col-lg-offset-4 form-group'>
                        <input type="text" name="q" class="form-control" placeholder="Enter Report Name"/>
                  </div>
                  <div class='col-lg-1 col-xs-2  form-group'>
                        <input type="submit" class="form-control" value='Search'/>
                  </div>
                  </form>
                </div>
                 <?php  foreach ($data as $key => $item): ?>
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $item[0]['rname']; ?></h3>
                            </div>
                            <div class="box-body">
                                <p>
                                    Your report: <a target="_blank" href="<?php echo base_url('reports').'/'.$item[0]['fname']; ?>">Click for report</a>
                                </p>
                                <p>
                                    Uploaded on : <?php echo $item[0]['uploaded_on']; ?>
                                </p>
                            </div><!-- /.box-body -->                           
                    <div class="panel box box-danger">
                        <div class="box-header">
                            <h6 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key ;?>" class="collapsed">
                                    Click for comments
                                </a>
                            </h6>
                        </div>
                        <div id="collapse<?php echo $key ;?>" class="panel-collapse collapse" style="height: 0px;">
                            <div class="box-body">
                               <?php foreach ($item as $subitem): ?>
                                <?php if (!$subitem['rid']): ?>

                                <div class="callout callout-info">
                                    <h4>Not sent for review</h4>
                                    <p>Click on the Submit for review button</p>
                                </div>
                                <?php break; ?>
                                <?php else: ?>

                                    <div class="box box-info">
                                        <div class="box-header">
                                            <h6>Review by <?php echo $subitem['d_name'] ?></h6>
                                        </div>
                                        <div class="box-body">
                                            <?php if ($subitem['reviewed'] == '1'): ?>
                                                <p><?php echo $subitem['comments'] ?></p>
                                            <?php else: ?>
                                                <div class="callout callout-info">
                                                    <p>Report under review</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                <?php endif; ?>

                               <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                

                    <a href="#myModal<?php echo $key ?>" role="button" class="btn btn-success" data-toggle="modal">Submit for review</a>


                    <!-- Modal starts here -->


                    <div class="modal fade" id="myModal<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Send report for review</h4>
                          </div>
                          <div class="modal-body">
                                <div class="row">
                                    <!-- left column -->
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Send Report</h3>
                                            </div><!-- /.box-header -->
                                            <!-- form start -->
                                            <form role="form" method="post" action="<?php echo base_url('review/send_for_review'); ?>">
                                                <div class="box-body">
                                                    <input type="text" name="r_id" value="<?php echo $key; ?>" hidden>
                                        
                                                    <div class="form-group col-md-5">

                                                        <label for="doc_name">Enter doctor email</label>
                                                        <input type="email" required name="email" class="form-control" id="doc_name" placeholder="Enter doctor email">
                                                    </div>
                                                </div><!-- /.box-body -->

                                                <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div><!-- /.box -->
                                        </div>
                                        </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Ends here --> 

                </div>
                 <?php endforeach; ?>

                

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<?php require 'footer.php' ?>
