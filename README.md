# CheckIsDivisible

This PHP script checks if a number is divisible by a divisor using finite automaton.
If the number is divisible by the divisor, the script will confirm it.
If the number is NOT divisible by the divisor, the script will return the remainder.

# Requirements

PHP 5.6

# Running

On the command prompt, run the following command on the project's folder:

php index.php NUMBER DIVISOR
* NUMBER = number which is going to be checked
* DIVISOR = number which is going to be the divisor. It's not required. Default value = 3
  
Examples: 

php index.php 12 3

RESULT: 12 is divisible by 3

php index.php 25 6

RESULT: 25 is NOT divisible by 6. Remainder = 1
