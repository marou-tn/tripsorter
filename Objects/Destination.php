<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 25/02/2018
 * Time: 14:59
 */

namespace Objects;


class Destination implements DestinationInterface
{
    protected $name;

    public function __construct($str)
    {
        $this->name = $str;
    }

    public function __toString()
    {
        echo $this->name;
    }

    public function setName($str)
    {
        $this->name = $str;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

}