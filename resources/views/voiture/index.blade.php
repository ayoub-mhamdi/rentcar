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
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

  <script src='js/jquery-1.8.3.min.js'></script>
  <script src='js/jquery.elevatezoom.js'></script>
	
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
							<option>Matricule</option>
							</select>
						</span>
						<span class="search-box">
              <input type="text" id="search" class="txtSearC" placeholder="tapez un matricule" title="Type in a name">
							<button class="search-box-button">&#128269;</button>
						</span>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 searCliText">
					<div class="MenuC text-right">
						<span><a type="button"  class="create-modal"><img src="img/carAdd.png"></a></span>
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
				<tr><th>Matricule</th><th>Modèle</th><th>Photo</th><th>Date d'ajoute</th><th>Marque</th><th width="20%">Action</th></tr>
      </thead>
{{ csrf_field() }}
				@foreach($voitures as $voiture)

				<tr class="voiture{{$voiture->matricule}}">
					<td>{{ $voiture->matricule }}</td><td>{{ $voiture->modele }}</td><td><a type="button" class="photo-modal" data-matricule="{{$voiture->matricule}}" data-photo="{{$voiture->photo}}"> <img id="voitureImg" src="/PhotosCar/{{ $voiture->matricule}}/{{ $voiture->photo}}" width="100px" height="95px"></a></td><td>{{  date('Y-m-d', strtotime($voiture->created_at)) }}</td><td>{{ $voiture->marque }}</td>
					<td>
<span><a type="button" class="edit-modal" href="#"   data-matricule="{{$voiture->matricule}}" data-modele="{{$voiture->modele}}"  data-marque="{{$voiture->marque}}" data-couleur="{{$voiture->couleur}}" data-assurance="{{$voiture->assurance}}" data-vignette="{{$voiture->vignette}}" data-prix="{{$voiture->prix}}" data-carburant="{{$voiture->carburant}}" data-created_at="{{$voiture->created_at}}"><img src="img/ac1.png"></a></span>


<span><a type="button" class="delete-modal" href="#"   data-matricule="{{$voiture->matricule}}" data-modele="{{$voiture->modele}}"  data-marque="{{$voiture->marque}}" data-couleur="{{$voiture->couleur}}" data-assurance="{{$voiture->assurance}}" data-vignette="{{$voiture->vignette}}" data-prix="{{$voiture->prix}}" data-carburant="{{$voiture->carburant}}" data-created_at="{{$voiture->created_at}}"><img src="img/ac2.png"></a></span>


<span><a type="button" class="show-modal" href="#"   data-matricule="{{$voiture->matricule}}" data-modele="{{$voiture->modele}}"  data-marque="{{$voiture->marque}}" data-couleur="{{$voiture->couleur}}" data-assurance="{{$voiture->assurance}}" data-vignette="{{$voiture->vignette}}" data-prix="{{$voiture->prix}}" data-carburant="{{$voiture->carburant}}" data-created_at="{{$voiture->created_at}}"><img src="img/ac3.png"></a></span>


					</td></tr>

				@endforeach

				</table>
			<br>

		</div>

		  {{$voitures->links()}}
	</div> 

	<!-- modals -->



	<div class="modal fade" id="create"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 style="color:#005b7f;">Ajouter une voiture</h4>
      </div>
                              <div class="modal-body">
	
					<form action="/addVoiture" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
								<div class="col-xs-12  text-center">
						<div><label class="spn text-left">Matricule</label><input type="text" name="matricule"  class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>

						<div><label class="spn text-left">Modele</label><input type="text" name="modele"  class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
						<div><label class="spn text-left">Marque</label><input type="text" name="marque" class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
						<div><label class="spn text-left">Prix</label><input type="text" name="prix"  class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
						<div><label class="spn text-left">Carburant</label><input type="text" name="carburant"  class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
						<div><label class="spn text-left">Couleur</label><input type="text" name="couleur"  class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
						<div><label class="spn text-left">Vidange</label><input type="date" name="vignette"  class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
						<div><label class="spn text-left">Assurance</label><input type="date" name="assurance"  class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
								</div>
										<br>
										<h4 style="color:#005b7f">Veuillez selectionner le(s)<br> fichiers à charger</h4>
										<div class="col-xs-12">
            <label class="btn btn-default btn-file"> PHOTO <input id="photo-add"  name="photo" type="file" required></label> </div>
              	
										<br>
										<br>

                              </div>
                              <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary" >Ajouter</button>
                              </div>
                    </form>
                            </div>
                        </div>
        </div>
        	{{-- Modal Form Edit and Delete Post --}}


