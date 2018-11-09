<?php
namespace LV\Shumkov\BehatAcceptanceTestingExample\Behat\Pages\Elements;

use Behat\Mink\Element\NodeElement;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class SortingElement extends Element
{
    const SORTING_NEWEST = 'newest';
    const SORTING_UPCOMING = 'upcoming';
    const SORTING_RELEVANT = 'relevant';
    const SORTING_PRICE_LOWEST_TO_HIGHEST = 'price ↑';
    const SORTING_PRICE_HIGHEST_TO_LOWEST = 'price ↓';

    protected $selector = '.dropdown-sort';

    public function open()
    {
        // TODO: check if already opened
        $this->click();
    }

    public function sortBy(string $sortingPossibility)
    {
        $this->open();

        $isFound = false;
        foreach ($this->getSortingPossibilitiesElements() as $element) {
            if ($element->getText() === $sortingPossibility) {
                $element->click();
                $isFound = true;
                break;
            }
        }

        if (!$isFound) {
            throw new \RuntimeException(
                sprintf('Sorting possibility %s can not be found on page', $sortingPossibility)
            );
        }
    }

    public function getSortingPossibilities(): array
    {
        $result = [];
        foreach ($this->getSortingPossibilitiesElements() as $element) {
            $result[] = $element->getText();
        }

        return $result;
    }

    public static function getDefaultSortingPossibilitiesList(): array
    {
        return [
            self::SORTING_NEWEST,
            self::SORTING_PRICE_LOWEST_TO_HIGHEST,
            self::SORTING_PRICE_HIGHEST_TO_LOWEST,
        ];
    }

    public static function getExtendedSortingPossibilitiesList(): array
    {
        return [
            self::SORTING_UPCOMING,
            self::SORTING_NEWEST,
            self::SORTING_RELEVANT,
            self::SORTING_PRICE_LOWEST_TO_HIGHEST,
            self::SORTING_PRICE_HIGHEST_TO_LOWEST,
        ];
    }

    /**
     * @return NodeElement[]
     */
    private function getSortingPossibilitiesElements(): array
    {
        return $this->findAll('css', '.dropdown-item a');
    }
}