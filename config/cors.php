<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', '*'], // Autoriser toutes les routes de l'API et toutes les autres routes

    'allowed_methods' => ['*'], // Autoriser toutes les méthodes (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['*'], // Autoriser toutes les origines (domaines)

    'allowed_origins_patterns' => [], // Laisser vide ou supprimer

    'allowed_headers' => ['*'], // Autoriser tous les headers

    'exposed_headers' => false, // Ne pas exposer de headers spécifiques

    'max_age' => 0, // Pas de mise en cache des résultats
];
