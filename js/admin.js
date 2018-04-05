$(function () {
  var vm = new Vue({
    el: '#pkenrollment-table',
    data: {
      entries:              window.$data.config.entries,  
    },

    methods: {
      save: function() {
        this.$http.post('admin/pkenrollment/save', { entries: this.entries }, function() {
          UIkit.notify(vm.$trans('Saved.'), '');
        }).error(function(data) {
          UIkit.notify(data, 'danger');
        });
      },
      
    }
  })
});
