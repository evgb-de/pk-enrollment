<?php $view->script('pkenrollment', 'pkenrollment:js/user.js', 'vue');
      // $view->script('datepicker', '/app/assets/uikit/js/components/datepicker.min.js', 'uikit');
      // $view->script('form-select', '/app/assets/uikit/js/components/form-select.min.js', 'uikit');
      // $view->style('datepicker', '/app/assets/uikit/css/components/datepicker.css', 'uikit');
?>
<!--<link rel="stylesheet" href="/app/assets/uikit/css/components/datepicker.min.css?v=da7c">-->
<!-- ToDo: make user-definable enrollments possible, let users define fields, titels and pages ... -->
<div id="pkenrollment" >
  <h1 class="uk-heading-line uk-text-center">
    <span>Go West, Go Wild</span> <br>
    <small>Anmeldung zum Zeltlager 2018</small>
  </h1>
  <hr>
  <form class="uk-form uk-form-stacked">
    <!-- Erziehungsberechtigte: -->
    <div v-if="page === 1">      
      <h2>Kontakt & Angaben Erziehungsberechtigte:</h2>
      <br>
      <div class="uk-grid">
        <!-- box 1 -->
        <div class="uk-width-medium-1-2">
          <div class="uk-panel uk-panel-box">
            <div class="uk-form-row">
              <label class="uk-form-label">Vorname und Nachname</label>
              <input class="uk-width-medium-1-1 " v-bind:class="{ 'uk-form-danger' : isDEBName}" type="text" placeholder="Vorname und Nachname" v-model="entry.EBName">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Adresse</label>
              <input class="uk-width-medium-1-1 " v-bind:class="{ 'uk-form-danger' : isDEBAddress}"type="text" placeholder="Adresse" v-model="entry.EBAddress">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">PLZ, Ort</label>
              <input class="uk-width-medium-1-1 " v-bind:class="{ 'uk-form-danger' : isDEBLocation}"type="text" placeholder="PLZ, Ort" v-model="entry.EBLocation">
            </div>
          </div>
        </div>
        <!-- box 1 -->
        <div class="uk-width-medium-1-2 ">
          <div class="uk-panel uk-panel-box">
            <div class="uk-form-row">
              <label class="uk-form-label">Telefon Nummer</label>
              <input class="uk-width-medium-1-1 " v-bind:class="{ 'uk-form-danger' : isDEBTel}"type="text" placeholder="Telefon Nummer" v-model="entry.EBTel">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Handy Nummer</label>
              <input class="uk-width-medium-1-1 " v-bind:class="{ 'uk-form-danger' : isDEBTel}"type="text" placeholder="Handy Nummer" v-model="entry.EBMobile">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">E-Mail Adresse</label>
              <input class="uk-width-medium-1-1" v-bind:class="{ 'uk-form-danger' : isDEBEmail}"type="text" placeholder="E-Mail Adresse" v-model="entry.EBEmail">
            </div>
          </div>
        </div>
      </div>
      <!-- box 3 -->
      <div class="uk-grid">
        <div class="uk-width-medium-1-1 ">
          <div class="uk-panel uk-panel-box">
            <div class="uk-form-row">
              <label class="uk-form-label">Sind sie während des Zeltlagers mit obigen Daten erreichbar?</label>
              <div class="uk-form-controls">
                <label><input type="radio" name="Reachable" id="EBReachable" v-model="entry.EBReachable" value="true">Ja</label>
                <br>
                <label><input type="radio" name="Reachable" id="EBNotReachable" v-model="entry.EBReachable" value="false">Nein</label>
              </div>
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Weitere Kontakte</label>
              <div class="uk-form-controls">
                <textarea class="uk-width-medium-1-1" name="OtherContacts" id="OtherContacts"
                            cols="30" rows="3" v-model="entry.EBOtherContacts" placeholder="Weitere Kontakte">
                </textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Teilnehmer: -->
    <div v-if="page === 2">
      <div v-for="p in entry.participants" class="uk-panel uk-panel-box">
        <h2>
          <span>Teilnehmer {{p.number}}:</span> <br>
          <small>Teilnahmegebühr des {{p.number}}. Teilnehmers: {{p.price}}€</small>
        </h2>
        <!-- grunddaten -->
        <div class="uk-grid">
          <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
              <label class="uk-form-label">Vorname und Nachname</label>
              <input class="uk-width-large-1-1 " :class="{ 'uk-form-danger': p.isDname }" type="text" placeholder="Vorname und Nachname" v-model="p.name">
            </div>
          </div>
          <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
              <label class="uk-form-label">Geburtsdatum</label>
              <input class="uk-width-1-1" :class="{ 'uk-form-danger': p.isDdateofbirth }" type="text"  placeholder="Geburtsdatum" data-uk-datepicker="{format:'DD.MM.YYYY'}" v-model="p.dateofbirth">
            </div>
          </div>
        </div>
        <!-- wichtiges -->
        <div class="uk-grid">
          <div class="uk-width-medium-1-2">
            <div class="uk-form-row">
              <label class="uk-form-label">Wichtige Hinweise</label>
              <textarea class="uk-width-1-1" name="OtherContacts{{p.number}}" id="ImportantInfo{{p.number}}"
                        cols="30" rows="3" v-model="p.importantInfo" placeholder="z.B.: Medikamente, Bettnässer, ">
              </textarea>
            </div>
            <br>
            <div class="uk-grid">
              <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                  <label class="uk-form-label" :class="{ 'uk-form-danger': p.isDbathing }">Badeerlaubnis:</label>
                  <div class="uk-form-controls":class="{ 'uk-form-danger': p.isDbathing }">
                    <label><input type="radio" name="bathing" id="bathing" v-model="p.bathing" value="true">Ja, unteer Aufsicht</label>
                    <br>
                    <label><input type="radio" name="bathing" id="bathing" v-model="p.bathing" value="false">Nein</label>
                  </div>
                </div>
              </div>
              <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                  <label class="uk-form-label" :class="{ 'uk-form-danger': p.isDswimmer }">Teilnehmer/in ist ...</label>
                  <div class="uk-form-controls" :class="{ 'uk-form-danger': p.isDswimmer }">
                    <label><input type="radio" name="swimmer" id="swimmer" v-model="p.swimmer" value="true">... Schwimmer</label>
                    <br>
                    <label><input type="radio" name="swimmer" id="swimmer" v-model="p.swimmer" value="false">... Nichtschwimmer</label>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="uk-form-row">
              <label class="uk-form-label" :class="{ 'uk-form-danger': p.isDpkw }">Der/die Teilnehmer/in darf im Privat-PKW der Mitarbeiter mitgenommen werden:</label>
              <div class="uk-form-controls" :class="{ 'uk-form-danger': p.isDpkw }">
                <label><input type="radio" name="pkw" id="pkw" v-model="p.pkw" value="true">Ja</label>
                <br>
                <label><input type="radio" name="pkw" id="pkw" v-model="p.pkw" value="false">Nein</label>
              </div>
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label" :class="{ 'uk-form-danger': p.isDwithoutMA }">Der/die Teilnehmer/in darf unter verantwortlichen Gegebenheiten (z.B. bei Zoobesuch, Stadtbummel) in
kleineren Gruppen auch ohne Aufsichtsperson unterwegs sein:</label>
              <div class="uk-form-controls" :class="{ 'uk-form-danger': p.isDwithoutMA }">
                <label><input type="radio" name="withoutMA" id="withoutMA" v-model="p.withoutMA" value="true">Ja</label>
                <br>
                <label><input type="radio" name="withoutMA" id="withoutMA" v-model="p.withoutMA" value="false">Nein</label>
              </div>
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label" :class="{ 'uk-form-danger': p.isDinsurance }">Besteht für den/die Teilnehmer/in eine Haftplichtversicherung?</label>
              <div class="uk-form-controls" :class="{ 'uk-form-danger': p.isDinsurance }">
                <label><input type="radio" name="insurance" id="insurance" v-model="p.insurance" value="true">Ja</label>
                <br>
                <label><input type="radio" name="insurance" id="insurance" v-model="p.insurance" value="false">Nein</label>
              </div>
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label" :class="{ 'uk-form-danger': p.isDoperator }">Der/die Teilnehmer/in darf, wenn dies von einem Arzt für nötig gehalten wird, geimpft oder operiert werden:</label>
              <div class="uk-form-controls" :class="{ 'uk-form-danger': p.isDoperator }">
                <label><input type="radio" name="operator" id="operator" v-model="p.operator" value="true">Ja</label>
                <br>
                <label><input type="radio" name="operator" id="operator" v-model="p.operator" value="false">Nein</label>
              </div>
            </div>
          </div>
          <!-- Hausarzt --> 
          <div class="uk-width-medium-1-2 ">
            <div class="uk-form-row">
              <label class="uk-form-label">Hausarzt</label>
              <input class="uk-width-1-1  " type="text" placeholder="Hausarzt" v-model="p.doctor">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Adresse des Hausarztes</label>
              <input class="uk-width-1-1 " type="text" placeholder="Adresse des Hausarztes" v-model="p.docAddress">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Telefonnummer des Hausarztes</label>
              <input class="uk-width-1-1 " type="text" placeholder="Telefonnummer des Hausarztes" v-model="p.docTel">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Krankenkasse</label>
              <input class="uk-width-1-1 " type="text" placeholder="Krankenkasse" v-model="p.kk">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label">Blutgruppe und Rhesusfaktor falls bekannt</label>
              <input class="uk-width-1-1 " type="text" placeholder="Blutgruppe und Rhesusfaktor falls bekannt" v-model="p.bloodtype">
            </div>
            <div class="uk-form-row">
              <label class="uk-form-label" :class="{ 'uk-form-danger': p.isDtetanus }">Ist der/ die Teilnehmer/in gegen Wundstarkrampf (Tetanus) geimpft?</label>
              <div class="uk-form-controls" :class="{ 'uk-form-danger': p.isDtetanus }">
                <label><input type="radio" name="tetanus" id="tetanus" v-model="p.tetanus" value="true">Ja</label>
                <input v-if="p.tetanus === 'true'" v-model="p.tetanusDate" type="text" placeholder="Wann?">
                <br>
                <label><input type="radio" name="tetanus" id="tetanus" v-model="p.tetanus" value="false">Nein</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="uk-grid">
        <div class="uk-width-1-2 uk-text-center">
          <button v-if="participants > 1" class="uk-button uk-button-secondary" @click.prevent="removeParticipant()">Teilnehmer Weniger</button>
        </div>
        <div class="uk-width-1-2 uk-text-center">
          <button class="uk-button uk-button-secondary" @click.prevent="addParticipant()">Weiterer Teilnehmer</button>
        </div>
      </div>
    </div>
    <div v-if="page === 3">
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
