@tasks
Feature: A visitor can list tasks
    In order to see that has to be done
    As a visitor
    I need to see a list of tasks

    Scenario: A list of tasks is returned
        Then I try to get a list of tasks
        When I should receive success response
        And list should have 3 tasks
