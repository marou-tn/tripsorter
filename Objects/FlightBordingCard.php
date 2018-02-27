<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 25/02/2018
 * Time: 15:42
 */

namespace Objects;


use Core\MandatoryParamException;

class FlightBordingCard implements BoardingCardInterface
{
    protected $from;
    protected $to;
    protected $seat = 'No seat assignment.';
    protected $name = 'flight';
    protected $code = '';
    protected $baggage = '';

    /**
     * FlightBordingCard constructor.
     * @param \stdClass $data
     * @throws MandatoryParamException
     */
    public function __construct(\stdClass $data)
    {
        if (!empty($data->from)) {
            $this->from = $data->from;
        }else{
            throw new MandatoryParamException('from attribute must be not empty for flight');
        }

        if (!empty($data->to)) {
            $this->to = $data->to;
        }else{
            throw new MandatoryParamException('to attribute must be not empty for flight');
        }

        if (!empty($data->name)) {
            $this->name = $data->name;
        }

        if (!empty($data->seat)) {
            $this->seat = 'seat '.$data->seat;
        }else{
            throw new MandatoryParamException('seat attribute must be not empty for flight');
        }

        if (!empty($data->code)) {
            $this->code = ' '.$data->code;
        }else{
            throw new MandatoryParamException('code attribute must be not empty for flight');
        }

        if (!empty($data->baggage)) {
            $this->baggage = 'Baggage '.$data->baggage;
        }else{
            throw new MandatoryParamException('baggage attribute must be not empty for flight');
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
        return 'Take '.$this->name.$this->code.' from '.$this->from.' to '.$this->to.'. '.$this->seat.PHP_EOL.$this->baggage;
    }
}