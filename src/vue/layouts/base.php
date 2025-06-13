<?php

$uri = $_SERVER['REQUEST_URI'];
$nuber = 3;
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

<div class=" w-full h-[4rem] border-b border-gray-300 flex items-center justify-between sticky">
  <h1 class="text-2xl font-bold ml-60">Fahitra</h1>
  <ul class="flex items-center gap-3 mr-60">
    <li><a href="/" class="hover:underline <?php if($uri == '/') echo 'underline' ?>">liste</a></li>
    <li><a href="/register" class="hover:underline <?php if($uri == '/register') echo 'underline' ?>">ajouter</a></li>
    <li><a href="/setting" class="hover:underline <?php if($uri == '/setting') echo 'underline' ?>">Réglages</a></li>
    <li id="btn-notification" class="cusrsor-pointer">
      <img class="w-7 z-10" src="./notification (1).png" alt="notification">
      <div class="flex absolute z-40 top-4 right-59 bg-white justify-center items-center w-5 h-5 border-2 rounded-full text-sm text-red-500 border-red-500">
      <?=$nuber ?>
      </div>
    </li>
  </ul>
</div>
<div class="w-full flex">
  <div class="md:w-md"></div>
  <div class="w-full min-h-[calc(100vh-10rem)] z-10">
    <?php echo $content?>
  </div>
  <!-- notification -->
    <div id="notification" class="hidden border border-gray-300 bg-white px-2 pb-2 w-90 absolute right-60 z-40 top-18  rounded ">
      <h1 class="font-bold leading-7 [&:not(:first-child)]:mt-6"># notification</h1>
      <div class="w-full max-h-[calc(100vh-10rem)] overflow-auto">
        <?php include '../src/vue/page/notification.php' ?>
      </div>
    </div>
  <!--  -->
  <div class="w-md h-full"></div>
</div>

<div class="w-full h-[4rem] mt-8 bg-[#171717] text-sm text-[#fafafa] text-center flex items-center justify-center">
  <p>building by <i class="underline">anjaniainamamisoa@gmail.com</i> <br> github <a href="https://97mams.git">97mams</a></p>
</div>
<script>
  <?php include '../src/assets/js/app.js' ?>
  <?php include '../src/assets/js/tailwind.js' ?>
</script>

</body>
</html>
