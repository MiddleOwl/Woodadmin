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
		
		<div id='accordion'>
			<h4>titre 1</h4>
			<div>
				Lorem ipsum et tout le bazar
				Lorem ipsum et tout le bazar
				Lorem ipsum et tout le bazar
				Lorem ipsum et tout le bazar
				Lorem ipsum et tout le bazar
				Lorem ipsum et tout le bazar
				Lorem ipsum et tout le bazar
				Lorem ipsum et tout le bazar
			</div>
			<h4>titre2</h4>
			<div>
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
				du texte du texte du texte
			</div>
			<h4>titre3</h4>
			<div>
				Mauris mauris ante, blandit et,
				ultrices a, suscipit eget, quam. 
				Integer ut neque. Vivamus nisi metus,
				molestie vel, gravida in, condimentum 
				sit amet, nunc. Nam a nibh. Donec suscipit eros.
				Nam mi. Proin viverra leo ut odio. Curabitur malesuada. 
				Vestibulum a velit eu ante scelerisque vulputate. 
			</div>
		</div>
			
			
	
    </section>
	
<?php $content = ob_get_clean(); ?>
<?php include(dirname(__FILE__)."/../templates/template.php"); ?>

