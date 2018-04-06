<?php $view->script('pkenrollment', 'pkenrollment:js/user.js', 'vue');
      $view->script('datepicker', '/app/assets/uikit/js/components/datepicker.min.js', 'uikit');
      $view->style('datepicker', '/app/assets/uikit/css/components/datepicker.min.css', 'uikit');
?>
<div id="pkenrollment" >
  <h1 class="uk-heading-line uk-text-center">
    <span>Go West, Go Wild</span> <br>
    <small>Anmeldung zum Zeltlager 2018</small>
  </h1>
  <form class="uk-form uk-form-horizontal">
    <!-- Erziehungsberechtigte: -->
    <div v-if="page === 1">      
      <h2>Kontakt & Angaben Erziehungsberechtigte:</h2>
      <br>
      <div class="uk-grid">
        <div class="uk-width-medium-1-2 "><div class="uk-panel uk-panel-box">
          <div class="uk-form-row">
            <label class="uk-form-label">Vorname und Nachname</label>
            <input class="uk-width-medium-1-1 " type="text" placeholder="Vorname und Nachname" v-model="entry.EBName">
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">Adresse</label>
            <input class="uk-width-medium-1-1 " type="text" placeholder="Adresse" v-model="entry.EBAddress">
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">PLZ, Ort</label>
            <input class="uk-width-medium-1-1 " type="text" placeholder="PLZ, Ort" v-model="entry.EBLocation">
          </div>
        </div></div>
        <div class="uk-width-medium-1-2 "><div class="uk-panel uk-panel-box">
          <div class="uk-form-row">
            <label class="uk-form-label">Telefon Nummer</label>
            <input class="uk-width-medium-1-1 " type="text" placeholder="Telefon Nummer" v-model="entry.EBTel">
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">Handy Nummer</label>
            <input class="uk-width-medium-1-1 " type="text" placeholder="Handy Nummer" v-model="entry.EBMobile">
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">E-Mail Adresse</label>
            <input class="uk-width-medium-1-1 " type="text" placeholder="E-Mail Adresse" v-model="entry.EBEmail">
          </div>
        </div></div>
      </div>
      <div class="uk-grid">
        <div class="uk-width-medium-1-1 "><div class="uk-panel uk-panel-box">
          <div class="uk-form-row">
            <label class="uk-form-label">Sind Sie während dem Zeltager erreichbar?</label>
            <br>
            <div>
              <label><input type="radio" name="Reachable" id="EBReachable" v-model="entry.EBReachable" value="true">Ja</label>
              <label><input type="radio" name="Reachable" id="EBNotReachable" v-model="entry.EBReachable" value="false">Nein</label>
            </div>
          </div>
          <div class="uk-form-row">
            <label class="uk-form-label">Weitere Kontakte</label>
            <textarea class="uk-width-medium-1-1" name="OtherContacts" id="OtherContacts"
                        cols="30" rows="3" v-model="entry.EBOtherContacts" placeholder="Weitere Kontakte">
            </textarea>
          </div>
        </div></div>
      </div>
    </div>
    <!-- Teilnehmer: -->
    <div v-if="page === 2">
      <div v-for="p in entry.participants" class="uk-panel uk-panel-box">
        <h2>Teilnehmer {{p.number}}:</h2>
        <small>Teilnahmegebühr des {{p.number}}. Teilnehmers: {{p.price}}€</small>
        <div class="uk-grid">
          <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
              <label class="uk-form-label">Vorname und Nachname</label>
              <input class="uk-width-large-1-1 " type="text" placeholder="Prename and Name" v-model="p.name">
            </div>
          </div>
          <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
              <label class="uk-form-label">Geburtsdatum</label>
              <input class="uk-width-1-1 " type="text" placeholder="Date of Birth" data-uk-datepicker="{format:'DD.MM.YYYY'}" v-model="p.dateofbirth">
            </div>
          </div>
          <div class="uk-grid">
            <div class="uk-width-1-1">
              <div class="uk-form-row">
                <label class="uk-form-label">Wichtige Hinweise</label>
                <textarea class="uk-width-1-1 " name="OtherContacts{{p.number}}" id="ImportantInfo{{p.number}}"
                          cols="30" rows="3" v-model="p.importantInfo" placeholder="z.B.: Medikamente, Bettnässer, ">
                </textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="uk-grid">
          <div class="uk-width-medium-1-2 "><div class="uk-panel uk-panel-box">
            <div class="uk-form-row">
              <label class="uk-form-label">Doctor</label>
              <input class="uk-width-1-1  " type="text" placeholder="Doctor" v-model="p.doctor">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Address of the Doctor</label>
              <input class="uk-width-1-1 " type="text" placeholder="Address of the Doctor" v-model="p.docAddress">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Telefone Number of the Doctor</label>
              <input class="uk-width-1-1 " type="text" placeholder="Telefone Number of the Doctor" v-model="p.docTel">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Krankenkasse</label>
              <input class="uk-width-1-1 " type="text" placeholder="Krankenkasse" v-model="p.kk">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Bloodtype</label>
              <input class="uk-width-1-1 " type="text" placeholder="Bloodtype" v-model="p.bloodtype">
            </div>
          </div></div>
          <div class="uk-width-medium-1-2 "><div class="uk-panel uk-panel-box">
          <div class="uk-form-row">
            <label class="uk-form-label">Ist der Teilnehmer Schwimmer?</label>
            <br>
            <div>
              <label><input type="radio" name="swimmer" id="swimmer" v-model="p.swimmer" value="true">Ja</label>
              <label><input type="radio" name="swimmer" id="swimmer" v-model="p.swimmer" value="false">Nein</label>
            </div>
          </div>
          </div></div>
        </div>
      </div>
      <div class="uk-grid">
        <div class="uk-width-1-1">
          <button class="uk-button uk-button-secondary" @click.prevent="addParticipant()">Weiterer Teilnehmer</button>
        </div>
      </div>
    </div>
    <div v-if="page === 3">
      <h2>Zusammenfassung:</h2>
      <H3>Erziehungsberechtigte:</H3>
      <dl>
        Prename and Name: {{entry.EBName}}
        Address:          {{entry.EBAddress}}
        PLZ, Place:       {{entry.EBLocation}}
        Telephone Number: {{entry.EBTel}}
        Mobile Number:    {{entry.EBMobile}}
        E-Mail:           {{entry.EBEmail}}
        Reachable:        {{entry.EBReachable | trans}}
      </dl>
      <hr>
      <div v-for="p in entry.participants">
        <h2>Participant{{p.number}}:</h2>
        <small>Teilnahmegebühr des {{p.number}}. Teilnehmers: {{ p.price }}€</small>
        Prename and Name{{p.name}}
        Date of Birth{{p.dateofbirth}}
        Important Infos{{p.importantInfo}}
        Doctor{{p.doctor}}
        Address of the Doctor{{p.docAddress}}
        Telefone Number of the Doctor{{p.docTel}}
        Krankenkasse{{p.kk}}
        Bloodtype{{p.bloodtype}}
        <hr>
      </div>
    </div>
    <hr>
    <button class="uk-button uk-button-secondary" v-if="page > 1" @click.prevent="back()">zurück</button>
    <button class="uk-button uk-button-secondary" v-if="page < 3" @click.prevent="forth()">Weiter</button>
    <button class="uk-button uk-button-primary" v-if="page === 3" @click.prevent="save()">Abschicken</button>
  </form>
</div>
