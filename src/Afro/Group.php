<?php
namespace Afro;

class Group 
{
	private $fighters = Array();
	public function addFighter($fighter)
	{
		$this->fighters[] = $fighter;
		return $fighter;
	}
	
	public function isValid()
	{
		return count($this->fighters) > 0;
	}
	
	public function attack(Group $group)
	{
		return true;
	}
}
?>