<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Larder | Search</title>
        <link rel="stylesheet" href="css/foundation.css" />
        <script src="js/vendor/modernizr.js"></script>
        <script>
            function showResult(str) {
              if (str.length==0) { 
                document.getElementById("livesearch").innerHTML="";
                document.getElementById("livesearch").style.border="0px";
                return;
              }
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                  document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
                  document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                }
              }
              xmlhttp.open("GET","livesearch.php?q="+str,true);
              xmlhttp.send();
            }
			
			document.onkeydown = checkKey;

			function checkKey(e) {
			
				e = e || window.event;
				var $hlight = $('div.hlight'), $div = $('a');
				
				if (e.keyCode == '38') {
					// up arrow
					$hlight.removeClass('hlight').prev().addClass('hlight');
					if ($hlight.prev().length == 0) {
						$div.eq(-1).addClass('hlight')
					}
				}
				else if (e.keyCode == '40') {
					// down arrow
					$hlight.removeClass('hlight').next().addClass('hlight');
					if ($hlight.next().length == 0) {
						$div.eq(0).addClass('hlight')
					}
				}
			}
        </script>
	</head>
    
    <body>
    	
            <!-- Nav Bar -->
 
      <div class="row">
        <div class="large-12 columns">
          <div class="nav-bar right">
           <ul class="button-group">
             <li><a href="#" class="button">Larder</a></li>
             <li><a href="#" class="button">List</a></li>
             <li><a href="#" class="button">Search</a></li>
            </ul>
          </div>
          <h1>Larder <small>Make something you have!</small></h1>
          <hr />
        </div>
      </div>
     
      <!-- End Nav -->
     
     
      <!-- Main Page Content -->
     
        <div class="row">
        
            <div class="large-12 columns">
            
                <div class="large-12 panel">
                	<h3>Search Ingredient:</h3>
                    <form>
                        <input type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search">
                        <div class="large-center" id="livesearch"></div>
                    </form>
                </div>
                
                <div class="panel">
                	<h3>Your Larder:</h3>
                    <div data-alert class="alert-box">Chicken<a href="#" class="close">&times;</a></div>
                    <div data-alert class="alert-box">Beef<a href="#" class="close">&times;</a></div>
                    <div data-alert class="alert-box">Bacon<a href="#" class="close">&times;</a></div>
                    <div data-alert class="alert-box">Turkey<a href="#" class="close">&times;</a></div>
                    <div data-alert class="alert-box">Roast Beef<a href="#" class="close">&times;</a></div>
                    <div data-alert class="alert-box">Ham<a href="#" class="close">&times;</a></div>
                    <div data-alert class="alert-box">Veggies<a href="#" class="close">&times;</a></div>
                </div>
                
                <div class="hidden">
                	<!-- Hidden div for php scripts with ajax -->
                </div>
            
        </div>
     
      <!-- End Main Content and Sidebar -->
     
     
      <!-- Footer -->
     
      <footer class="row">
        <div class="large-12 columns">
          <hr />
          <div class="row">
            <div class="large-6 columns">
              <p>© Copyright 2014 | Driste Applications</p>
            </div>
            <div class="large-6 columns">
              <ul class="inline-list right">
                <li><a href="#">Larder</a></li>
                <li><a href="#">List</a></li>
                <li><a href="#">Search</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    
        
        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
          $(document).foundation();
        </script>
    </body>
</html>