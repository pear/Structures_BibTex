<?php
require_once 'PEAR.php';
require_once './Structures_BibTex.php';

$foo = new Structures_BibTex();

//Loading and parsing the file example.bib
$ret=$foo->loadFile('example.bib');
if(PEAR::isError($ret)) {
    print $ret->getMessage();
    die();
}
$foo->parse();

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
$foo->addEntry($addarray);

//Printing the result
print "<pre>";
print "Converting This Array:\n\n";
print_r($foo->data);
print "\nInto this:\n\n";
print $foo->bibTex();
?>