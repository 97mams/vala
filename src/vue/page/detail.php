<?php
$title = $animal['nom_animale'];
ob_start();

echo '<div class="w-full pt-8">
  <h2 class="mt-10 scroll-m-20 pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Page animal détail</h2>
  <div>
    <p class="leading-7 [&:not(:first-child)]:mt-6">
      <strong>Nom(marque)</strong>: '.$animal['nom_animale'].' <br>
      <strong>Genre</strong>: '.$animal['nom_genre'].' <br>
      <strong>Type</strong>: '.$animal['nom_type'].' <br>
      <strong>Age</strong>: '.$animal['age'].'
    </p>
  </div>
  <div class="w-full">
    <h3 class="mt-8 scroll-m-20 text-2xl font-semibold tracking-tight">Traitement</h3>
    <table class="w-full border border-[#171717]">
      <thead>
        <tr>
          <th class="border border-[#171717]">Vaccin</th>
          <th class="border border-[#171717]">Description</th>
          <th class="border border-[#171717]">Date</th>
          <th class="border border-[#171717]">Status</th>
        </tr>
      </thead>
    </table>
    </div>
  </div>';
  
  
  $content = ob_get_clean();
  require '../src/vue/layouts/base.php';
  ?>

