<html>
<head></head>
<body>
<h1>Example of Structurs_BibTex</h1>
<p>This example parses the <a href="./example.bib">BibTex File &quot;example.bib&quot;</a>
and adds en entry to it. Then the internal stored data is printed and the
converted BibTex. An here is the <a href="./example.phps">source file of this example</a>.</p>
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

//Adding an entry
$addarray = array();
$addarray['type'] = 'Article';
$addarray['cite'] = 'art2';
$addarray['title'] = 'Titel2';
$addarray['author'][0] = 'John Doe';
$addarray['author'][1] = 'Jane Doe';
$foo->addEntry($addarray);

//Printing the result
print "<pre>";
print "Konverting This Array:\n\n";
print_r($foo->data);
print "\nInto this:\n\n";
print $foo->bibTex();
?>
</body>
</html>