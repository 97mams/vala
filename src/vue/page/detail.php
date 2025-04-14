<?php
$title = $animal['nom_animale'];
ob_start();
?>
<div class="w-full pt-8">
  <h2 class="mt-10 scroll-m-20 pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Page animal détail</h2>
  <div>
    <?php
    echo '<p class="leading-7 [&:not(:first-child)]:mt-6">
      <strong>Nom(marque)</strong>: '.$animal['nom_animale'].' <br>
      <strong>Genre</strong>: '.$animal['nom_genre'].' <br>
      <strong>Type</strong>: '.$animal['nom_type'].' <br>
      <strong>Age</strong>: '.$animal['age'].'
    </p>'  
    ?>
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
      <tbody>
        <?php 
      foreach ($treatments as $treatment) {
        echo '
            <tr class="m-0 border-t p-0 even:bg-[oklch(0.97 0 0)]"> 
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$treatment['type'].'
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
  require '../src/vue/layouts/base.php';
  ?>
