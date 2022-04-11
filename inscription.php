<?php 

require 'dao/pays.php';
require 'dao/localite.php';
$payslist = getListPays();
$villelist = getListLocalite();
//var_dump(//$payslist
//    $payslist[0]->cde_pays,
//    $payslist[0]->nom_pays,
//);



?>

<!DOCTYPE html> 
<html lang="fr">
<head>
        <title> Login </title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>


<body>
        
        <div class="container col-5">
        <form>
            <div id="Email" class="form row justify-content-center">
               <label class="col-5 float-left">Email *</label> 
                <input id="inputEmail" class="form-control col-5 float-right " type="text">
                <div id="EmailChecked"> </div>
            </div>
            <div id="EmailVerif" class="form row justify-content-center">
                <label class="col-5 float-left">Email vérification*</label> 
                <input id="inputEmailVerif"  onpaste="return false;" class="form-control col-5 float-right " type="text">
                <div id="EmailVerifChecked"> </div>
            </div>
            <div id="passwd" class="form row justify-content-center">
               <label class="col-5 float-left">Password *</label> 
                <input id="inputpassword" class="form-control col-5 float-right " type="password">
                <div id="passwordChecked"> </div>
            </div>
            <div id="passwdverif" class="form row justify-content-center">
                <label class="col-5 float-left">Vérification</label> 
                <input id="inputpasswordVerif" onpaste="return false;" class="form-control col-5 float-right" type="password">
                <div id="passwordVerifChecked"> </div>
            </div>
            <div id="prenom" class="form row justify-content-center">
               <label class="col-5 float-left">Prénom *</label> 
                <input id="inputprenom" class="form-control col-5 float-right" type="text">
                <div id="prenomChecked"> </div>
            </div>
            <div id="nom" class="form row justify-content-center">
               <label class="col-5 float-left">Nom *</label> 
                <input id="inputnom" class="form-control col-5 float-right" type="text">
                <div id="nomChecked"> </div>
            </div>
            <div id="address" class="form row justify-content-center">
               <label class="col-5 float-left">Adresse *</label> 
                <input id="inputaddress" class="form-control col-5 float-right" type="text">
                <div id="addressChecked"> </div>
            </div>
            <div id="pays" class="form row justify-content-center">
                <label class="col-5 float-left">Pays  </label> 
                <select name="pays">
                <option value="">Choisissez un pays :</option>
                <?php foreach($payslist as $pays){ ?>
                    <option value="<?php echo $pays->getcde(); ?>"><?php echo $pays->getnom(); ?></option>
                <?php } ?>
                </select>
            </div>
            <div id="localite" class="ui-widget form row justify-content-center">
               <label class="col-5 float-left">Localité *</label>
                <input id="inputlist" list="inputlocalite" class="form-control col-5 float-right " type="text" placeholder ="Entrer code postale ou choisir la localité">
                    <datalist id="inputlocalite">
                    </datalist>
                    
                <div id="localiteChecked"> </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
            <input id="scales" type="checkbox" name="scales">
            <div id="checkboxChecked"> </div>
                <label for="scales" class="mx-3">Accepter les conditions générales : </label>
            
            </div>
            <div class="col row form ml-1 my-1">
            <label class="col-6"> </label> 
                <button id="verifbutton" type="button" class="btn btn-primary col-6 btn-lg pull-right">
                inscription
                </button>
            </div>
        </form>
        </div>
</body>
<?php 
require 'elements/footer.php'
?>

</html>
