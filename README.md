# CheckIsDivisible

This PHP script checks if a number is divisible by a divisor using finite automaton.
If the number is divisible by the divisor, the script will confirm it.
If the number is NOT disivible by the divisor, the script will return the remainder.

# Requirements

PHP 5.6

# Running

On the command prompt, inside of the project's directory, run the following command:

php index.php <NUMBER> <DIVISOR>
* <NUMBER> = number which is going to be checked
* <DIVISOR> = number which is going to be the divisor. It's not required. Default value = 3
  
Examples: 
php index.php 12 3
php index.php 25 4
