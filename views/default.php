<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>json-parser</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="static/css/jstree/default/style.min.css" />
		<link rel="stylesheet" href="static/css/style.css" />

		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="static/js/jstree.min.js"></script>
		<script src="static/js/base.js"></script>
	</head>
	<body>
		<div>
		    <div class="row">
		    	<div class="col-md-12" id="header">
		    		<div class="col-centered col-md-2" id="logo-container">
		    			<img src="/static/img/puttiLogoPNG.png" alt="putti">
		    		</div>
		    	</div>
		    </div>
		</div>
	    <div id="body">
		    <div class="row">
	  			<div class="col-md-12">
	  				<div id="search-wrapper">
	  					<input type="text" id="search-input">
	  					<span>OK</span>
	  				</div>
	  				<div id="search-wrapper-error" class="label-error">
	  					<span></span>
	  				</div>
	  			</div>	        
		    </div>
		    <div class="row" id="view-container">
	  			<div class="col-md-8 view-block" id="preview-wrapper">
	  				<div class="view-block-container">
	  				</div>
	  			</div>	        
	  			<div class="col-md-4 view-block" id="tree-wrapper">
	  				<div class="view-block-container">
	  				</div>
	  			</div>	        
		    </div>
		</div>
	</body>
</html>