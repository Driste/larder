<?php
    
    $xml = new XMLWriter();
    $xml->openUri('php://output');
    $xml->setIndent(true);
    $xml->startDocument('1.0','UTF-8');
    
    $xml->startElement('pages');

    foreach(range('a','z') as $i) {

        $url = "http://www.bbc.co.uk/food/ingredients/by/letter/$i";

        $html = file_get_contents($url);

        $lines = explode("\n", $html);
        
        foreach($lines as $line){
            if(preg_match("/resource food/", $line)){
                $xml->startElement('link');
                $xml->writeElement('title', str_replace("_", " ", str_replace(" ", "", str_replace("</li>", "", str_replace("\">", "", str_replace("<li class=\"resource food\" id=\"", "\n", $line))))));
                $xml->writeElement('url', 'http://test.com');
                $xml->endElement();
            }
        }
        
        
        
    }

    $xml->endElement();

?>