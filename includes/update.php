<?php
require_once "git.php";
$repo = Git::open('/var/www');
print "<b>www</b><br>";
print $repo->run('reset --hard');
print '<br>';
print $repo->run('pull origin');
print '<br>';
$repo2 = Git::open('/var/piopen');
print "<b>shellScripts</b><br>";
print $repo2->run('reset --hard');
print '<br>';
print $repo2->run('pull origin');
?>