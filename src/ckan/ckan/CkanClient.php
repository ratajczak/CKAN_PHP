<?php

namespace ckan\ckan;


use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class CkanClient extends Client {	

    /**
     * Factory method to create a new CkanClient
     *
     * The following array keys and values are available options:
     * - baseUrl: Base URL of web service
     * - scheme:   URI scheme: http or https
     * - username: API username
     * - password: API password
     *
     * @param array|Collection $config Configuration data
     *
     * @return self
     */
    public static function factory($config = array())
    {
        $default = array(
            'baseUrl' => '{scheme}://{username}.test.com/',
            'scheme'   => 'https'
        );
        $required = array('baseUrl');
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('baseUrl'), $config);
        // Attach a service description to the client
        $description = ServiceDescription::factory(__DIR__ . '/service.json');
        $client->setDescription($description);

        return $client;
    }

}
