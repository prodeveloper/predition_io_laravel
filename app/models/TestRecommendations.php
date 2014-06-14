<?php

use PredictionIO\PredictionIOClient;

/**
 * Generate recommendations for the users
 *
 * @author jacob
 */
class TestRecommendations {

    protected $client;

    public function __construct() {
        $this->client = PredictionIOClient::factory(array('appkey' => 'SieCjyvOd3ELxPBpJ5t2tfAyaKc8wG8WwYW4oMOuFgpsGm1jLiA1L3hmq40Yid7m'));
    }

    function getRecommendations() {
        $results = array();
        for ($u = 1; $u < 10; $u++) {
            try {
                $this->client->identify($u);
                $command = $this->client->getCommand('itemrec_get_top_n', array('pio_engine' => 'rec_engine', 'pio_n' => 5));
                $rec = $this->client->execute($command);
                $results[] = $rec;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
        return $results;
    }

}
