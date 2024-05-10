<?php
require_once __DIR__ . '/admin/vendor/autoload.php'; // If you're using Composer's autoload

use Google_Client;
use Google_Service_Oauth2;

// Replace with your actual credentials
/*$clientId = '432693094083-48fi7qmu7hunoqtnld4kqvmu66t0rs99.apps.googleusercontent.com';
$clientSecret = '"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';
$redirectUri = 'https://localhost/admin/login.php'; // Example: 'http://localhost/google-login/callback.php'

// Create Google Client
$client = new Google_Client();
$client->setAccessType('online');
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);*/

// Check if we have a code parameter in the URL (this indicates we've returned from the OAuth flow)
if (isset($_GET['code'])) {
    // Authenticate and get the access token
    /*$client->fetchAccessTokenWithAuthCode($_GET['code']);
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get(); */ // Get user information (email, name, etc.)

    // Example processing of user information
    $userEmail = $userInfo->email;
    $userName = $userInfo->name;

    // Store user data in session or database for future use
    session_start();
    $_SESSION['user'] = [
        'email' => $userEmail,
        'name' => $userName,
    ];

    // Redirect to the admin dashboard after successful login
    header('Location: profile.php');
    exit;
} else {
    // If no code parameter, build the OAuth2 authorization URL and redirect
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit;
}
