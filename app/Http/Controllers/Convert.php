<?php
namespace GW;

class Converter {
    /* Function convert handles unit conversions chosen by user
    @param $system -- 'tometric' or 'toimperial'
    @param $unitType -- 'distance' or 'temperature' or 'mass'
    @param $valueToConvert -- Numerical value entered by user
    */
    
    public function convert($system, $unitType, $valueToConvert) {
        $returnValue = "None";
        $returnMessage = "None";
        $mi = " Miles ";
        $km = " Kilometers ";
        $fh = "&#176; Fahrenheit ";
        $cs = "&#176; Celsius ";
        $lb = " Pounds ";
        $kg = " Kilograms ";
        $absoluteZeroF = -459.67;
        $absoluteZeroC = -273.15;
        $infoNote = false;
        
        /* Converting Imperial units to metric */
        if($system == "tometric") {
            if($unitType == "distance") {
                $unitA = $mi;
                $unitB = $km;
                $returnValue = $valueToConvert * 0.621;
            }
            elseif($unitType == "temperature") {
                $unitA = $fh;
                if($valueToConvert < $absoluteZeroF) {
                    $valueToConvert = $absoluteZeroF;
                }
                $unitB = $cs;
                $returnValue = ($valueToConvert -32) * 0.556;    
            }
            elseif($unitType == "mass") {
                $unitA = $lb;
                $unitB = $kg;
                $returnValue = $valueToConvert * 0.454;
            }
        }
        /* Converting metric units to Imperial */
        elseif($system == "toimperial") {
            if($unitType == "distance") {
                $unitA = $km;
                $unitB = $mi;
                $returnValue = $valueToConvert * 1.609;
            }
            elseif ($unitType == "temperature") {
                $unitA = $cs;
                if($valueToConvert < $absoluteZeroC) {
                    $valueToConvert = $absoluteZeroC;
                }
                $unitB = $fh;
                $returnValue = ($valueToConvert * 1.8) + 32;
            
            }
            elseif ($unitType == "mass") {
                $unitA = $kg;
                $unitB = $lb;
                $returnValue = $valueToConvert * 2.205;
            }
        }
    
        if($valueToConvert != "0") {
            $valueToConvert = ltrim($valueToConvert, 0);
            }
        $returnMessage = $valueToConvert.$unitA." = ".$returnValue.$unitB;
        return ($returnMessage);
    }
}
