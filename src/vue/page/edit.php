<?php
$title = "register";

ob_start();
include('../src/vue/components/form.php');
$content = ob_get_clean();
include '../src/vue/layouts/base.php';
