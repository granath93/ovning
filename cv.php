<?php
include_once("inc/HTMLTemplate.php");
include_once("inc/cvList.php");


foreach($cvList as $key => $item) {
$content .=<<<END

<div class="listItem">
<a href="cv-item.php?p={$key}">
<img src="{$item["image"]}" alt="" />
<p>{$key}</p>
</a>

</div>

END;
}

echo $header;
echo $navigation;
echo $content;
echo $footer;

?>