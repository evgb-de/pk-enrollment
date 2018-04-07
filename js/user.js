$(function () {
    var vm = new Vue({
        el: "#pkenrollment",

        data: {
            page: 1,
            participants: 1,
            agreeDanger: false,
            isDEBName: "",
            isDEBAddress: "",
            isDEBLocation: "",
            isDEBTel: "",
            isDEBEmail: "",
            entry: {
                "EBName": "",
                "EBAddress": "",
                "EBLocation": "",
                "EBTel": "",
                "EBMobile": "",
                "EBEmail": "",
                "EBReachable": "",
                "EBOtherContacts": "",
                "agreeBox": "",
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
                    "tetanus": "",
                    "tetanusDate": "",
                    "isDname": false,
                    "isDdateofbirth": false,
                    "isDbathing": false,
                    "isDswimmer": false,
                    "isDpkw": false,
                    "isDwithoutMA": false,
                    "isDinsurance": false,
                    "isDoperator": false,
                    "isDtetanus": false,
                }
                ]
            }
        },

        methods: {
            save: function() {
                if (this.entry.agreeBox === "") {
                    this.agreeDanger = true;
                } else {
                    console.log(this.entry);
                    this.$http.post("/zeltlager/save", { entry: this.entry });
                    window.open("/thanks", '_self');
                }
              },
            removeParticipant: function(){
                this.participants -= 1;
                this.entry.participants.splice(-1,1);
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
                for (p in this.entry.participants) {
                    this.entry.participants[p].isDname = false;
                    this.entry.participants[p].isDdateofbirth = false;
                    this.entry.participants[p].isDbathing = false;
                    this.entry.participants[p].isDswimmer = false;
                    this.entry.participants[p].isDpkw = false;
                    this.entry.participants[p].isDwithoutMA = false;
                    this.entry.participants[p].isDinsurance = false;
                    this.entry.participants[p].isDoperator = false;
                    this.entry.participants[p].isDtetanus = false;
                    if (this.entry.participants[p].name === "" ||
                        this.entry.participants[p].dateofbirth === "" ||
                        this.entry.participants[p].bathing === "" ||
                        this.entry.participants[p].swimmer === "" ||
                        this.entry.participants[p].pkw === ""||
                        this.entry.participants[p].withoutMA === "" ||
                        this.entry.participants[p].insurance === "" ||
                        this.entry.participants[p].operator === "" ||
                        this.entry.participants[p].tetanus === ""
                    ) {
                        validated = false;
                        if (this.entry.participants[p].name === "" ) {
                            this.entry.participants[p].isDname = true;
                        }
                        if (this.entry.participants[p].dateofbirth === "" ) {
                            this.entry.participants[p].isDdateofbirth = true;
                        }
                        if (this.entry.participants[p].bathing === "" ) {
                            this.entry.participants[p].isDbathing = true;
                        }
                        if (this.entry.participants[p].swimmer === "" ) {
                            this.entry.participants[p].isDswimmer = true;
                        }
                        if (this.entry.participants[p].pkw === "" ) {
                            this.entry.participants[p].isDpkw = true;
                        }
                        if (this.entry.participants[p].withoutMA === "" ) {
                            this.entry.participants[p].isDwithoutMA = true;
                        }
                        if (this.entry.participants[p].insurance === "" ) {
                            this.entry.participants[p].isDinsurance = true;
                        }
                        if (this.entry.participants[p].operator === "" ) {
                            this.entry.participants[p].isDoperator = true;
                        }
                        if (this.entry.participants[p].tetanus === "") {
                            this.entry.participants[p].isDtetanus = true;
                        }
                    }
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
                    "tetanus": "",
                    "tetanusDate": "",
                    "isDname": false,
                    "isDdateofbirth": false,
                    "isDbathing": false,
                    "isDswimmer": false,
                    "isDpkw": false,
                    "isDwithoutMA": false,
                    "isDinsurance": false,
                    "isDoperator": false,
                    "isDtetanus": false,
                });
            },
            forth: function() {
                    var validated = false;
                    if (this.page === 1) {
                        if (this.entry.EBName === "" || this.entry.EBAddress === "" || this.entry.EBLocation === "" || this.entry.EBEmail === "") {
                            if( this.entry.EBName === "" ) {
                                this.isDEBName = true;
                            }
                            if( this.entry.EBAddress === "" ) {
                                this.isDEBAddress = true;
                            }
                            if( this.entry.EBLocation === "" ) {
                                this.isDEBLocation = true;
                            }
                            if( this.entry.EBTel === "" && this.entry.EBMobile === "" ) {
                                
                            }
                            if( this.entry.EBEmail === "") {
                                this.isDEBEmail = true;
                            }
                        } else {
                            validated = true;
                        } 
                        if (this.entry.EBTel === "" && this.entry.EBMobile === ""){
                            this.isDEBTel = true;
                            
                        } else if (validated === true) {
                            this.page += 1;
                        }
                    } else if (this.page === 2) {
                        validated = false;
                        for (p in this.entry.participants) {
                            this.entry.participants[p].isDname = false;
                            this.entry.participants[p].isDdateofbirth = false;
                            this.entry.participants[p].isDbathing = false;
                            this.entry.participants[p].isDswimmer = false;
                            this.entry.participants[p].isDpkw = false;
                            this.entry.participants[p].isDwithoutMA = false;
                            this.entry.participants[p].isDinsurance = false;
                            this.entry.participants[p].isDoperator = false;
                            this.entry.participants[p].isDtetanus = false;
                            if (this.entry.participants[p].name === "" ||
                                this.entry.participants[p].dateofbirth === "" ||
                                this.entry.participants[p].bathing === "" ||
                                this.entry.participants[p].swimmer === "" ||
                                this.entry.participants[p].pkw === ""||
                                this.entry.participants[p].withoutMA === "" ||
                                this.entry.participants[p].insurance === "" ||
                                this.entry.participants[p].operator === "" ||
                                this.entry.participants[p].tetanus === ""
                            ) {
                                validated = false;
                                if (this.entry.participants[p].name === "" ) {
                                    this.entry.participants[p].isDname = true;
                                }
                                if (this.entry.participants[p].dateofbirth === "" ) {
                                    this.entry.participants[p].isDdateofbirth = true;
                                }
                                if (this.entry.participants[p].bathing === "" ) {
                                    this.entry.participants[p].isDbathing = true;
                                }
                                if (this.entry.participants[p].swimmer === "" ) {
                                    this.entry.participants[p].isDswimmer = true;
                                }
                                if (this.entry.participants[p].pkw === "" ) {
                                    this.entry.participants[p].isDpkw = true;
                                }
                                if (this.entry.participants[p].withoutMA === "" ) {
                                    this.entry.participants[p].isDwithoutMA = true;
                                }
                                if (this.entry.participants[p].insurance === "" ) {
                                    this.entry.participants[p].isDinsurance = true;
                                }
                                if (this.entry.participants[p].operator === "" ) {
                                    this.entry.participants[p].isDoperator = true;
                                }
                                if (this.entry.participants[p].tetanus === "") {
                                    this.entry.participants[p].isDtetanus = true;
                                }
                            } else {
                                validated = true;
                            }
                        }
                        if (validated === true) {
                            this.page += 1;
                        } 
                    }
            },
            back: function() {
                this.page -= 1;
            }
        }
      });
    });
