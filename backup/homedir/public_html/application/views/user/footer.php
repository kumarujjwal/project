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

       var notifications_clicked= false;

       $('document').ready(init);


       function init() {
            window.setInterval(poll_for_notifs, 5000);
            
            $('.edit').click(function(){
              $(this).hide();
              var par = $(this).parent();
              $('textarea#comments').removeAttr('disabled');
              $('.com-update', par).show();
            });
       }

       function poll_for_notifs() {
            $.ajax({
                url : "<?php echo base_url('notification/fetch_unread'); ?>",
                method: "get",
              
                success: function(response) {
                    console.log(response.length);
                    console.log(response);
                    $('.messagecount').html(response.length);
                    $('#message_content').html('');
                    for(var i=0;i<response.length;i++)
                    {
                      $('#message_content').prepend('<li><a href="#"><h4 class="notifications" id='+response[i]["id"]+'>For review</h4><p>'+response[i]["message"]+'</p></a></li>');
                    }
                }
            });


       }

       var id_array=[];
        $('button').click(function(){
                $('.editable').each(function(){
                    $(this).attr('disabled',false);
                });
            });
        $(document).click(function(){
          console.log('click');
          if(notifications_clicked)
          {
           send_notifications_ids();
          }
        });

        $("#notifications_bell").click(function(){
          console.log('not bell');
          notifications_clicked = true;
          if(!$('#message_content').is(':visible'))
          {
              console.log('is visible');
          }
          else
          {
              console.log('not visible');
              send_notifications_ids();
          }
        });

        function send_notifications_ids()
        {
           id_array=[];
            $('.notifications').each(function(){
              var id=$(this).attr('id');
              
              id_array.push(id);
            });
            console.log(id_array);
            notifications_clicked=false;
          $.ajax({
            url:'<?php echo base_url("notification/mark_read")?>',
            method:'POST',
            data:'ids='+id_array,
            success:function(response){
              console.log(response);
              $('#message_content').html('');
              $('.messagecount').html('0');
            }
          });
        }
       </script>   

    </body>
</html>