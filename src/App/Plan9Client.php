<?php

namespace App;

use Silex\Application as App;
/**
 * Class Plan9Client
 * @package App
 */
class Plan9Client
{
    private $_app;

    /**
     * Plan9Client constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->_app = $app;
    }

    public function __call($method, $arguments)
    {
        $this->request();
    }

    private function request()
    {
        $ch = curl_init($this->_app['plan9.server_uri'] . '/users/?accountDN=yuliya.goncharenko+1@globallogic.com');

        curl_setopt_array($ch, [
            CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: Basic " . base64_encode($this->_app['plan9.credentials'])
            ],
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CONNECTTIMEOUT => 30,
        ]);

        $result = curl_exec($ch);

        print_r(curl_error($ch));

        print_r($result);die;
    }
}