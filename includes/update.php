<?php
require_once "git.php";
$repo = Git::open('/var/www');
print $repo->run('reset --hard');
print '<br>';
print $repo->run('pull origin');
?>