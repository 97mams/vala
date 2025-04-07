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

<div class=" w-full h-[50px] border-b border-gray-200 flex items-center justify-between sticky">
  <h1 class="text-2xl font-bold ml-60">Fahitra</h1>
  <ul class="flex gap-3 mr-60">
    <li><a href="/" class="hover:underline <?php if($uri == '/') echo 'underline' ?>">liste</a></li>
    <li><a href="/register" class="hover:underline <?php if($uri == '/register') echo 'underline' ?>">ajouter</a></li>
  </ul>
</div>
<div class="w-full flex">
  <div class="w-md h-full"></div>
  <div class="w-full h-full">
  <?php echo $content?>
  </div>
  <div class="w-md h-full"></div>
</div>


<script>
 <?php include '../src/assets/js/tailwind.js' ?>
</script>

</body>
</html>
