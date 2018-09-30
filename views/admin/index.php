<?php $view->script('pkenrollment', 'pkenrollment:js/admin.js', 'vue') ?>
<h1>Anmeldungsübersicht</h1>
<table id="pkenrollment-table" class="uk-table">
  <thead>
    <tr>
      <th>Adresse</th>
      <th>PLZ, Ort</th>
      <th>Telefon</th>
      <th>E-mail</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="entry in entries">
      <td>Straße 02</td>
      <td>07568</td>
      <td>0271ccc</td>
      <td>test@halllo.de</td>
    </tr>
  </tbody>
</table>