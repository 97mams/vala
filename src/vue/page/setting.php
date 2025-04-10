<?php
$title = 'reglage';
$message = "";
ob_start();
?>

<div class="mt-8 my-6 w-full overflow-y-auto">
  <h1 class="mt-10 scroll-m-20 pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Page de réglages</h1>
  <p class="leading-7 [&:not(:first-child)]:mt-6">Vous pouvez ajouter ici tous les vaccins conserner à la traitement de vos animalaux.</p>
  <div>
    <h3 class="mt-8 scroll-m-20 text-2xl font-semibold tracking-tight">Formulaire du type d'élevage</h3>
    <?php include '../src/vue/components/_formBreed.php' ?>
  </div>

  <div>
    <h3 class="mt-8 scroll-m-20 text-2xl font-semibold tracking-tight">Formulaire du traitement</h3>
    <?php include '../src/vue/components/_formTreatment.php' ?>
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
            <th class="border border-[#171717]">Action</th>
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
              '.$treatment['nom_type'].'
              </td>
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                <a title="supprimer" href="/treatment/delete/'.$treatment['id_traitement'].'">❌</a>
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
