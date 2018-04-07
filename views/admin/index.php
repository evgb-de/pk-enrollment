<?php $view->script('pkenrollment', 'pkenrollment:js/admin.js', 'vue') ?>
<table id="pkenrollment-table">
  <tr v-for="entry in entries">
    <td>{{entry.EBName}}</td>
  </tr>
</table>