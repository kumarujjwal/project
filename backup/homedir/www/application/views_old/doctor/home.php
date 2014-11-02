<?php require 'header.php' ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">

                <?php
                    if (sizeof($data) == 0) {
                ?>
                    No reports to review
                <?php
                    }
                    else {

                ?>

                <?php foreach($data as $item): ?>

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
                            <p>
                                Patient Name: <?php echo $item['name']; ?>
                            </p>
                        </div><!-- /.box-body -->     

                        <?php if ($item['reviewed'] == '1'){ ?>   
                            <!-- If report is reviewed -->

                            <div class="panel box box-danger">
                                <div class="box-header">
                                    <h6 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $item["rid"] ;?>" class="collapsed">
                                            Your comment
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapse<?php echo $item["rid"] ;?>" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="box-body">
                                      
                                      <div class="row">
                                                                              <!-- left column -->
                                          <div class="col-md-12">
                                              <!-- general form elements -->
                                              <div class="box box-primary">
                                                  <div class="box-header">
                                                      <h3 class="box-title"></h3>
                                                  </div><!-- /.box-header -->
                                                  <!-- form start -->
                                                  <form role="form" method="post" action="<?php echo base_url('review/update_review'); ?>">
                                                      <div class="box-body">
                                                          <input type="text" name="id" value="<?php echo $item['rid']; ?>" hidden>
                                              
                                                          <div class="form-group col-md-5">

                                                              <label for="comments"></label>
                                                              <textarea disabled required name="comments" class="form-control" id="comments" placeholder="Enter comments"><?php echo $item['comments']; ?></textarea>
                                                          </div>
                                                      </div><!-- /.box-body -->

                                                      <div class="box-footer">
                                                          <button style="display:none" type="submit" class="com-update btn btn-primary">Submit</button>
                                                          
                                                      </div>
                                                  </form>
                                                  <button class="btn btn-danger edit">Edit</button>
                                              </div><!-- /.box -->
                                         </div>
                                     </div>     
                                      

                                    </div>
                                </div>
                            </div>   

                         <?php
                        } 

                        else {
                        ?>

                         <!-- If report is not reviewed -->
                         <div class="panel box box-danger">
                             <div class="box-header">
                                 <h6 class="box-title">
                                     <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $item["rid"] ;?>" class="collapsed">
                                         Click to comment
                                     </a>
                                 </h6>
                             </div>
                             <div id="collapse<?php echo $item["rid"] ;?>" class="panel-collapse collapse" style="height: 0px;">
                                 <div class="box-body">
                                        
                                    <div class="row">
                                        <!-- left column -->
                                        <div class="col-md-12">
                                            <!-- general form elements -->
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title">Comment</h3>
                                                </div><!-- /.box-header -->
                                                <!-- form start -->
                                                <form role="form" method="post" action="<?php echo base_url('review/update_review'); ?>">
                                                    <div class="box-body">
                                                        <input type="text" name="id" value="<?php echo $item['rid']; ?>" hidden>
                                            
                                                        <div class="form-group col-md-5">

                                                            <label for="comments">Enter comments</label>
                                                            <textarea required name="comments" class="form-control" id="comments" placeholder="Enter comments">
                                                            </textarea>
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
                             </div>
                         </div>   

                        <?php
                        }

                        ?>


                    </div>

                <?php endforeach; ?>

                    
                <?php        
                    }
                ?>


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


       <?php require 'footer.php' ?>