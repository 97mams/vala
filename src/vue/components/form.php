<?php
$action = "";
$title = "";
$defaultValue = false;
if(empty($animal['id_animale'])) {
  if (isset($_GET['error'])) {
    $animal = $_GET;
    $typeFilter = array_filter($type, function ($type){
      if($type['id_type'] === $_GET['id_type']) return $type;
    });
    $genreFilter = array_filter($genre, function ($genre){
      if($genre['id_genre'] === $_GET['id_genre']) return $genre;
    });
    $animal += $typeFilter[2]; 
    $animal += $genreFilter[0];
  }
  $action = "/store";
  $title = "Page d'ajout";
} else {
  $defaultValue= true;
  $action = "/update";
  $title = "Page d'édite";
}
?>

<div class="w-full pt-8">
<h2 class="scroll-m-20 pb-2 text-3xl font-semibold tracking-tight first:mt-0"><?=$title?></h2>
<p class="text-red-500 leading-7"><?php if(isset($_GET['error']) && $_GET['error'] == 1) echo "Le nom a été déjas exister vous pouvez le changer ?"?></p>
<div>
  <form action="<?=$action?>" method="post">
    <input type="hidden" name="id" value="<?=$animal["id_animale"]?>">
    <label for="name" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Nom</label>
    <input 
      type="text" 
      name="name" 
      id="name"
      required 
      class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
       value="<?=$animal["nom_animale"]?>"-
    >
    <label for="genre" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Genre</label>
    <select
      type="text" 
      name="genre" 
      id="type" 
      class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
      required
      >
      <?php 
      if ($defaultValue) {
        echo '<option value="'.$animal['id_genre'].'">'.$animal["nom_genre"].'</option>';
      }
      foreach ($genre as $value) {
        echo '<option value="'.$value['id_genre'].'">'.$value["nom_genre"].'</option>';
      }
      ?>
      </select>
     <label for="type" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Type</label> 
     <select
      type="text" 
      name="type" 
      id="type" 
      class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
      required
      >
      <?php 
      if ($defaultValue) {
        echo '<option value="'.$animal['id_type'].'">'.$animal["nom_type"].'</option>';
      }
      foreach ($type as $value) {
        echo '<option value="'.$value['id_type'].'">'.$value["nom_type"].'</option>';
      }
      ?>
      </select>
     <label for="age" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Age</label> 
     <input 
     type="text" 
     name="age" 
     id="age" 
     class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
     value="<?=$animal["age"]?>"
    required
     >
      
    <button type="submit" <?php if(empty($type)) echo 'disabled'?>  class="mt-8 h-9 px-4 py-2 bg-[#171717] cursor-pointer text-[#fafafa] shadow-sm hover:bg-gray-700 inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#a1a1a1] disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-4 [&_svg]:shrink-0"
  >Enregistrer
  </button>
  </form>
</div>
</div>
