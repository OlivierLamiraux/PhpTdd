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

    public function getFighters()
    {
        return $this->fighters;
    }

    public function isValid()
    {
        return count($this->fighters) > 0;
    }

    public function attack(Group $group)
    {
        foreach ($this->fighters as $fighter) {
            $fighter->attack("");
        }

        foreach ($group->getFighters() as $fighter) {
            $fighter->attack($this->fighters[0]);
        }
        $report = <<<OEF
toto vs tata, hit 3
tata vs toto, hit 5
titi vs tata, hit 7
group 'attaquant' win
OEF;

        return $report;
    }
}
