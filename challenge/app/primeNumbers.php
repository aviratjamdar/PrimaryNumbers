<?PHP
namespace App;

use App\Exceptions\InvalidInputException;

$argv;

class PrimeNumbers
{
    private
        $limit; //  Limit for number of prime numbers.
        
    private 
        $arrPrimes = array();   //  Array contains prime numbers of count $limit

    //
    //  Getter for limit
    //    
    public function getLimit()
    {
        return $this->limit;    
    }
    

    //
    //  Setter for limit
    //
    public function setLimit($limit)
    {
        if (!is_numeric($limit))
        {
            throw new InvalidInputException;
        }  

        if ($limit <= 0)
        {
            echo "\n Input should be positive number ..";
            return false;
        }

        $this->limit = $limit;
    }


    //
    //  Function which iterates from 2 until we get n no of prime numbers.
    //
    public function findPrimeNumbers()
    {
        $start = 2;
        $count = 0;
        while (1)
        {
            $ret = $this->isNumberPrime($start);
            if ($ret === true)
            {
                $this->arrPrimes[] = $start;
                $count++;

                if ($count === (int)$this->limit)
                {
                    break;
                }
            }

            ++$start;
        }

        return $this->arrPrimes;
    }


    //
    //  Function to check whether the number is prime or not..
    //
    function isNumberPrime($number) 
    { 
        //
        // Corner cases
        // 
        if ($number <= 1)  
        {
            return false; 
        }

        if ($number <= 3)  
        {
            return true;
        }    
    
        //
        //  This is checked so that we can skip  
        //  middle five numbers in below loop 
        //
        if ($number % 2 == 0 || $number % 3 == 0)
        {  
            return false; 
        }

        for($i = 5; $i * $i <= $number; $i = $i + 6)
        { 
            if ($number % $i == 0 || $number % ($i + 2) == 0) 
            {
              return false; 
            }
        }
    
        return true; 
    } 

    public function getMultiplicationTable()
    {
        $totalPrimes = count($this->arrPrimes);

        //
        //  Print header row
        //
        echo "       ";
        for ($iCnt = 0; $iCnt < $totalPrimes; ++$iCnt)
        {
            printf("%5d", $this->arrPrimes[$iCnt]);
        }

        echo "\n------------------------------------------------------------------------------\n";

        for ($iCnt = 0; $iCnt < $totalPrimes; ++$iCnt)
        {
            printf("%5d |", $this->arrPrimes[$iCnt]);
            for ($jCnt = 0; $jCnt < $totalPrimes; ++$jCnt)
            {
                printf("%5d" , $this->arrPrimes[$iCnt] * $this->arrPrimes[$jCnt]);
            }

            echo "\n";
        }
    }
}


//
//  Driver function.
//
function printPrimeMultiplicationTable()
{
    global $argv;
    $primeNums = new PrimeNumbers;
    $ret = $primeNums->setLimit($argv[1]);
    if (false !== $ret)
    {
        $primeNums->findPrimeNumbers();
        $primeNums->getMultiplicationTable();
    }
}

printPrimeMultiplicationTable();