<?php  



$host = "remotemysql.com:3306";
$dbname = "8MmzlXeqbr"; // to adapt
$login = "root";
$mdp = "root";

/**
 * try connection
 * catch and display the error and stop process
 */
try{
    $db = new PDO(
        'mysql:host='.$host.';dbname='.$dbname.';charset=UTF8',
        $login,
        $mdp
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
    die('Erreur:'.$e->getMessage());
}


include_once "./pizza.php";

 ?>
 
 
<?
               if(isset($_POST)) {

$sql = $db->prepare("
INSERT INTO `pizza`(`id`, `name`, `prix`, `categorie`) VALUES (null,:name,:prix,:categorie)
");


// Secure
$sql->bindValue(":name", "Reine", PDO::PARAM_STR);
$sql->bindValue(":prix", 7, PDO::PARAM_INT);
$sql->bindValue(":categorie", 2, PDO::PARAM_INT);

var_dump($sql);
$sql->execute();

print_r("enregistrement ok");

}else{
    print_r("echec enregistrement");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div class="main">
        <div class="background-color">
            <div class="form">
                <form class="row g-3 needs-validation" action="Admin_dashboard.php">
                    <h2>Ajouter une pizza</h2>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="validationCustom02" name="Nom_Pizza" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Choisissez une catégorie</label>
                        <select class="form-select" id="validationDefault04" name="Categorie_pizza" required>
                        <option selected disabled value=""></option>
                        <option>Base tomates</option>
                        <option>Base créme</option>
                        <option>Spéciales</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Prix</label>
                        <input type="text" class="form-control" id="validationCustom02" name="Prix_Pizza" required>
                    </div>
                    
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" method="POST">Ajouter</button>
                    </div>
                </form>



                <div class="lists">
                    <div class="existing-persos">
                        <h3 class="list_persos">Pizza(s) Disponible(s)
                        </h3>
                        <div class="scroll">

                            <?php

                                $prepare_array = $db->prepare("SELECT * FROM `pizza`");
                                $prepare_array->execute();
                                $array = $prepare_array->fetchAll(PDO::FETCH_ASSOC);

                                $prepare_max = $db->prepare("SELECT COUNT(*) FROM `pizza`  ");
                                $prepare_max->execute();
                                $max = $prepare_max->fetch(PDO::FETCH_COLUMN);

                                for ($i=0; $i < $max; $i++) { 
                                    echo '<p class="persos">';
                                    echo $array[$i]["name"];
                                    echo '</br>';
                                    echo 'Prix : '.$array[$i]["prix"].' €';
                                    echo '</br>';
                                  
                                    if ($array[$i]["categorie"]==1) 
                                    {
                                        echo 'Catégorie '.$array[$i]["categorie"].': base tomates';
                                    }elseif ($array[$i]["categorie"]==2) {
                                        echo 'Catégorie '.$array[$i]["categorie"].': base créme';
                                    }else{
                                        echo 'Catégorie  '.$array[$i]["categorie"].': Spéciales';
                                    }
                                    echo '</p>';

                                }

                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>

<p>Mise à jour pizza </p>
<button>Update</button>
<p>Supprimer</p>
<button>Del</button>
    
</body>
</html>