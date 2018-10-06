<?php $view->script('pkenrollment', 'pkenrollment:js/admin.js', 'vue') ?>
<h1>Anmeldungsübersicht</h1>
<table id="pkenrollment-table" class="uk-table">
  <thead>
    <tr>
      <th>Vorname</th>
      <th>Nachname</th>
      <th>Geburtstag</th>
      <th>Adresse</th>
      <th>PLZ, Ort</th>
      <th>Telefon</th>
      <th>E-mail</th>
      <th>Kommentar</th>
    </tr>
  </thead>
  <tbody v-for="entry in entries">
      <tr v-for="p in entry.participants">
        <td>Prename</td>
        <td>Name</td>
        <td>Birtdday</td>
        <td>Street</td>
        <td>PLZ</td>
        <td>Tel</td>
        <td>EMail</td>
      </tr>
      <td>{{entry.DSGVO}}</td>
  </tbody>
</table>