<?php $view->script('pkenrollment', 'pkenrollment:js/admin.js', 'vue') ?>
<h1>Anmeldungsübersicht</h1>
<table id="pkenrollment-table" class="uk-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Vorname</th>
      <th>Nachname</th>
      <th>Geschlecht</th>
      <th>Geburtstag</th>
      <th>Adresse</th>
      <th>PLZ, Ort</th>
      <th>Telefon</th>
      <th>E-mail</th>
      <th>Kommentar</th>
    </tr>
  </thead>
  <tbody >
      <template v-for="(index, entry) in entries">
        <tr>
          <td>{{index}}</td>
          <td><p v-for="p in entry.participants">{{p.Prename}}</p></td>
          <td><p v-for="p in entry.participants">{{p.Name}}</p></td>
          <td><p v-for="p in entry.participants">{{p.Gender}}</p></td>
          <td><p v-for="p in entry.participants">{{p.Birthday}}</p></td>
          <td><p v-for="p in entry.participants">{{p.Street}}</p></td>
          <td><p v-for="p in entry.participants">{{p.PLZ}}</p></td>
          <td><p v-for="p in entry.participants">{{p.Tel}}</p></td>
          <td><p v-for="p in entry.participants"><a href="mailto:{{p.EMail}}">{{p.EMail}}</a></p></td>
          <td>{{entry.comment}}</td>
        </tr>
      </template>
  </tbody>
</table>