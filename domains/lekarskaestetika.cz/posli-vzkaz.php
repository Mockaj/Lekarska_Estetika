<?php
require_once 'admin/inc/Database.php';
$myPost = filter_input_array(INPUT_POST);

$jmeno = $_POST['jmeno'];
$spam = $_POST['spam'];
$email = $_POST['email']; 
$text = $_POST['text'];
$predmet = "Nový vzkaz z webu Lékařská Estetika";
$message = "
Dobrý den, máte novou zprávu z webu Lékařská Estetika!

Odesílatel: $jmeno
E-mail: $email

$text
";

if ($jmeno!="" and $email!="" and $spam=="deset")
{
Mail("objednavky@lekarskaestetika.cz", $predmet, $message, "From: " . $email);
$database->vzkazy->insert($myPost);
header('Location: odeslano');
exit;
}
else
{
header('Location: neodeslano');
exit;
}
exit;
?>