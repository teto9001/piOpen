<?php
print_r(str_replace("\n","<br>",shell_exec('cd /var/www && git pull origin'));
?>