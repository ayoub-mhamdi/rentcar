@auth
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/st1.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
	
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	
	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
<body>

<header class="header">
	<div class="container-fluid" style="background-color:#005b7f; width:100%;height:80px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 searchCli">
						<span class="searC">
							<select class="selSear" name="typeSearCli">
							<option>Sélectionner e type de recherche</option>
							<option>...</option>
							</select>
						</span>
						<span class="search-box">
							<input type="text" placeholder="search.." name="searchCli" class="txtSearC">
							<button class="search-box-button">&#128269;</button>
						</span>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 searCliText">
					<div class="MenuC text-right">
						<span><a href="{{ url('/welcome') }}"><img src="/img/icCli2.png"></a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<br><br>

<section class="secBody">
	<div class="container">
		<div class="row">
			<table class="mytable">
				<tr><th>Matricule</th><th>PERMIS</th><th >Nom</th><th>Contrat</th><th>Date de prise</th><th>Date de fin</th><th>N° de jour</th><th width="20%">Prix total</th></tr>
				
				<tr><td>{{$voirplus->voiture_matricule}}</td><td>{{$voirplus->client_cin}} </td><td>{{$nom->prenom}} {{$nom->nom}}</td><td><a href="/contrat/{{ $voirplus->client_cin}}/{{ $voirplus->contrat}}" download='contrat'><img src="/img/download.png"></a></td><td>{{$voirplus->date_prise}}</td><td>{{$voirplus->date_fin}}</td><td>{{$voirplus->nombre_jours}}</td>
					<td>{{$voirplus->prix_total}} DH</td></tr>
				
			
				</table>
			<br>
			
		</div>

	</div> 

</section>
</body>
</html>
@endauth