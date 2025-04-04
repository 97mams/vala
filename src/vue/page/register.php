<?php
$title = "register";

ob_start();
?>
<div class="container">
  <h1>Page d'ajout</h1>
<div>
  <form action="/store" method="post">
    <label for="name">Nom</label>
    <input type="text" name="name" id="name">
    <label for="genre">Genre</label>
    <input type="text" name="genre" id="genre">
    <label for="type">Type</label> 
    <input type="text" name="type" id="type">
    <label for="sexe-animal">Sexe</label>
    <select name="sexe" id="sexe-animal">
      <option value="male">male</option>
      <option value="female">femmele</option>
    </select>   
      
    <input type="submit" value="Enregistrer">
  </form>
</div>';
</div>
      
<?php
$content = ob_get_clean();
include '../src/vue/layouts/base.php';

