<?php

$title = 'reglage';
$message = "";
if (isset($isReccord) && $isReccord) {
  $message = '<p class="text-green-500 leading-7">Enregitrement réussie. 🚀</p>
 ';
}
ob_start();
?>

<div class="mt-8 my-6 w-full overflow-y-auto">
  <h1 class="mt-10 scroll-m-20 pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Page de réglages</h1>
  <p class="leading-7 [&:not(:first-child)]:mt-6">Vous pouvez ajouter ici tous les vaccins conserner à la traitement de vos animalaux.</p>
  <div>
    <h3 class="mt-8 scroll-m-20 text-2xl font-semibold tracking-tight">Formulaire du type d'élevage</h3>
    <form action="/setting" method="post">
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
  </div>

  <div>
    <h3 class="mt-8 scroll-m-20 text-2xl font-semibold tracking-tight">Formulaire du traitement</h3>
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
        <label for="genre" class= "text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Type d'élévage:</label>
        <select
          type="text" 
          name="genre" 
          id="type" 
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
  </div>
  <div class="w-full">
      <h3 class="mt-8 mb-3 scroll-m-20 text-2xl font-semibold tracking-tight">Liste de reglages</h3>
      <table class="w-full border border-[#171717]">
        <thead>
          <tr>
            <th class="border border-[#171717]">Type</th>
            <th class="border border-[#171717]">Nom</th>
            <th class="border border-[#171717]">Description</th>
            <th class="border border-[#171717]">Durée par mois</th>
            <th class="border border-[#171717]">Elevages</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($treatments as $treatment) {
            echo '
            <tr class="m-0 border-t p-0 even:bg-[oklch(0.97 0 0)]"> 
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$treatment['type'].'
              </td>
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$treatment['nom_traitement'].'
              </td>
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$treatment['description'].'
              </td>
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$treatment['duree'].'
              </td>
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$treatment['status'].'
              </td>
            </tr>';
          }
          
          ?>
        </tbody>
      </table>
  </div>
</div>

<?php
$content = ob_get_clean();

include '../src/vue/layouts/base.php';
