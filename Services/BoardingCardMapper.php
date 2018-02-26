<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 25/02/2018
 * Time: 16:32
 */

namespace Services;
use Config\Config;
use Objects\BubBoardingCard;
use Objects\TrainBoardingCord;
use Objects\FlightBordingCard;

class BoardingCardMapper
{
    private $objects_namespace = "\Objects\\";
    /**
     * @param \stdClass $boardCard
     * @return null|BubBoardingCard|FlightBordingCard|TrainBoardingCord
     */
    public function map(\stdClass $boardCard)
    {
        $obj = null;
        $transportClass = Config::getInstance()->get('transport');
        if (!empty($boardCard->transport)) {
            if (isset($transportClass[$boardCard->transport])) {
                $obj = new $this->objects_namespace . $transportClass[$boardCard->transport]($boardCard);
            } else {
                throw new UnknownTransport('unknown transport type : '.$boardCard->transport);
            }
        }else {
            throw new MandatoryParamException('transport attribute must be not empty');
        }

        return $obj;
    }

//    public function map2(\stdClass $boardCardArr)
//    {
//        $obj = null;
//        if (!empty($boardCardArr->transport)) {
//            switch ($boardCardArr->transport) {
//                case 'bus':
//                    $obj = new BubBoardingCard($boardCardArr);
//                    break;
//                case 'train':
//                    $obj = new TrainBoardingCord($boardCardArr);
//                    break;
//                case 'flight':
//                    $obj = new FlightBordingCard($boardCardArr);
//                    break;
//                default:
//                    throw new UnknownTransport('unknown transport type');
//            }
//        }else {
//            throw new MandatoryParamException('transport attribute must be not empty');
//        }
//
//        return $obj;
//    }
}