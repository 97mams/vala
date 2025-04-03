<?php
$title = "project";

ob_start();

echo 'mety';
echo $name;

$content = ob_get_clean();
include '../src/vue/layouts/base.php';
?>