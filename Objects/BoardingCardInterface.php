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
     * @return string from destination
     */
    public function getFrom();

    /**
     * @return string to destination
     */
    public function getTo();

    /**
     * @return string readable human boarding card
     */
    public function __toString();
}