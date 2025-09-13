<?php
// Simple test file to bypass framework routing
echo "<!DOCTYPE html>";
echo "<html><head><title>Test Page</title></head>";
echo "<body>";
echo "<h1>🎉 SUCCESS! Application is working!</h1>";
echo "<p>This is a simple test page that bypasses the framework routing.</p>";
echo "<p>Current time: " . date('Y-m-d H:i:s') . "</p>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Server: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "</p>";
echo "</body></html>";
?>
