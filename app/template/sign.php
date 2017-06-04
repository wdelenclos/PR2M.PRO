<div id="sign">
    <div class="container-fluid">
        <nav>
            <img src="assets/img/Logo.png" class="img-responsive logo" alt="PR2M"></nav>
        <div class="row content">

            <div class="col-md-8">
                <h1>Première utilisation</h1>
                <p>Nous avons détécté qu’il s’agit de votre première utilisation de PR2M,<br/>
                    commencez par renseigner vos informations professionnelles pour initialiser l’application.</p>
                <form class="form-group" action="function/signer.php" method="post">
                    <div class="form-inline">
                        <input type="text" class="form-control" id="sign_Name" name="sign_Name" placeholder="Nom" required>
                        <input type="text" class="form-control" id="sign_FirstName" name="sign_FirstName" placeholder="Prénom" required>
                    </div>

                    <input type="email" class="form-control" id="sign_Email" placeholder="Email" name="sign_Email"  required>
                    <a href="?p=login">Ce n’est pas ma première utilisation</a>

                    <button id="sign_btn" type="submit" class="btn btn-default">Créer le profil</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>