<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal" action="/editVoiture" method="POST">
{{ csrf_field() }}


          <div class="form-group">
            <label class="control-label col-sm-2"for="matricule"></label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="matricule-edit"  name="matricule" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="modele">Modèle</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="modele-edit" name="modele">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="marque">Marque</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="marque-edit" name="marque">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="marque">Carburant</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="carburant-edit" name="carburant">
            </div>
          </div>
			
			<div class="form-group">
            <label class="control-label col-sm-2"for="prix">prix</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="prix-edit" name="prix">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="couleur">Couleur</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="couleur-edit" name="couleur">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="assurance">Fin Assurance</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="assurance-edit" name="assurance">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="vignette"> Vidange</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="vignette-edit" name="vignette">
            </div>
          </div>


       

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn actionBtn" >
          <span id="footer_action_button" class="glyphicon"></span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Annuler
        </button>

      </div>
 </form>
    </div>
  </div>
</div>



<div id="delete-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal" action="/deleteVoiture" method="POST">
{{ csrf_field() }}


              <input type="hidden" class="form-control" id="matricule-delete"  name="matricule" >

           {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="nom"></span>?
          <span class="hidden matricule"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn actionBtn" >
          <span id="footer_action_button" class="glyphicon"></span>delete
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Annuler
        </button>

      </div>
 </form>
    </div>
  </div>
</div>







 <div id="show" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog"> 
     <div class="modal-content">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title" style="color:#005b7f;"> Voiture Infos</h4> 
        </div> 
            
        <div class="modal-body">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="img/ajax-loader.gif">
           </div>
           
 <div class="table-responsive">
  
 <table class="table table-striped table-bordered">

 <tr>
 <th >Matricule</th>
 <td id="matricule"></td>
 </tr>
 <tr>
 <th >Modèle</th>
 <td id="modele"></td>
 </tr>
  <th >Marque</th>
 <td id="marque"></td>
 </tr>
  <th >Prix</th>
 <td id="prix"></td>
 </tr>
 <th >Carburant</th>
 <td id="carburant"></td>
 </tr>

 </table>
   
 </div>

        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
    </div> 
  </div>
</div>

  <div class="modal fade" id="photo_show"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title" style="color:#005b7f;"> Voiture Photo</h4> 
                               </div>
                              <div class="modal-body">
  
                         <div id="image_show"></div>

                            </div>
                        </div>
        </div>
  </div>

     	
</section>

<script type="text/javascript" >

{{-- Photo--}}
  $(document).on('click','.photo-modal', function() {
    $('#photo_show').modal('show');

 var matricule = $(this).data('matricule');
  var photo = $(this).data('photo');

            var html = "<div><img src='/PhotosCar/"+matricule+"/"+photo+"' width='570px' height='450px' /></div>"
          

              $('#image_show').html(html);

  });



{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');

  });




//show function	
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('.modal-title').text('Voiture details');
  $('#matricule').text($(this).data('matricule'));
  $('#modele').text($(this).data('modele'));
  $('#marque').text($(this).data('marque'));
  $('#prix').text($(this).data('prix'));
  $('#carburant').text($(this).data('carburant'));
  });


  // function Edit POST
  $(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Modifier");
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-primary');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-title').text('Voiture Edit');
$('.deleteContent').hide();
$('.form-horizontal').show();

  $('#myModal').modal('show');

  $('#matricule-edit').val($(this).data('matricule'));
  $('#modele-edit').val($(this).data('modele'));
  $('#prix-edit').val($(this).data('prix'));
  $('#couleur-edit').val($(this).data('couleur'));
    $('#vignette-edit').val($(this).data('vignette'));
    $('#marque-edit').val($(this).data('marque'));
     $('#carburant-edit').val($(this).data('carburant'));

//vidange 


//assurance
 var assuranceDate=$(this).data('assurance');

var assdate = new Date($(this).data('assurance'));

 var oneyearmore  = assdate.setFullYear(assdate.getFullYear()+1);

var dd = assdate.getDate();
var mm = assdate.getMonth()+1; //January is 0!

var yyyy = assdate.getFullYear();
if(dd<10){
    dd='0'+dd;
} 
if(mm<10){
    mm='0'+mm;
} 
var assuranceYear = yyyy+'-'+mm+'-'+dd;
// var t = assuranceDate;
 // $('#assurance-edit').datepicker(t);
  $('#assurance-edit').val(assuranceYear);


  $('#created_at-edit').val($(this).data('created_at'));
  $('#marque-edit').val($(this).data('marque'));

  });


// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text("Delete");
$('#footer_action_button').removeClass('glyphicon-check');

$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Supprimer la Voiture');

$('.matricule').text($(this).data('matricule'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.nom').html($(this).data('matricule'));
$('#delete-modal').modal('show');

  $('#matricule-delete').val($(this).data('matricule'));
});






/*
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

*/

 // Write on keyup event of keyword input element
    $("#search").keyup(function(){
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