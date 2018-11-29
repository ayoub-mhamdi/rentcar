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


<form method="post" action="">
<input type="text" id="name" name="name" />
<input type="text" id="email" name="email" />
<input type="text" id="subject" name="subject" />
<input type="text" id="url" name="url" />
<input type="checkbox" id="showdetails" name="showdetails" /> Show URL Details
<input type="submit" value="Submit" />
</form>


<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
	

	$(function() {
  $("showdetails").on("click",function() {
    var url = $("#url").val();
    if (url && $(this).is(":checked")) {
      $.get("relevantinfo.php",
        { "url": url },
        function(data){
          // do something with data returned
        }
      );
    }
    else {
      // clear relevant info here
    }
  });
});
</script>
</body>
</html>
@endauth