<?php

use PredictionIO\PredictionIOClient;

/**
 * Produces test scores
 *
 * @author jacob
 */
class TestScores {

    protected $client;

    public function __construct() {
        $this->client = PredictionIOClient::factory(array('appkey' => 'SieCjyvOd3ELxPBpJ5t2tfAyaKc8wG8WwYW4oMOuFgpsGm1jLiA1L3hmq40Yid7m'));
    }

    function createUsers() {
        for ($i = 1; $i < 10; $i++) {
            $command = $this->client->getCommand('create_user', array('pio_uid' => $i));
            $this->client->execute($command);
        }
    }

    function createObjects() {
        for ($i = 1; $i < 50; $i++) {
            $command = $this->client->getCommand('create_item', array('pio_iid' => $i, 'pio_itypes' => 1));
            $this->client->execute($command);
        }
    }

    function addActionToUsers() {
         for ($u = 1; $u < 10; $u++) {
            for ($items = 1; $items < 10; $items++) {
            $i=  rand(1, $u*5);
            $this->client->identify($u);
            $command=  $this->client->getCommand('record_action_on_item',array('pio_action' => 'view', 'pio_iid' => $i));
            $this->client->execute($command);
        }
        }
    }

}
