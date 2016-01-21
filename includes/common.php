<?php

if(isSet($_GET['lang'])) {
    $lang = $_GET['lang'];
}
else {
    $lang = 'de';
}

switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;

    case 'de':
        $lang_file = 'lang.de.php';
        break;

    case 'fr':
        $lang_file = 'lang.fr.php';
        break;

    default:
        $lang_file = 'lang.en.php';

}

include_once 'language/'.$lang_file;

