<?php
namespace setup {
    include __DIR__ . '/../vendor/autoload.php';

    use josegonzalez\Dotenv\Loader;
    use GuzzleHttp\Client;

    function getToken()
    {
        /**
         * Get the information from .env
         */

        $dotEnv = new Loader(__DIR__ . '/../.env');
        $dotEnv->parse()->putenv(true);

        /**
         * Create a Guzzle Client
         */

        $client = new Client([
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);

        /**
         * Make the call to get the access token
         */

        $response = $client->post('https://oauth.cimpress.io/v2/token', [
                'body' => json_encode([
                    'client_id' => getenv('AUTH0_CLIENT_ID'),
                    'client_secret' => getenv('AUTH0_CLIENT_SECRET'),
                    'grant_type' => 'client_credentials',
                    'audience' => 'https://api.cimpress.io/'
                ]),
            ]
        );

        /**
         * Return the access token
         */

        $body = json_decode($response->getBody());
        return $body->access_token;
    }
}
