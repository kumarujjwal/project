
<?php require 'header.php' ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                

                <!-- Main content -->
                <section class="content">
                 
                 <?php  foreach ($data as $item): ?>
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title"><?php echo $item['rname']; ?></h3>
                            </div>
                            <div class="box-body">
                                <p>
                                    Your report: <a target="_blank" href="<?php echo base_url('reports').'/'.$item['fname']; ?>">Click for report</a>
                                </p>
                                <p>
                                    Uploaded on : <?php echo $item['uploaded_on']; ?>
                                </p>
                                <?php if($item['rid']){ ?>
                                <p><b>Doctor Name</b>: <?php echo $item['d_name'] ?></p>
                                <?php } ?>
                            </div><!-- /.box-body -->                           

                <?php
                    if ($item['reviewed'] == '1') {
                ?>
                    <div class="panel box box-danger">
                        <div class="box-header">
                            <h6 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $item["id"] ;?>" class="collapsed">
                                    Click for comments
                                </a>
                            </h6>
                        </div>
                        <div id="collapse<?php echo $item["id"] ;?>" class="panel-collapse collapse" style="height: 0px;">
                            <div class="box-body">
                               <?php echo $item["comments"]; ?>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                    else if($item['rid']){
                ?>        

                    <!-- Sent for review -->
                    <div class="callout callout-info">
                        <h4>Review Status</h4>
                        <p>Your report is under review.</p>
                    </div>    
                <?php
                    }
                   else
                   {     
                ?>

                    <a href="#myModal<?php echo $item['id'] ?>" role="button" class="btn btn-success" data-toggle="modal">Submit for review</a>


                    <!-- Modal starts here -->


                    <div class="modal fade" id="myModal<?php echo $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                    <input type="text" name="r_id" value="<?php echo $item['id']; ?>" hidden>
                                        
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

                <?php
                    }
                ?>

                </div>
                 <?php endforeach; ?>

                

                </section><!-- /.content -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->

<?php require 'footer.php' ?>
