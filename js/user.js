$(function () {
    var vm = new Vue({
        el: '#pkenrollment',

        data: {
            entry: {
                'EB-Name': '',
                'EB-Address': '',
                'EB-Location': '',
                'EB-Tel': '',
                'EB-Mobile': '',
                'EB-Email': '',
                'EB-Reachable': '',
                'EB-OtherContacts': '',
                'participants': [{
                    'number': 1,
                    'name': '',
                    'dateofbirth': '',
                    'price': 170,
                    'importantInfo': '',
                    'bathing': '',
                    'swimmer': '',
                    'pkw': '',
                    'withoutMA': '',
                    'insurance': '',
                    'operator': '',
                    'doctor': '',
                    'docAddress': '',
                    'docTel': '',
                    'kk': '',
                    'bloodtype': '',
                    'tetanus': '',
                },
                ]
            },
        },

        methods: {
            save: function() {
                this.$http.post('admin/pkenrollment/save', { entry: this.entry }, function() {
                  UIkit.notify(vm.$trans('Saved.'), '');
                }).error(function(data) {
                  UIkit.notify(data, 'danger');
                });
              },
            addParticipant: function() {
                if (this.entry.participants.lenght === 1) {
                    var prize = 160;
                } else if (this.entry.participants.lenght <= 2) {
                    var prize = 150
                } else {
                    var prize = 140
                }
                this.entry.participants.push({'number': this.entry.participants.lenght + 1, 'name': '', 'dateofbirth': '', 'price': prize});
            },
            deleteParticipant: function() {
                this.entry.participants.splice(-1,1);
            },
        }
      })
    });
