<?php

$uri = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <style>
   <?php include '../src/assets/css/style.css' ?>
  </style>
</head>
<body>

<div class=" w-full h-[4rem] border-b border-gray-200 flex items-center justify-between sticky">
  <h1 class="text-2xl font-bold ml-60">Fahitra</h1>
  <ul class="flex gap-3 mr-60">
    <li><a href="/" class="hover:underline <?php if($uri == '/') echo 'underline' ?>">liste</a></li>
    <li><a href="/register" class="hover:underline <?php if($uri == '/register') echo 'underline' ?>">ajouter</a></li>
    <li><a href="/setting" class="hover:underline <?php if($uri == '/setting') echo 'underline' ?>">Réglages</a></li>
  </ul>
</div>
<div class="w-full flex">
  <div class="w-md"></div>
  <div class="w-full min-h-[calc(100vh-10rem)]">
  <?php echo $content?>
  </div>
  <div class="w-md h-full"></div>
</div>

<div class="w-full h-[4rem] mt-8 bg-[#171717] text-sm text-[#fafafa] text-center flex items-center justify-center">
  <p>building by <i class="underline">anjaniainamamisoa@gmail.com</i> <br> github <a href="https://97mams.git">97mams</a></p>
</div>
<script>
 <?php include '../src/assets/js/tailwind.js' ?>
 <?php include '../src/assets/js/app.js' ?>
</script>

</body>
</html>
