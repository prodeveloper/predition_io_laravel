<?php

/**
 * Description of TestController
 *
 * @author jacob
 */
class TestController extends BaseController {
    function getIndex() {
        $rec= new TestRecommendations();
        $data=$rec->getRecommendations();
        var_dump($data);
        die();
    }
    protected function _registerData() {
                $t_scores= new TestScores();
        $t_scores->createUsers();
        $t_scores->createObjects();
        $t_scores->addActionToUsers();
        die("success");
    }
}
