<?php

if (isset($_GET['breed'])) {
  if ($_GET['breed']) {
    $message = '<p class="text-green-500 leading-7">Enregitrement réussie. 🚀</p>
   ';
  } else {
    $message = '<p class="text-red-500 leading-7">Enregitrement échouer. 💥</p>';
  }
}

?>

<form action="/setting/breed" method="post">
      <div>
        <label for="type_animal" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Type d'élevage:</label>
        <input 
          type="text" 
          name="type_animal" 
          id="type_animal"
          required 
          class=" w-sm flex h-9 w-full rounded-md border border-[ #e6e6e6] bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-[oklch(0.145 0 0)] placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[oklch(0.708 0 0)] disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
          >
          <?=$message?>
      </div>
      <button type="submit" class="mt-8 h-9 px-4 py-2 bg-[#171717] cursor-pointer text-[#fafafa] shadow-sm hover:bg-gray-700 inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#a1a1a1] disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-4 [&_svg]:shrink-0">
        Ajouter
      </button>
  </form>