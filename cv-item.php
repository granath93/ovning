<?php
include_once("inc/HTMLTemplate.php");
include_once("cv-item.php");
include_once("inc/cvList.php");

$page = isset($_GET['p']) ? $_GET['p'] : '' ; 

if($page == '' || !array_key_exists($page, $cvList)){
echo $header;
echo $navigation;
die("skrivit fel adress i sökfältet, tyvärr");
echo $footer;
exit();
}

$item = $cvList[$page];

$content = <<<END

<p><a href="cv.php">CV</a> &gt; {$page}</p>


<h1>{$page}</h1>
<img src="{$item["image"]}" alt=""/>
<p>{$item["Beskrivning"]}</p>

END;

echo $header;
echo $navigation;
echo $content;
echo $footer;

?>