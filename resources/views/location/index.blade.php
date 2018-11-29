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

						<span class="search-box">
				<span ><input type="text" id="search" placeholder="MATRICULE" name="searchCli" class="txtSearC searchLocation"></span>	
				<span ><input type="text" placeholder="DATE DE DEBUT" name="searchCli" class="txtSearC  searchLocation"></span>
				<span ><input type="text" placeholder="DATE DE FIN" name="searchCli" class="txtSearC  searchLocation"></span>
				

							<button class="search-box-button">&#128269;</button>
						</span>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 searCliText">
					<div class="MenuC text-right">
						<span ></span>
						<span class="wifi"><a type="button"  class="statistique-modal"><img src="img/wifi.png"></a></span>
						<span><a href="{{ url('/welcome') }}"><img src="img/icCli2.png"></a></span>
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
			<table class="mytable" id="table">
				<thead>
				<tr><th>MATRICULE</th><th >PERMIS</th><th >Nom</th><th>Contrat</th><th>Date de prise</th><th>Date de fin</th><th>N° de jour</th><th width="20%">Prix total</th></tr>
			    </thead>
				@foreach($locations as $location)
				<!-- nom du client-->
				<?php $nom = App\Client::find($location->client_cin); ?>
				<!-- -->
				<tr><td>{{$location->voiture_matricule}} </td><td>{{$location->client_cin}}</td><td>{{$nom->prenom}} {{$nom->nom}}</td><td><a href="/contrat/{{ $location->client_cin}}/{{ $location->contrat}}" download='contrat'><img src="img/download.png"></a></td><td>{{$location->date_prise}}</td><td>{{$location->date_fin}}</td><td>{{$location->nombre_jours}}</td>
					<td>{{$location->prix_total}} DH</td></tr>
				@endforeach
			
				</table>
			<br>
			
		</div>
		 {{$locations->links()}}
	</div> 






	<!-- modals -->



	<div class="modal fade" id="statistique"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 style="color:#005b7f;">Choisi un Matricule</h4>
      </div>
                              <div class="modal-body">
	
				

								<div class="col-xs-12  text-center">
						<div><label class="spn text-left">Matricule</label>
							 <select type="text" id="id_matricule" name="voiture_matricule" class="txtmod">
			                      @foreach ($voitures as $voiture) 
			                      {
			                        <option value="{{ $voiture->matricule }}">{{ $voiture->matricule }}</option>
			                      }
			                      @endforeach
			                    </select>
									</div>
									

						<div><label class="spn text-left">Mois</label>
											 <select type="text" id="id_mois" name="mois" class="txtmod">
											    <option value='1'>Javnvier</option>
											    <option value='2'>Fevrier</option>
											    <option value='3'>Mars</option>
											    <option value='4'>Avril</option>
											    <option value='5'>Mai</option>
											    <option value='6'>Juin</option>
											    <option value='7'>Juiller</option>
											    <option value='8'>Aout</option>
											    <option value='9'>Septembre</option>
											    <option value='10'>Octobre</option>
											    <option value='11'>Novembre</option>
											    <option value='12'>Decembre</option>
											 </select>
								<div id="outputMonth" ></div>
						</div>
				
						<div><label class="spn text-left">Année</label>
						 <select type="text" id="id_annee" name="annee" class="txtmod">
											     <?php 
												          $year = date('Y');
												          $min = $year ;
												          $max = $year  +19;
												          for( $i=$min; $i<$max; $i++ ) {
												            echo '<option value='.$i.'>'.$i.'</option>';
												          }
												        ?>
											 </select>
									<div id="outputYear" ></div>
											</div>
					
					
								</div>

										<br>
										<br>

                              </div>
                              <div class="modal-footer">
							   <button  class="btn btn-primary check" >Check</button>
                              </div>
                  
                            </div>
                        </div>
        </div>



<div class="modal fade" id="photo_show"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title" style="color:#005b7f;"> Contrat </h4> 
                               </div>
                              <div class="modal-body">
  
                         <div id="image_show"></div>

                            </div>
                        </div>
        </div>
  </div>
</section>


<script  type="text/javascript" >
	
	{{-- ajax Form Add Post--}}
  $(document).on('click','.statistique-modal', function() {
    $('#statistique').modal('show');

  });

{{-- Photo--}}
  $(document).on('click','.photo-modal', function() {
    $('#photo_show').modal('show');

 var cin = $(this).data('cin');
  var contrat = $(this).data('contrat');

            var html = "<div><img src='/contrat/"+cin+"/"+contrat+"' width='570px' height='470px' /></div>"
          

              $('#image_show').html(html);

  });

$(document).on('click','.check', function() {
   
			var annee=$('#id_annee').val();
			var mois=$('#id_mois').val();
			var matricule=$('#id_matricule').val();

      $.get('/statistique/'+matricule+'/'+annee+'/'+mois, function(response){ 
     var html;
if(response.success)
        {
        	if(parseInt(response.priceMonth,10)>= parseInt(response.pastMonth,10)){
        	html = "<h4 style='color:green'> &#8689; "+response.priceMonth+"DH (+ "+(response.priceMonth-response.pastMonth)+"DH)</h4>"
        		}
        	else {
        		html = "<h4 style='color:red'> &#x21F2; "+response.priceMonth+"DH (- "+(response.pastMonth-response.priceMonth)+"DH)</h4>"
        	}

                $('#outputMonth').html(html);

if(response.priceYear>=response.pastYear){
        		 html = "<h4 style='color:green'> &#8689; "+response.priceYear+"DH (+ "+(response.priceYear-response.pastYear)+"DH)</h4>"
        		}
        	else{html = "<h4 style='color:red'> &#x21F2; "+response.priceYear+"DH (- "+(response.pastMonth-response.priceMonth)+"DH)</h4>"}

                $('#outputYear').html(html);
       }
    },'json');     
          

/*
 $.ajax({
            type: "GET",
            url: "/statistique",
            data: {
              	    'matricule':matricule,
					'annee':annee,
				    'mois':mois
            },
            success: function (data) {
            var html = "<h1>"+response.mat+"</h1>";
                $('#output').html(html);
            }
        });
*/
  });

  $(".searchLocation").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#table tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    }); 
 


</script>
</body>

</html>
@endauth