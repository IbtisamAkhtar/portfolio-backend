<?php
// Simple server test
echo "PHP Server Working on Railway!";
echo "\nTimestamp: " . date('Y-m-d H:i:s');
echo "\nPORT: " . (getenv('PORT') ?: '8080');
echo "\nEnvironment: " . (getenv('APP_ENV') ?: 'unknown');
?>