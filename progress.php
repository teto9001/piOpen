<!-- v0001 -->
<?php include('includes/top.php'); ?>

    <div class="container">
<div class="row">
	<div class="span10 offset2">
		<h2>What I have done, so far.</h2>
		<h3>> October 2012</h3>
		<h5>>> Basic functionality</h5>
		The Raspberry PI is connected to the Internet, and it can open an automatic gate, from its web page. <br>
This is an example link from an android device, pointing to http://the.openPi.address/index.php?open=true.<br>
<ul class="thumbnails">
	<li class="span2">
		<a href="img/screens/andhome.png" class="thumbnail">
			<img src="img/screens/andhome.png">
		</a>
	</li>
</ul>
<br>
And the resulting page:<br>
<ul class="thumbnails">
        <li class="span2">
                <a href="img/screens/andopen.png" class="thumbnail">
                        <img src="img/screens/andopen.png">
                </a>
        </li>
</ul>
<br>
<h5>>> Basic web interface</h5>
From the status page you can open the gate and check the firmware (software?) version.
<ul class="thumbnails">
        <li class="span4">
                <a href="img/screens/status.png" class="thumbnail">
                        <img src="img/screens/status.png">
                </a>
        </li>
</ul>
<br>
From the settings page you can setup the hardware relay closing time. Settings above 100ms and over 10s are ignored (most eletric locks' coils can break if driven for too long.
<ul class="thumbnails">
        <li class="span4">
                <a href="img/screens/settings.png" class="thumbnail">
                        <img src="img/screens/settings.png">
                </a>
        </li>
</ul>

	</div>
</div>




    </div> <!-- /container -->

<?php include('includes/bottom.php'); ?>
