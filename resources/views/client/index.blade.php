@auth
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}" />

	<link rel="stylesheet" type="text/css" href="css/st1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link href="https://fonts.googleapis.com/css?family=Barlow" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
	
	 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"/>

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
             <input type="text" id="search" class="txtSearC" placeholder="search.." title="Type in a name">
							<button class="search-box-button">&#128269;</button>
						</span>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 searCliText">
					<div class="MenuC text-right">
						<span><a type="button"  class="create-modal"><img src="img/icCli.png"></a></span>
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
        <THEAD>
				<tr><th>Nom</th><th>Prenom</th><th>Tele</th><th>PERMIS</th><th>Email</th><th width="20%">Action</th></tr>
        </THEAD>
{{ csrf_field() }}
				@foreach($clients as $client)

				<tr class="client{{$client->cin}}">
					<td>{{ $client->nom }}</td><td>{{ $client->prenom }}</td><td>{{ $client->tel }}</td><td>{{ $client->cin }}</td><td>{{ $client->email }}</td>
					<td>
<span><a type="button" class="edit-modal" href="#"   data-nom="{{$client->nom}}" data-prenom="{{$client->prenom}}"  data-tel="{{$client->tel}}" data-cin="{{$client->cin}}" data-email="{{$client->email}}" data-age="{{$client->age}}"><img src="img/ac1.png"></a></span>


<span><a type="button" class="delete-modal" href="#"  data-nom="{{$client->nom}}" data-prenom="{{$client->prenom}}"  data-tel="{{$client->tel}}" data-cin="{{$client->cin}}" data-email="{{$client->email}}" data-age="{{$client->age}}"><img src="img/ac2.png"></a></span>


<span><a type="button" class="show-modal" href="#"  data-nom="{{$client->nom}}" data-prenom="{{$client->prenom}}"  data-tel="{{$client->tel}}" data-cin="{{$client->cin}}" data-email="{{$client->email}}" data-age="{{$client->age}}"><img src="img/ac3.png"></a></span>


					</td></tr>

				@endforeach

			</table>
			<!-- <br>
				<div class="text-center" style="font-size:18px;">
					<a href="" style="padding-right:5px;">&laquo;</a><a href="" style="padding-right:5px;padding-left:5px;">1</a>
					<a href="" style="padding-right:5px;padding-left:5px;">2</a><a href="" style="padding-left:5px;">&raquo;</a></div> -->
		</div>

  {{$clients->links()}}

	</div> 
	<!-- modals -->



	<div class="modal fade" id="create"  role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                               <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:#005b7f;">Ajouter un client</h4>
      </div>
                              <div class="modal-body">

					<form action="/addClient" method="POST" enctype="multipart/form-data" >
{{ csrf_field() }}
								<div class="col-xs-12  text-center">
									<div><label class="spn text-left">Nom</label><input type="text" name="nom" id="nom-add" class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>

									<div><label class="spn text-left">Prénom</label><input type="text" name="prenom" id="prenom-add" class="txtmod" required>
										<p class="error text-center alert alert-danger hidden"></p></div>
									<div><label class="spn text-left">Tele</label><input type="text" name="tel" id="tel-add" class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
									<div><label class="spn text-left">PERMIS</label><input type="text" name="cin" id="cin-add" class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
									<div><label class="spn text-left">Email</label><input type="text" name="email" id="email-add" class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
									<div><label class="spn text-left">Age</label><input type="integer" name="age" id="age-add" class="txtmod" required>
									<p class="error text-center alert alert-danger hidden"></p></div>
								</div>
										<br>
										<h4 style="color:#005b7f">Veuillez selectionner le(s)<br> fichiers à charger</h4>
										<div class="col-xs-12">

            <div><label class="btn btn-default btn-file"> CIN <input id="cinPhoto-add"  name="cin_photo" type="file" ></label></div>

            <div><label class="btn btn-default btn-file"> PERMIS <input id="permisPhoto-add"  name="permis_photo" type="file" ></label> </div>
                   
										</div>
								 <br>
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


        	{{-- Modal Form Edit and Delete Client --}}


