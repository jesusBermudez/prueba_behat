<?php

namespace src;

use Behat\Behat\Tester\Exception\PendingException;
use \Behat\MinkExtension\Context\RawMinkContext;
use \SensioLabs\Behat\PageObjectExtension\Context\PageObjectAware;
use src\Page\CartPage;
use src\Page\Element\SearchBar;
use src\Page\HomeHomePage;

/**
 * Defines application features from the specific context.
 */
class CartContext extends RawMinkContext implements PageObjectAware
{
    use PageObjectTrait;
    use BrowserOperator;
    use ResourcesTrait;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     *
     * @param $parameters
     */
    public function __construct(array $parameters)
    {
        date_default_timezone_set('Europe/Madrid');
        $result = $this->getResourceParameters('CartContext', $parameters);
        $this->parameters = $result;
    }

    /**
     * @Given /^I should see in cart the price and "([^"]*)" quantity are correct$/
     * @param string $quantity
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     * @throws \Exception
     */
    public function iShouldSeeInCartThePriceAndQuantityAreCorrect($quantity)
    {
        /** @var SearchBar $searchBarElement */
        $searchBarElement = $this->getPage('Element\SearchBar');
        $searchBarElement->showCart();

        /** @var CartPage $cartPage */
        $cartPage = $this->getPage('CartPage');
        $cartPage->checkAmounts();
    }

    /**
     * @Given /^I remove "([^"]*)" quantity the first accessory add to cart$/
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function iRemoveQuantityTheFirstAccessoryAddToCart()
    {
        /** @var SearchBar $searchBarElement */
        $searchBarElement = $this->getPage('Element\SearchBar');
        $searchBarElement->showCart();

        /** @var CartPage $cartPage */
        $cartPage = $this->getPage('CartPage');
        $cartPage->removeProductCart();
    }

    /**
     * @Given /^I should see total price and "([^"]*)" quantity are changed correctly$/
     * @param $quantity
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     * @throws \Exception
     */
    public function iShouldSeeTotalPriceAndQuantityAreChangedCorrectly($quantity)
    {
        $this->iShouldSeeInCartThePriceAndQuantityAreCorrect($quantity);
    }
}