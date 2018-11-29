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
            <span><a type="button"  class="create-modal"><img src="img/icCli.png"></a></span>
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
      <table class="mytable" id="table">
        <tr><th>Matricule</th><th>Modèle</th><th>Photo</th><th>Date d'ajoute</th><th>Marque</th><th width="20%">Action</th></tr>
{{ csrf_field() }}
        @foreach($voitures as $voiture)

        <tr class="voiture{{$voiture->matricule}}">
          <td>{{ $voiture->matricule }}</td><td>{{ $voiture->modele }}</td><td> <img src="/PhotosCar/{{ $voiture->matricule}}/{{ $voiture->photo}}" width="100px" height="95px" > </td><td>{{ $voiture->created_at->toFormattedDateString() }}</td><td>{{ $voiture->marque }}</td>
          <td>
<span><a type="button" class="edit-modal" href="#"   data-matricule="{{$voiture->matricule}}" data-modele="{{$voiture->modele}}"  data-marque="{{$voiture->marque}}" data-couleur="{{$voiture->couleur}}" data-assurance="{{$voiture->assurance}}" data-vignette="{{$voiture->vignette}}" data-prix="{{$voiture->prix}}" data-carburant="{{$voiture->carburant}}" data-created_at="{{$voiture->created_at}}" data-photo="{{$voiture->photo}}"><img src="img/ac1.png"></a></span>


<span><a type="button" class="delete-modal" href="#"  data-matricule="{{$voiture->matricule}}" data-modele="{{$voiture->modele}}"  data-marque="{{$voiture->marque}}" data-couleur="{{$voiture->couleur}}" data-assurance="{{$voiture->assurance}}" data-vignette="{{$voiture->vignette}}" data-prix="{{$voiture->prix}}" data-carburant="{{$voiture->carburant}}" data-created_at="{{$voiture->created_at}}" data-photo="{{$voiture->photo}}"><img src="img/ac2.png"></a></span>


