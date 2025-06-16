<?php

use App\controller\DayController;
use App\controller\NotificationController;
use App\controller\TreatController;

$title = $animal['nom_animale'];
$day = new DayController();
function status(array $treatment, DayController $day): string
{
  $recallDay = $day->recallDay($treatment['updated_at_treatment'], $treatment['duree']);
  $treatment = array_merge($treatment, ['date_rappel' => $recallDay ]);
  $treatController = new TreatController();
  $notificationController = new NotificationController();
  $numberForDayTreatement = (int)$treatment['duree'] - 5;
  $numberDayOff = $numberForDayTreatement - $day->dayInterval($treatment["updated_at_treatment"]);
  $show = ($day->dayInterval($treatment["updated_at_treatment"]) === 0)? $day->dayInterval($treatment["updated_at_treatment"]) : $numberDayOff;
  $isCount = $treatController->countTreat($treatment['id_traitement'], $treatment['id_animale']);
  
  if (!$isCount) {
    // $notificationController->store($treatment);
    $isDisable = "";
  } else {  
    $isDisable = ($show < 0)? "": "disabled";
  }

  return '<form action="/treat/status" method="post">
          <input type="hidden" value="'.$treatment["id_animale"].'" name="id_animal">
          <input type="hidden" value="'.$treatment["id_traiter"].'" name="id_treat">
          <input type="hidden" value="'.$treatment["id_traitement"].'" name="id_treatment">
            <button type="submit" '.$isDisable.' class="m-auto  w-full h-9 px-4 py-2 bg-orange-300 cursor-pointer text-orange-500 shadow-sm hover:bg-orange-500 hover:text-orange-300 inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-[#a1a1a1] disabled:pointer-events-none disabled:opacity-50 [&_svg]:size-4 [&_svg]:shrink-0">
              a compilie
            </button>
          </form>';
}


function card(array $animal, DayController $day):string
{
  $numberDays = $animal['duree'] - $day->dayInterval($animal["updated_at_treatment"]);
  $days = ($numberDays <=0)? 'Tard '. $numberDays .' jours' : $numberDays .' jours';
  return'
  <div class="rounded-xl border bg-card text-card-foreground shadow">
    <div class="flex flex-col space-y-1.5 p-6">
      <div class="font-semibold leading-none tracking-tight">'.$animal['type'].'</div>
    </div>
    <div class="p-6 pt-0">  
      <p class="leading-7">jours de rappel: '.$days.'</p>
      <p class="leading-7">Déscription: '.$animal['description'].'</p>
      '.status($animal, $day).'
    </div>
  </div>
  ';
}

ob_start();
?>
<div class="w-full pt-8 overflow-hidden">
  <h2 class="mt-10 scroll-m-20 pb-2 text-3xl font-semibold tracking-tight transition-colors first:mt-0">Page animal détail</h2>
  <div>
    <?php
    echo '<p class="leading-7 [&:not(:first-child)]:mt-6">
    <strong>Nom(marque)</strong>: '.ucwords($animal['nom_animale']).' <br>
    <strong>Genre</strong>: '.ucfirst($animal['nom_genre']).' <br>
    <strong>Type</strong>: '.ucfirst($animal['nom_type']).' <br>
    <strong>Date d\'arrivé (de naissance)</strong>: '.$day->formatedDate($animal['created_at']).' <br>
    <strong>Age</strong>: '.$animal['age'].'
    </p>'  
    ?>
  </div>

  <div class="w-full">
    <h3 class="mt-8 scroll-m-20 text-2xl font-semibold tracking-tight">Traitement</h3>
    <div class="flex gap-2">
    <?php
    foreach ($treatments as $treatment) {
      $treatment = array_merge($treatment,['nom_animale' => $title]);
      echo card($treatment, $day);
    }
    ?>
    </div>
    <!-- <table class="w-full border border-[#171717]">
      <thead>
        <tr>
          <th class="border border-[#171717]">Vaccin</th>
          <th class="border border-[#171717]">Description</th>
          <th class="border border-[#171717]">Durée (mois)</th>
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
                '.status($treatment, $day).'
              </td>
            </tr>';
          }
        ?>
      </tbody>
    </table> -->
    </div>

    <div class="w-full">
    <h3 class="mt-8 scroll-m-20 text-2xl font-semibold tracking-tight">Historique</h3>
    <table class="w-full border border-[#171717]">
      <thead>
        <tr>
          <th class="border border-[#171717]">Type</th>
          <th class="border border-[#171717]">Description</th>
          <th class="border border-[#171717]">Date</th>
        </tr>
      </thead>
      <tbody>
        <?php 
      foreach ($storys as $story) {
         echo '
          <tr class="m-0 border-t p-0 even:bg-[oklch(0.97 0 0)]"> 
          <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$story['type'].'
                </td>
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.$story['description'].'
                </td>
              <td  class="border border-[#171717] px-4 py-2 text-left [&[align=center]]:text-center [&[align=right]]:text-right">
                '.ucwords($day->formatedDate($story['updated_at'])).'
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
