<?php

if (isset($_GET['treatment']) && $_GET['treatment']) {
  $message = '<p class="text-green-500 leading-7">Enregitrement réussie. 🚀</p>';
} else {
  $message = '<p class="text-red-500 leading-7">Enregitrement échouer. 💥</p>';
}
?>

<form action="/setting/treatment" method="post">
      <div>
        <label for="name" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Ajouter le type du traitement(ex: vaccination ou pile):</label>
        <input 
          type="text" 
          name="name" 
          id="name"
          required 
          class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
          >
      </div>
      <div>
        <label for="type" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Ajouter le nom du traitement:</label>
        <input 
          type="text" 
          name="type" 
          id="type"
          required 
          class="flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
          >
      </div>
      <div>
        <label for="description" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Ajouter la description:</label>
        <textarea 
          type="text" 
          name="description" 
          id="description"
          required 
          class="flex w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
          ></textarea>
      </div>
      <div>
        <label for="duration" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Ajouter la durration de rappel (ex: tout le 30 jours):</label>
        <input 
          type="text" 
          name="duration" 
          id="duration"
          required 
          class=" w-sm flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
          >
      </div>
      <div>
        <label for="id_breed" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Type d'élévage:</label>
        <select
          type="text" 
          name="idBreed" 
          id="id_breed" 
          class="flex h-9 w-sm rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
          required
          >
          <?php 
          foreach ($breed as $value) {
            echo '<option value="'.$value['id_type'].'">'.$value["nom_type"].'</option>';
          }
          ?>
        </select>
        </div>
        <?=$message?>
      <button type="submit" class="mt-8 h-9 px-4 py-2 bg-[#171717] cursor-pointer text-[#fafafa] shadow-sm hover:bg-gray-700 inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#a1a1a1] disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-4 [&_svg]:shrink-0">
        Ajouter
      </button>
    </form>