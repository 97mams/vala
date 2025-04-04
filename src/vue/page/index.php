<?php
$title = "project";

ob_start();

dd($animals);

$content = ob_get_clean();
include '../src/vue/layouts/base.php';
?>