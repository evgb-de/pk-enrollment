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
        <input type="text" placeholder="{{ 'Prename and Name' | trans}}" v-model="EB-Name">
        <input type="text" placeholder="{{ 'Address' | trans}}" v-model="EB-Address">
        <input type="text" placeholder="{{ 'PLZ, Place' | trans}}" v-model="EB-Location">
        <input type="text" placeholder="{{ 'Telephone Number' | trans}}" v-model="EB-Tel">
        <input type="text" placeholder="{{ 'Mobile Number' | trans}}" v-model="EB-Mobile">
        <input type="text" placeholder="{{ 'E-Mail for further Information' | trans}}" v-model="EB-Email">
          <input type="radio" name="Reachable" id="EB-NotReachable" v-model="EB-Reachable" value="false">
          <label for="EB-NotReachable">Wärend dem Zeltlager <b>nicht</b> erreichbar.</label>
          <input type="radio" name="Reachable" id="EB-Reachable" v-model="EB-Reachable" value="true">
          <label for="EB-Reachable">Während dem Zeltlager erreichbar.</label>
        <textarea name="OtherContacts" id="OtherContacts" cols="30" rows="3" v-model="EB-OtherContacts" placeholder="{{ 'Other Contacts' | trans }}"></textarea>
      </div>
      <!-- Teilnehmer: -->
      <div v-if="page === 2" v-for="p in participants">
        <h2>{{ 'Participant ' | trans }}{{p.number}}:</h2>
        <small>{{ 'Participation Fee of ' }}{{ one: First Participant|more: %count%. Participant' | transChoice p.number {count:p.number}}}: {{ p.price }}€</small>
        <input type="text" placeholder="{{ 'Prename and Name' | trans }}" v-model="p.name">
        <input type="text" placeholder="{{ 'Date of Birth' | trans }}" data-uk-datepicker="{format:'DD.MM.YYYY'}" v-model="p.dateofbirth">
        <textarea name="OtherContacts{{p.number}}" id="ImportantInfo{{p.number}}" cols="30" rows="3" v-model="p.importantInfo" placeholder="{{ 'Important Infos' | trans }}"></textarea>

        <input type="text" placeholder="{{ 'Doctor' | trans }}" v-model="doctor">
        <input type="text" placeholder="{{'Address' | trans }} {{ 'of the Doctor' | trans}}" v-model="docAddress">
        <input type="text" placeholder="{{'Telefone Number' | trans }} {{ 'of the Doctor' | trans}}" v-model="docTel">
        <input type="text" placeholder="Krankenkasse" v-model="kk">
        <input type="text" placeholder="{{ 'Bloodtype' | trans }}" v-model="bloodtype">
      </div>
    </form>
  </div>
</div>
