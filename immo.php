<?php require 'elements/auth.php';
if (!isconnected() ) {
    header('Location: index.php');
    exit();
}
?>
<?php require 'elements/header.php';  ?>

<body>
	<header class="sticky-top">
	<nav class="navbar navbar-expand-md bg-light">
		<div class="container">
			<div  class="row">
				<div class="col-md-6">nom prenom</div>
				<div class="col-md-6"> <button id="btnDeco">deconnexion </button></div>
			</div> 
		</div>
	</nav>
	<div class="container row mx-auto">
		<button id="btnMesBiens" class="col border rounded shadow text-center">mes biens</button>
		<button id="btnAll" class="col border rounded shadow text-center selected">Tous les biens</button>
		<div class="col"></div>
		<button id="btnall" class="col border rounded shadow text-center">Tout</button>
		<button id="btnVente"class="col border rounded shadow text-center">Vente</button>
		<button id="btnLocation" class="col border rounded shadow text-center">Location</button>

	</div>
	</header>
	<div class="container border border-secondary rounded">
		<div id="resultseeeeeeee" class="row" >
			
		</div>
	</div>
		<?php $bienAll = initImmo(); ?>
		<?php foreach($bienAll as $bien):
			echo ("test : ");
			$idTypeBien=$bien->ID_TYPE_BIEN;
			$idTypeAnnonce =$bien->ID_TYPE_ANNONCE;
			$idUser =$bien->ID_USER;
			echo ("fin du test");
			?>
			<div id="<?= $bien->ID_BIEN ?>" class="col-sm-3">
                <div class="card">
                    <img src=<?= $bien->PHOTO ?> class="card-img-top" alt="photo">
                    <div class="card-body">
                    <h5 class="card-title">
                        libelé : <?= $bien->LIB ?>
                    </h5>
                    <p class="description"> 
						<?= $bien->DESCRIPTION ?>
                    </p>
                    <div class="row">
                        <div class="col">
							<p>Type : <?= typeBien($idTypeBien) ?></p>
					</div>
                    <div class="col text-right">
						<p><?= number_format($bien->PRIX, 2, ',', '.') ?> €</p>
					</div>
                </div>
                <div class="row">
					<div id="ColorTypeAnnonce"class="col"> En <?= typeAnnonce($idTypeAnnonce) ?></div>
                    <div class="col text-right"> <?= isIDuser($idUser) ?></div>
                </div>
                <div>
					<button class="btn btn-secondary stretched-link" type="button" data-toggle="modal" data-target="#modal<?= $bien->ID_BIEN ?>">Consulter</button>
				</div>
                <?// 	Ajout de la modale correspondant au bien ?>
            	<div class="modal" id="modal<?= $bien->ID_BIEN ?>">
        			<div class="modal-dialog modal-xl">
            			<div class="modal-content">
                        <?// Modal Header?>
                        	<div class="modal-footer">
                        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour à la liste</button>
                        	</div>
                            <?// Modal body?>
                        	<div class="modal-body container row">
                        	<?// image ?>
                                <div class="col">
                          			<img src="<?= $bien->PHOTO ?>" class="card-img-top" alt="photo">
                        		</div>
                            <?// détail du bien?>
                            	<div class="container col border shadow">
                              		<fieldset >
                                    	<legend> Détail du bien </legend>
											<div class="row ">
												<div class="col"><?= $bien->LIB ?></div> 
												<div class="col">Type annonce : <?= typeAnnonce($idTypeAnnonce) ?></div>
                                    		</div>
                                    		<div class="row">
												<div class="col  "> type bien : <?= $idTypeBien; typeBien($idTypeBien) ?></div> 
												<div class="col  ">prix : <?= number_format($bien->PRIX, 2, ',', '.') ?> €</div>
												<div class="col  ">
													<input id="boxcheck" type="checkbox" id="scales" name="scales">
                                        			<label for="boxcheck">Vendu/loué</label>
                                    			</div>
                                			</div>
                                			<div class="  "> <?= $bien->DESCRIPTION ?> </div>
                                			<div class="row">
												<div class="col"> Classe énergétique : <?= $bien->CLASSE_ENERGIE ?></div>
												<div class="col">Sup. habitable :<?= $bien->SH ?> m²</div>
											</div>
                                			<div class="row">
												<div class="col-3">Chambre : <?= $bien->CHAMBRE ?></div>
												<div class="col">Salle de bain : <?= $bien->SDB ?></div>
												<div class="col-2">WC : <?= $bien->WC ?></div>
												<div class="col">Sup. terrain : <?= $bien->ST ?> m²</div>
											</div>
                            		</fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php endforeach ?>



		//qwerqewrqwerqwerqwer

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/immo.js"></script>



</body>
</html>
