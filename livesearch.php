<?php
    $xmlDoc=new DOMDocument();
    $xmlDoc->load("ingredients.xml");
    
    $x=$xmlDoc->getElementsByTagName('link');
    
    //get the q parameter from URL
    $q=$_GET["q"];
    
	$hint = "";

    //lookup all links from the xml file if length of q>0
    if (strlen($q)>0) {
      $hint="";
	  $counter = 0;
      for($i=0; $i<($x->length); $i++) {
        $y=$x->item($i)->getElementsByTagName('title');
        $z=$x->item($i)->getElementsByTagName('url');
        if ($y->item(0)->nodeType==1) {
          //find a link matching the search text
          if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
            if ($hint=="") {
				  $hint="<a class='id-1' href='" . 
				  $z->item(0)->childNodes->item(0)->nodeValue . 
				  "' target='_blank'>" . 
				  $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
				  $counter = $counter + 1;
            } else {
			  if($counter < 6){
				  $hint=$hint . "<a class='id-$counter' href='" . 
				  $z->item(0)->childNodes->item(0)->nodeValue . 
				  "' target='_blank'>" . 
				  $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
				  $counter = $counter + 1;
			   }
            }
          }
        }
      }
    }
    
    // Set output to "no suggestion" if no hint were found
    // or to the correct values
    if ($hint=="") {
      $response="no suggestions";
    } else {
	  //$hint = substr($hint, 0, 300);
      $response=$hint;
    }
    
    //output the response
    echo $response;
?>