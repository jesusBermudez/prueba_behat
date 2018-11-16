<?php

namespace src;

use \Behat\MinkExtension\Context\RawMinkContext;
use \SensioLabs\Behat\PageObjectExtension\Context\PageObjectAware;
use src\Page\Element\SearchBar;
use src\Page\HomeHomePage;
use src\Page\SearchListPage;

/**
 * Defines application features from the specific context.
 */
class HomeContext extends RawMinkContext implements PageObjectAware
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
        $result = $this->getResourceParameters('HomeContext', $parameters);
        $this->parameters = $result;
    }

    /**
     * @Given /^I search "([^"]*)"$/
     * @param string $searchText
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function iSearch($searchText)
    {

        /** @var SearchBar $searchBarElement */
        $searchBarElement = $this->getPage('Element\SearchBar');
        $searchBarElement->search($searchText);

        /** @var SearchListPage $home */
        $home = $this->getPage('SearchListPage');
        $home->open($this->parameters);



    }
}