<span><a type="button" class="show-modal" href="#"   data-matricule="{{$voiture->matricule}}" data-modele="{{$voiture->modele}}"  data-marque="{{$voiture->marque}}" data-couleur="{{$voiture->couleur}}" data-assurance="{{$voiture->assurance}}" data-vignette="{{$voiture->vignette}}" data-prix="{{$voiture->prix}}" data-carburant="{{$voiture->carburant}}" data-created_at="{{$voiture->created_at}}" data-photo="{{$voiture->photo}}"><img src="img/ac3.png"></a></span>


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
                              <div class="modal-body">
                <h4 style="color:#005b7f;">Ajouter une voiture</h4>
          <form   enctype="multipart/form-data">
                <div class="col-xs-12  text-center">
            <div><label class="spn text-left">Matricule</label><input type="text" name="matricule" id="matricule-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
                            
            <div><label class="spn text-left">Modele</label><input type="text" name="modele" id="modele-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
            <div><label class="spn text-left">Marque</label><input type="text" name="marque" id="marque-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
            <div><label class="spn text-left">Prix</label><input type="text" name="prix" id="prix-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
            <div><label class="spn text-left">Carburant</label><input type="text" name="carburant" id="carburant-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
            <div><label class="spn text-left">Couleur</label><input type="text" name="couleur" id="couleur-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
            <div><label class="spn text-left">Vignette</label><input type="text" name="vignette" id="vignette-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
            <div><label class="spn text-left">Assurance</label><input type="text" name="assurance" id="assurance-add" class="txtmod">
                  <p class="error text-center alert alert-danger hidden"></p></div>
                </div>
                    <br>
                    <h4 style="color:#005b7f">Veuillez selectionner le(s)<br> fichiers à charger</h4>
                    <div class="col-xs-12">
                      <input id="photo-add"  name="photo" type="file" >
                    </div>
                    <br>
                    <br>
                              </div>
                              <div class="modal-footer">
                                <button type="submit"  class="btn btn-primary" id="add">Ajouter</button>
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
        <form class="form-horizontal" role="modal">


          <input type="hidden" class="form-control" id="photo-edit" >
          <div class="form-group">
            <label class="control-label col-sm-2"for="matricule">Matricule</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="matricule-edit" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="modele">Modèle</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="modele-edit" >
            </div>
          </div>
      
      <div class="form-group">
            <label class="control-label col-sm-2"for="prix">prix</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="prix-edit" >
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="couleur">Couleur</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="couleur-edit">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="assurance">Assurance</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="assurance-edit">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="vignette">Vignette</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="vignette-edit">
            </div>
          </div>


        </form>
                  {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="nom"></span>?
          <span class="hidden matricule"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Annuler
        </button>

      </div>

    </div>
  </div>
</div>







 <div id="show" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog"> 
     <div class="modal-content">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title" style="color:#005b7f;"> Client Infos</h4> 
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



        
</section>

<script type="text/javascript" >

{{-- ajax Form Add Post--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');

  });
  $("#add").click(function() {
  
       
        var  _token= $('input[name=_token]').val();

      //  var created_at= $("#created_at-add").val();
        var matricule= $("#matricule-add").val();
        var modele= $("#modele-add").val();
        var marque= $("#marque-add").val();
        var prix= $("#prix-add").val();
        var carburant= $("#carburant-add").val();
        var couleur= $("#couleur-add").val();
        var vignette= $("#vignette-add").val();
        var assurance= $("#assurance-add").val();
        var photo=  $('#photo-add').prop('files')[0];
      
var form_data = new FormData();
        
  //      form_data.append('created_at', created_at);
        form_data.append('photo', photo);
        form_data.append('matricule', matricule);
        form_data.append('modele', modele);
        form_data.append('marque', marque);
        form_data.append('prix', prix);
        form_data.append('carburant', carburant);
        form_data.append('couleur', couleur);
        form_data.append('vignette', vignette);
        form_data.append('assurance', assurance);
        form_data.append('_token', _token);

    $.ajax({

      type: 'POST',
      url: 'addVoiture',
      data:form_data,
       contentType: false, // The content type used when sending data to the server.
       cache: false, // To unable request pages to be cached
       processData: false,
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.nom);
          $('.error').text(data.errors.prenom);
          $('.error').text(data.errors.age);
          $('.error').text(data.errors.email);
          $('.error').text(data.errors.cin);
          $('.error').text(data.errors.tel);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='voiture" + form_data.get('matricule') + "'>"+
      "<td>" + form_data.get('matricule') + "</td>"+
      "<td>" + form_data.get('modele') + "</td>"+
      "<td> <img src='/PhotosCar/"+form_data.get('matricule')+"/"+form_data.get('photo') +" ' width='100px' height='95px'> </td> "+
      "<td>" + form_data.get('modele')  + "</td>"+
      "<td>" + form_data.get('marque') + "</td>"+
 "<td> <span><a type='button' class='edit-modal'  data-matricule='" + data.matricule + "' data-modele= '"+ data.modele+ "' data-marque='" + data.marque + "' data-prix= '"+ data.prix+"' data-carburant='" + data.carburant + "' data-created_at='" + data.created_at + "' data-couleur='" + data.couleur + "' data-assurance='" + data.assurance + "' data-vignette='" + data.vignette + "'> <img src='img/ac1.png'></a></span> <span><a type='button' class='delete-modal' href='#' data-matricule='" + data.matricule + "' data-modele= '"+ data.modele+ "' data-marque='" + data.marque + "' data-prix= '"+ data.prix+"' data-carburant='" + data.carburant + "' data-created_at='" + data.created_at + "' data-couleur='" + data.couleur + "' data-assurance='" + data.assurance + "' data-vignette='" + data.vignette + "'> <img src='img/ac2.png'></a></span> <span><a type='button' class='show-modal' href='#'  data-matricule='" + data.matricule + "' data-modele= '"+ data.modele+ "' data-marque='" + data.marque + "' data-prix= '"+ data.prix+"' data-carburant='" + data.carburant + "' data-created_at='" + data.created_at + "' data-couleur='" + data.couleur + "' data-assurance='" + data.assurance + "'  data-vignette='" + data.vignette + "'> <img src='img/ac3.png'></a></span> </td>"+
      "</tr>");
        }
      },
    });
    $('#matricule-add').val('');
    $('#modele-add').val('');
    $('#prix-add').val('');
    $('#marque-add').val('');
    $('#carburant-add').val('');
    $('#couleur-add').val('');
    $('#vignette-add').val('');
    $('#assurance-add').val('');
    $('#photo-add').val('');
  });




