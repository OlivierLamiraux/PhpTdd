<?php
class fightTest extends PHPUnit_Framework_TestCase
{
	public function testWeCanAddAFighterToAGroup()
	{
		// Arrange
		$group = new Afro\Group();
		$fighter = new Afro\Fighter();
		
		// Act
		$addedFighter = $group->addFighter($fighter);
		
		// Assert
		$this->assertInstanceOf('Afro\Fighter', $addedFighter);
	}
	
	public function testAGroupMustHaveOneOrMoreFighter()
	{
		// Arrange
		$groupWithoutFighter = new Afro\Group();
		$groupWithFighter = new Afro\Group();
		$fighter = new Afro\Fighter();
		
		// Act
		$groupWithFighter->addFighter($fighter);
		
		// Assert
		$this->assertTrue($groupWithFighter->isValid());
		$this->assertFalse($groupWithoutFighter->isValid());
	}
	
    public function testAGroupAttackAnotherGroup()
    {
		// Arrange
		$attackerGroup = new Afro\Group();
		$defenderGroup = new Afro\Group();
		
		// Act
		$report = $attackerGroup->attack($defenderGroup);
		
		// Assert
		$this->assertNotEquals(false, $report);
    }
}
?>