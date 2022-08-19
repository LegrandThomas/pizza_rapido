
<?php

class Commande {

    var $prixRoyale = 6;

    var $prixCampagnarde = 8;

    var $nomClient = "SansNom";

    var $listePizzas;

    //Constructeur avec paramètre

    function Commande($nom) {    

        if ($nom != "") $this->nomClient = $nom;

    }


    function ajouterRoyale($nombre) {

        $this->listePizzas[0] += $nombre;

    }

    function ajouterCampagnarde($nombre) {

        $this->listePizzas[1] += $nombre;

    }

 function calculerPrix() {

        $montant_Royale = $this->listePizzas[0] * $this->prixRoyale;

        $montant_Campagnarde = $this->listePizzas[1] * $this->prixCampagnarde;

        return $montant_Royale + $montant_Campagnarde;

    }



    function afficherCommande() {

        echo "Commande du client : ".$this->nomClient;

        echo "<BR>Pizza(s) 'Royale' : ".$this->listePizzas[0];

        echo "<BR>Pizza(s) 'Campagnarde' : ".$this->listePizzas[1];

        echo "<HR>Totale de votre commande : ".$this->calculerPrix();

        echo " Euros<BR>";

    }

}


$client = new Commande("Thomas");

$client->ajouterRoyale(3);

$client->ajouterCampagnarde(2);

$client->afficherCommande();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
</head>
<body>
    
</body>
</html>
