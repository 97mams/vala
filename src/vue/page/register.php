<?php
$title = "register";

ob_start();
?>
<div class="w-full">
  <h1 class="text-xl font-bold text-gray-400 my-8">Page d'ajout</h1>
  <div class="w-full flex gap-2">
    <form action="/store" method="post" class="flex flex-col gap-2">
     <div class="flex flex-col">
      <label for="name">Nom</label>
      <input type="text" name="name" id="name" class="border border-gray-400 rounded px-2 py-2">
     </div>
     <div class="flex  flex-col">
       <label for="genre">Genre</label>
       <input type="text" name="genre" id="genre" class="border border-gray-400 rounded  px-2 py-2">
     </div>

     <div  class="flex flex-col">
       <label for="type">Type</label> 
       <input type="text" name="type" id="type" class="border border-gray-400 rounded  px-2 py-2">
     </div>

     <div  class="flex flex-col">
       <label for="age">Age</label> 
       <input type="text" name="age" id="age" class="border border-gray-400 rounded  px-2 py-2">
     </div>
     
     <div  class="flex flex-col">
       <label for="sexe-animal">Sexe</label>
       <select name="sexe" id="sexe-animal" class="border border-gray-400 rounded  px-2 py-2">
         <option value="male">male</option>
         <option value="female">femmele</option>
       </select>   
     </div>
        
      <input type="submit" value="Enregistrer" class="bg-blue-500 py-2 px-2 my-8 rounded text-white cursor-pointer">
    </form>
  </div>
</div>
      
<?php
$content = ob_get_clean();
include '../src/vue/layouts/base.php';

