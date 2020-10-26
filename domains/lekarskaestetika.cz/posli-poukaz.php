<?php
require_once 'admin/inc/Database.php';
$myPost = filter_input_array(INPUT_POST);

$jmeno = $_POST['jmeno'];
$spam = $_POST['spam'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$text = $_POST['text'];
$castka = $_POST['castka'];
$obdarovany = $_POST['obdarovany'];
$predmet = "Objednávka dárkového poukazu";
$message = "
Nová objednávka dárkového poukazu ze stránek Lékařská Estetika

Objednavatel: $jmeno
Obdarovaný: $obdarovany
Částka: $castka
Telefon: $telefon
E-mail: $email
Doplňující informace:
$text
";

if ($jmeno!="" and $email!="" and $spam=="deset")
{
Mail("objednavky@lekarskaestetika.cz", $predmet, $message, "From: " . $email);
header('Location: odeslano-poukaz');
exit;
}
else
{
header('Location: neodeslano');
exit;
}
exit;
?>