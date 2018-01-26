<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//--------------------------Set these paramaters--------------------------

// Subject of email sent to you.
$subject = 'Results from Contact form'; 

// Your email address. This is where the form information will be sent. 
$emailadd = 'larryaltman17@larryaltman17.netne.net'; 

// Where to redirect after form is processed. 
$url = 'confirmation.html'; 

// Makes all fields required. If set to '1' no field can not be empty. If set to '0' any or all fields can be empty.
$req = '0'; 

// --------------------------Do not edit below this line--------------------------
$text = "Results from form:\n\n"; 
$space = ' ';
$line = '
';
foreach ($_POST as $key => $value)
{
if ($req == '1')
{
if ($value == '')
{echo "$key is empty";die;}
}
$j = strlen($key);
if ($j >= 20)
{echo "Name of form element $key cannot be longer than 20 characters";die;}
$j = 20 - $j;
for ($i = 1; $i <= $j; $i++)
{$space .= ' ';}
$value = str_replace('\n', "$line", $value);
$conc = "{$key}:$space{$value}$line";
$text .= $conc;
$space = ' ';
}
mail($emailadd, $subject, $text, 'From: '.$emailadd.'');
echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>

</body>
</html>