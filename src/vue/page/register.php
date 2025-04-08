<?php
$title = "register";

ob_start();

if (empty($type)) {
  echo ' 
  <div class="bg-red-100 border border-red-400 rounded py-8 px-4 mt-8">
    <p class="text-red-400 leading-7 [&:not(:first-child)]:mt-6">Remplir les champs dans vos réglages.</p>
  </div>
  ';
}
include('../src/vue/components/form.php');
$content = ob_get_clean();
include '../src/vue/layouts/base.php';