//show function 
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
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
  $('#assurance-edit').val($(this).data('assurance'));
  $('#vignette-edit').val($(this).data('vignette'));
  $('#created_at-edit').val($(this).data('created_at'));
  $('#photo-edit').val($(this).data('photo'));
  });

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editVoiture',
    data: {
'_token': $('input[name=_token]').val(),
'matricule': $("#matricule-edit").val(),
'modele': $("#modele-edit").val(),
'prix': $('#prix-edit').val(),
'couleur': $('#couleur-edit').val(),
'assurance': $('#assurance-edit').val(),
'created_at': $('#created_at-edit').val(),
'vignette': $('#vignette-edit').val(),
'photo': $('#photo-edit').val()
},
success: function(data) {
      $('.voiture' + data.matricule).replaceWith(" "+
      "<tr class='voiture" + data.matricule + "'>"+
      "<td>" + data.matricule + "</td>"+
      "<td>" + data.modele + "</td>"+
      "<td> <img src='/PhotosCar/"+data.matricule+"/"+data.photo +" ' width='100px' height='95px'> </td> "+
      "<td>" + data.created_at  + "</td>"+
      "<td>" + data.marque + "</td>"+
 "<td> <span><a type='button' href='#' class='edit-modal'  data-matricule='" + data.matricule + "' data-modele= '"+ data.modele+ "' data-marque='" + data.marque + "' data-prix= '"+ data.prix+"' data-carburant='" + data.carburant + "' data-created_at='" + data.created_at + "' data-couleur='" + data.couleur + "' data-assurance='" + data.assurance + "' data-vignette='" + data.vignette + "' data-photo='" + data.photo + "'> <img src='img/ac1.png'></a></span> <span><a type='button' href='#' class='delete-modal' href='#' data-matricule='" + data.matricule + "' data-modele= '"+ data.modele+ "' data-marque='" + data.marque + "' data-prix= '"+ data.prix+"' data-carburant='" + data.carburant + "' data-created_at='" + data.created_at + "' data-couleur='" + data.couleur + "' data-assurance='" + data.assurance + "' data-vignette='" + data.vignette + "' data-photo='" + data.photo + "'> <img src='img/ac2.png'></a></span> <span><a type='button' href='#' class='show-modal' href='#'  data-matricule='" + data.matricule + "' data-modele= '"+ data.modele+ "' data-marque='" + data.marque + "' data-prix= '"+ data.prix+"' data-carburant='" + data.carburant + "' data-created_at='" + data.created_at + "' data-couleur='" + data.couleur + "' data-assurance='" + data.assurance + "'  data-vignette='" + data.vignette + "' data-photo='" + data.photo + "'> <img src='img/ac3.png'></a></span> </td>"+
      "</tr>");
    }
  });
});


// form Delete function
$(document).on('click', '.delete-modal', function() {
$('#footer_action_button').text("Delete");
$('#footer_action_button').removeClass('glyphicon-check');

$('.actionBtn').removeClass('btn-success');
$('.actionBtn').addClass('btn-danger');
$('.actionBtn').addClass('delete');
$('.modal-title').text('Delete car');

$('.matricule').text($(this).data('matricule'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.nom').html($(this).data('marque'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteVoiture',
    data: {
      '_token': $('input[name=_token]').val(),
      'matricule': $('.matricule').text()
    },
    success: function(data){
       $('.voiture' + $('.matricule').text()).remove();
    }
  });
});
</script>

</body>
</html>