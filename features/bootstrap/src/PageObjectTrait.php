<?php

namespace src;

use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;

trait PageObjectTrait
{
    /**
     * @var PageObjectFactory
     */
    private $pageObjectFactory = null;

    /**
     * @param string $name
     *
     * @return Page
     *
     * @throws \RuntimeException
     */
    public function getPage($name)
    {
        if (null === $this->pageObjectFactory) {
            throw new \RuntimeException('To create pages you need to pass a factory with setPageObjectFactory()');
        }

        return $this->pageObjectFactory->createPage($name);
    }

    /**
     * @param string $name
     *
     * @return Element
     *
     * @throws \RuntimeException
     */
    public function getElement($name)
    {
        if (null === $this->pageObjectFactory) {
            throw new \RuntimeException('To create elements you need to pass a factory with setPageObjectFactory()');
        }

        return $this->pageObjectFactory->createElement($name);
    }

    /**
     * @param PageObjectFactory $pageObjectFactory
     */
    public function setPageObjectFactory(Factory $pageObjectFactory)
    {
        $this->pageObjectFactory = $pageObjectFactory;
    }

    /**
     * @return PageObjectFactory
     */
    public function getPageObjectFactory()
    {
        if (null === $this->pageObjectFactory) {
            $msg='To access the page factory you need to pass it first with setPageObjectFactory()';
            throw new \RuntimeException($msg);
        }

        return $this->pageObjectFactory;
    }
}