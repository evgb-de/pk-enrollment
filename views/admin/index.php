<?php $view->script('pkenrollment', 'pkenrollment:js/admin.js', 'vue') ?>
<script type="text/javascript" src="/app/assets/uikit/js/components/biblepicker.js"></script>
<div id="pkenrollment-table" class="uk-form">
  <button class="uk-button uk-button-primary uk-align-right" @click="save">{{ 'Save' | trans }}</button>

  <h2>{{ '{0} None Enrolled|one: One Enrollment|more: %count% Enrollments' | transChoice entries.length {count:entries.length} }}</h2>

  <form class="uk-width-large-1-1 uk-form" @submit="add">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isPreacherDanger }" placeholder="{{ 'Preacher' | trans }}" v-model="newPreacher">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isBiblepassageDanger }" placeholder="{{ 'Bible passage' | trans }}" type="text" data-uk-biblepicker="{format:'DD.MM.YYYY'}" v-model="newBiblepassage">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isDescriptionDanger }" placeholder="{{ 'Description' | trans }}" v-model="newDescription">
    <input class="uk-input-large uk-width-1-6"  v-bind:class="{ 'uk-form-danger': isDateDanger }" placeholder="{{ 'Date' | trans }}" type="text" data-uk-datepicker="{format:'DD.MM.YYYY'}" v-model="newDate">
    <button class="uk-button" @click="add">{{ 'Add' | trans }}</button>
  </form>
  
  <hr>

  <div class="uk-alert" v-if="!entries.length">{{ 'There is no one enrolled yet!' | trans }}</div>
  <div class="uk-overflow-container uk-width-1-1">
    <table class="uk-table-striped uk-table-hover uk-width-1-1" v-if="entries.length">
      <thead>
        <tr>
          <th class="uk-width-1-8">{{ '' | trans }}</th>
          <th class="uk-width-1-8">{{ '' | trans }}</th>
          <th class="uk-width-1-8">{{ '' | trans }}</th>
          <th class="uk-width-1-8">{{ '' | trans }}</th>
          <th class="uk-width-2-8">{{ '' | trans }}</th>
          <th class="uk-width-2-8">{{ '' | trans }}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="entry in entries" :class="{'uk-text-muted': entry.hidden}">
          <td class="uk-width-1-10 uk-text-center">{{ entry. }}</td>
          <td class="uk-width-1-10 uk-text-center">{{ entry. }}</td>
          <td class="uk-width-1-10 uk-text-center">{{ entry. }}</td>
          <td class="uk-width-2-10 uk-text-center">{{ entry. }}</td> 
        </tr>
      </tbody>
    </table>
  </div>
</div>
