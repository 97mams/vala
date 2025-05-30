<?php

$title = "liste";
ob_start();
?>
    <div class="mt-8 my-6 w-full">
      <h1 class="mt-10 scroll-m-20 pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Page liste</h1>
      <table class="w-full">
        <thead>
          <tr class="m-0 border-t p-0 even:bg-[oklch(0.97 0 0)]">
            <th class="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Nom
            </th>
            <th class="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Genre
            </th>
            <th class="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Type
            </th>
            <th class="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Age
            </th>
            <th class="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> action
            </th>
          </tr>
        </thead>
        <tbody>
            <?php
          foreach ($animals as $animal) {
          echo '
          <tr class="m-0  p-0 even:bg-[oklch(0.97 0 0)]"> 
            <td  class="border px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
              <a href="/animal/'.$animal["id_animale"].'">
                '.$animal['nom_animale'].'
              </a>
             </td>
            <td class="border px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right"> 
              <a href="/animal/'.$animal["id_animale"].'">
                '.$animal["nom_genre"].'
              </a>
            </td>
            <td class="border px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
              <a href="/animal/'.$animal["id_animale"].'">
                '.$animal["nom_type"].'
              </a>
            </td>
            <td class="border px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
              <a href="/animal/".$animal["id_animale"]."">
                '.$animal["age"].'
              </a>
            </td >
            <td class="border px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right"> 
              <div class="flex gap-2">
                <a href="/edit/animal/'.$animal["id_animale"].'" title="modifier" class="hover:bg-orange-400/80 px-2 bg-orange-400 text-orange-200 cursor-pointer rounded">✔</a>
                <form action="/animal"  method="post">
                  <input type="hidden" value="'.$animal["id_animale"].'" name="id">
                  <input title="supprimer" type="submit" value="❌" class="px-2 bg-red-400 hover:bg-red-400/80 text-red-200 rounded cursor-pointer">
                </form>
              </div>
             </td>
            </tr>';
          }
        ?>
      </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
include '../src/vue/layouts/base.php';