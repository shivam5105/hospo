<?php
// Create a "server" in your "rack", then copy it's API key
define('POSTMARKAPP_API_KEY', '');

// Create a "Sender signature", then use the "From Email" here.
// POSTMARKAPP_MAIL_FROM_NAME is optional, and can be overridden
// with Mail_Postmark::fromName()
define('POSTMARKAPP_MAIL_FROM_ADDRESS', 'noreply@hospo.com');
define('POSTMARKAPP_MAIL_FROM_NAME', 'Hospo');
?>