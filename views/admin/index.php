<?php $view->script('pkenrollment', 'pkenrollment:js/admin.js', 'vue') ?>
<h1>Anmeldungsübersicht</h1>
<table id="pkenrollment-table" class="uk-table">
  <thead>
    <tr>
      <th>Erziehungsberechtigter</th>
      <th>Adresse</th>
      <th>PLZ, Ort</th>
      <th>Telefon</th>
      <th>handy</th>
      <th>E-mail</th>
      <th>Ist Erreichbar?</th>
      <th>Weitere Kontakte</th>
      <th>Teilnehmer</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="entry in entries">
      <td>{{entry.EBName}}</td>
      <td>{{entry.EBAddress}}</td>
      <td>{{entry.EBLocation}}</td>
      <td>{{entry.EBTel}}</td>
      <td>{{entry.EBMobile}}</td>
      <td>{{entry.EBEmail}}</td>
      <td>{{entry.EBReachable | trans}}</td>
      <td>{{entry.EBOtherContacts}}</td>
      <td>
        <code v-for="p in entry.participants">{{p.name}}</code>
      </td>
    </tr>
  </tbody>
</table>