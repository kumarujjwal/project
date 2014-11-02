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

       $('document').ready(init);


       function init() {
            poll_for_notifs();
            $('.edit').click(function(){
              $(this).hide();
              var par = $(this).parent();
              $('textarea#comments').removeAttr('disabled');
              $('.com-update', par).show();
            })
       }

       function poll_for_notifs() {
            $.ajax({
                url : "<?php echo base_url('notification/fetch_unread'); ?>",
                method: "get",
              
                success: function(response) {
                    console.log(response);
                    $('.messagecount').html(response.length);
                    for(var i=0;i<response.length;i++)
                    {
                      $('#message_content').prepend('<a href="#"><h4>For review</h4><p>'+response[i]["message"]+'</p></a>');
                    }
                }
            });


       }


        $('button').click(function(){
                $('.editable').each(function(){
                    $(this).attr('disabled',false);
                });
            });
       </script>   

    </body>
</html>