<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 25/02/2018
 * Time: 16:32
 */

namespace Services;
use Objects\BubBoardingCard;
use Objects\TrainBoardingCord;
use Objects\FlightBordingCard;

class BoardingCardMapper
{
    /**
     * @param \stdClass $boardCardArr
     * @return null|BubBoardingCard|FlightBordingCard|TrainBoardingCord
     */
    public function map(\stdClass $boardCardArr)
    {
        $obj = null;
        if (!empty($boardCardArr->transport)) {
            switch ($boardCardArr->transport) {
                case 'bus':
                    $obj = new BubBoardingCard($boardCardArr);
                    break;
                case 'train':
                    $obj = new TrainBoardingCord($boardCardArr);
                    break;
                case 'flight':
                    $obj = new FlightBordingCard($boardCardArr);
                    break;
                default:
                    throw new UnknownTransport('unknown transport type');
            }
        }else {
            throw new MandatoryParamException('transport attribute must be not empty');
        }

        return $obj;
    }
}