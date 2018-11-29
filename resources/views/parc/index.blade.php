@auth
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

  <meta name="csrf-token" content="{{ csrf_token() }}" />

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
						<span><a href="{{ url('/welcome') }}"><img src="img/icCli2.png"></a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<br><br><br><br>


    <!-- Page Content -->
    <div class="container">

      <div class="row text-center text-lg-left">

 
@foreach($voitures as $voiture)

		<div class="col-lg-3 col-md-4 col-xs-6">
			<div class="welcome-single-slide">
         <span>
            <img class="img-fluid img-thumbnail" src="/PhotosCar/{{ $voiture->matricule}}/{{ $voiture->photo}}" style="background-color:transparent;">


            @if(  $voiture->statut == 'occupee' )
				             <div class="project_title">
				           <a type="button" class="detail-modal"  data-matricule="{{$voiture->matricule}}" data-marque="{{$voiture->marque}}"  data-statut="{{$voiture->statut}}" data-prix="{{$voiture->prix}}" data-date_fin="{{$voiture->date_fin}}"  >
				                   <div class="transbox">
                            <h5>DETAILS</h5>
                          </div>
				                </a>
				            </div>
                        <div class="catagory-title">
                            <a >
                                <h5>{{ $voiture->prix}}DH / jour</h5>
                                <h4> occupée</h4>                  
                            </a>
                             <div class="led-box">
                                    <div class="led-red"></div>
                                  </div>
                        </div>
			@elseif ($voiture->statut == 'garage')

									 <div class="project_title">
				           <a type="button" class="detail-modal2"  data-matricule="{{$voiture->matricule}}" data-marque="{{$voiture->marque}}"  data-statut="{{$voiture->statut}}" data-prix="{{$voiture->prix}}">
				                   <div class="transbox">
                            <h5>LOUER</h5>
                          </div>
				                </a>

				            </div>
						<div class="catagory-title">
                            <a >
                                <h5>{{ $voiture->prix}}DH / jour</h5>
                                <h4>au garage</h4>
                            </a>
                                                     <div class="led-box">
                                    <div class="led-green"></div>
                                  </div>
                        </div>
            @else 
            			<div class="catagory-title">
                            <a type="button"  data-toggle="modal" data-target="#Available">
                                <h5>{{ $voiture->prix}}DH / jour</h5>
                                <h5>saisissez statut</h5>
                            </a>
                        </div>
            @endif

           </span>
        </div>




      </div>

      @endforeach


 {{$voitures->links()}}
    </div>


<br>


	<div class="modal fade" id="NotAvailable"  role="dialog">
                     <div class="modal-dialog">
                         <div class="modal-content">
                           <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:#005b7f;">A propos de la voiture selectionné</h4>
      </div>
                           <div class="modal-body">

							<div class="col-xs-12  text-center">
                  <form method="POST" action="/editReservation" enctype="multipart/form-data">
{{ csrf_field() }}
							<div><label class="spn text-left">Statut</label>
								  <input type="text" name="statut" class="txtmod" id="statut-voiture" readonly ></div>
							<div><label class="spn text-left">Matricule</label>
								  <input type="text" name="matricule" class="txtmod" id="matricule-voiture" readonly ></div>
								<div><label class="spn text-left">Marque</label>
								  <input type="text" name="marque" class="txtmod" id="marque-voiture" readonly ></div>
								<div><label class="spn text-left">Prix</label>
								  <input type="text" name="prix" class="txtmod" id="prix-voiture"  ></div>
								<div><label class="spn text-left">Au garage le</label>
								  <input type="text" name="date_fin" class="txtmod" id="dateFin-voiture"  ></div>
							</div>	
              
<br><br><br>

							<h4 style="color:#005b7f;">Réservé maintenant par le client</h4>

							<div class="col-xs-12  text-center"   id="reservation"></div>

              <div class="col-xs-12  text-center">
            <label class="btn btn-default btn-file">AJOUTER CONTRAT <input   name="contrat" type="file" ></label>
               </div>  

