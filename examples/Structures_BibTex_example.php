<?php
error_reporting(E_ALL);

require_once 'PEAR.php';
//require_once './Structures_BibTex.php';
require_once 'Structures/BibTex.php';

$bibtex = new Structures_BibTex();

//Loading and parsing the file example.bib
$ret=$bibtex->loadFile('example.bib');
if(PEAR::isError($ret)) {
    print $ret->getMessage();
    die();
}
$bibtex->parse();

//Creating an entry
$addarray = array();
$addarray['type']               = 'Article';
$addarray['cite']               = 'art2';
$addarray['title']              = 'Titel2';
$addarray['author'][0]['first'] = 'John';
$addarray['author'][0]['last']  = 'Doe';
$addarray['author'][1]['first'] = 'Jane';
$addarray['author'][1]['last']  = 'Doe';
//Adding the entry
$bibtex->addEntry($addarray);

//Printing the result
echo "<pre>";
echo "Converting This Array:\n\n";
print_r($bibtex->data);
echo "\nInto this:\n\n";
echo $bibtex->bibTex();
echo "\nAnd here is the RTF String:\n\n";
echo $bibtex->rtf();
echo "</pre>";
echo "\nAnd here are the data in  HTML:\n\n";
echo $bibtex->html();
?>