<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
    <form class="form-horizontal" role="modal"  enctype="multipart/form-data">

      <div class="modal-body">
        
		
          <div class="form-group">
            <label class="control-label col-sm-2"for="id">PERMIS</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="cin-edit" readonly>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-2"for="title">NOM</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="nom-edit">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="body">PRENOM</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="prenom-edit">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-2"for="body">TEL</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="tel-edit">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-2"for="body">email</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="email-edit">
            </div>
          </div>



  </form>      
                  {{-- Form Delete Client --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="nom"></span>?
          <span class="hidden cin"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Annuler
        </button>

      </div>

    </div>
  </div>
</div>

  {{-- Modal Show Client --}}

<!-- <div id="show" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"> -->


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

  <form action="/addInfraction" method="POST" enctype="multipart/form-data" >
{{ csrf_field() }}
 <table class="table table-striped table-bordered">

 <tr>
 <th >NOM</th>
 <td id="nom"></td>
 </tr>
 <tr>
 <th >PRENOM</th>
 <td id="prenom"></td>
 </tr>
  <th >TELEPHONE</th>
 <td id="tel"></td>
 </tr>
  <th >PERMIS</th>
 <td id="cin"></td>
 </tr>
 <th >Email</th>
 <td id="email"></td>
 </tr>
  <th >Age</th>
 <td id="age"></td>
 </tr>
 <th >infraction</th>
 <td ><div class="col-sm-10">
            <label class="btn btn- btn-file"> IMPORT <input name="infraction" type="file" ></label>
           
 <button type="submit"  class="btn btn-success" id="add">ADD</button>
</div></td>
 </tr>
 <th >papier</th>
 <td id="papier"></td>
 </tr>

 </table>
              <input type="text" name="infraction_cin" class="txtmod" id="infraction_cin" hidden >

  </form>

   <h4 style="color:#005b7f">Liste des voitures occupé par ce client</h4>
               <table class="mytable" id="mytable">

              </table> 
              <br>       
    <h4 style="color:#A91818">infraction</h4>
               <table class="mytable" id="infraction">

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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" >

{{-- ajax Form Add Client--}}
  $(document).on('click','.create-modal', function() {
    $('#create').modal('show');

  });

/*
 $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addClient',
      data: {
        '_token': $('input[name=_token]').val(),
        'nom': $("#nom-add").val(),
        'prenom': $("#prenom-add").val(),
        'cin': $("#cin-add").val(),
        'email': $("#email-add").val(),
        'tel': $("#tel-add").val(),
        'age': $("#age-add").val()

      },
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
          $('#table').append("<tr class='client" + data.cin + "'>"+
      "<td>" + data.cin + "</td>"+
      "<td>" + data.nom + "</td>"+
      "<td>" + data.prenom + "</td>"+
      "<td>" + data.email + "</td>"+
 "<td> <span><a type='button' class='edit-modal'  data-nom='" + data.nom + "' data-prenom= '"+ data.prenom+ "' data-tel='" + data.tel + "' data-email= '"+ data.email+"' data-cin='" + data.cin + "'> <img src='img/ac1.png'></a></span> <span><a type='button' class='delete-modal' href='#' data-nom='" + data.nom + "' data-prenom= '"+ data.prenom+ "' data-tel='" + data.tel + "' data-email= '"+ data.email+"' data-cin='" + data.cin + "'> <img src='img/ac2.png'></a></span> <span><a type='button' class='show-modal' href='#'  data-nom='" + data.nom + "' data-prenom= '"+ data.prenom+ "' data-tel='" + data.tel + "' data-email= '"+ data.email+"' data-cin='" + data.cin + "'> <img src='img/ac3.png'></a></span> </td>"+
      "</tr>");
        }
      },
    });
    $('#nom-add').val('');
    $('#prenom-add').val('');
    $('#cin-add').val('');
    $('#tel-add').val('');
    $('#email-add').val('');
    $('#age-add').val('');

    
  });
*/

 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//show function	
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#nom').text($(this).data('nom'));
  $('#prenom').text($(this).data('prenom'));
  $('#tel').text($(this).data('tel'));
  $('#cin').text($(this).data('cin'));
  $('#email').text($(this).data('email'));
   $('#age').text($(this).data('age'));
   $('#infraction_cin').val($(this).data('cin'));



    {{-- historique reservation de ce Client --}}

    
    var cin = $(this).data('cin');
 /* $.post('addInfraction/'+cin, function(response){ 
     
    },'json');  
*/

 $.post('getInfraction/'+cin, function(response){ 
     
if(response.success)
        {

 var html=" <tr><th>date d'ajout</th><th>infraction</th></tr> " ;

              $.each(response.infra, function(i, infra) {

                                            html += "<tr>"+
                                            "<td>" + infra.created_at +"</td>" +
   "<td><a type='button' href='infraction/"+infra.client_cin+"/"+infra.infraction+"' download='infraction'>telecharger</a></td>"+"</tr>"


                                                                });
              $('#infraction').html(html);

       }
    },'json');



    $.post('client/'+cin, function(response){ 
     
if(response.success)
        {
           var html=" <tr><th>Date de prise</th><th>Date de fin</th><th>Matricule</th><th>details de contrat</th></tr> " ;

              $.each(response.car_data, function(i, car_data) {
var id=car_data.id;
                                            html += "<tr>"+
                                            "<td>" + car_data.date_prise +"</td>" + 
                                            "<td>" + car_data.date_fin +"</td>"+
                                            "<td>" + car_data.voiture_matricule +"</td>"+
                                  "<td><a target='_blank' rel='noopener noreferrer' href='/voirplus/"+id+"' type='button' >voir plus</a></td>"+"</tr>"

       

                                                                });
              $('#mytable').html(html);

       }
    },'json');


//cin et permis photos

     $.post('photo/'+cin, function(response){ 
     
if(response.success)
        {

 var html = "<a type='button' href='ClientsPhotos/"+response.client_photo.cin+"/"+response.client_photo.cin_photo+"' download='cin'>"+
 " <img src='img/download.png' >CIN</a>"+
               "  <a href='ClientsPhotos/"+response.client_photo.cin+"/"+response.client_photo.permis_photo+"' download='permis'>"+
 "<img src='img/download.png' > PERMIS</a>"
                                                 
              $('#papier').html(html);

       }
    },'json');


  });

 


  // function Edit Client
  $(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Modifier");
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-primary');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-title').text('Client Edit');
$('.deleteContent').hide();
$('.form-horizontal').show();

  $('#myModal').modal('show');


  $('#nom-edit').val($(this).data('nom'));
  $('#prenom-edit').val($(this).data('prenom'));
  $('#tel-edit').val($(this).data('tel'));
  $('#cin-edit').val($(this).data('cin'));
  $('#email-edit').val($(this).data('email'));


  });

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editClient',
    data: {
'_token': $('input[name=_token]').val(),
'nom': $('#nom-edit').val(),
'prenom': $('#prenom-edit').val(),
'cin': $('#cin-edit').val(),
'email': $('#email-edit').val(),
'tel' :$('#tel-edit').val()
},
success: function(data) {
      $('.client' + data.cin).replaceWith(" "+
      "<tr class='client" + data.cin + "'>"+
      "<td>" + data.nom + "</td>"+
      "<td>" + data.prenom + "</td>"+
      "<td>" + data.tel + "</td>"+
      "<td>" + data.cin + "</td>"+
      "<td>" + data.email + "</td>"+
 "<td> <span><a type='button' class='edit-modal'  data-nom='" + data.nom + "' data-prenom= '"+ data.prenom+ "' data-tel='" + data.tel + "' data-email= '"+ data.email+"' data-cin='" + data.cin + "' data-age='" + data.age + "'> <img src='img/ac1.png'></a></span> <span><a type='button' class='delete-modal' href='#'  data-nom='" + data.nom + "' data-prenom= '"+ data.prenom+ "' data-tel='" + data.tel + "' data-email= '"+ data.email+"' data-cin='" + data.cin + "' data-age='" + data.age + "'> <img src='img/ac2.png'></a></span> <span><a type='button' class='show-modal' href='#'  data-nom='" + data.nom + "' data-prenom= '"+ data.prenom+ "' data-tel='" + data.tel + "' data-email= '"+ data.email+"' data-cin='" + data.cin + "' data-age='" + data.age + "'> <img src='img/ac3.png'></a></span> </td>"+
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
$('.modal-title').text('Delete Post');

$('.cin').text($(this).data('cin'));
$('.deleteContent').show();
$('.form-horizontal').hide();
$('.nom').html($(this).data('nom'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.delete', function(){
  $.ajax({
    type: 'POST',
    url: 'deleteClient',
    data: {
      '_token': $('input[name=_token]').val(),
      'cin': $('.cin').text()
    },
    success: function(data){
       $('.client' + $('.cin').text()).remove();
    }
  });
});





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