var testEnd = false;
var beTime ;
var reponse;
var rand;

// Moteur du test
function generateExport(data) {
    var value = JSON.stringify(data);
    var blob = new Blob([value], {type: "text/plain;charset=utf-8"});
    saveAs(blob, data.PatientName+'-'+data.PatientPrename+'-'+data.Date +".txt");
}
function endTest(data){

    if (testEnd !== true){
        testEnd = true;
        $('.test').hide();
        $('h1').html(template.fin);
        $('h1').show();
        var somme = 0;
        var max = 0;
        var min = 0;
        var longueur = data.InvervalsDB.length;
        for (var i = 0; i < longueur; i++){

            // Prépare le calcul de la moyenne;
            var array = data.InvervalsDB[i];
            somme += array.reponse;

            // Fais le calcul max et min

            if (array.reponse > max){
                max = array.reponse;
            }
            if (array.reponse< min || min == 0){
                min = array.reponse;
            }
        }
        var moyenne = somme/longueur;
        data.Moyenne = moyenne;
        data.Min = min;
        data.Max = max;
        $('.result').html('<p><span>Patient: </span>'+ data.PatientName+ ' ' + data.PatientPrename + ' </p><p><span>Répétitions: </span>'+data.NbRepetitions+'</p> <p><span>Anticipé: </span>'+data.NbAnticipations+'</p> <p><span>Moyenne: </span>'+ data.Moyenne +' ms</p> <p><span>Minimum: </span>'+data.Min+' ms</p> <p><span>Maximum: </span>'+data.Max+' ms</p><br><br><p>Les résultats complets ont été téléchargés ci-dessous.</p>');
        $('.result').show();
        generateExport(data);
    }
}

function startTest(data){
    $('#parameters').hide();
    $('h1').html(template.debut);
    function toggleFullScreen() {
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    }
    toggleFullScreen();
    setTimeout(firstToggleImage, 5000); // Attente de 5s ?

    function doTest(data) {
         beTime = window.performance.now();
            $(window).keypress(function (e) {
                if (e.which == 32) {
                    if (i == data.NbRepetitions){
                        endTest(data);
                     }
                    else{
                        if($('.test').is(":visible")){
                            i ++;
                            var newTime = window.performance.now();

                            response = newTime - beTime;

                            if( i !== 1 ){
                                response = response - rand;
                            }
                            else{
                                response = response - 5000;
                            }
                            console.log("Test "+ i + "/" + data.NbRepetitions +":  Temps de réponse:" + response);
                            toggleImage();
                            data.InvervalsDB.push({id: i, reponse :response, rdm: rand });
                            console.log(data.InvervalsDB);
                            function randomIntFromInterval(min,max)
                            {
                                return Math.floor(Math.random()*(max - min) + min) + parseInt(min);
                            }
                            rand  = randomIntFromInterval(data.IntervalMin, data.IntervalMax);
                            console.log(rand);
                            setTimeout(toggleImage, rand);
                            beTime = window.performance.now();
                        }
                        else{
                            console.log('---> Anticipation');
                            data.NbAnticipations +=1;

                        }
                    }
                }
            })

    }
    doTest(data);


}
// Récupération des paramètres

function getParameters(){
    var PatientName = $('#test_PatientName').val();
    var PatientPrename = $('#test_PatientPrename').val();
    verifyVariable(PatientName);
    var NbRepetitions = $('#nbrepetition').val();
    var IntervalMin = $('#intervalMin').val();
    var IntervalMax = $('#intervalMax').val();
    var imageTest = $( "#imageTest option:selected" ).text();
    console.log(imageTest);
    if (imageTest == "Forme"){
        var src = "images/forme.jpg";
    }
    else{
        var src = "images/sns.jpg";
    }
    $("#ImageTestIMG").attr('src', src);

    if(state == true){
        var ladate= new Date();
        ldate = ladate.getDate()+"/"+(ladate.getMonth()+1)+"/"+ladate.getFullYear();

        var TestData = {
            Date : ldate,
            PatientName : PatientName,
            PatientPrename : PatientPrename,
            ImageType: imageTest,
            NbRepetitions : NbRepetitions,
            IntervalMin : IntervalMin,
            IntervalMax : IntervalMax,
            InvervalsDB : [],
            NbAnticipations: 0,
            Moyenne : 0,
            Max : 0,
            Min : 0

        };

    var start = true;
    }
    if (start == true){
        startTest(TestData);
    }
}


// initialisation
toggleImage();
$("#parameters").submit(function(e){
    e.preventDefault();
});

document.getElementById("test_starter").addEventListener("click", getParameters);