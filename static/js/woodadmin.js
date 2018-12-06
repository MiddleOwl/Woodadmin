var url=new URL(location);

$(document).ready(function(){
	 $('#accordion').accordion({
        animate: 300,
		collapsible:true,
		heightStyle:'content',
		      
    });
	
	function check_contrats_emergency(){
		
		$.get(
			'index.php?page=get_contrats_emergency',
			false,
			callback,
			'text'			
		 );
		function callback(back){
			
			$('#contratsATraiter').html(back);			
			
		}
	}
	
	check_contrats_emergency();
	setInterval(check_contrats_emergency(),3600000);
	
	if(parseInt($('#calculFinPE').val())<30 || parseInt($('#calculFinCDD').val())<30){
		$('#vigilance').css({border:'5px solid red'});
				
	}	
	
	
	$('#bouton_connexion').click(function(){
       	$.post(
            'index.php?page=login',
            {
				login: $("#login").val(),
				password: $("#password").val()
				
			},
            function(data){
				
                if(data['backup'] == 'ok'){
					var prenomUser=data['prenom'];
                    location = 'index.php?page=portail_admin&user='+prenomUser;
					
                }
                else{
                    alert('Tu n\'es pas admin ou les infos saisies sont incorrectes. Clique sur OK pour te connecter!');
                }	
			},
			"json"
        );
    });
	var listeEchelons=[
		"AP11","AP21","AP22","AP31","AP32","AP41","AP42","AP51",
		"AF1","AF2","AF3","AF4","AF5","AF6","AF7","AF8","AF9","AF10","AF11","AF12","AF13","AF14","AF15","AF16","AF17",
		"AE1","AE2","AE3","AE4","AE5","AE6","AE7",
		"C11","C12","C13","C21","C22","C23","C31","C32","C33"];
		
		
	$('#echelon').autocomplete({
		source:listeEchelons,
		minLength:2,
		position:{my:'top',at:'right'}
	});
	
	
	
	$('#presence').change(function(){
		if($('#presence').val()=='Temps partiel'){
			$('#presenceAPreciser').show();
		}
		else{
			$('#presenceAPreciser').hide();
		}
	});
		
	if($('#presence').val()=='Temps partiel'){
			$('#presenceAPreciser').show();
		}
		else{
			$('#presenceAPreciser').hide();
		};
	
	
	
	
	$('.boutonNav').mouseover(function(){
		$(this).css({
			borderBottom:'1px solid rgba(140,198,62,0.8)',
			borderTop:'1px solid rgba(140,198,62,0.8)',
			borderRight:'1px solid rgba(140,198,62,0.8)',
			borderLeft:'1px solid rgba(140,198,62,0.8)',
			
		});
		
	});
	$('.boutonNav').mouseleave(function(){
		$(this).css({
		border:'1px solid white',
		
		})
	});
	
	$('tr').mouseover(function(){
		$(this).css({
			backgroundColor:'rgba(255,255,255,0.7)',
			
		});
	});
	
	$('tr').mouseleave(function(){
		$(this).css({
			background:'none',
			
		});
		
	});
	
	
	$('.modif').click(function(){
		$('#saveWoodien').css({display:'block'});	
		$('#updateWoodien').css({display:'block'});
		$('#saveEnfant').css({display:'block'});
		$('#updateContrat').css({display:'block'});
		$('#saveContrat').css({display:'block'});
		
	});
	
	function conversionDate(dateJS){
		var dateSplit=dateJS.split('/');		
		return(dateSplit)[0];		
	}
	
	$('#saveWoodien').click(function(){
		$tel=$('#tel').val();
		
		if(/([0-9]{2}-){4}[0-9]{2}/.test($tel)||$tel==""){
			$.post(
				'index.php?page=woodien&action=insert',
				{
					sexe:$('input:radio:checked').val(),
					name:$('#lastName').val(),
					firstname:$('#firstName').val(),				
					situation:$('#situation').val(),
					dateOfBirth:conversionDate($('#dateOfBirth').val()),
					lieuDeNaissance:$('#lieuDeNaissance').val(),
					adresse:$('#adresse').val(),
					codePostal:$('#codepostal').val(),
					ville:$('#ville').val(),
					tel:$('#tel').val(),
					portable:$('#portable').val(),
					travailleurHandicape:$('input[name=handicap]:radio:checked').val()
				},
				
				function(data){
					alert(data);
					location = 'index.php?page=woodiens';											 
				},
				
				"text"
			)
		}
		else{
			alert('Merci de saisir un numéro de tel au format 01-02-03-04-05');
		}
	});
	
	$('#updateWoodien').click(function(){
		
		var url=new URL(location);
		var idWoodienAMaj= url.searchParams.get('id');
		$tel=$('#tel').val();
		if(/([0-9]{2}-){4}[0-9]{2}/.test($tel)||$tel==""){
			$.post(
				'index.php?page=woodien&action=update',
				{
					id:idWoodienAMaj,
					sexe:$('input[name=sexe]:radio:checked').val(),
					name:$('#name').val(),
					firstname:$('#firstName').val(),
					dateOfBirth:$('#dateOfBirth').val(),
					lieuDeNaissance:$('#lieuDeNaissance').val(),
					situation:$('#situation').val(),
					adresse:$('#adresse').val(),
					codePostal:$('#codepostal').val(),
					ville:$('#ville').val(),
					tel:$('#tel').val(),
					portable:$('#portable').val(),
					travailleurHandicape:$('input[name=handicap]:radio:checked').val()
					
				},
				function(data){
					alert(data);
					location = 'index.php?page=woodiens';
				},
				"text"
			)
		}
		else{
			alert('Merci de saisir un numéro de tel au format 01-02-03-04-05');
		}
	});
	
	$('#deleteWoodien').click(function(){
		var url=new URL(location);
		var idWoodienASupprimer= url.searchParams.get('id');
		var prenomWoodienASupprimer=$('#firstName').val();
		var nomWoodienASupprimer=$('#name').val();
		if(confirm(prenomWoodienASupprimer+' '+nomWoodienASupprimer+' va être supprimé de la base des Woodiens. Veux-tu continuer?')){
		
			$.post(
				'index.php?page=woodien&action=delete',
				{
					id:idWoodienASupprimer
				},
				function(data){
					alert(data);
					location = 'index.php?page=woodiens';
				},
				
				"text"
			)
		}
		else{
			location = 'index.php?page=woodien&action=read&id='+idWoodienASupprimer;
		}
	});
	
	
	$('#saveEnfant').click(function(){
		
		var url=new URL(location);
		var idWoodienParent= url.searchParams.get('idWoodien');
		var idEnfant=url.searchParams.get('id');
		var action=url.searchParams.get('action');
		switch(action){
			case'read':
				$.post(
					'index.php?page=enfants&action=update',
					{
						id:idEnfant,
						name:$('#name').val(),
						firstname:$('#firstName').val(),
						dateOfBirth:$('#dateOfBirth').val(),
						idWoodien:idWoodienParent
					},
					function(data){
						alert(data);
						location='index.php?page=woodien&action=read&id='+idWoodienParent;				
					},
					"text"
				);
			break;
			
			case'create':
				$.post(
					'index.php?page=enfants&action=insert',
					{
						name:$('#name').val(),
						firstname:$('#firstName').val(),
						dateOfBirth:$('#dateOfBirth').val(),
						idWoodien:idWoodienParent
					},
					function(data){
						alert(data);
						location='index.php?page=woodien&action=read&id='+idWoodienParent;
					},
					"text"
				);
			break;
		}			
	});
	
	$('#deleteEnfant').click(function(){
		var url=new URL(location);
		var idEnfant=url.searchParams.get('id');
		var idWoodienParent=url.searchParams.get('idWoodien');
		$.post(
			'index.php?page=enfants&action=delete',
			{
				id:idEnfant
			},
			function (data){
				alert(data);
				location='index.php?page=woodien&action=read&id='+idWoodienParent;
			},
			"text"
		);
	});
	
	$('#saveContrat').click(function(){
		
		var url=new URL(location);
		var idWoodienTitulaire= url.searchParams.get('idWoodien');
		var action=url.searchParams.get('action');
		
		if($('#type').val()=='CDD' && ($('#dateFinCtr').val()=='' || $('#dateDebutCtr').val()=='')){
		
			alert('Rentre les dates de début et fin de contrat');
		
		}
	
		else if($('#type').val()=='CDI' && ($('#dateDebutCtr')).val()==''){
		
			alert('Rentre une date de début de contrat');
		
		}
		else{
			switch(action){
				case 'read':
				
					var idContrat = url.searchParams.get('id');
					var motif=$('#listeMotifsFinCtr').val();
					
					$.post(
						'index.php?page=contrat&action=update',
						{
							id:idContrat,
							idWoodien:idWoodienTitulaire,
							numContrat:$('#numContrat').val(),
							nomTypeContrat:$('#type').val(),
							dateDebut:$('#dateDebutCtr').val(),
							dateFin:$('#dateFinCtr').val(),
							motifFinContrat:$('#listeMotifsFinCtr').val(),
							periodeEssaiDuree:$('#dureePeriodeEssai').val(),
							periodeEssaiUniteTemps:$('#uniteTemps').val(),
							debutPeriodeEssai:conversionDate($('#debutPeriodeEssai').val()),
							finPeriodeEssai:conversionDate($('#finPeriodeEssai').val()),
							recruteurMetier:$('#recruteurM').val(),
							recruteurRaisonEtre:$('#recruteurRE').val(),
							recruteurIntegration:$('#recruteurI').val(),
							comment:$('#commentContrat').val(),
							statut:$('input[name=status]:radio:checked').val(),
							categorie:$('#category').val(),
							forfait:$('#forfait').val(),							
							echelon:$('#echelon').val(),
							coefficient:$('#coefficient').val(),
							presence:$('#presence').val(),
							ratioTempsPartiel:$('#ratioPresence').val(),
							lieuDeTravail:$('#lieuTravail').val()
						},
						
						function(data){
							var url=new URL(location);
							var idWoodienTitulaire = url.searchParams.get('idWoodien');
							alert(data);
							location='index.php?page=woodien&action=read&id='+idWoodienTitulaire;
						},	
							
									
						"text"	
					);
				break;
			
				case 'create':
				
					
					alert('forfait: '+$('#forfait').val());
					
					
					
					
					$.post(
						'index.php?page=contrat&action=insert',						
						{
							
							idWoodien:idWoodienTitulaire,
							numContrat:$('#numContrat').val(),
							nomTypeContrat:$('#type').val(),
							dateDebut:conversionDate($('#dateDebutCtr').val()),
							dateFin:conversionDate($('#dateFinCtr').val()),
							periodeEssaiDuree:$('#dureePeriodeEssai').val(),
							periodeEssaiUniteTemps:$('#uniteTemps').val(),
							debutPeriodeEssai:conversionDate($('#debutPeriodeEssai').val()),
							finPeriodeEssai:$('#finPeriodeEssai').val(),
							recruteurMetier:$('#recruteurM').val(),
							recruteurRaisonEtre:$('#recruteurRE').val(),
							recruteurIntegration:$('#recruteurI').val(),
							comment:$('#commentContrat').val(),
							statut:$('input[name=status]:radio:checked').val(),
							categorie:$('#category').val(),
							forfait:$('#forfait').val(),
							echelon:$('#echelon').val(),
							coefficient:$('#coefficient').val(),
							presence:$('#presence').val(),
							ratioTempsPartiel:$('#ratioPresence').val(),
							lieuDeTravail:$('#lieuTravail').val()
							
						},
						function(data){							
							
							alert(data);							
							location='index.php?page=woodien&action=read&id='+idWoodienTitulaire;
						},							
									
						"text"	
						
					);
				break;
			}
		}			
					
	});
	
	$('#saveSalaire').click(function(){
		var idContrat=url.searchParams.get('idContrat');
		var idWoodien=url.searchParams.get('idWoodien');
		
		$.post(
			'index.php?page=salaire&action=insert',
			{
				annee:$('#anneeSalaire').val(),
				montant:$('#montantSalaire').val(),
				idContrat:idContrat,
			},
			function(data){
				alert(data);
				location='index.php?page=contrat&id='+idContrat+'&idWoodien='+idWoodien+'&action=read';
			},
			"text"
		)
	});
			
	
	
	$('#deleteContrat').click(function(){
		
		var idContratASuppr = url.searchParams.get('id');
		if(confirm('Le contrat va être supprimé. Veux-tu continuer?')){
			$.post(
				'index.php?page=contrat&action=delete',
				{
					id:idContratASuppr
				},
				function(data){
					var url=new URL(location);
					var idWoodienTitulaire = url.searchParams.get('idWoodien');
					alert(data);
					location='index.php?page=woodien&action=read&id='+idWoodienTitulaire;
				},
				"text"
			)
		}
		else{
			location='index.php?page=infos_contrat&id='+idContratASuppr+'&idWoodien='+idWoodienTitulaire;
		}
	});
});
