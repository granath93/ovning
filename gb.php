<?php
include_once("inc/HTMLTemplate.php");
include_once("inc/connString.php");


$feedback = "";
$name = "";
$msg = "";
$tablePost = "post"; 

if(!empty($_POST)){

	$name = 	isset($_POST['name']) ? $_POST['name'] : ''; 
	$msg = 		isset($_POST['msg']) ? $_POST['msg'] : '';
	$spamTest = isset($_POST['address']) ? $_POST['address'] : ''; 

	if($spamTest !=''){
	die("Jag tror du är en robot. Om du inte är det kan du gå tillbaka och göra om.");
	}

	if($name == '' || $msg == '' ) {
	$feedback = "<p> Fyll i alla fält, tack.</p>";
	}
	else {
	$name = utf8_encode($mysqli->real_escape_string($name)); 
	$msg = utf8_encode($mysqli->real_escape_string($msg)); 	
	$query = <<<END
	INSERT INTO {$tablePost}(postName, postMessage) 
	VALUES('{$name}', '{$msg}'); 
END;
	
	$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error); //Performs query 
	
	}
}

$name = htmlspecialchars($name);
$msg = htmlspecialchars($msg);


	$content = <<<END

	{$feedback}
		<form action="gb.php" method="post">
			<label for ="name">Namn:</label>
			<input type="text" id="name" name="name" value="" /><br>
			<label for ="msg">Meddelande:</label>
			<textarea id="msg" name="msg"></textarea><br>
			<input type="submit" value="Submit" />
		</form>

END;

$query = <<<END
 
SELECT postName, postMessage, postTimestamp 
FROM {$tablePost} 
ORDER BY postTimestamp DESC; 

END;
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query 

while($row = $res->fetch_object()) { 
$date = strtotime($row->postTimestamp); 
$date = date("d M Y H:i", $date);

$postName = utf8_decode(htmlspecialchars($row->postName));
$postMessage = utf8_decode(htmlspecialchars($row->postMessage));
	
	$content .= <<<END
	<hr>
	<p>Skrivet av: {$postName}</p>
	<p>{$postMessage}</p>
	<p>{$date}</p>
	
END;
} 

$res->close(); 
$mysqli->close(); 

echo $header;
echo $navigation;
echo $content;
echo $footer;

?>