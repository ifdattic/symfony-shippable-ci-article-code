<?php

namespace TaskBundle\Features\Context;

use AppBundle\Features\Context\ApiContext;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit_Framework_Assert as Assert;

class TaskApiContext implements Context, SnippetAcceptingContext
{
    /** @var ApiContext */
    private $apiContext;

    /**
     * @BeforeScenario
     */
    public function before(BeforeScenarioScope $scope)
    {
        $environment = $scope->getEnvironment();

        $this->apiContext = $environment->getContext(ApiContext::CLASS);
    }

    /**
     * @Then I try to get a list of tasks
     */
    public function iTryToGetAListOfTasks()
    {
        $client = $this->apiContext->getClient();

        $client->request(
            'GET',
            $this->apiContext->locatePath('/tasks'),
            [],
            [],
            [],
            []
        );
    }

    /**
     * @When list should have :count tasks
     */
    public function listShouldHaveTasks($count)
    {
        $response = json_decode($this->apiContext->getResponseContent(), true);

        Assert::assertCount((int) $count, $response['tasks']);
    }
}
