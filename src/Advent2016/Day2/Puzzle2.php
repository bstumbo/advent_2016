<?php

namespace Advent2016\Day2;

class Puzzle2
{
     
    public function FindRoom($input){
         
         $currentkey = 5; //Set the current key to 5 on the keypad
         $inputarray = []; //initiate input array
         $answer = []; //initatite answer array
         $inputarray = str_split($input); //split input sting into array so it can be iterated
         $check = 3;
        
        foreach ($inputarray as $key => $value) { //iterating over array
              $value = trim($value);          
            if (empty($value)){ //if value is empty, check to see if its 2nd empty.  If not, record $currentkey
               if ($check == 2) { continue;
               } else{
               $answer[] = $currentkey;
               $check = 2;}
            } else { //Change $currentkey depending on $value
                $check = 3;
                switch ($value) {
                    case 'U':
                        if (in_array($currentkey, array(1,2,3))){
                            $currentkey = $currentkey;
                        } else {
                            $currentkey = $currentkey - 3;
                        }
                        break;
                    
                    case 'L': 
                        if (in_array($currentkey, array(1,4,7))){
                            
                        } else {
                            $currentkey = $currentkey - 1;
                        }
                        break;
                    
                    case 'R':
                        
                        if (in_array($currentkey, array(3,6,9))){
                            $currentkey = $currentkey;
                        } else {
                            $currentkey = $currentkey + 1;
                        }
                        break;
                        
                    case 'D':
                        
                        if (in_array($currentkey, array(7,8,9))){
                            $currentkey = $currentkey;
                        } else {
                            $currentkey = $currentkey + 3;
                        }
                        break;
                }
            }

        }
        
        $answer[] = $currentkey; //Record final number
        
      return $answer; //return array
      
    }
}
