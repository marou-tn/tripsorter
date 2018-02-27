<?php
/**
 * Created by PhpStorm.
 * User: marou
 * Date: 24/02/2018
 * Time: 17:19
 */

namespace Services;
use Objects\BoardingCardInterface;

/**
 * Class TripSorter
 * @package Services
 */
class TripSorter
{
    /**
     * sort array of BoardingCards
     * @param array $boardingCards
     * @return array of BoardingCardInterface
     */
    public function sort(array $boardingCards, $departure)
    {
        $key = array_search($departure, array_column((array)$boardingCards, 'from'));
        $sorted = [$boardingCards[$key]];
//        $sorted = [array_pop($boardingCards)];
        while (count($boardingCards) > 0) {
            foreach ($boardingCards as $key => $card) {
                if ( ! $card instanceof BoardingCardInterface) {
                    unset($boardingCards[$key]);
                    continue;
                }

                if (end($sorted)->getTo() === $card->getFrom()) {
                    $sorted[] = $card;
                } elseif (reset($sorted)->getFrom() === $card->getTo()) {
                    array_unshift($sorted, $card);
                }

                unset($boardingCards[$key]);
            }
        }

        return $sorted;
    }
}