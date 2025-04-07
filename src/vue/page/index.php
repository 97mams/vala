<?php

$title = "liste";
ob_start();
?>
    <div class="mt-8 my-6 w-full overflow-y-auto">
      <h1 class="mt-10 scroll-m-20 pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Page liste</h1>
      <table class="w-full">
        <thead>
          <tr className="m-0 border-t p-0 even:bg-[oklch(0.97 0 0)]">
            <th className="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Nom
            </th>
            <th className="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Genre
            </th>
            <th className="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Type
            </th>
            <th className="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Age
            </th>
            <th className="border px-4 py-2 text-left font-bold [&[align=center]]:text-center [&[align=right]]:text-right">
              <span class="text-gray-400">#</span> Sexe
            </th>
          </tr>
        </thead>
        <tbody>
            <?php
          foreach ($animals as $animal) {
          echo '
          <tr class="m-0 border-t p-0 even:bg-[oklch(0.97 0 0)]"> 
            <td  className="border px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
              <a href="/animal/'.$animal["id"].'">
                '.$animal['name'].'
              </a>
             </td>
            <td> 
              <a href="/animal/'.$animal["id"].'">
                '.$animal["genre"].'
              </a>
            </td>
            <td>
              <a href="/animal/'.$animal["id"].'">
                '.$animal["type"].'
              </a>
            </td>
            <td>
              <a href="/animal/'.$animal["id"].'">
                '.$animal["sexe"].'
              </a>
            </td>
            <td>
              <a href="/animal/".$animal["id"]."">
                '.$animal["age"].'
              </a>
            </td>
            <td class="flex p-2 gap-2 "> 
            <a href="/edit/animal/'.$animal["id"].'" class="px-2 bg-orange-400 text-orange-200 cursor-pointer rounded">✔</a>
             <form action="/animal"  method="post">
                <input type="hidden" value="'.$animal["id"].'" name="id">
                <input title="supprimer" type="submit" value="❌" class="px-2 bg-red-400 text-red-200 rounded cursor-pointer">
              </form>
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