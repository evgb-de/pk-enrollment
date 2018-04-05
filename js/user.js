$(function () {
    var vm = new Vue({
        el: "#pkenrollment",

        data: {
            page: 1,
            participants: 1,
            entry: {
                "EBName": "",
                "EBAddress": "",
                "EBLocation": "",
                "EB-Tel": "",
                "EB-Mobile": "",
                "EB-Email": "",
                "EB-Reachable": "",
                "EB-OtherContacts": "",
                "participants": [{
                    "number": 1,
                    "name": "",
                    "dateofbirth": "",
                    "price": 170,
                    "importantInfo": "",
                    "bathing": "",
                    "swimmer": "",
                    "pkw": "",
                    "withoutMA": "",
                    "insurance": "",
                    "operator": "",
                    "doctor": "",
                    "docAddress": "",
                    "docTel": "",
                    "kk": "",
                    "bloodtype": "",
                    "tetanus": ""
                }
                ]
            }
        },

        methods: {
            save: function() {
                this.$http.post("admin/pkenrollment/save", { entry: this.entry }, function() {
                    UIkit.notify(vm.$trans("Saved."), "");
                }).error(function(data) {
                    UIkit.notify(data, "danger");
                });
              },
            addParticipant: function() {
                this.participants += 1;
                var prize = 160;
                if (this.participants === 2) {
                    prize = 160;
                } else if (this.participants === 3) {
                    prize = 150;
                } else {
                    prize = 140;
                }
                this.entry.participants.push({
                    "number": this.participants,
                    "name": "",
                    "dateofbirth": "",
                    "price": prize,
                    "importantInfo": "",
                    "bathing": "",
                    "swimmer": "",
                    "pkw": "",
                    "withoutMA": "",
                    "insurance": "",
                    "operator": "",
                    "doctor": "",
                    "docAddress": "",
                    "docTel": "",
                    "kk": "",
                    "bloodtype": "",
                    "tetanus": ""
                });
                console.log("log: ", this.entry);
            },
            deleteParticipant: function() {
                this.entry.participants.splice(-1, 1);
            },
            forth: function() {
                this.page += 1;
                console.log("plus 1: ", this.entry);
            },
            back: function() {
                this.page -= 1;
            }
        }
      });
    });
