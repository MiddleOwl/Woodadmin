<?php $title='Contrat';?>
<?php ob_start();?>
<?php include(dirname(__FILE__)."/../includes/nav.php");?>
<?php $nav=ob_get_clean();?>
<?php ob_start();?>
	<section id="flexStart">
		<p class="titreParag">Contrat</p>
		<p class="titreParag">
			<?php
				
				$designationContrat=($_GET['action']=='read')?($contrat['numContrat']):"Nouveau contrat";
				echo($designationContrat);
				
			?>
		</p>
		<?php
		
			$encartVigilance=($_GET['action']=='read')?('<div id="vigilance">
				<h2>Points de vigilance</h2>
					<div id="delaiFinPE">
						<p class="titreParag">Nb jours avant fin Période d\'Essai: <input id="calculFinPE" type="text" value="'.$delaiFinPE.'"/></p>
					</div>
				
					<div id="delaiFinCDD">
						<p class="titreParag">Nb jours avant fin CDD: <input id="calculFinCDD" type="text" value="'.$delaiFinCDD.'"/></p>
					</div>
					<div>
						
					</div>
			</div>'):'';
			echo($encartVigilance);
			
			
		?>		
						
		
		<div class="boutons">
			<input id="deleteContrat" type="button" name="delete" value="Supprimer"></input>
			<input id="saveContrat" type="button" name="update" value="Enregistrer"></input>
		</div>
		
		<div id="detailsContrat" class="details">				
			<h1>Informations sur le contrat</h1>			
			<div id="blocSectionContrat">
				<div id="generalites">
					<p class="titreParag">Titulaire du contrat: <?php echo($prenomWoodien.' '.$nomWoodien);?></p>
					<p class="titreParag">Numéro de contrat: 
						<?php 
							$valueNum=($_GET['action']=='read')?$contrat['numContrat']:'';
							echo("<input id='numContrat' class='modif' type=text value=".$valueNum."></input>");
						?>
					</p>
					<p class="titreParag">Type de contrat: 
						<select id='type' class='modif'>
							<?php
							
								foreach($typeContrat as $t){					
								$selected=($contrat['typeContrat']==$t['id'])?'selected="selected"':'';					
								echo('<option value="'.$t['nom'].'"'.$selected.'>'.$t['nom'].'</option>');
							}?>						
						</select>
					</p>
					
					<p class="titreParag">Date de début de contrat: 
						<?php 
							$valueDateDebutContrat=($_GET['action']=='read')?$contrat['dateDebut']:'';
							echo("<input id='dateDebutCtr' class='modif' type='date' value='".$valueDateDebutContrat."'/>");
						?>
					</p>
					
					<div id="finContrat">
						<p class="titreParag">Date de fin de contrat: 
							<?php 
								$valueDateFinContrat=($_GET['action']=='read')?$contrat['dateFin']:'';
								echo("<input id='dateFinCtr' class='modif' type='date' value='".$valueDateFinContrat."'/>");
								if($_GET['action']=='read'){
									echo('<p id="motifFinCtr" class="titreParag"> Motif de fin de contrat:							
											<select id="listeMotifsFinCtr" class="modif">
												<option value="fin CDD"');?><?php if($contrat['motifFinContrat']=="fin CDD")echo('selected="selected"');?><?php echo('>fin CDD</option>
												<option value="rupture conventionnelle"');?><?php if($contrat['motifFinContrat']=="rupture conventionnelle")echo('selected="selected"');?><?php echo('>rupture conventionnelle</option>
												<option value="demission"');?><?php if($contrat['motifFinContrat']=="demission")echo('selected="selected"');?><?php echo('>démission</option>
												<option value="licenciement"');?><?php if($contrat['motifFinContrat']=="licenciement")echo('selected="selected"');?><?php echo('>licenciement</option>
												<option value="retraite"');?><?php if($contrat['motifFinContrat']=="retraite")echo('selected="selected"');?><?php echo('>départ retraite</option>
												<option value="fin PE salarié"');?><?php if($contrat['motifFinContrat']=="fin PE salarié")echo('selected="selected"');?><?php echo('>fin de période d\'essai (init.salarié)</option>
												<option value="fin PE employeur"');?><?php if($contrat['motifFinContrat']=="fin PE employeur")echo('selected="selected"');?><?php echo('>fin de période d\'essai (init.employeur)</option>
												<option value="licenciement inapt.med"');?><?php if($contrat['motifFinContrat']=="licenciement inapt.med")echo('selected="selected"');?><?php echo('>licenciement inapt.médicale</option>
												<option value="deces"');?><?php if($contrat['motifFinContrat']=="licenciement inapt.med")echo('selected="selected"');?><?php echo('>décès</option>
											</select>
										</p>
									');
								}	
								else{
									echo('');
								}
							?>
						</p>
					</div>
										
					<div id='zoneComment'>
						<?php
							$valueComment=($_GET['action']=='read')?$contrat['commentaire']:'';
						?>
						<p class="titreParag">Commentaire: </p><?php echo("<textarea id='commentContrat' class='modif'>".$valueComment."</textarea>");?>
					</div>
					
					<p class="titreParag" id="status">Statut: 
						
						<label for"cadre"><input id="cadre" class="modif" type="radio" name="status" value="cadre"<?php if($_GET['action']=='read' AND $contrat['statut']=='cadre')echo('checked="checked"');?>/>Cadre</label><br />
						<label for"noncadre"><input id="noncadre" class="modif" type="radio" name="status" value="noncadre"<?php if($_GET['action']=='read' AND $contrat['statut']=='noncadre')echo('checked="checked"');?>/>Non cadre</label><br />
						
					</p>
					<p class="titreParag">Catégorie: 
						<select id="category" class="modif">
							<option value="Agents de production"<?php if($_GET['action']=='read' AND $contrat['categorie']=="Agents de production")echo('selected="selected"');?>>Agents de production</option>
							<option value="Agents fonctionnels"<?php if($_GET['action']=='read' AND $contrat['categorie']=="Agents fonctionnels")echo('selected="selected"');?>>Agents fonctionnels</option>
							<option value="Agents d'encadrement"<?php if($_GET['action']=='read' AND $contrat['categorie']=="Agents d'encadrement")echo('selected="selected"');?>>Agents d'encadrement</option>
							<option value="Cadres"<?php if($_GET['action']=='read' AND $contrat['categorie']=="Cadres")echo('selected="selected"');?>>Cadres</option>
						</select>
					</p>
					<p class="titreParag">Echelon:
						<?php 
							$valueEchelon=($_GET['action']=='read')?$contrat['echelon']:'';
							echo("<input id='echelon' class='modif' type='text' value='".$valueEchelon."'/>"); 
						?>
					</p>
					<p class="titreParag">Coefficient:
						<?php
							$valueCoeff=($_GET['action']=='read')?$contrat['coefficient']:'';							
							echo("<input id='coefficient' class='modif' type='text' value='".$valueCoeff."'/>");							
						?>
					</p>
				</div>
				
				<div id="parametresContrat">
					<p class="titreParag">Forfait: 
						<select id="forfait" class="modif">
							<option value="Forfait Jour"<?php if($_GET['action']=='read' AND $contrat['forfait']=="Forfait Jour")echo('selected="selected"');?>>Forfait Jour</option>
							<option value="Comptage Heures"<?php if($_GET['action']=='read' AND $contrat['forfait']=="Comptage Heures")echo('selected="selected"');?>>Comptage Heures</option>
						</select>
					</p>
					<p class="titreParag">Présence: 
						<select id="presence" class="modif">
							<option value="Temps plein"<?php if($_GET['action']=='read' AND $contrat['presence']=="Temps plein"){echo('selected="selected"');}?>>Temps plein</option>
							<option value="Temps partiel"<?php if($_GET['action']=='read' AND $contrat['presence']=="Temps partiel"){echo('selected="selected"');}?>>Temps partiel</option>
						</select>
					
					<p class="titreParag" id="presenceAPreciser" class="titreParagraphe">Précisez le ratio de temps travaillé: 
						<?php 
							$valueRatioPresence=($_GET['action']=='read')? $contrat['ratioTempsPartiel'] : '';							
							echo("<input id='ratioPresence' class='modif' type='number' name='ratiopresence' min='10' max='90' step='5' value= '".$valueRatioPresence."'/>%");
						?>
					</p>
					<p class="titreParag">Lieu de travail:
						<select id="lieuTravail" class="modif">
							<option value="Sur site"<?php if($_GET['action']=='read' AND $contrat['lieuDeTravail']=='Sur site'){echo('selected="selected"');}?>>Sur site</option>
							<option value="Paris"<?php if($_GET['action']=='read' AND $contrat['lieuDeTravail']=='Paris'){echo('selected="selected"');}?>>Paris</option>
							<option value="Itinérant"<?php if($_GET['action']=='read' AND $contrat['lieuDeTravail']=='Itinérant'){echo('selected="selected"');}?>>Itinérant</option>
						</select>
					</p>						
				</div>
			</div>				
		</div>		
	
		
		<div id="periodeEssai" class="details">
					
			<h1>Période d'essai</h1>
			<div id="blocSection">
				<div id="infosPeriodeEssai">
				
					<p class="titreParag">Durée période d'essai: <?php $valueDureePE=($_GET['action']=='read')?$contrat['periodeEssaiDuree']:0;echo("<input id='dureePeriodeEssai' class='modif' type=text maxlength=3 value=".$valueDureePE."></input>");?>
						<select id="uniteTemps" class="modif">
						
							<option value='semaines'<?php if($_GET['action']=='read' AND $contrat['periodeEssaiUniteDeTemps']=='semaine(s)')echo('selected="selected"');?>>semaine(s)</option>
							<option value='mois'<?php if($_GET['action']=='read' AND $contrat['periodeEssaiUniteDeTemps']=='mois')echo('selected="selected"');?>>mois</option>
							<option value='année'<?php if($_GET['action']=='read' AND $contrat['periodeEssaiUniteDeTemps']=='année(s)')echo('selected="selected"');?>>année(s)</option>
							
						</select>
					</p>
					<p class="titreParag">Date de début: 
						<?php 
							$valueDebutPeriodeEssai=($_GET['action']=='read')?$contrat['debutPeriodeEssai']:'';
							echo("<input id='debutPeriodeEssai' class='modif' type=date value=".$valueDebutPeriodeEssai."></input>");
						?>
					</p>
					<p class="titreParag">Date de fin: 
						<?php
							$valueFinPeriodeEssai=($_GET['action']=='read')?$contrat['finPeriodeEssai']:'';
							echo("<input id='finPeriodeEssai' class='modif' type=date value=".$valueFinPeriodeEssai."></input>");
						?>
					</p>
											
				</div>				
			</div>		
		</div>
			
		<div id="recruteurs" class="details">
			<h1>Recruteurs</h1>
			
			<p class="titreParag">Métier: 
				<select id="recruteurM" class="modif">
					<?php 
						foreach($recruteur as $r){
							$selected=($contrat['recruteurMetier']==$r['id'])?'selected="selected"':'';
							echo('<option value="'.$r['prenom'].'"'.$selected.'>'.$r['prenom'].'</option>');								
						}
					?>
				</select>
			</p>
			<p class="titreParag">Raison d'Être:
				<select id="recruteurRE"class="modif">
					  <?php
						foreach($recruteur as $r){
							$selected=($contrat['recruteurRaisonEtre']==$r['id'])?'selected="selected"':'';
							echo('<option value="'.$r['prenom'].'"'.$selected.'>'.$r['prenom'].'</option>');
						}
					?>
				</select>
			</p>
			<p class="titreParag">Integration:
				<select id="recruteurI" class="modif">
					<?php
						foreach($recruteur as $r){
							$selected=($contrat['recruteurIntegration']==$r['id'])?'selected="selected"':'';
							echo('<option value="'.$r['prenom'].'"'.$selected.'>'.$r['prenom'].'</option>');
						}
					?>
				</select>
			</p>
		</div>
		
		<?php
		
		if($_GET['action']=='read'){
			echo('
		
		<div id="salaires" class="details">
			<h1>Salaires</h1>
			<div class="boutons"><a href="index.php?page=salaire&action=create&idContrat='.$contrat['id'].'"><input type="button" name="nouveau" value="Nouveau"/></a></div>
			<div id="bordsArrondis">
				
						<table>
							<thead>
								<tr>
									<th>Année</th>
									<th>Montant</th>
								</tr>
								
							</thead>
							<tbody>');
						foreach($salaires as $s){
							echo('
								<tr>
									<td><a href="index.php?page=salaire&action=read&id='.$s['id'].'">'.$s['annee'].'</a></td>
									<td>'.$s['montant'].' €</td>
								</tr>'
							);
						}
					}
					else{echo('');}
				?>
							</tbody>
						</table>			
								
					
				
			</div>
		</div>
	</section>
<?php $content = ob_get_clean(); ?>
<?php include(dirname(__FILE__)."/../templates/template.php");?>
		