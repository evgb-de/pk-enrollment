<?php $view->script('pkenrollment', 'pkenrollment:js/user.js', 'vue');
      // $view->script('datepicker', '/app/assets/uikit/js/components/datepicker.min.js', 'uikit');
      // $view->script('form-select', '/app/assets/uikit/js/components/form-select.min.js', 'uikit');
      // $view->style('datepicker', '/app/assets/uikit/css/components/datepicker.css', 'uikit');
?>
<!--<link rel="stylesheet" href="/app/assets/uikit/css/components/datepicker.min.css?v=da7c">-->
<!-- ToDo: make user-definable enrollments possible, let users define fields, titels and pages ... -->
<div id="pkenrollment" >
  <h1 class="uk-heading-line uk-text-center">
    <span>Lisas Weihnachtsfreude</span> <br>
    <small>Anmeldung zum Familienmusical 2018</small>
  </h1>
  <hr>
  <form class="uk-form uk-form-stacked">
    <div v-if="page === 1"><!-- Anmeldung -->
      <!-- Teilnehmer: -->
      <div v-for="p in entry.participants" class="uk-panel uk-panel-box" style="margin-bottom: 10px">
        <h2><span>Teilnehmer {{p.number}}:</span></h2>
        <!-- Grunddaten -->
        <div class="uk-grid">
          <div class="uk-width-medium-1-4"><!--Vorname-->
            <div class="uk-form-row">
              <label class="uk-form-label">Vorname</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDprename }" type="text" placeholder="Vorname" v-model="p.Prename">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--Name-->
            <div class="uk-form-row">
              <label class="uk-form-label">Name</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDname }" type="text" placeholder="Vorname" v-model="p.Name">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!-- geschlecht -->
            <div class="uk-form-row">
              <label class="uk-form-label">Geschlecht</label>
              <div>
                <input type="radio" id="{{p.number}}männl" value="Männlich" v-model="p.Gender">
                <label :class="{ 'uk-form-danger': p.isDGender }" for="{{p.number}}männl">Männlich</label>
                <br>
                <input type="radio" id="{{p.number}}weibl" value="Weiblich" v-model="p.Gender">
                <label  :class="{ 'uk-form-danger': p.isDGender }" for="{{p.number}}weibl">Weiblich</label>
              </div>
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--Geburtsdatum-->
            <div class="uk-form-row">
              <label class="uk-form-label">Geburtdatum</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDBirthday }" type="text" placeholder="Geburtsdatum" v-model="p.Birthday">
            </div>
          </div>
        </div>
        <div class="uk-grid">
          <div class="uk-width-medium-1-4"><!--Straße-->
            <div class="uk-form-row">
              <label class="uk-form-label">Straße und Hausnummer</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDStreet }" type="text" placeholder="Straße und Hausnummer" v-model="p.Street">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--PLZ, Wohnort-->
            <div class="uk-form-row">
              <label class="uk-form-label">PLZ, Wohnort</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDPLZ }" type="text" placeholder="PLZ, Wohnort" v-model="p.PLZ">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--Telefon/Handy Nummer-->
            <div class="uk-form-row">
                <label class="uk-form-label">Telefon/Handy Nummer</label>
                <input class="uk-width-large-1-1 " v-bind:class="{ 'uk-form-danger' : p.isDTel}"type="text" placeholder="Handy Nummer" v-model="p.Tel">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--E-Mail Adresse-->
            <div class="uk-form-row">
              <label class="uk-form-label">E-Mail Adresse</label>
              <input class="uk-width-large-1-1" v-bind:class="{ 'uk-form-danger' : p.isDEBEmail}"type="text" placeholder="E-Mail Adresse" v-model="p.EMail">
            </div>
          </div>
        </div>
      </div>
      <!-- Controls: -->
      <div class="uk-grid">
        <div class="uk-width-1-2 uk-text-center">
          <button v-if="participants > 1" class="uk-button uk-button-secondary" @click.prevent="removeParticipant()">Teilnehmer Weniger</button>
        </div>
        <div class="uk-width-1-2 uk-text-center">
          <button class="uk-button uk-button-secondary" @click.prevent="addParticipant()">Weiterer Teilnehmer</button>
        </div>
      </div>
    </div>
    <div v-if="page === 2">
      <h2>Weiteres und Zusammenfassung</h2>
      <div class="uk-form-row">
        <input  type="checkbox" name="dsgvo" id="dsgvo" v-model="entry.dsgvo" value="zugestimmt">
        <label :class="{ 'uk-form-danger': agreeDanger }" for="agreebox">
          Die hier eingegebenen Daten werden elektronisch gespeichert.
          Ich habe die <a href="https://evgb.de/index.php?option=com_content&view=article&id=66&Itemid=105">Datenschutzerklärung</a> gelesen und bin damit einverstanden.
        </label>
      </div>
      <div class="uk-form-row">
        <input  type="checkbox" name="agreebox" id="agreebox" v-model="entry.agreeBox" value="zugestimmt">
        <label :class="{ 'uk-form-danger': agreeDanger }" for="agreebox">
          Möglichweise werden von der Veranstaltung Ton- und Bildaufnahmen gemacht, auf denen die Teilnehmer zu hören bzw. zu sehen sind. Damit bin ich einverstanden.
        </label>
      </div>
      <h2>Bitte prüfen Sie Ihre Angaben:</h2>
      <div class="uk-grid">
        <div v-for="p in entry.participants" class="uk-width-medium-1-4">
          <div class="uk-panel-box">
            <h3>Teilnehmer {{p.number}}:</h3>
            <!--<small>Teilnahmegebühr des {{p.number}}. Teilnehmers: {{ p.price }}€</small>-->
            <ul>
              <li>{{ p.Prename}} {{ p.Name}}</li>
              <li>{{ p.Gender}}</li>
              <li>{{ p.Birthday}}</li>
              <li>{{ p.Street}}, {{ p.PLZ}}</li>
              <li>{{ p.Tel}} & {{ p.EMail}}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <button class="uk-button uk-button-secondary" v-if="page > 1" @click.prevent="back()">zurück</button>
    <button class="uk-button uk-button-secondary" v-if="page < 3" @click.prevent="forth()">Weiter</button>
    <button class="uk-button uk-button-primary" v-if="page === 3" @click.prevent="save()">Abschicken</button>
  </form>
</div>
