<?php
include_once("inc/HTMLTemplate.php");

if(!empty($_POST)){
$name = 	isset($_POST['name']) ? $_POST['name'] : ''; 
$email = 	isset($_POST['email']) ? $_POST['email'] : ''; 
$msg = 		isset($_POST['msg']) ? $_POST['msg'] : '';

if($name == '' || $email == '' || $msg ==''){
	$form = formHTML($name, $email, $msg);
	$content = <<<END
		<p>Fyll i alla textfält, tack.</p>
			{$form}
END;
}

else {
$to = "amangr12@student.hh.se";
$subject = "Meddelande från min webbsida Avsändare: " . $name;
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=utf-8" . "\r\n"; 
$headers .= "From: {$email}" . "\r\n"; 
$headers .= "Reply-To: {$email}"; 

mail($to, $subject, $msg, $headers);

}
}

	else {
	$form = formHTML();
	$content = <<<END
			{$form}
END;
}

/*
if(mail($to, $subject, $msg, $headers)){
$content = <<<END
<p> tack för meddelandet! </p>
END;
}
else{
$content = <<<END
<p>Ledesn, det blev fel. Testa att göra om det!</p>
<p><a href="contact.php"> Tillbaka till gästboken</a></p>
END;
}*/


echo $header;
echo $navigation;
echo $content;
echo $footer;


function formHTML($name="", $email="", $msg =""){


$name = htmlspecialchars($name); 
$email = htmlspecialchars($email); 
$msg = htmlspecialchars($msg); 

	return <<<END
		<form action="contact.php" method="post">
			<label for ="name">Namn:</label>
			<input type="text" id="name" name="name" value="" /><br>
			<label for ="email">E-mail:</label>
			<input type="text" id="email" name="email" value="" /><br>
			<label for ="msg">Meddelande:</label>
			<textarea id="msg" name="msg"></textarea><br>
			<input type="submit" value="Submit" />
		</form>

END;
}




?>