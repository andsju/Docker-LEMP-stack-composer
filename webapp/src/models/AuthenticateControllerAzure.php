<?php

include SRC . '/configs/inc.credentials.php';

// composer autoloading 
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';


// Copyright (c) Microsoft Corporation.
// Licensed under the MIT License.
// 
// parts implemented @andsju 
// https://docs.microsoft.com/en-us/graph/tutorials/php
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class AuthenticateControllerAzure
{

    public function signin()
    {

        $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
            'clientId'                => AZURE_CLIENT_ID,
            'clientSecret'            => AZURE_CLIENT_SECRET,
            'redirectUri'             => AZURE_REDIRECT_URI,
            'urlAuthorize'            => AZURE_URL_AUTHORIZE,
            'urlAccessToken'          => AZURE_ACCESS_TOKEN,
            'urlResourceOwnerDetails' => AZURE_URL_RESOURCE_OWNER_DETAILS,
            'scopes'                  => AZURE_SCOPES
        ]);

        $authUrl = $oauthClient->getAuthorizationUrl();

        // Save client state so we can validate in callback
        $_SESSION["oauthState"] = $oauthClient->getState();

        // Redirect to AAD signin page
        header('Location: ' . $authUrl);
    }


    public function callback($authCode)
    {

        if (isset($authCode)) {
            // Initialize the OAuth client
            $oauthClient = new \League\OAuth2\Client\Provider\GenericProvider([
                'clientId'                => AZURE_CLIENT_ID,
                'clientSecret'            => AZURE_CLIENT_SECRET,
                'redirectUri'             => AZURE_REDIRECT_URI,
                'urlAuthorize'            => AZURE_URL_AUTHORIZE,
                'urlAccessToken'          => AZURE_ACCESS_TOKEN,
                'urlResourceOwnerDetails' => AZURE_URL_RESOURCE_OWNER_DETAILS,
                'scopes'                  => AZURE_SCOPES
            ]);

            try {

                // Make the token request
                $accessToken = $oauthClient->getAccessToken('authorization_code', [
                    'code' => $authCode
                ]);

                $graph = new Graph();
                $graph->setAccessToken($accessToken->getToken());

                // get user 
                $user = $graph->createRequest('GET', '/me')
                    ->setReturnType(Model\User::class)
                    ->execute();

                // set sessions
                $_SESSION['azureAccessToken'] = $accessToken->getToken();
                $_SESSION['azureUserId'] = $user->getId();
                $_SESSION['azureDisplayName'] = $user->getDisplayName();
                
                // create hidden inputs - use in client side JavaScript requests   
                echo '<input type="hidden" value=' . $_SESSION['azureAccessToken'] . ' id="azureAccessToken">';
                echo '<input type="hidden" value="' . $_SESSION['azureUserId'] . '" id="azureUserId">';

                // print_r($user);

            } catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
                print_r($e->getResponseBody());
            }
        }
    }
}
