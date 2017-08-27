<?php

class Decode {
    private $alphabet = null;
    private $chipher = null;
    private $decode = null;

    public function __construct($string){
        $this->chipher = new ArrayObject(explode(' ', $string));
        $this->alphabet = new ArrayObject();
        $this->decode = '';
        $this->alphabet();
    }

    private function alphabet(){
        foreach(range('a', 'z') as $character){
            $this->alphabet->append($character);
        }
    }

    public function decode(){
        $iterator = $this->chipher->getIterator();
        $decode = "";
        while($iterator->valid()){
            $decode .= $this->alphabet->offsetGet($iterator->current() - 1);
            $iterator->next();
        }
        return $decode;
    }
}


class NumbersToText {
    public static function NumbersToLetters($string) {
        $chipher = new Decode($string);
        return $chipher->decode();
    }
}

echo NumbersToText::NumbersToLetters('20 5 19 20 4 15 13 5');
echo "\n\n";

class QuadraticEquationSoluction {
    private $a = null;
    private $b = null;
    private $c = null;
    private $x = null;
    private $y = null;

    public function __construct($a, $b, $c){
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    private function calculateRoot(){
        return sqrt(pow($this->b, 2) - (4 * ($this->a * $this->c)));
    }

    private function calulateEquationX(){
        return (-$this->b + $this->calculateRoot()) / 2* ($this->a);
    }

    private function calulateEquationY(){
        return (-$this->b - $this->calculateRoot()) / 2* ($this->a);
    }

    public function result(){
        $this->x = $this->calulateEquationX();
        $this->y = $this->calulateEquationY();
        return [$this->x, $this->y];
    }
}
class QuadraticEquation
{
    /**
     * @return array An array of two elements containing roots in any order
     */
    public static function findRoots($a, $b, $c)
    {
        $result = new QuadraticEquationSoluction($a, $b, $c);
        return $result->result();
    }
}

print_r(QuadraticEquation::findRoots(2, 10, 8));




class Programmer {
    protected $lenguage = null;
    
    public function __construct(){
        $this->lenguage = new ArrayObject([]);
    }

    public function getLanguages(){
        return $this->lenguage->getArrayCopy();
    }
    public function addLanguage($lenguage){
        $this->lenguage->append($lenguage);
    }
}

class ProgrammerTeacher extends Programmer {
    
    public function __construct(){
        parent::__construct();
    }
    
    public function teach($lenguage){
        return $this->lenguage->offsetExists($lenguage);
    }
}

//To see the output, uncomment the lines below:
$teacher = new ProgrammerTeacher();
$teacher->addLanguage('PHP');
$programmer = new Programmer();
$programmer->addLanguage('python');
$programmer->addLanguage('ruby');
$teacher->teach('PHP');
print_r($programmer->getLanguages());

//To see the output, uncomment the lines below:
//$teacher = new ProgrammerTeacher();
//$teacher->addLanguage('PHP');
//$programmer = new Programmer();
//$teacher->teach($programmer, 'PHP');
//print_r($programmer->getLanguages());
