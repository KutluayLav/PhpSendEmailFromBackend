<?php
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

define('EMAIL_USERNAME', '@gmail.com');
define('EMAIL_PASSWORD', '');
define('TO_EMAIL', 'kutluayw22@gmail.com');

define('EMAIL_SUBJECT_CONTACT','İletişim Formu');

define('EMAIL_TEMPLATE_CONTACT_PATH', 'EmailFormat/ContactForm.html');
?>