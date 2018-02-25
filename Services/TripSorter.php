<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 17:19
 */

namespace Services;


class TripSorter
{
    public function sort(array $boardingCards)
    {
        $sorted = [array_pop($boardingCards)];

        while (count($boardingCards) > 0) {
            foreach ($boardingCards as $key => $card) {
                if ( ! $card instanceof BoardingCardInterface) {
                    unset($boardingCards[$key]);
                    continue;
                }

                if (end($sorted)->getTo()->__toString() === $card->getFrom()->__toString()) {
                    array_push($sorted, $card);
                } elseif (reset($sorted)->getFrom()->__toString() === $card->getTo()->__toString()) {
                    array_unshift($sorted, $card);
                }

                unset($boardingCards[$key]);
            }
        }

        return $sorted;
    }
}