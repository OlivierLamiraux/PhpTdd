Feature: Combat report

Scenario: Regular attack
	Given we have group 'attacker' with these fighters :
		| Name | Power | Hp |
		| toto | 3     | 10  |
		| titi | 7     | 5   |
	And we have group 'defender' with these fighters :
		| Name | Power | Hp |
		| tata | 5     | 10  |
	When the group 'attacker' fight the group 'defender'
	Then we have this fight report :
		"""
		toto vs tata, hit 3
		tata vs toto, hit 5
		titi vs tata, hit 7
		group 'attaquant' win
		"""
	
	