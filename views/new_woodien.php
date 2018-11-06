<?php $title = "Nouveau Woodien"; ?>

<?php ob_start(); ?>
    <?php include(dirname(__FILE__)."/../includes/nav.php"); ?>
<?php $nav = ob_get_clean(); ?>

<?php ob_start(); ?>
    <section id="flexStart">
        <div id="identity">
            
            <p>Woodien</p>
			<div class="boutons">
				<input id="saveWoodien" type="button" name="save" value="Enregistrer"></input>
			</div>
            
        </div>
		
        <div id="etatcivil" class="details">
            <h1>Etat civil</h1>
			<div id="blocSection">
				<div id="infosdebase">			
				<h2>Infos de base</h2>
				<p id ="sexe"><strong>Sexe: </strong>
					
						<label for"homme"><input id="homme" class="modif" type="radio" name="sexe" value="homme"/>Homme</label><br />
						<label for"femme"><input id="femme" class="modif" type="radio" name="sexe" value="femme"/>Femme</label><br />
						
					</p>
					<p><strong>Prénom: </strong><input id='firstName' class='modif' type=text value=''/></p>
					<p><strong>Nom: </strong><input id='lastName' class='modif' type=text value=''/></p>
					<p><strong>Date de naissance: </strong><input id='dateOfBirth' class='modif' type='date' value=''/></p>
					<p><strong>Lieu de naissance: </strong><input id='lieuDeNaissance' class='modif' type=text value=''></input></p>
					<p><strong>Situation familiale: </strong>
						<select id='situation' class='modif'>
							<?php 
								foreach($situationMatri as $s){
									echo ("<option value='".$s['nom']."'>".$s['nom']."</option>");
									
								}
							?>					
						</select>				
					</p>
				</div>
				<div id="coordonnees">
				<h2>Coordonnées</h2>
						<p><strong>Adresse: </strong><input id='adresse' class='modif' type= textarea value=''/></p>
						<p><strong>Code Postal: </strong><input id='codepostal' class='modif' type= text value=''/></p>
						<p><strong>Ville: </strong><input id='ville' class='modif' type= text value=''/></p>
						<p><strong>Tel: </strong><input id='tel' class='modif' type= text placeholder='01-02-03-04-05' value=''/></p>
						<p><strong>Portable: </strong><input id='portable' class='modif' type= text value=''/></p>
				</div>
				
				<div id="autres">
					<h2>Autres</h2>
					<p class="titreParag">Travailleur handicapé:
						
						<label for "Handitrue"><input id="Handitrue" class="modif" type="radio" name="handicap" value="Handitrue"/>Oui</label>
						<label for "Handifalse"><input id="Handifalse" class="modif" type="radio" name="handicap" value="Handifalse"/>Non</label>
					
					</p>						
				</div>
			</div>		
		</div>
        
	</section>
	
<?php $content = ob_get_clean(); ?>

<?php include(dirname(__FILE__)."/../templates/template.php"); ?>