<div class="form-check">
    <input type="checkbox" class="form-check-input" name="liberer" value="liberer">
    <label class="form-check-label" for="exampleCheck1">Liberer la Voiture</label>
  </div>   

                      <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary" >ENREGISTRER </button>
                              </div>
                </form>               
							<h4 style="color:#005b7f">Liste des clients occupent cette voiture</h4>
							<table class="mytable" id="mytable">

							</table>

							<br><br>
                            </div>
                            
                 
                            </div>
                        </div>
        	</div>






    <div class="modal fade" id="Available"  role="dialog">
                     <div class="modal-dialog">
                         <div class="modal-content">
                                 <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 style="color:#005b7f;">A propos de la voiture selectionné</h4>
      </div>
                           <div class="modal-body">


            <form action="/reserver" method="POST" >
{{ csrf_field() }}
							<div class="col-xs-12  text-center">
								<div><label class="spn text-left">Statut</label>
									<input type="text" name="statut" class="txtmod" id="statut-voiture2" readonly ></div>
								<div><label class="spn text-left">Matricule</label>
									<input type="text" name="voiture_matricule" class="txtmod" id="matricule-voiture2" readonly ></div>
								<div><label class="spn text-left">Marque</label>
									<input type="text" name="marque" class="txtmod" id="marque-voiture2" readonly ></div>
								<div><label class="spn text-left">Prix</label>
									<input type="text" name="prix_jour" class="txtmod" id="prix-voiture2" ></div>
								<div><label class="spn text-left">date début</label>
									<input type="date" name="date_prise" class="txtmod" ></div>
								<div><label class="spn text-left">date Fin</label>
									<input type="date" name="date_fin" class="txtmod" ></div>
								<div><label class="spn text-left">PERMIS</label>
                     <select type="text" name="client_cin" class="txtmod">
                      @foreach ($clients as $client) 
                      {
                        <option value="{{ $client->cin }}">{{ $client->cin }}</option>
                      }
                      @endforeach
                    </select></div>

					<br> <br>
							</div>	

        <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary" > Louer </button>
                              </div>
            </form>

							<h4 style="color:#005b7f">Liste des clients occupent cette voiture</h4>
							<table class="mytable"  id="mytable2">

							</table>					
							<br><br>
                            </div>
                    
                            </div>
                        </div>
        	</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" >

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//show function	
  $(document).on('click', '.detail-modal', function() {
  $('#NotAvailable').modal('show');


  $('#statut-voiture').val($(this).data('statut'));
  $('#matricule-voiture').val($(this).data('matricule'));
  $('#prix-voiture').val($(this).data('prix'));
  $('#marque-voiture').val($(this).data('marque'));

 $('#dateFin-voiture').val($(this).data('date_fin'));



/*
if( typeof $(this).data('dateFin') !=='undefined' ) {
  
 $('#dateFin-voiture').val($(this).data('dateFin'));

} else { // It's undefined
    
 $('#dateFin-voiture').val('hi');
}

*/

    
    var matricule = $(this).data('matricule');
    

    $.post('voiture/'+matricule, function(response){ 
     
if(response.success)
        {
           var html=" <table class='table table-striped'>"+"<thead>"+"<tr><th>Date de prise</th><th>Date de fin</th><th>PERMIS</th><th>details de contrat</th></tr></thead> " ;

              $.each(response.car_data, function(i, car_data) {
var id=car_data.id;
                                            html += "<tbody>"+"<tr>"+
                                            "<td>" + car_data.date_prise +"</td>" + 
                                            "<td>" + car_data.date_fin +"</td>"+
                                            "<td>" + car_data.client_cin +"</td>"+
    "<td><a target='_blank' rel='noopener noreferrer' href='/voirplus/"+id+"' type='button' >voir plus</a></td>"+
    "</tr>"+"</tbody>"+"</table>"

       

                                                                });
              $('#mytable').html(html);

       }
    },'json');




    $.post('reservation/'+matricule, function(response){ 
     
if(response.success)
        {
           
        var html = "<div><label class='spn text-left'>Nom</label><input type='text' name='nom' class='txtmod' value="+response.clientR.nom+" readonly ></div><div><label class='spn text-left'>Prenom</label><input type='text' name='nom' class='txtmod' value="+response.clientR.prenom+" readonly ></div><div><label class='spn text-left'>PERMIS</label><input type='text' name='nom' class='txtmod' value="+response.clientR.cin+" readonly ></div><div><label class='spn text-left'>TELEPHONE</label><input type='text' name='nom' class='txtmod' value="+response.clientR.tel+" readonly ></div>"

       

              $('#reservation').html(html);

       }
    },'json');



  });

//show function	
  $(document).on('click', '.detail-modal2', function() {
  $('#Available').modal('show');

$('#statut-voiture2').val($(this).data('statut'));
  $('#matricule-voiture2').val($(this).data('matricule'));
  $('#prix-voiture2').val($(this).data('prix'));
  $('#marque-voiture2').val($(this).data('marque'));


   //Along with your modal action you can use following code

    
    var matricule = $(this).data('matricule');
    

    $.post('voiture/'+matricule, function(response){ 
     
if(response.success)
        {
           var html=" <tr><th>Date de prise</th><th>Date de fin</th><th>PERMIS</th><th>details de contrat</th></tr> " ;

              $.each(response.car_data, function(i, car_data) {
var id=car_data.id;

                                            html += "<tr>"+
                                            "<td>" + car_data.date_prise +"</td>" + 
                                            "<td>" + car_data.date_fin +"</td>"+
                                            "<td>" + car_data.client_cin +"</td>"+
                             
 "<td><a target='_blank' rel='noopener noreferrer' href='/voirplus/"+id+"' type='button' >voir plus</a></td>"+"</tr>"

       

                                                                });
              $('#mytable2').html(html);

       }
    },'json');

  });







</script>

@endauth