<?php
require("includes/database_connect.php");

if ($conn) {
    echo "✅ Database connection successful!";
} else {
    echo "❌ Database connection failed!";
}
?>
