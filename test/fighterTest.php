<?php
class FighterTest extends PHPUnit_Framework_TestCase
{
    public function testAFighterCanAttackAnotherFighter()
    {
        $attacker = new Afro\Fighter();
        $defender = new Afro\Fighter();

        $attacker->attack($defender);
    }
}
