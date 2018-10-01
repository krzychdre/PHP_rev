<?php


/**
 * Primitive version without any optimization or use of any library methods
 * @param type $input
 * @return type
 */
function stringReversePrimitive($input)
{
    $len = 0; $ret = null;
    while(!empty($input[$len])) {
        $len++;
    }
    
    for ($idx = ($len-1); $idx >=0; $idx--) {
        $ret .= $input[$idx];
    }
    return $ret;
}

/**
 * Optimized version (half of loop cycles are used)
 * @param type $input
 * @return type
 */
function stringReverseOptimized($input)
{
    for ($downCount = (strlen($input) - 1), $upCount = 0; $upCount < $downCount; $downCount--, $upCount++) {
        $char = $input[$downCount];
        $input[$downCount] = $input[$upCount];
        $input[$upCount] = $char;
    }
    return $input;
}

/**
 * Optimized and utf-8 safe version (some of utf-8 characters are multibyte); requires PHP xml extension
 * @param type $input
 * @return type
 */
function stringReverseOptimizesMultiByteSafe($input)
{
    for ($downCount = (strlen(utf8_decode($input)) - 1), $upCount = 0; 
            $upCount < $downCount; 
            $downCount--, $upCount++) {
        $char = $input[$downCount];
        $input[$downCount] = $input[$upCount];
        $input[$upCount] = $char;
    }
    return $input;
}

echo stringReverseOptimized('Ala ma kota') . "\n";
