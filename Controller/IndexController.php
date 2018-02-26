<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 15:38
 */

namespace Controller;


use Core\JsonRequest;
use Core\JsonRespense;
use Services\BoardingCardMapper;
use Services\TripSorter;

class IndexController
{
    public function index($params = array())
    {
        try {
            $request = new JsonRequest();
            $respense = new JsonRespense();
            $mapper = new BoardingCardMapper();
            $sorter = new TripSorter();
            $boardingCard_arr = $request->load('BoardingCards');
//            print_r($boardingCard_arr);die;
            if ($boardingCard_arr) {
                $boardingCard_obj = [];
                foreach ($boardingCard_arr as $bc) {
                    $boardingCard_obj[] = $mapper->map($bc);
                }

                $boardingCards = $sorter->sort($boardingCard_obj);
                foreach ($boardingCards as $obj) {
                    $respense->add($obj.PHP_EOL.PHP_EOL);
                }
            }

            echo $respense->load();
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }
}