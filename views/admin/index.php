<?php $view->script('pkenrollment', 'pkenrollment:js/admin.js', 'vue') ?>
<h1>Anmeldungsübersicht</h1>
<table id="pkenrollment-table" class="uk-table">
  <thead>
    <tr>
      <th>ID</th>
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
        <td>{{p.number}}</td>
        <td>{{p.Prename}}</td>
        <td>{{p.Name}}</td>
        <td>{{p.Birthday}}</td>
        <td>{{p.Street}}</td>
        <td>{{p.PLZ}}</td>
        <td>{{p.Tel}}</td>
        <td>{{p.EMail}}</td>
        <td>{{entry.comment}}</td>
      </tr>
      
  </tbody>
</table>