<?php

namespace Advent2016\Day2;

class Puzzle2
{
     
    public function FindRoom($input){
         $directions = ['U', 'R', 'D', 'L'];
         $currentkey = 5;
         $inputarray = [];
         $answer = [];
         $inputarray = str_split($input);
        
    
        foreach ($inputarray as $key => $value) {
                        
            if (empty($value)){
               $answer[] = $currentkey; 
            } else { 
                
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
  
      return $answer;
      
    }
}
