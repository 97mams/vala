<?php
$action = "";
$title = "";
if(empty($animal['id'])) {
  $action = "/store";
  $title = "Page d'ajout";
} else {
  $action = "/update";
  $title = "Page d'édite";
}
?>

<div class="w-full">
<h2 class="scroll-m-20 pb-2 text-3xl font-semibold tracking-tight first:mt-0"><?=$title?></h2>
<div class="w-full flex gap-2">
  <form action="<?=$action?>" method="post" class="flex flex-col gap-2">
   <div class="flex flex-col w-full">
    <label for="name" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Nom</label>
    <input 
      type="text" 
      name="name" 
      id="name"
      required 
      class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
       value="<?=$animal["name"]?>"-
    >
   </div>
   <div class="flex  flex-col">
    <label for="genre" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Genre</label>
    <input 
      type="text" 
      name="name" 
      id="genre"
      required 
      class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
       value="<?=$animal["genre"]?>"
      >
  </div>

   <div  class="flex flex-col">
     <label for="type" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Type</label> 
     <input 
      type="text" 
      name="type" 
      id="type" 
      class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
      value="<?=$animal["type"]?>"
      required
      >
   </div>

   <div  class="flex flex-col">
     <label for="age" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Age</label> 
     <input 
     type="text" 
     name="age" 
     id="age" 
     class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
     value="<?=$animal["age"]?>"
    required
     >
   </div>
  <?php
    if ($action == '/store') {
      echo '
      <div  class="flex flex-col">
        <label for="sexe-animal"  class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Sexe</label>
        <select name="sexe" id="sexe-animal"class="flex h-9 w-full rounded-md border border-[oklch(0.922 0 0)] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
      >
          <option value="male">male</option>
          <option value="female">femele</option>
        </select>   
      </div>';
    } 
  ?>
      
    <button type="submit" class="h-9 px-4 py-2 bg-[#171717] cursor-pointer text-[#fafafa] shadow-sm hover:bg-gray-700 inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#a1a1a1] disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-4 [&_svg]:shrink-0"
  >Enregistrer
  </button>
  </form>
</div>
</div>
