<! DOCSTYLE html>
<html>
<head>
<title> Justice Calderon's PHP Permutation function </title>
</head>
<body>
<?php
// Function that returns all nested array values in a single array 
function return_nested_values($input_array, $output_array=array()){
        if (gettype($input_array[0]) != "array"){
            $output_element = $input_array[0];
            return $output_element;
        }
        else{
            for ($idx = 0; $idx<=count($input_array)-1; $idx++) {
                $nested_array = $input_array[$idx];
                $output_element = return_nested_values($nested_array, $output_array);
                if (gettype($output_element) == "array"){
                    for ($i=0; $i<=count($output_element)-1; $i++){
                        if (in_array($output_element[$i], $output_array) == 0){
                            array_push($output_array, $output_element[$i]);
                        }
                    }
                }
                else{
                    if (in_array($output_element, $output_array) == 0){
                        array_push($output_array, $output_element);
                    }
                }
            }
            return $output_array;
        }
    }
    
    // Defining a recursive function that computes permutations of an input array
    function permute_txt($txt, $permutations=array(), $result_list=array()){
        if (empty($txt)){
            $result = implode($permutations);
            //echo implode($permutations);
            return $result;
        }
        else{
          for ($char = count($txt)-1; $char>=0; $char--){
              $new_txt=$txt;
              $new_permutations=$permutations;
              list($foo) = array_splice($new_txt, $char, 1);
              array_unshift($new_permutations, $foo);
              $result_list[] = permute_txt($new_txt, $new_permutations);
          }
          return $result_list;
        }
    }
?>
        </body>
</html>
