<?php
namespace LV\Shumkov\BehatAcceptanceTestingExample\Behat\Contexts;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use LV\Shumkov\BehatAcceptanceTestingExample\Behat\Pages\Elements\SortingElement;
use LV\Shumkov\BehatAcceptanceTestingExample\Behat\Pages\HousingPage;
use PHPUnit\Framework\Assert;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends PageObjectContext
{
    /**
     * @var HousingPage
     */
    private $housingPage;

    /**
     * @var SortingElement
     */
    private $sortingElement;

    public function __construct(HousingPage $housingPage, SortingElement $sortingElement)
    {
        $this->housingPage = $housingPage;
        $this->sortingElement = $sortingElement;
    }

    /**
     * @Given I am on housing page with multiple postings
     */
    public function iAmOnHousingPageWithMultiplePostings()
    {
        $this->housingPage->open();
    }

    /**
     * @When I open sorting possibilities list
     */
    public function iOpenSortingPossibilitiesList()
    {
        $this->sortingElement->open();
    }

    /**
     * @Then I should see default list of sorting possibilities
     */
    public function iShouldSeeDefaultListOfSortingPossibilities()
    {
        Assert::assertEquals(
            SortingElement::getDefaultSortingPossibilitiesList(),
            $this->sortingElement->getSortingPossibilities()
        );
    }

    /**
     * @Given I am on housing page with multiple postings listed at different prices
     */
    public function iAmOnHousingPageWithMultiplePostingsListedAtDifferentPrices()
    {
        $this->housingPage->open();
    }

    /**
     * @When I sort by price from highest to lowest
     */
    public function iSortByPriceFromHighestToLowest()
    {
        $this->sortingElement->sortBy(SortingElement::SORTING_PRICE_HIGHEST_TO_LOWEST);
    }

    /**
     * @Then postings are sorted by price from highest to lowest
     */
    public function postingsAreSortedByPriceFromHighestToLowest()
    {
        $actualPrices = $this->housingPage->getPostingPrices();
        $expectedPrices = $actualPrices;
        rsort($expectedPrices, SORT_NUMERIC);
        Assert::assertEquals($expectedPrices, $actualPrices);
    }

    /**
     * @When I sort by price from lowest to highest
     */
    public function iSortByPriceFromLowestToHighest()
    {
        $this->sortingElement->sortBy(SortingElement::SORTING_PRICE_LOWEST_TO_HIGHEST);
    }

    /**
     * @Then postings are sorted by price from lowest to highest
     */
    public function postingsAreSortedByPriceFromLowestToHighest()
    {
        $actualPrices = $this->housingPage->getPostingPrices();
        $expectedPrices = $actualPrices;
        sort($expectedPrices, SORT_NUMERIC);
        Assert::assertEquals($expectedPrices, $actualPrices);
    }

    /**
     * @When I use search
     */
    public function iUseSearch()
    {
        $this->housingPage->searchForSomething();
    }

    /**
     * @Then I should see extended list of sorting possibilities
     */
    public function iShouldSeeExtendedListOfSortingPossibilities()
    {
        Assert::assertEquals(
            SortingElement::getExtendedSortingPossibilitiesList(),
            $this->sortingElement->getSortingPossibilities()
        );
    }
}
