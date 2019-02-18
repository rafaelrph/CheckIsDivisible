<?php

    //Just checking if the parameter was sent or not
    //At least the parameter number is required
    if (count($argv) == 0 || count($argv) == 1) {
        echo "The number is required";
        exit;
    } else {

        //PARAMETERS
        //argv[0] == filename
        //argv[1] == Number
        //argv[2] == Divisor (Not required - default == 3)
        $number = $argv[1];
        $divisor = ($argv[2]) ? $argv[2] : 3;

        echo "=========================================\n";
        echo "Running... Number = " . $number . " \ Divisor = " . $divisor . "\n";
        echo "=========================================\n";

        //Instantiate the object
        $checkIsDivisible = new CheckIsDivisible($number, $divisor);
        //Get the final state
        $remainder = $checkIsDivisible->getState();
        
        //If remainder/state == 0, the number is divisible
        if($remainder == 0) {
            echo $number . " is divisible by " . $divisor;
        } 
        //Else remainder/state > 0, the number is not disible
        else {
            echo $number . " is NOT divisible by " . $divisor . ". Remainder = " . $remainder;
        }

        //Show tabletransitions
        //var_dump($checkIsDivisible->getTableTransitions());

    }

    /**
     * Class which checks if a number is divisible by a divisor
     */
    class CheckIsDivisible {

        private $number;
        private $divisor;
        private $tableTransitions;
        private $state; // 0 == divisible (no remainder)

        function __construct($number, $divisor) {
            $this->number = $number;
            $this->divisor = $divisor;

            //Generate the table when the object is instantiated
            $this->generateStateTransitionsTable();
        }

        function getNumber() {
            return $this->number;
        }

        function getDivisor() {
            return $this->divisor;
        }

        function getTableTransitions() {
            return $this->tableTransitions;
        }

        /**
         * Update and then get the state
         */
        function getState() {
            //Initialize the state
            $this->state = 0;
            //Update the state
            $this->updateStateDivisible($this->number);
            //Get the updated state
            return $this->state;
        }

        /**
         * Recursive function to check number by number (bit) on the state transitions table
         */
        function updateStateDivisible($number) {
            if($number != 0) {
                //Call the same function - transition for number (Shift right - Divide)
                $this->updateStateDivisible($number >> 1);
                //Update the state (& == AND - bits that are set in both)
                $this->state = $this->tableTransitions[$this->state][$number & 1];
            }
        }

        /**
         * Function to create the State transitions table
         */
        function generateStateTransitionsTable() {
            //Returned table
            $table = array();

            for($index = 0; $index < $this->divisor; $index++) {
                
                //Transition for 0 (Shift left - Multiply)
                $transition0 = $index << 1;

                //Transition for 1 (Shift left - Multiply)
                $transition1 = ($index << 1) + 1;

                //Adding the transitions on the table
                $table[$index][0] = ($transition0 < $this->divisor) ? $transition0 : ($transition0 - $this->divisor);
                $table[$index][1] = ($transition1 < $this->divisor) ? $transition1 : ($transition1 - $this->divisor);

            }
            $this->tableTransitions = $table;
        }
    }

?>
