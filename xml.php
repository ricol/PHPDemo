<?php

$xmlstr = "
   <books>
       <book>
           <title/>
       </book>
   </books>
   ";
$xml = new SimpleXMLElement($xmlstr);
$book = $xml->book[0];
$book->addAttribute('type', 'Computer');
$book->title = 'RESTful Web Services!';
$author = $xml->book[0]->addChild('author');
$author->addChild('name', 'Sami');
$data1 = $xml->asXML();
echo $data1;

$book = $data1->book[0];
echo "Book title : " . $book->title . "\n";
echo "Book author name : " . $book->author->name . "\n";

$doc = new DOMDocument;
$doc->preserveWhiteSpace = false;
$doc->loadXML($xmlstr);
$books = $doc->getElementsByTagName('book');
$books->item(0)->setAttribute('type', 'Computer');
$books->item(0)->childNodes->item(0)->nodeValue = 'RESTful Web
Services';
$author_node = $doc->createElement('author');
$books->item(0)->appendChild($author_node);
$name_node = $doc->createElement('name');
$name_node->nodeValue = 'Sami';
$author_node->appendChild($name_node);
$data2 = $doc->saveXML();
echo $doc->saveXML();

$doc = new DOMDocument;
$doc->preserveWhiteSpace = false;
$doc->loadXML($data2);
$books = $doc->getElementsByTagName('book');
echo "Book title : " . $books->item(0)->childNodes->item(0)->nodeValue . "\n";
echo "Book type : " . $books->item(0)->getAttribute('type') . "\n";
?>
