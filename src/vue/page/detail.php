<?php
$title = $animal['nom_animale'];
$status =  '<button class="m-auto h-9 px-4 py-2 bg-green-300 shadow-sm inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ">
            fait
          </button>';
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
        if( (int)$treatment['status'] === 0) {
          $status = '<form action="/treat/status" method="post">
          <input type="hidden" value="'.$animal["id_animale"].'" name="id_animal">
            <button type="submit" class="m-auto h-9 px-4 py-2 bg-orange-300 cursor-pointer text-orange-500 shadow-sm hover:bg-orange-500 hover:text-orange-300 inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#a1a1a1] disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-4 [&_svg]:shrink-0">
              a compilie
            </button>
          </form>';
        }
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
                '. $status .'
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
