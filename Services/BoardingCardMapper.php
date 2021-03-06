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

/**
 * Class BoardingCardMapper
 * @package Services
 */
class BoardingCardMapper
{
    private $objects_namespace = "\Objects\\";
    /**
     * map stdClass to BoardingCardInterface
     * @param \stdClass $boardCard
     * @return null|BubBoardingCard|FlightBordingCard|TrainBoardingCord
     */
    public function map(\stdClass $boardCard)
    {
        $obj = null;
        $transportClass = Config::getInstance()->get('transport');
        if (!empty($boardCard->transport)) {
            if (isset($transportClass[$boardCard->transport])) {
                $class = $this->objects_namespace . $transportClass[$boardCard->transport];
                $obj = new $class($boardCard);
            } else {
                throw new UnknownTransport('unknown transport type : '.$boardCard->transport);
            }
        }else {
            throw new MandatoryParamException('transport attribute must be not empty');
        }

        return $obj;
    }

}