<?php
$files = glob("*.php"); // Get all PHP files in the current directory

echo "<h1>Available PHP Files</h1><ul>";

foreach ($files as $file) {
    // Skip this index file itself
    if ($file === basename(__FILE__)) continue;

    echo "<li><a href='$file'>$file</a></li>";
}

echo "</ul>";
?>
