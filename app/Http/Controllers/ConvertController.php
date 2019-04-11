<?php
namespace App\Http\Controllers;
// 'use' imports functions into this namespace.
use Illuminate\Http\Request;
class ConvertController extends Controller
{
    public function index()
    {
        return view('layouts.master'); //. $result; 
    }
    public function showForm()
    {
       return view('convert.convert');
    }
    
    public function showResults(Request $request)
    {
        $unitType = $request->session()->get('unitType', '');
        $system = $request->session()->get('system', '');
        $valueToConvert = $request->session()->get('valueToConvert','');
        $returnMessage = $request->session()->get('returnMessage', '');
        
        return view('convert.convert')->with([
                'unitType' => $unitType,
                'system' => $system,
                'valueToConvert' => $valueToConvert,
                'returnMessage' => $returnMessage,
            ]);
    }
    
    public function convertUnits(Request $request)
    {
        $request -> validate([
            "unitType" => "required",
            "valueToConvert" => "required|numeric",
            "system" => "required",
            ]);
        
        $unitType = $request->input("unitType");
        $valueToConvert = $request->input("valueToConvert");
        $system = $request ->input("system");
        
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
        /* Assemble unit conversion output message and return to logic.php for display to user on index.php */
        if($valueToConvert != "0") {
            $valueToConvert = ltrim($valueToConvert, 0);
            }
        
        $returnMessage = $valueToConvert.$unitA." = ".$returnValue.$unitB;
        
        /*dump($returnMessage);
        dump($request->all());
*/
        //if(isset($unitType) and isset($valueToConvert) and isset($system)) {
            // return redirect('/')->withInput();
            //$returnMessage = convert($system, $unitType, $valueToConvert);
            //$returnMessage = $valueToConvert.$unitA." = ".$returnValue.$unitB;
        //}
          return redirect('/showResults')->with(['returnMessage' => $returnMessage])->withInput();/*([
          return redirect('/showResults')->with(['returnMessage' => $returnMessage])->withInput();
                'unitType' => $unitType,
                'sys' => $system,
                'valueToConvert' =>  $valueToConvert,
                'returnMessage' => $returnMessage
            ]);*/
        //}
        //}
    }
}