<?php

use App\entity\Animal;

$title = "liste";
ob_start();
?>

<div class="w-full">
  <h1 class="text-xl font-bold text-gray-400 my-8">Page liste</h1>
    <table class="w-full border border-gray-300">
      <thead class="w-full border border-gray-300 bg-gray-200 font-bold">
        <tr>
          <td class='pl-2'><span class="text-gray-400">#</span> Nom</td>
          <td><span class="text-gray-400">#</span> Genre</td>
          <td><span class="text-gray-400">#</span> Type</td>
          <td><span class="text-gray-400">#</span> sexe</td>
          <td><span class="text-gray-400">#</span> age</td>
          <td><span class="text-gray-400">#</span> Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($animals as $animal) {
          echo "<tr> 
            <td class='pl-2'>
              <a href='/animal/".$animal['id']."'>
                ".$animal['name']."
              </a>
             </td>
            <td> 
              <a href='/animal/".$animal['id']."'>
                ".$animal['genre']."
              </a>
            </td>
            <td>
              <a href='/animal/".$animal['id']."'>
                ".$animal['type']."
              </a>
            </td>
            <td>
              <a href='/animal/".$animal['id']."'>
                ".$animal['sexe']."
              </a>
            </td>
            <td>
              <a href='/animal/".$animal['id']."'>
                ".$animal['age']."
              </a>
            </td>
            <td class='flex p-2 gap-2 '> 
             <form action='/animal/{".$animal['id']."}' method='get'>
                <input title='supprimer' type='submit' value='❌' class='px-2 bg-red-400 text-red-200 rounded cursor-pointer'>
              </form>
              <form action='/animal/{".$animal['id']."}' method='get'>
                <input type='hidden' name='id' value=".$animal['id'].">
                <input title='modifier' type='submit' value='✔' class='px-2 bg-orange-400 text-orange-200 cursor-pointer rounded'>
              </form>
             </td>
            </tr>";
          }
        ?>
      </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include '../src/vue/layouts/base.php';