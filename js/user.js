$(function () {
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return re.test(email);
        };
    var vm = new Vue({
        el: "#pkenrollment",

        data: {
            validated: false,
            page: 1,
            participants: 1,
            agreeDanger: false,
            entry: {
                participants: [{
                    "number": 1,
                    "Prename": "",
                    "Name": "",
                    "Gender": "",
                    "Birthday": "",
                    "Street": "",
                    "PLZ": "",
                    "Tel": "",
                    "EMail": "",
                }],
                "comment": "",
                "DSGVO": false,
            }
        },
        methods: {
            save: function() {
                if (this.entry.agreeBox === "") {
                    this.agreeDanger = true;
                } else {
                    console.log(this.entry);
                    this.$http.post("/musical/save", { entry: this.entry }, function(data,status,xhr){
                        console.log(data);
                        console.log(status);
                    });
                    window.open("/thanks", '_self');
                }
              },
            removeParticipant: function(){
                this.participants -= 1;
                this.entry.participants.splice(-1,1);
            },
            addParticipant: function() {
                // validateEmail(this.entry.EBEmail) === false)
                if (this.validated === false ){
                    this.participants += 1
                    this.entry.participants.push({
                        "number": this.participants,
                        "Prename": "",
                        "Name": "",
                        "Street": "",
                        "Number": "",
                        "PLZ": "",
                        "Wohnort": "",
                        "Tel": "",
                        "E-Mail": "",
                        "Birthday": "",
                    });
                }
            },
            forth: function() {
                this.page += 1;
            },
            back: function() {
                if (this.page > 1) {
                    this.page -= 1;
                }
                
            }
        }
      });
    });
