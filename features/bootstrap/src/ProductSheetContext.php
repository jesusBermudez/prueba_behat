<?php

namespace src;

use Behat\Behat\Tester\Exception\PendingException;
use \Behat\MinkExtension\Context\RawMinkContext;
use \SensioLabs\Behat\PageObjectExtension\Context\PageObjectAware;
use src\Page\HomeHomePage;
use src\Page\ProductSheetPage;
use src\Page\SearchListPage;

/**
 * Defines application features from the specific context.
 */
class ProductSheetContext extends RawMinkContext implements PageObjectAware
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
        $result = $this->getResourceParameters('ProductSheetContext', $parameters);
        $this->parameters = $result;
    }


    /**
     * @Given /^I add to cart "([^"]*)" quantity the first product list$/
     * @param $quantity
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function iAddToCartQuantityTheFirstProductList($quantity)
    {
        $this->iWaitForAjaxToFinish(10);
        /** @var SearchListPage $listProductPage */
        $listProductPage = $this->getPage('SearchListPage');
        $listProductPage->selectProduct();

        /** @var productSheetPage $productPage */
        $productPage = $this->getPage('productSheetPage');
        $productPage->setQuantityProduct($quantity);
    }
}