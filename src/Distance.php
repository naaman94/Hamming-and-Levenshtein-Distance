<?php

abstract class Distance
{
    protected $str1;
    protected $str2;
    private static $temp;//template object for helper method

    function __construct($str1, $str2)
    { //set initial values
        $this->str1 = $str1;
        $this->str2 = $str2;
    }

    abstract public function cal_distance();//to calculate the distance in each child

    public static function distance( $str1, $str2)
    {//helper function its call from child class
        $c= get_called_class();//c is the class who call the static method and  get_called_class() is function return yhe class who call the method
        if($c=="Hamming"||$c=="Levenshtein"){//check if the class name is on of the child class or not
            self::$temp = new $c($str1, $str2);
            return self::$temp->cal_distance();
        }return"The class name must be Hamming or Levenshtein";
    }

}


class Hamming extends Distance
{
    private $result = 0;

    function __construct($str1, $str2)
    {
        if (is_string($str1) == false || is_string($str2) == false) //Checking if the inputs are string.
        {
            $this->result = "Error The type of inputs must be string.";
        } elseif (strlen(trim($str1)) != strlen(trim($str2)))//in hamming distance the two inputs must have the same length.
        {
            $this->result = "Error Two strings must be same length .";
        } else {
            parent::__construct(trim($str1), trim($str2));//call the super constructor and Strip whitespace from the beginning and end of a string
        }
    }

    public function cal_distance()
    {
        if ($this->result == 0) {//if the result are zero that is mean there is no error in inputs
            for ($x = 0; $x < strlen($this->str1); $x++) {
                //loop for checking in each index
                if ($this->str1[$x] != $this->str2[$x]) {
                    //check if the value of each one are same , if not the result will increase 1 .
                    $this->result++;
                }
            }
        }
        return $this->result;
    }
}


class Levenshtein extends Distance
{
    private $result;

    function __construct($str1, $str2)
    {
        if (is_string($str1) == false || is_string($str2) == false)//Checking if the inputs are string.
        {
            $this->result = "Error The type of inputs must be string.";
        } else {
            parent::__construct(trim($str1), trim($str2));//call the super constructor and Strip whitespace from the beginning and end of a string
            $this->init_2D_array();
        }
    }

    private function init_2D_array()
    { //initialize 2d array and insert zeros in all index
        $this->result = array_fill(0, strlen($this->str1) + 1, array_fill(0, strlen($this->str2) + 1, 0));
        ////Putting serial numbers  from 0 to str1 length  in the first column
        for ($i = 0; $i <= strlen($this->str1); $i++) {
            $this->result[$i][0] = $i;
        }//Putting serial numbers  from 0 to str1 length  in the first row
        for ($i = 0; $i <= strlen($this->str2); $i++) {
            $this->result[0][$i] = $i;
        }
    }

    public function cal_distance()
    {//important ! We can use the php function -> levenshtein . https://www.php.net/manual/en/function.levenshtein.php
        // or using this algorithm  :
        if (is_string($this->result) == false) {//check if any massage putting in the result then start the calculations
            for ($i = 0; $i < strlen($this->str1); $i++) {
                for ($j = 0; $j < strlen($this->str2); $j++) {
                    if ($this->str1[$i] == $this->str2[$j]) {
                        $this->result[$i + 1][$j + 1] = $this->result[$i][$j];
                    } else {
                        $insertion = $this->result[$i + 1][$j];
                        $deletion = $this->result[$i][$j + 1];
                        $replacement = $this->result[$i][$j];
                        //find the minimum number from   $insertion , $deletion and $replacement
                        $this->result[$i + 1][$j + 1] = min($insertion, $deletion, $replacement) + 1;
                    }
                }
            }
            //return the value of last index in rows and columns
            return $this->result[strlen($this->str1)][strlen($this->str2)];
        } else {//return the massage
            return $this->result;
        }

    }

}

?>