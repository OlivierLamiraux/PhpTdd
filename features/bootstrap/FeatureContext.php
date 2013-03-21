<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    private $groups = Array();
    private $report;
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        doSomethingWith($argument);
//    }
//
    /**
     * @Given /^we have group \'([^\']*)\' with these fighters :$/
     */
    public function weHaveGroupWithTheseFighters($arg1, TableNode $table)
    {
        $group = new Afro\Group();
        foreach ($table->getRows() as $row) {
            $fighter = new Afro\Fighter();
            $fighter->name = $row[0];
            $fighter->power = $row[1];
            $fighter->hp = $row[2];

            $group->addFighter($fighter);
        }

        $this->groups[$arg1] = $group;
    }

    /**
     * @When /^the group \'([^\']*)\' fight the group \'([^\']*)\'$/
     */
    public function theGroupFightTheGroup($arg1, $arg2)
    {
        $attacker = $this->groups[$arg1];
        $defenser = $this->groups[$arg2];
        $this->report = $attacker->attack($defenser);
    }

    /**
     * @Then /^we have this fight report :$/
     */
    public function weHaveThisFightReport(PyStringNode $string)
    {
        //$expect = $string.getRaw();
        if ($this->report !== $string->getRaw()) {
            throw new Exception(
                "Expect: " . $string . "\nResult: " . $this->report
            );
        }
    }
}
