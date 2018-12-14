<?php $title="Contrats";?>

<?php ob_start();?>
	<?php include(dirname(__FILE__)."/../includes/nav.php");?>
<?php $nav=ob_get_clean();?>

<?php ob_start();?>

	<p id="exergueObjet">Contrats</p>

	<a href="index.php?page=contrat&action=create"><input id="createContrat" class="boutons" type="button" name="nouveau" value="Nouveau"/></a>
	<section id="flexStart">
	
		<div id="bordsarrondis">		
			<table>
				<thead>
					<tr>
						<th>Numéro du contrat</th>
						<th>Type du contrat</th>
						<th>Titulaire du contrat</th>					
					</tr>
				</thead>
				<tbody>				
						<?php foreach($contrats as $c){
							$idW=$c[2];
							$nomTitulaire = get_woodien_from_contrat($idW)[1];
							$idType=$c[1];
							$nomType = get_nom_type_from_id($idType)[0];
							echo("<tr style=cursor:pointer onclick=\"window.location='index.php?page=contrat&action=read&id=".$c['id']."&idWoodien=".$idW."'\">");
							echo("<td>".$c['numContrat']."</td>					
								<td>".$nomType."</td>
								<td>".$nomTitulaire."</td>
							</tr>");
						}?>				
				</tbody>
			</table>
		</div>		
	</section>

<?php $content=ob_get_clean();?>

<?php include(dirname(__FILE__)."/../templates/template.php");?>
	

