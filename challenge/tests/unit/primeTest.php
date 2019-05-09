<?PHP

class PrimeTest extends \PHPUnit\Framework\TestCase
{
    
    public function testLimitIsNumeric()
    {
        $this->expectException(\App\Exceptions\InvalidInputException::class);
        $input = new \App\PrimeNumbers;

        $input->setLimit('null');
    }


    public function testLimitIsPositive()
    {
        $input = new \App\PrimeNumbers;

        $input->setLimit(4);

        $this->assertGreaterThan(0, $input->getLimit());
    } 


    public function testNumberIsPrime()
    {
        $input = new \App\PrimeNumbers;

        $this->assertEquals(true, $input->isNumberPrime(7));
    }

    public function testNumberIsNotPrime()
    {
        $input = new \App\PrimeNumbers;

        $this->assertEquals(false, $input->isNumberPrime(4));
    }

    public function testPrimeNumbersAreCorrect()
    {
        $input = new \App\PrimeNumbers;

        $input->setLimit(5);

        $arr = $input->findPrimeNumbers();

        $this->assertEquals($arr[0], 2);
        $this->assertEquals($arr[1], 3);
        $this->assertEquals($arr[2], 5);
        $this->assertEquals($arr[3], 7);
        $this->assertEquals($arr[4], 11);
    } 
}