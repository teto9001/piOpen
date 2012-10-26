<!-- v0001 -->
<?php include('includes/top.php'); ?>

    <div class="container">
     <div class="span8 offset2 well">
      <h1 style="color:#D00;">Settings</h1>
      Current www branch version: <?php exec('cd /var/www && git rev-parse HEAD'); ?><br/>
      Online www branch version: <br/>

      <a href="update.php">Update</a>
     </div>
    </div> <!-- /container -->

<?php include('includes/bottom.php'); ?>
