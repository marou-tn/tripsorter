<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 17:18
 */

namespace Objects;


interface BoardingCardInterface
{
    /**
     * @return \Objects\DestinationInterface
     */
    public function getFrom();

    /**
     * @return \Objects\DestinationInterface
     */
    public function getTo();
}