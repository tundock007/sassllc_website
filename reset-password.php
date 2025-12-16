<?php
/**
 * Emergency Password Reset Script
 * DELETE THIS FILE AFTER USE
 * 
 * Visit: https://sassllcwebsite-production.up.railway.app/reset-password.php
 */

require_once('wp-load.php');

$username = 'SASS_admin';
$new_password = 'TempPass123!';

$user = get_user_by('login', $username);

if ($user) {
    wp_set_password($new_password, $user->ID);
    echo "<h1>Password Reset Successful!</h1>";
    echo "<p>Username: <strong>{$username}</strong></p>";
    echo "<p>New Password: <strong>{$new_password}</strong></p>";
    echo "<p><a href='/wp-admin/'>Click here to log in</a></p>";
    echo "<p style='color: red; font-weight: bold;'>⚠️ IMPORTANT: Delete this file after logging in!</p>";
} else {
    echo "<h1>Error</h1>";
    echo "<p>User '{$username}' not found.</p>";
    
    // List all users
    $users = get_users();
    echo "<h2>Available users:</h2><ul>";
    foreach ($users as $u) {
        echo "<li>" . $u->user_login . "</li>";
    }
    echo "</ul>";
}
?>
