<?php $view->script('pkenrollment', 'pkenrollment:js/user.js', 'vue') ?>
<script type="text/javascript" src="/app/assets/uikit/js/components/datepicker.min.js"></script>
<div id="pkenrollment">
  <h1>Go West, Go Wild</h1>
  <small>Anmeldung zum Zeltlager 2018</small>
  <div class="uk-overflow-container uk-width-1-1">
    <div></div>
    <form>
      <!-- Erziehungsberechtigte: -->
      <div v-if="page === 1">
      <h2>Kontakt & Angaben Erziehungsberechtigte:</h2>
        <input type="text" placeholder="Vor- und Nachname" v-model="EB-Name">
        <input type="text" placeholder="Anschrift" v-model="EB-Anschrift">
        <input type="text" placeholder="PLZ, Ort" v-model="EB-Ort">
        <input type="text" placeholder="Telefonnummer" v-model="EB-Telefon">
        <input type="text" placeholder="Handy-Nummer" v-model="EB-Mobil">
        <input type="text" placeholder="E-Mail für weitere Infos" v-model="EB-Email">
        <input type="radio" name="Erreichbar" id="EB-Erreichbar" v-model="EB-Erreichbar">
        <textarea name="AndereKontakte" id="AndereKontakte" cols="30" rows="3" v-model="EB-AndereKontakte"></textarea>
      </div>
      <!-- Teilnehmer: -->
      <div v-if="page === 2" v-for="tn in teilnehmer">
        <h2 v-if></h2>
        <input type="text" placeholder="Vor- und Nachname" v-model="tn.name">
        <input type="date" placeholder="Geburtsdatum" v-model="tn.name">
        <input type="text" placeholder="Geburtsdatum" data-uk-datepicker="{format:'DD.MM.YYYY'}" v-model="tn.geburtsdatum">
      </div>
    </form>
  </div>
</div>
