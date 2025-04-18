<?php
$title = "register";

if (isset($_GET['message']) && $_GET['message'] === 1) {
  echo ' 
  <div class="bg-blue-100 border border-bleu-400 rounded py-8 px-4 mt-8">
    <p class="text-bleu-400 leading-7 [&:not(:first-child)]:mt-6">Modification réussi !</p>
  </div>
  ';
}

ob_start();
include('../src/vue/components/form.php');
$content = ob_get_clean();
include '../src/vue/layouts/base.php';
