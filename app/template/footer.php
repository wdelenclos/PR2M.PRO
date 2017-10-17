<!-- footer content -->
<footer>
    <div class="pull-right">
        PR2M - Développé par <a href="https://wdelenclos.fr">Wladimir Delenclos</a> | <a href="https://github.com/wdelenclos/PR2M.PRO/releases"> <span class="version"></span>
        </a>    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-wysiwyg -->
<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="../vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="../vendors/select2/dist/js/select2.full.min.js"></script>

<!-- Autosize -->
<script src="../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="../vendors/starrr/dist/starrr.js"></script>
<!-- Custom Theme Scripts -->

<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Parsley -->
<script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
<script> // Horloge
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('clock').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    startTime();
</script>
<script>
    var request = $.ajax({
        url: "https://api.github.com/repos/wdelenclos/PR2M.PRO/releases/latest",
        method: "GET",
        dataType: "html"
    });
    request.done(function(msg){
        console.log(JSON.parse(msg).tag_name);
        document.getElementsByClassName('version')[0].innerText = JSON.parse(msg).tag_name;
    });

</script>


<!-- Script VTNV -->
<script src="../vendors/vtnv/FileSaver.js"></script>
<script src="../vendors/vtnv/template.js"></script>
<script src="../vendors/vtnv/module.js"></script>

