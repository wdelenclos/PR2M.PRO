// Variables initialisées
    var i = 0;


// Fonctions annexes

    function verifyVariable(PatientName){
        if(PatientName == null || PatientName == "" ){
            state = false;
        }
        else{
            state = true;
        }
    }

    function toggleImage(){
        $('.test').toggle();
    }
    function firstToggleImage(){
        $('h1').hide();
        $('.test').toggle();
    }