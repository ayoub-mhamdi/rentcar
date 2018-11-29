<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/st1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
	
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
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
						<span><a type="button"  data-toggle="modal" data-target="#ajouter"><img src="img/icCli.png"></a></span>
						<span><a href="#"><img src="img/icCli2.png"></a></span>
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
				<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>CIN</th><th width="20%">Action</th></tr>

				@foreach($clients as $client)

				<tr><td>{{ $client->id }}</td><td>{{ $client->nom }}</td><td>{{ $client->prenom }}</td><td>{{ $client->cin }}</td>
					<td>
				<span><a type="button" href="/client/{{$client->id}}" data-toggle="modal" data-target="#modify"><img src="img/ac1.png"></a></span>

				<span><a type="button"  data-toggle="modal" data-target="#delete"><img src="img/ac2.png"></a></span>

				<span><a type="button" href="/client/{{$client->id}}" data-toggle="modal" data-target="#view"><img src="img/ac3.png"></span></a>
					</td></tr>

				@endforeach

			</table>
			<br>
				<div class="text-center" style="font-size:18px;">
					<a href="" style="padding-right:5px;">&laquo;</a><a href="" style="padding-right:5px;padding-left:5px;">1</a>
					<a href="" style="padding-right:5px;padding-left:5px;">2</a><a href="" style="padding-left:5px;">&raquo;</a></div>
		</div>
	</div> 
	<!-- modals -->
		<div class="modal fade" id="ajouter"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
							  <h4 style="color:#005b7f;">Ajouter un client</h4>
					<form method="POST" action="/client">
						{{csrf_field() }}
								<div class="col-xs-12  text-center">
											<div><label class="spn text-left">Nom</label><input type="text" name="nom" class="txtmod"></div>
											<div><label class="spn text-left">Prénom</label><input type="text" name="prenom" class="txtmod"></div>
											<div><label class="spn text-left">Tele</label><input type="text" name="tel" class="txtmod"></div>
											<div><label class="spn text-left">CIN</label><input type="text" name="cin" class="txtmod"></div>
											<div><label class="spn text-left">Email</label><input type="text" name="email" class="txtmod"></div>
											<div><label class="spn text-left">Age</label><input type="integer" name="age" class="txtmod"></div>
								</div>
										<br>
										<h4 style="color:#005b7f">Veuillez selectionner le(s)<br> fichiers à charger</h4>
										<div class="col-xs-12">
											<div><label class="spn text-left">CIN</label></div>
											<div><label class="spn text-left">PERMIS</label></div>
										</div>
										<br>
										<br>
                              </div>
                              <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary">Ajouter</button>
                              </div>
                    </form>
                            </div>
                        </div>
        </div>

	<div class="modal fade" id="modify"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
							  <h4 style="color:#005b7f;">Modifier le client séléctionné</h4>
							
							<div class="col-xs-12  text-center">
											<div><label class="spn text-left">Nom</label><input type="text" name="nom" class="txtmod" placeholder={{$client->nom}}></div>
											<div><label class="spn text-left">Prénom</label><input type="text" name="prenom" class="txtmod" placeholder={{$client->prenom}}></div>
											<div><label class="spn text-left">Tele</label><input type="text" name="tel" class="txtmod" placeholder={{$client->tel}}></div>
											<div><label class="spn text-left">CIN</label><input type="text" name="cin" class="txtmod" placeholder={{$client->cin}}></div>
											<div><label class="spn text-left">Email</label><input type="text" name="email" class="txtmod" placeholder={{$client->email}}></div>
											<div><label class="spn text-left">Date d'ajout</label><input type="date" name="dateAjout" class="txtmod" placeholder={{$client->created_at->toFormattedDateString()}}></div>
								</div>
										<br>
										<h4 style="color:#005b7f">Veuillez selectionner le(s)<br> fichiers à charger</h4>
										<div class="col-xs-12">
											<div><label class="spn text-left">CIN</label></div>
											<div><label class="spn text-left">PERMIS</label></div>
										</div>
										<br>
										<br>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" name="aj" class="btn btn-secondary">Modifier
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                             
                            </div>
                        </div>
        </div>

	<div class="modal fade" id="delete"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
							  <h4 style="color:#005b7f;">voulez vous suprimmer le client séléctionné</h4>

                              <div class="modal-footer">
                                <button type="submit" name="aj" class="btn btn-secondary">oui
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
                              </div>
                            </div>
                        </div>
        </div>
	</div>
        	<div class="modal fade" id="view"  role="dialog">
                     <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-body">
							<h4 style="color:#005b7f;">Information:</h4>
							<div class="col-xs-12  text-center">

								<div><label class="spn text-left">Nom</label><input type="text" name="nom" class="txtmod" value={{$client->nom}}></div>

								<div><label class="spn text-left">Prénom</label><input type="text" name="pre" class="txtmod" value={{$client->prenom}}></div>

								<div><label class="spn text-left">Tele</label><input type="text" name="tel" class="txtmod" value={{$client->tel}}></div>

								<div><label class="spn text-left">CIN</label><input type="text" name="cin" class="txtmod" value={{$client->cin}}></div>

								<div><label class="spn text-left">Email</label><input type="text" name="em" class="txtmod" value={{$client->email}}></div>

								<div><label class="spn text-left">AGE</label><input type="number" name="age" class="txtmod" value={{$client->age}}></div>
<br><br><br>
							</div>

							<h4 style="color:#005b7f">Liste des voitures occupé par ce client</h4>
							<table class="mytable">
							<tr><th>Date de prise</th><th>Date de fin</th><th>Matricule</th><th>details de contrat</th></tr>
							<tr><td>02/04/2018</td><td>07/04/2018</td><td>AA1</td><td><a href="#">Voir plus</a></td></tr>
							<tr><td>02/05/2018</td><td>06/05/2018</td><td>AA1</td><td><a href="#">Voir plus</a></td></tr>

							</table>					
							<br><br>
                            </div>
                            </div>
                        </div>
        	</div>
</section>


</body>
</html>