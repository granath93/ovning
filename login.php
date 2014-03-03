<?php

if(!empty($_POST)){

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


if($spamTest !=''){
die("Jag tror du är en robot. Om du inte är det kan du gå tillbaka och göra om.");
}

if($username == '' || $password == '' ) {
$feedback = "<p> Fyll i alla fält, tack.</p>";
}
else {
$username = utf8_encode($mysqli->real_escape_string($username));
$password = utf8_encode($mysqli->real_escape_string($password));
$query = <<<END
INSERT INTO {$tablePost}(postName, postMessage)
VALUES('{$username}', '{$password}');
END;

$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno .
" : " . $mysqli->error); //Performs query

}
}



<form action="login.php" method="post" id="login-form">
	<label for="username">Användarnamn: </label>
	<input type="text" id="username" namn="username" value="" />
	<label for="password">Lösenord: </label>
	<input type="text" id="password" namn="password" value="" />
	<input type="submit" value="Logga in"/>
</form>






?>
