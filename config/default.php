<?php
/**
 *
*/
// gettext setup
T_setlocale(LC_MESSAGES, $locale);
// Set the text domain as 'messages'
$domain = 'messages';
bindtextdomain($domain, LOCALE_DIR);
// bind_textdomain_codeset is supported only in PHP 4.2.0+
if (function_exists('bind_textdomain_codeset')) 
  bind_textdomain_codeset($domain, $encoding);
textdomain($domain);
?>
