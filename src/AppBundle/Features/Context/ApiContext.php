<?php

namespace AppBundle\Features\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;
use PHPUnit_Framework_Assert as Assert;

class ApiContext implements Context
{
    /** @var MinkContext */
    private $minkContext;

    /** Behat\Mink\Session */
    private $session;

    /**
     * @BeforeScenario
     */
    public function before(BeforeScenarioScope $scope)
    {
        $environment = $scope->getEnvironment();

        $this->minkContext = $environment->getContext(MinkContext::CLASS);

        $this->session = $this->minkContext->getSession();
    }

    /**
     * @When I should receive success response
     */
    public function iShouldReceiveSuccessResponse()
    {
        Assert::assertSame(200, $this->getSession()->getStatusCode());
    }

    /**
     * Locates path from a relative one.
     *
     * @param  string $path
     * @return string
     */
    public function locatePath($path)
    {
        return $this->minkContext->locatePath($path);
    }

    /** @return Behat\Mink\Session */
    public function getSession()
    {
        return $this->session;
    }

    /** @return Behat\Mink\Driver\Goutte\Client */
    public function getClient()
    {
        return $this->getSession()->getDriver()->getClient();
    }

    /**
     * @return string
     */
    public function getResponseContent()
    {
        return $this->getSession()->getPage()->getContent();
    }
}
