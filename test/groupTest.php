<?php
class GroupTest extends PHPUnit_Framework_TestCase
{
	private $attackerGroup;
	private $defenderGroup;
	
	protected function setUp()
    {
        $this->attackerGroup = new Afro\Group();
		$this->defenderGroup = new Afro\Group();
    }
	
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
	
	public function testGetAllFightersInAGroup()
	{
		// Arrange
		$this->attackerGroup->addFighter(new Afro\Fighter());
		
		// Act
		$result = $this->attackerGroup->getFighters();
		
		// Assert
		$this->assertTrue(is_array($result));
		$this->assertEquals(count($result), 1);
	}
	
    public function testAGroupAttackAnotherGroup()
    {
		// Act
		$report = $this->attackerGroup->attack($this->defenderGroup);
		
		// Assert
		$this->assertNotEquals(false, $report);
    }
	
	public function testDuringAttackEachFighterMustBeAttackOneTime()
	{
		// Arrange
		$attacker = $this->getMock('Afro\Fighter', array('attack'));
		
		$attacker->expects($this->atLeastOnce())->method('attack');
				 
		$defender = $this->getMock('Afro\Fighter', array('attack'));
		$defender->expects($this->atLeastOnce())
		         ->method('attack')
				 ->with($this->IsInstanceOf('Afro\Fighter'));
		
		$this->attackerGroup->addFighter($attacker);
		$this->defenderGroup->addFighter($defender);
		
		
		// Act
		$this->attackerGroup->attack($this->defenderGroup);
	}
}
?>