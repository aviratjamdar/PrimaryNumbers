# PrimaryNumbers
PHP Coding Challenge - Altimetrik

Approach:

I have created this code with TDD approach. Intially I wrote the unit test cases with PHPUnit.
According to test cases success/failure code refactoring is done.

Below are the details on functionlity and test cases:

app\primeNumbers.php
	- Created a class called PrimeNumbers having functionlity to get and set the limit for prime numbers.
	- A function "findPrimeNumbers" is used to find n no of prime numbers starting from 2. It returns the array of n prime numbers.
	- A function "isNumberPrime" is used to actual check whether the given number is prime or not in optimized way.
		1. A prime is a natural number greater than 1 that has no positive divisors other than 1 and itself.
		2. Every prime number can represented in form of 6n+1 or 6n-1 except 2 and 3, where n is natural number.
		3. If we want to check whether number n is prime or not, we can check till square root of n because a larger factor of n must be a multiple of smaller factor that has been already checked.
		4. Time complexity of this solution is O(√n)
	- A function "getMultiplicationTable" is used to print the multiplication table as given in requirement.
	- Driver code is written to run the program 
		1. please provide the input like e.g. php app\primeNumbers.php 4 (Here 4 is the limit for prime numbers)
		
		
		
tests\unit\primeTest.php
	- Created 6 test cases and 11 assertions.
	- Test cases covered for checking command line input is write or not.
	- Prime number is funcitonality is appropriate or not.
	
	
* * * I M P O R T A N T * * * 
If only test cases that need to be excecuted then please comment out the single line of code from file app\primeNumbers.php (LINE no 155)
