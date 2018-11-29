
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

   <link rel="stylesheet" href="/css/alertify.css">   

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/alertify.js"></script>

    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
    <form name="Accueil" method="post" action="">
        <div class="container-fluid" >
            <div class="galerie">
            <div class="row">

             <div class=" home_image_one">
                            <div style="margin-bottom:50px;" class="text-center ">
            <a href="voiture">          <h1 class="text-center" style="font-weight:bolder; color:white;padding-top:127px;">Gestion Voiture</h1>
                                <img src="img/GestVoi1.png" >
                            </div>
                            
             </a>
           </div> 
                <div class=" home_image_two">
                    <div style="margin-bottom:50px;" class="text-center">
                    <div class="menu" style="margin-right:10%;">
                                 <ul class="nav navbar-nav pull-right men">
                                    <li  class="dropdown active">
                                        <a href="#" class="dropdown-toggle menua" data-toggle="dropdown"><i> <img src="img/user.png" width="23px" height="23px"></i><b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('logout') }}">Déconnecter</a></li>
                                
                                        </ul>
                    </div>
                    <a href="parc">
                        <h1 class="text-center" style="font-weight:bolder; color:white;padding-top:127px;">Gestion Parc</h1>
                        <img src="img/GestParc1.png" >
                      </a>
                    </div>
                </div>
              
           

                 <div class=" home_image_one1">
                                        <div style="margin-bottom:50px;" class="text-center">
           <a href="client">      <h1 class="text-center" style="font-weight:bolder; color:white;padding-top:127px;">Gestion Client</h1>
                                            <img src="img/GestCli1.png" >
              </a>
                                        </div>
                                  </div> 
                

                  <div class=" home_image_two1">
                                        <div style="margin-bottom:50px;" class="text-center">
              <a href="location">     <h1 class="text-center" style="font-weight:bolder; color:white;padding-top:127px;">Gestion Location</h1>
                                            <img src="img/GestLoc1.png" >
                  </a>    
                                        </div>
                                    </div>
                
            </div>
        </div>
        </div>
    </form>


<script>
  var voitures = @json($voitures->toArray());
var i;
for (i = 0; i < voitures.length; i++) { 
  var ass=voitures[i].assurance;
  var matricule =voitures[i].matricule;
  console.log(voitures[i].assurance);

  //today date
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd = '0'+dd
} 

if(mm<10) {
    mm = '0'+mm
} 

today = yyyy + '-' + mm + '-' + dd;

/*
var yesterday = new Date();
var d = yesterday.getDate()-5;
var m = yesterday.getMonth()+1; //January is 0!
var yy = yesterday.getFullYear();

if(d<10) {
    d = '0'+d
} 

if(m<10) {
    m = '0'+m
} 

yesterday = m + '/' + d + '/' + yy;
*/
var v = new Date(ass);
 var oneyearmore  = v.setFullYear(v.getFullYear()+1);

var dd = v.getDate()-1;
var mm = v.getMonth()+1; //January is 0!

var yyyy = v.getFullYear();
if(dd<10){
    dd='0'+dd;
} 
if(mm<10){
    mm='0'+mm;
} 
var assuranceYear = yyyy+'-'+mm+'-'+dd;



if(today==assuranceYear){
  //define a new dialog
  alertify.dialog('myAlert',function factory(){
    return{
      main:function(message){
        this.message = message;
      },
      setup:function(){
          return { 
            buttons:[{text: "Ok!", key:27/*Esc*/}],
            focus: { element:0 }
          };
      },
      prepare:function(){
        this.setContent(this.message);
      }
  }});
  //launch it.
alertify.myAlert("l'assurance de la voiture de matricule '"+matricule+"' va finir demain !!!");
}

}
</script>
</body>
</html>

@endauth

