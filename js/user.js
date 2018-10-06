$(function () {
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return re.test(email);
        };
    function validateParticipants() {
        vm.validated = 0;
        for (var part in vm.entry.participants) {
            if (validateEmail(vm.entry.participants[part]["EMail"]) === false ||
                vm.entry.participants[part]["Prename"] === "" ||
                vm.entry.participants[part]["Name"] === "" ||
                vm.entry.participants[part]["Street"] === "" ||
                vm.entry.participants[part]["PLZ"] === "" ||
                vm.entry.participants[part]["Tel"] === "" ||
                vm.entry.participants[part]["Birthday"] === ""
            ){
                console.log(vm.entry.participants[part]["Prename"]);
                if (vm.entry.participants[part]["Prename"] === ""){
                    vm.entry.participants[part]["isDPrename"] = true;
                } else { vm.entry.participants[part]["isDPrename"] = false; }
                if (vm.entry.participants[part]["Name"] === ""){
                    vm.entry.participants[part]["isDName"] = true;
                } else { vm.entry.participants[part]["isDName"] = false; }
                if (vm.entry.participants[part]["Street"] === ""){
                    vm.entry.participants[part]["isDStreet"] = true;
                } else { vm.entry.participants[part]["isDStreet"] = false; }
                if (vm.entry.participants[part]["Gender"] === ""){
                    vm.entry.participants[part]["isDGender"] = true;
                } else { vm.entry.participants[part]["isDGender"] = false; }
                if (vm.entry.participants[part]["PLZ"] === ""){
                    vm.entry.participants[part]["isDPLZ"] = true;
                } else { vm.entry.participants[part]["isDPLZ"] = false; }
                if (vm.entry.participants[part]["Tel"] === ""){
                    vm.entry.participants[part]["isDTel"] = true;
                } else { vm.entry.participants[part]["isDTel"] = false; }
                if (validateEmail(vm.entry.participants[part]["EMail"]) === false){
                    vm.entry.participants[part]["isDEMail"] = true;
                } else { vm.entry.participants[part]["isDEMail"] = false; }
                if (vm.entry.participants[part]["Birthday"] === ""){
                    vm.entry.participants[part]["isDBirthday"] = true;
                } else { vm.entry.participants[part]["isDBirthday"] = false; }
            } else {
                vm.validated += 1;
                vm.entry.participants[part]["isDPrename"] = false;
                vm.entry.participants[part]["isDName"] = false;
                vm.entry.participants[part]["isDStreet"] = false;
                vm.entry.participants[part]["isDGender"] = false;
                vm.entry.participants[part]["isDPLZ"] = false;
                vm.entry.participants[part]["isDTel"] = false;
                vm.entry.participants[part]["isDEMail"] = false;
                vm.entry.participants[part]["isDBirthday"] = false;
            }
        }
        if (vm.validated === vm.participants) {
            return true;
        } else {
            return false;
        }
    }
    var vm = new Vue({
        el: "#pkenrollment",

        data: {
            validated: 0,
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
                    "isDPrename": false,
                    "isDName": false,
                    "isDGender": false,
                    "isDBirthday": false,
                    "isDStreet": false,
                    "isDPLZ": false,
                    "isDTel": false,
                    "isDEMail": false,
                }],
                "DSGVO": false,
                "agreeBox": false,
                "comment": "",
            }
        },
        methods: {
            save: function() {
                if (this.entry.agreeBox === false || this.entry.DSGVO === false) {
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
                if (validateParticipants() === true) {
                    this.participants += 1
                    this.entry.participants.push({
                        "number": this.participants,
                        "Prename": "",
                        "Name": "",
                        "Gender": "",
                        "Birthday": "",
                        "Street": "",
                        "PLZ": "",
                        "Tel": "",
                        "EMail": "",
                        "isDPrename": false,
                        "isDName": false,
                        "isDGender": false,
                        "isDBirthday": false,
                        "isDStreet": false,
                        "isDPLZ": false,
                        "isDTel": false,
                        "isDEMail": false,
                    });
                }
            },
            forth: function() {
                if (validateParticipants() === true) {
                    this.page += 1;
                }
            },
            back: function() {
                if (this.page > 1) {
                    this.page -= 1;
                }
                
            }
        }
      });
    });
