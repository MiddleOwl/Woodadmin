<?php $title = "Woodiens"; ?>


<?php ob_start(); ?>
    <?php include(dirname(__FILE__)."/../includes/nav.php"); ?>
<?php $nav = ob_get_clean(); ?>
<?php ob_start(); ?>

    <title></title>
	
	
	<a href="index.php?page=woodien&action=create"><input id="createWoodien" class="boutons" type="button" name="nouveau" value="Nouveau"></input></a>
	
    <section id="flexStart">
		<div id="bordsarrondis">
			<table>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Date de naissance</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($woodiens as $w){
						
							$dateDeNaissanceWoodienConvertie=conversionDate($w['dateOfBirth']);
							echo("
								<tr style=cursor:pointer onclick=\"window.location='index.php?page=woodien&action=read&id=".$w['id']."'\">"
							);
							echo("
								<td id='nomWoodien'>".$w['nom']."</a></td>
									<td>".$w['prenom']."</td>
									<td>".$dateDeNaissanceWoodienConvertie."</td>
								</tr>"
							);
						}
					?>
						
				</tbody>
			</table>
		</div>			
	
    </section>
	
<?php $content = ob_get_clean(); ?>
<?php include(dirname(__FILE__)."/../templates/template.php"); ?>

