<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 25/02/2018
 * Time: 15:36
 */

namespace Objects;


use Core\MandatoryParamException;

class TrainBoardingCord implements BoardingCardInterface
{
    protected $from;
    protected $to;
    protected $seat = 'No seat assignment.';
    protected $name = 'train';
    protected $code = '';

    /**
     * TrainBoardingCord constructor.
     * @param \stdClass $data
     * @throws MandatoryParamException
     */
    public function __construct(\stdClass $data)
    {
        if (!empty($data->from)) {
            $this->from = $data->from;
        }else{
            throw new MandatoryParamException('from attribute must be not empty for train');
        }

        if (!empty($data->to)) {
            $this->to = $data->to;
        }else{
            throw new MandatoryParamException('to attribute must be not empty for train');
        }

        if (!empty($data->name)) {
            $this->name = $data->name;
        }
        if (!empty($data->seat)) {
            $this->seat = 'Sit in seat '.$data->seat;
        }
        if (!empty($data->code)) {
            $this->code = ' '.$data->code;
        }
    }

    /**
     * get from
     * @return string from destination
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * get to
     * @return string to destination
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return string readable human boarding card
     */
    public function __toString()
    {
        return 'Take '.$this->name.$this->code.' from '.$this->from.' to '.$this->to.'. '.$this->seat;
    }
}