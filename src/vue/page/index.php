<?php

$title = "project";

ob_start();

$content = ob_get_clean();
include '../src/vue/layouts/base.php';