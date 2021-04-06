<?php

CONST ABC = "abcdefghijklmnopqrstuvwxyz";
CONST ZERO = 0;

//$key = "abcde";
//$message = "hfnos";
//translated: "hello";

//$key = "abcdefghijklm";
//$message = "wptoh";
//translated: "world";

//$key = "fkaiplmd";
//$message = "Uonojtzv fbe bwp nhxd avxxmox";
//translated: penguinsarethebestanimals

$key = "xtyrfksyugkfdg";
$message = "Qac wtyd bizr ykokd fv nc ogmk, lzw zex uzxo eyh qxtzy ebkjjvx ri ho f iule.";
//translated: The fool doth think he is wise, but the wise man knows himself to be a fool.


//track current position in key
$keyAt = ZERO;

//check for uppercase letters in the message
$upperCases = [];
for($i=ZERO, $iMax = strlen($message); $i< $iMax; $i++)
{
    if(ctype_upper($message[$i]))
    {
        $upperCases[]= strpos($message, $message[$i]);
    }
}

//set all letters to lowercase
$message = strtolower($message);

//decode the message
for($i=ZERO, $iMax = strlen($message); $i< $iMax; $i++)
{
    if(!str_contains(ABC, $message[$i]))
    {
        continue;
    }

    $a = strpos(ABC, $message[$i]);
    $b = strpos(ABC, $key[$keyAt]);
    $c = $a-$b;

    if ($c < ZERO){$c += strlen(ABC);}

    $message[$i] = ABC[$c];

    $keyAt++;
    if($keyAt >= strlen($key)){$keyAt=ZERO;}
}

//Set upperCases back to upper case
foreach ($upperCases AS $upperCase)
{
    $message[$upperCase] = strtoupper($message[$upperCase]);
}

//show decoded message
echo $message;
