<!-- v0001 -->
<?php include('includes/top.php'); ?>

    <div class="container">
     <div class="span8 offset2 well">
      <h1 style="color:#D00;">Settings</h1>
      Current www branch version: <?php print(shell_exec('cd /var/www && git rev-parse HEAD')); ?><br/>
      Online www branch version: <br/>

      <a href="#" id="cmdupdate" class="btn btn-primary">Update</a>
      <div id="updateresult"></div>
      <script type="text/javascript">
      $("#cmdupdate").click(function(){
        $(this).text("Update started...");
        $.ajax({
              url: "includes/update.php"
            }).done(function(data) { 
               $("#updateresult").text(data);
               $("#updateresult").addClass("alert alert-success");
               $("#cmdupdate").text("Updated.")
            });
      });
      </script>
     </div>
    </div> <!-- /container -->

<?php include('includes/bottom.php'); ?>
