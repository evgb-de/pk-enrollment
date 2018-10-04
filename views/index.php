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
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDprename }" type="text" placeholder="Vorname" v-model="p.prename">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--Name-->
            <div class="uk-form-row">
              <label class="uk-form-label">Name</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDname }" type="text" placeholder="Vorname" v-model="p.name">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--Telefon/Handy Nummer-->
            <div class="uk-form-row">
                <label class="uk-form-label">Telefon/Handy Nummer</label>
                <input class="uk-width-large-1-1 " v-bind:class="{ 'uk-form-danger' : p.isDTel}"type="text" placeholder="Handy Nummer" v-model="entry.EBMobile">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--E-Mail Adresse-->
            <div class="uk-form-row">
              <label class="uk-form-label">E-Mail Adresse</label>
              <input class="uk-width-large-1-1" v-bind:class="{ 'uk-form-danger' : p.isDEBEmail}"type="text" placeholder="E-Mail Adresse" v-model="entry.EBEmail">
            </div>
          </div>
        </div>
        <div class="uk-grid">
          <div class="uk-width-medium-1-4"><!--Geburtsdatum-->
            <div class="uk-form-row">
              <label class="uk-form-label">Geburtdatum</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDBirthday }" type="text" placeholder="Geburtsdatum" v-model="p.Birthday">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--Straße-->
            <div class="uk-form-row">
              <label class="uk-form-label">Straße und Hausnummer</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDStreet }" type="text" placeholder="Straße und Hausnummer" v-model="p.Street">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--PLZ-->
            <div class="uk-form-row">
              <label class="uk-form-label">PLZ</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDPLZ }" type="text" placeholder="PLZ" v-model="p.PLZ">
            </div>
          </div>
          <div class="uk-width-medium-1-4"><!--Wohnort-->
            <div class="uk-form-row">
              <label class="uk-form-label">Wohnort</label>
              <input class="uk-width-large-1-1" :class="{ 'uk-form-danger': p.isDWohnort }" type="text" placeholder="Wohnort" v-model="p.Wohnort">
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
      <h2>Hinweise und Teilnahmebedingungen:</h2>
      <div class="uk-form-row">
        <input  type="checkbox" name="agreebox" id="agreebox" v-model="entry.agreeBox" value="zugestimmt">
        <label :class="{ 'uk-form-danger': agreeDanger }" for="agreebox">
          Der/die Teilnehmer/in ist angewiesen worden, den Anordnungen der Verantwortlichen der Freizeit Folge zu leisten. <br>
          Der/die Teilnehmer/in ist verpflichtet, am Freizeitprogramm teilzunehmen, soweit ihm/ihr dies gesundheitlich zumutbar ist. Haftung bei selbständigen Unternehmungen, die nicht von Mitarbeitern angesetzt sind, übernehmen die Erziehungsberechtigten. <br>
          Bei Abmeldung von der Maßnahme ist eine Rückerstattung des Beitrags generell nur bis zwei Wochen vor Beginn derselben möglich. <br>
          Im Rahmen der Maßnahme aufgenommenes Foto- und Filmmaterial wird für die Zwecke der Jungschar und Zeltlagerarbeit verwendet (z.B. Einladungen, Nachtreffen). <br>
          Ich versichere, das der/die Teilnehmer/in an keiner ansteckenden Krankheit leidet. <br>
        </label>
      </div>
      <h2>Bitte prüfen Sie Ihre Angaben:</h2>
      
      <div class="uk-grid">
        <div class="uk-width-medium-1-2 ">
        <h3>Erziehungsberechtigte:</h3>
          <dl>
            <dt>Vorname und Nachname: </dt><dd>{{entry.EBName}}</dd>
            <dt>Adresse:          </dt><dd>{{entry.EBAddress}}</dd>
            <dt>PLZ, Ort:       </dt><dd>{{entry.EBLocation}}</dd>
            <dt>Telefon : </dt><dd>{{entry.EBTel}}</dd>
            <dt>Handy Nummer:    </dt><dd>{{entry.EBMobile}}</dd>
            <dt>E-Mail:           </dt><dd>{{entry.EBEmail}}</dd>
            <dt>Sie sind Erreichbar:        </dt><dd>{{entry.EBReachable | trans}}</dd>
            <dt>Weitere Kontakte</dt><dd>{{entry.EBOtherContacts}}</dd>
          </dl>
        </div>
        <div class="uk-width-medium-1-2 ">
          <div v-for="p in entry.participants">
            <h3>Teilnehmer {{p.number}}:</h3>
            <small>Teilnahmegebühr des {{p.number}}. Teilnehmers: {{ p.price }}€</small>
            <dt>Vorname und Nachname   </dt><dd>{{p.name}}</dd>
            <dt>Geburtsdatum  </dt><dd>{{p.dateofbirth}}</dd>
            <dt>Wichtige Infos  </dt><dd>{{p.importantInfo}}</dd>
            <dt>Hausarzt   </dt><dd>{{p.Hausarzt}}</dd>
            <dt>Adresse des Hausarztes </dt><dd>{{p.docAddress}}</dd>
            <dt>Telefonnummer des Hausarztes  </dt><dd>{{p.docTel}}</dd>
            <dt>Krankenkasse   </dt><dd>{{p.kk}}</dd>
            <dt>Blutgruppe  </dt><dd>{{p.bloodtype}}</dd>
            <dt>Badeerlaubnis: </dt><dd>{{p.bathing | trans}}</dd>
            <dt>Teilnehmer/in ist Schwimmer:        </dt><dd>{{p.swimmer | trans}}</dd>
            <dt>Der/die Teilnehmer/in darf im Privat-PKW der Mitarbeiter mitgenommen werden:        </dt><dd>{{p.pkw | trans}}</dd>
            <dt>Der/die Teilnehmer/in darf unter verantwortlichen Gegebenheiten (z.B. bei Zoobesuch, Stadtbummel) in
kleineren Gruppen auch ohne Aufsichtsperson unterwegs sein:</dt><dd>{{p.withoutMA | trans}}</dd>
            <dt>Besteht für den/die Teilnehmer/in eine Haftplichtversicherung?</dt><dd>{{p.insurance | trans}}</dd>
            <dt>Der/die Teilnehmer/in darf, wenn dies von einem Arzt für nötig gehalten wird, geimpft oder operiert werden:</dt><dd>{{p.operator | trans}}</dd>
            <dt>Ist der/ die Teilnehmer/in gegen Wundstarkrampf (Tetanus) geimpft?</dt><dd>{{p.tetanus | trans}} {{p.tetanusDate}}</dd>
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
