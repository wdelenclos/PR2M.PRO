<?php
// -------- Configuration de PR2M  par Wladimir Delenclos --------

// Adresse mail contact
define('CONTACTMAIL','equipe.pr2m@gmail.com' );

// Administrateur
define('ADMINMAIL',[crc32('wdelenclos@gmail.com'),crc32('julie.nothelier@gmail.com')] );
define('MDP','125-ayN-92' );

// BDD INFO
define("DNS", 'mysql:host=localhost;');
define("DBNAME",'dbname=pr2m'  );
define('USERNAME','root');
define('PASSWD', 'root');

// Durée de vie des connexions en secondes
define('SESSIONEXPRIRE', 24*3600);
