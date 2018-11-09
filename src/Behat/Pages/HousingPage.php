<?php
namespace LV\Shumkov\BehatAcceptanceTestingExample\Behat\Pages;

use Behat\Mink\Element\NodeElement;
use LV\Shumkov\BehatAcceptanceTestingExample\Behat\Pages\Elements\SortingElement;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class HousingPage extends Page
{
    const ELEMENT_SEARCH_QUERY = 'Search query';

    const ELEMENT_SEARCH_SUBMIT = 'Search submit';

    protected $path = '/d/housing/search/hhh';

    protected $elements = [
        self::ELEMENT_SEARCH_QUERY => 'input#query',
        self::ELEMENT_SEARCH_SUBMIT => 'button.searchbtn',
    ];

    public function search(string $query)
    {
        $this->getElement(self::ELEMENT_SEARCH_QUERY)->setValue($query);
        $this->getElement(self::ELEMENT_SEARCH_SUBMIT)->click();
    }

    /**
     * Should be used when actual search query is not relevant for the test
     */
    public function searchForSomething()
    {
        $this->search('something');
    }

    /**
     * @return int[]
     */
    public function getPostingPrices(): array
    {
        $prices = [];
        foreach ($this->findAll('css', '.result-row .result-price') as $priceElement) {
            /** @var NodeElement $priceElement */
            $priceText = $priceElement->getText();
            if ($priceText[0] === '$') {
                $priceText = substr($priceText, 1);
            }

            // TODO: make sure it's not decimal
            $prices[] = (int) $priceText;
        }

        return $prices;
    }
}
