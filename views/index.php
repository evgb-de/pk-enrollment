<?php $view->script('pkenrollment', 'pkenrollment:js/user.js', 'vue') ?>
<script type="text/javascript" src="/app/assets/uikit/js/components/datepicker.min.js"></script>
<div id="pkenrollment">
  <h1>Go West, Go Wild</h1>
  <small>Anmeldung zum Zeltlager 2018</small>
  <div class="uk-overflow-container uk-width-1-1">
    <form>
      <!-- Erziehungsberechtigte: -->
      <div v-if="page === 1">
        <h2>Kontakt & Angaben Erziehungsberechtigte:</h2>
        <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Prename and Name' | trans}}" v-model="entry.EBName"></div>
        <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Address' | trans}}" v-model="entry.EBAddress"></div>
        <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'PLZ, Place' | trans}}" v-model="entry.EBLocation"></div>
        <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Telephone Number' | trans}}" v-model="entry.EBTel"></div>
        <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Mobile Number' | trans}}" v-model="entry.EBMobile"></div>
        <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'E-Mail for further Information' | trans}}" v-model="entry.EBEmail"></div>
          <div class="uk-form-row">
            <p>Sind Sie während dem Zeltager erreichbar?</p>
            <input type="radio" name="Reachable" id="EBReachable" v-model="entry.EBReachable" value="true">
            <label for="EBReachable">Ja</label>
            <input type="radio" name="Reachable" id="EBNotReachable" v-model="entry.EBReachable" value="false">
            <label for="EBNotReachable">Nein</label>
          </div>
        <div class="uk-form-row"><textarea class="uk-form-controls uk-form-controls-text" name="OtherContacts" id="OtherContacts" cols="30" rows="3" v-model="entry.EBOtherContacts" placeholder="{{ 'Other Contacts' | trans }}"></textarea></div>
      </div><!-- Teilnehmer: -->
      <div v-if="page === 2">
        <div v-for="p in entry.participants">
          <h2>{{ 'Participant ' | trans }}{{p.number}}:</h2>
          <small>Teilnahmegebühr des {{p.number}}. Teilnehmers: {{ p.price }}€</small>
          <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Prename and Name' | trans }}" v-model="p.name"></div>
          <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Date of Birth' | trans }}" data-uk-datepicker="{format:'DD.MM.YYYY'}" v-model="p.dateofbirth"></div>
          <div class="uk-form-row"><textarea class="uk-form-controls uk-form-controls-text" name="OtherContacts{{p.number}}" id="ImportantInfo{{p.number}}" cols="30" rows="3" v-model="p.importantInfo" placeholder="{{ 'Important Infos' | trans }}"></textarea></div>
          <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Doctor' | trans }}" v-model="doctor"></div>
          <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{'Address' | trans }} {{ 'of the Doctor' | trans}}" v-model="docAddress"></div>
          <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{'Telefone Number' | trans }} {{ 'of the Doctor' | trans}}" v-model="docTel"></div>
          <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="Krankenkasse" v-model="kk"></div>
          <div class="uk-form-row"><input class="uk-form-controls uk-form-controls-text" type="text" placeholder="{{ 'Bloodtype' | trans }}" v-model="bloodtype"></div>
        </div>
        <button @click.prevent="addParticipant()">Weiterer Teilnehmer</button>
      </div>
      <div v-if="page === 3">
        <h2>Zusammenfassung:</h2>
        <H3>Erziehungsberechtigte:</H3>
        <dl>
          <dt>{{ 'Prename and Name' | trans}}:</dt> <dd>{{entry.EBName}}</dd>
          <dt>{{ 'Address' | trans}}:</dt>          <dd>{{entry.EBAddress}}</dd>
          <dt>{{ 'PLZ, Place' | trans}}:</dt>       <dd>{{entry.EBLocation}}</dd>
          <dt>{{ 'Telephone Number' | trans}}:</dt> <dd>{{entry.EBTel}}</dd>
          <dt>{{ 'Mobile Number' | trans}}:</dt>    <dd>{{entry.EBMobile}}</dd>
          <dt>{{ 'E-Mail' | trans}}:</dt>           <dd>{{entry.EBEmail}}</dd>
          <dt>{{ 'Reachable' | trans}}:</dt>        <dd>{{entry.EBReachable | trans}}</dd>
        </dl>
        <div v-for="p in entry.participants">
          <h2>{{ 'Participant ' | trans }}{{p.number}}:</h2>
          <small>Teilnahmegebühr des {{p.number}}. Teilnehmers: {{ p.price }}€</small>
          <dt>{{ 'Prename and Name' | trans }}</dt><dd>{{p.name}}</dd>
          <dt>{{ 'Date of Birth' | trans }}</dt><dd>{{p.dateofbirth}}</dd>
          <dt>{{ 'Important Infos' | trans }}</dt><dd>p.importantInfo</dd>
          <dt>{{ 'Doctor' | trans }}</dt><dd>{{p.doctor}}</dd>
          <dt>{{'Address' | trans }} {{ 'of the Doctor' | trans}}</dt><dd>{{p.docAddress}}</dd>
          <dt>{{'Telefone Number' | trans }} {{ 'of the Doctor' | trans}}</dt><dd>{{p.docTel}}</dd>
          <dt>Krankenkasse</dt><dd>{{p.kk}}</dd>
          <dt>{{ 'Bloodtype' | trans }}</dt><dd>{{p.bloodtype}}</dd>
        </div>
      </div>
      <button v-if="page > 1" @click.prevent="back()">zurück</button>
      <button v-if="page < 3" @click.prevent="forth()">Weiter</button>
      <button v-if="page === 3" @click.prevent="save()">Abschicken</button>
    </form>
  </div>
</div>
