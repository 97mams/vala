<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <style>
   
  </style>
</head>
<body>

<div class=" w-full h-[50px] border-b border-gray-200 flex items-center sticky">
  <h1 class="text-2xl font-bold ml-60">Fiompiana</h1>
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
