<?php
$jmeno = $_POST['jmeno'];
$prijmeni = $_POST['prijmeni'];
$email = $_POST['email']; 
$telefon = $_POST['telefon']; 
$vek = $_POST['vek'];
$osetreni = $_POST['osetreni'];
$text = $_POST['text'];
$spam = $_POST['spam'];

$predmet = "Nový vzkaz z webu Lékařská Estetika";
$message = "
Dobrý den, máte novou objednávku na Coolsculpting

Odesílatel: $jmeno $prijmeni
E-mail: $email
Telefon: $telefon
Věk: $vek
Partie pro ošetření: $osetreni

Doplňující informace:
$text
";

if ($jmeno!="" and $email!="")
{
Mail("objednavky@lekarskaestetika.cz", $predmet, $message, "From: " . $email);
header('Location: odeslano?problemove-partie');
exit;
}
else
{
header('Location: neodeslano');
exit;
}
exit;
?>