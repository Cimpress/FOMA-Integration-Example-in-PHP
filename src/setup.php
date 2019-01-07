<?php
namespace setup {
    include __DIR__ . '/../vendor/autoload.php';

    use josegonzalez\Dotenv\Loader;
    use GuzzleHttp\Client;

    function getToken()
    {

        $dotEnv = new Loader(__DIR__ . '/../.env');
        $dotEnv->parse()->putenv(true);

        /**
         * Client
         */

        $client = new Client([
            'headers' => [
                'content-type' => 'application/json'
            ]
        ]);

        /**
         * Make call
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
         * Return stuff
         */
        $body = json_decode($response->getBody());
        return $body->access_token;
}
}