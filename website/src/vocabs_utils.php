<?php

$NB_LANGUAGES = 6;

// Returns a string (the language) if the code is valid, null otherwise
function getLanguageFromCode($code) {
    switch($code) {
        case 0: return 'Anglais'; break;
        case 1: return 'Allemand'; break;
        case 2: return 'Italien'; break;
        case 3: return 'Latin'; break;
        case 4: return 'Français'; break;
        case 5: return 'Espagnol'; break;
        default: return null; break;
    }
}

// Returns an int (the code) if the language is valid, null otherwise
function getCodeFromLanguage($lang) {
    strtolower($lang);
    switch($lang) {
        case 'anglais':     return 0; break;
        case 'allemand':    return 1; break;
        case 'italien':     return 2; break;
        case 'latin':       return 3; break;
        case 'français':    return 4; break;
        case 'espagnol':    return 5; break;
        default: return null; break;
    }
}

?>