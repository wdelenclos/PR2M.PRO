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
        $('#ImageTestIMG').toggle();
    }
    function firstToggleImage(){
        $('#vtnvTitle').hide();
        $('#ImageTestIMG').toggle();
    }