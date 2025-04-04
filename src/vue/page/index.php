<?php

use App\entity\Animal;

$title = "project";
ob_start();
?>

<div class="w-full">
  <h1 class="text-xl font-bold text-gray-400 my-8">Page liste</h1>
    <table class="w-full border border-gray-300">
      <thead class="w-full border border-gray-300 bg-gray-200 font-bold">
        <tr>
          <td>Nom</td>
          <td>Genre</td>
          <td>Type</td>
          <td>sexe</td>
          <td>age</td>
          <td>action</td>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($animals as $animal) {
          echo "<tr> 
             <td>".$animal['name']."</td>
             <td>".$animal['genre']."</td>
             <td>".$animal['type']."</td>
             <td>".$animal['sexe']."</td>
             <td>".$animal['age']."</td>
             <td class='flex p-2 gap-2 '>
             
             <form action='/animal' method='delete'>
                <input type='hidden' name='id' value=".$animal['id'].">
                <input title='supprimer' type='submit' value='❌' class='px-2 bg-red-400 text-red-200 rounded cursor-pointer'>
              </form>
              <form action='/animal' method='put'>
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