<!-- Scripts tests -->
<?php if($_GET['p']== 'vtnv'){

	?>
    <script>
        var testEnd = false;
        var beTime ;
        var reponse;
        var rand;
        var results;
        // Moteur du test
        function generateExport(data) {
            //var value = JSON.stringify(data);
            results = data;
            //var blob = new Blob([value], {type: "text/plain;charset=utf-8"});
            //saveAs(blob, data.PatientName+'-'+data.PatientPrename+'-'+data.Date +".txt");
        }
        function showUpdateDone(){
            document.getElementById('upd').innerHTML = 'A jour !';
        }
        function getCookie(input) {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var name = cookies[i].split('=')[0].toLowerCase();
                var value = cookies[i].split('=')[1].toLowerCase();
                if (name === input) {
                    return value;
                } else if (value === input) {
                    return name;
                }
            }
            return "";
        };
        function vtnv_sendData(){
            console.log(results);
            var stringify = JSON.stringify(results);
            $.ajax({
                url: "./function/sendDataVTNV.php",
                data: {vtnv: stringify},
                type: 'post',
                complete: function(data) {
                    if(data.status !== 200){
                        console.log('Erreur: ' + data.statusText);
                    }
                    else{
                        console.log(data);
                        showUpdateDone();
                        window.location.href = "/app/index.php?p=details&identifiant="+document.querySelector('.profile_info span:first-child').innerHTML+"&id="+results.PatientID;
                    }
                }
            });
        }
        function endTest(data){

            if (testEnd !== true){
                testEnd = true;
                $('.test').hide();
                $('#vtnvTitle').html(template.fin);
                $('#vtnvTitle').show();
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
                $('.result').innerHTML = "";
                $('#vtnvTitle').innerHTML = "Résultats du test";
                $('.result').html('<p><span>Patient ID: </span>'+ data.PatientID + ' </p><p><span>Répétitions: </span>'+data.NbRepetitions+'</p> <p><span>Anticipé: </span>'+data.NbAnticipations+'</p> <p><span>Moyenne: </span>'+ data.Moyenne +' ms</p> <p><span>Minimum: </span>'+data.Min+' ms</p> <p><span>Maximum: </span>'+data.Max+' ms</p><br><br>  <button class="btn btn-warning" onclick="window.location.reload()">Annuler</button> <button class="btn btn-success" id="upd" onclick="vtnv_sendData();">Enregistrer</button>');
                $('.result').show();
                generateExport(data);
            }
        }

        function startTest(data){
            $('.test').show();
            $('#vtnvTitle').html(template.debut);
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
                            if($('#ImageTestIMG').is(":visible")){
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
            verifyVariable(PatientName);
            var NbRepetitions = $('#nbrepetition').val();
            var IntervalMin = $('#intervalMin').val();
            var IntervalMax = $('#intervalMax').val();
            var testtype = $('#testtype').val();
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
                    Type : testtype,
                    PatientID : PatientName,
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
    </script>
<?php }
?>

<?php if($_GET['p']== 'lexical'){

	?>
    <script>
        var testEnd = false;
        var beTime ;
        var reponse;
        var rand;
        var results;
        // Moteur du test
        function generateExport(data) {
            //var value = JSON.stringify(data);
            results = data;
            //var blob = new Blob([value], {type: "text/plain;charset=utf-8"});
            //saveAs(blob, data.PatientName+'-'+data.PatientPrename+'-'+data.Date +".txt");
        }
        function showUpdateDone(){
            document.getElementById('upd').innerHTML = 'A jour !';
        }

        function lexical_sendData(){
            console.log(results);
            var stringify = JSON.stringify(results);
            $.ajax({
                url: "./function/sendDataLexical.php",
                data: {la: stringify},
                type: 'post',
                complete: function(data) {
                    if(data.status !== 200){
                        console.log('Erreur: ' + data.statusText);
                    }
                    else{
                        console.log(data);
                        showUpdateDone();
                        window.location.href = "/app/index.php?p=details&identifiant="+document.querySelector('.profile_info span:first-child').innerHTML+"&id="+results.PatientID;
                    }
                }
            });
        }
        function endTest(data){

            if (testEnd !== true){
                testEnd = true;
                $('.test').hide();
                $('#vtnvTitle').html(template.fin);
                $('#vtnvTitle').show();
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
                $('.result').innerHTML = "";
                $('#vtnvTitle').innerHTML = "Résultats du test";
                $('.result').html('<p><span>Patient ID: </span>'+ data.PatientID + ' </p><p><span>Répétitions: </span>'+data.NbRepetitions+'</p> <p><span>Anticipé: </span>'+data.NbAnticipations+'</p> <p><span>Moyenne: </span>'+ data.Moyenne +' ms</p> <p><span>Minimum: </span>'+data.Min+' ms</p> <p><span>Maximum: </span>'+data.Max+' ms</p><br><br>  <button class="btn btn-warning" onclick="window.location.reload()">Annuler</button> <button class="btn btn-success" id="upd" onclick="lexical_sendData();">Enregistrer</button>');
                $('.result').show();
                generateExport(data);
            }
        }

        function startTest(data){
            $('.test').show();
            $('#vtnvTitle').html(template.debut);
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
                Array.prototype.remove = function() {
                    var what, a = arguments, L = a.length, ax;
                    while (L && this.length) {
                        what = a[--L];
                        while ((ax = this.indexOf(what)) !== -1) {
                            this.splice(ax, 1);
                        }
                    }
                    return this;
                };
                var ary = [0 ,1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9,
                    10 ,11 ,12 ,13 ,14 ,15 ,16 ,17 ,18 ,19,
                    20 ,21 ,22 ,23 ,24 ,25 ,26 ,27 ,28 ,29,
                    30 ,31 ,32 ,33 ,34 ,35 ,36 ,37 ,38 ,39,
                    40 ,41 ,42 ,43 ,44 ,45 ,46 ,47 ,48 ,49,
                    50 ,51 ,52 ,53 ,54 ,55 ,56 ,57 ,58 ,59,
                    60];
                beTime = window.performance.now();
                $(window).keypress(function (e) {
                    if (e.which == 37 || e.which == 38) {
                        var isitOk;
                        var imgid;
                        if (i == data.NbRepetitions){
                            endTest(data);
                        }
                        else{
                            if($('#ImageTestIMG').is(":visible")){
                                i ++;
                                var newTime = window.performance.now();

                                response = newTime - beTime;
                                if (e.which == 37){
                                     isitOk = false;
                                }
                                else{
                                     isitOk = true;
                                }
                                if( i !== 1 ){
                                    response = response - rand;
                                }
                                else{
                                    response = response - 5000;
                                }
                                console.log("Test "+ i + "/" + data.NbRepetitions +":  Temps de réponse:" + response);
                                function randimg(){
                                    var nidex =  Math.floor((Math.random() * ary.length) + 0);
                                    var val = ary[nidex];
                                    var src = '/app/images/la/'+val+'.jpg';
                                }

                                toggleImage();
                                $("#ImageTestIMG").attr('src', src);
                                data.InvervalsDB.push({id: i, resp : isitOk, tmps: response, img: val });
                                console.log(data.InvervalsDB);
                                setTimeout(toggleImage, 2000);
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
            verifyVariable(PatientName);
            var NbRepetitions = $('#nbrepetition').val();
            var IntervalMin = $('#intervalMin').val();
            var IntervalMax = $('#intervalMax').val();
            var testtype = $('#testtype').val();

            if(state == true){
                var ladate= new Date();
                ldate = ladate.getDate()+"/"+(ladate.getMonth()+1)+"/"+ladate.getFullYear();

                var TestData = {
                    Date : ldate,
                    Type : testtype,
                    PatientID : PatientName,
                    ImageType: 'eval',
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
    </script>
<?php }
 if($_GET['p']== 'training'){

	?>
    <script>
        var testEnd = false;
        var beTime ;
        var reponse;
        var rand;
        var results;
        // Moteur du test
        function generateExport(data) {
            //var value = JSON.stringify(data);
            results = data;
            //var blob = new Blob([value], {type: "text/plain;charset=utf-8"});
            //saveAs(blob, data.PatientName+'-'+data.PatientPrename+'-'+data.Date +".txt");
        }
        function showUpdateDone(){
            document.getElementById('upd').innerHTML = 'A jour !';
        }

        function lexical_sendData(){
            console.log(results);
            var stringify = JSON.stringify(results);
            $.ajax({
                url: "./function/sendDataLexical.php",
                data: {la: stringify},
                type: 'post',
                complete: function(data) {
                    if(data.status !== 200){
                        console.log('Erreur: ' + data.statusText);
                    }
                    else{
                        console.log(data);
                        showUpdateDone();
                        window.location.href = "/app/index.php?p=details&identifiant="+document.querySelector('.profile_info span:first-child').innerHTML+"&id="+results.PatientID;
                    }
                }
            });
        }
        function endTest(data){

            if (testEnd !== true){
                testEnd = true;
                $('.test').hide();
                $('#vtnvTitle').html(template.fin);
                $('#vtnvTitle').show();
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
                $('.result').innerHTML = "";
                $('#vtnvTitle').innerHTML = "Résultats du test";
                $('.result').html('<p><span>Patient ID: </span>'+ data.PatientID + ' </p><p><span>Répétitions: </span>'+data.NbRepetitions+'</p> <p><span>Anticipé: </span>'+data.NbAnticipations+'</p> <p><span>Moyenne: </span>'+ data.Moyenne +' ms</p> <p><span>Minimum: </span>'+data.Min+' ms</p> <p><span>Maximum: </span>'+data.Max+' ms</p><br><br>  <button class="btn btn-warning" onclick="window.location.reload()">Annuler</button> <button class="btn btn-success" id="upd" onclick="lexical_sendData();">Enregistrer</button>');
                $('.result').show();
                generateExport(data);
            }
        }

        function startTest(data){
            $('.test').show();
            $('#vtnvTitle').html(template.debut);
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
                Array.prototype.remove = function() {
                    var what, a = arguments, L = a.length, ax;
                    while (L && this.length) {
                        what = a[--L];
                        while ((ax = this.indexOf(what)) !== -1) {
                            this.splice(ax, 1);
                        }
                    }
                    return this;
                };
                var ary = [0 ,1 ,2 ,3 ,4 ,5 ,6 ,7 ,8 ,9,
                    10 ,11 ,12 ,13 ,14 ,15 ,16 ,17 ,18 ,19,
                    20 ,21 ,22 ,23 ,24 ,25 ,26 ,27 ,28 ,29,
                    30 ,31 ,32 ,33 ,34 ,35 ,36 ,37 ,38 ,39,
                    40 ,41 ,42 ,43 ,44 ,45 ,46 ,47 ,48 ,49,
                    50 ,51 ,52 ,53 ,54 ,55 ,56 ,57 ,58 ,59,
                    60];
                beTime = window.performance.now();
                $(window).keypress(function (e) {
                    if (e.which == 37 || e.which == 38) {
                        var isitOk;
                        var imgid;
                        if (i == data.NbRepetitions){
                            endTest(data);
                        }
                        else{
                            if($('#ImageTestIMG').is(":visible")){
                                i ++;
                                var newTime = window.performance.now();

                                response = newTime - beTime;
                                if (e.which == 37){
                                    isitOk = false;
                                }
                                else{
                                    isitOk = true;
                                }
                                if( i !== 1 ){
                                    response = response - rand;
                                }
                                else{
                                    response = response - 5000;
                                }
                                console.log("Test "+ i + "/" + data.NbRepetitions +":  Temps de réponse:" + response);
                                function randimg(){
                                    var nidex =  Math.floor((Math.random() * ary.length) + 0);
                                    var val = ary[nidex];
                                    var src = '/app/images/la/'+val+'.jpg';
                                }

                                toggleImage();
                                $("#ImageTestIMG").attr('src', src);
                                data.InvervalsDB.push({id: i, resp : isitOk, tmps: response, img: val });
                                console.log(data.InvervalsDB);
                                setTimeout(toggleImage, 2000);
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
            verifyVariable(PatientName);
            var NbRepetitions = $('#nbrepetition').val();
            var IntervalMin = $('#intervalMin').val();
            var IntervalMax = $('#intervalMax').val();
            var testtype = $('#testtype').val();

            if(state == true){
                var ladate= new Date();
                ldate = ladate.getDate()+"/"+(ladate.getMonth()+1)+"/"+ladate.getFullYear();

                var TestData = {
                    Date : ldate,
                    Type : testtype,
                    PatientID : PatientName,
                    ImageType: 'training',
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
    </script>
<?php }
?>
</body>
</html>
