<?php

namespace src;

use Behat\MinkExtension\Context\MinkContext;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectAware;
use src\Page\Element\PopupHomeLoginWidget;
use src\Page\HomeHomePage;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements PageObjectAware
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
        $result = $this->getResourceParameters('FeatureContext', $parameters);
        $this->parameters = $result;
    }

    /**
     * @Given /^I am on the home home$/
     *
     */
    public function iAmHomePage()
    {
        /** @var HomeHomePage $home */
        $home = $this->getPage('HomeHomePage');
        $home->open($this->parameters);
    }
}
