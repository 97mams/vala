<?php
$title = $animal['name'];
ob_start();

echo '<div class="w-full">
  <h1 class="text-xl font-bold text-gray-400 my-8">Page animal détail</h1>
  <div>
    <p>
      <strong>Nom(marque)</strong>: '.$animal['name'].' <br>
      <strong>Genre</strong>: '.$animal['genre'].' <br>
      <strong>Type</strong>: '.$animal['type'].' <br>
      <strong>Sexe</strong>: '.$animal['sexe'].' <br>
      <strong>Age</strong>: '.$animal['age'].'
    </p>
  </div>
  </div>';
  
  
  $content = ob_get_clean();
  require '../src/vue/layouts/base.php';
  ?>
