@extends('layouts.master')

@section('title')
@endsection

@section('head')
@endsection

@section('content')


<div id="pageMainContent">
    <div id="instructions">
        <h2>Unit conversion</h2>
        <ol>
            <li>Choose the type of unit to convert: distance, temperature, or mass.</li>
            <li>Choose either Imperial to Metric (e.g. lbs. to kg.) or Metric to Imperial (e.g. Celsius to Fahrenheit).</li>
            <li>Finally, enter the numerical value to convert, and click 'Convert'</li>
        </ol>
    </div>

    <form method = 'GET' action = '/convert_units'>
        <fieldset>
            <legend>Converter</legend>
            <label for = "unitType">Unit Type</label>
            <ul>
                <li>
                    <input type="radio" name="unitType" value="distance" {{ (isset($unitType) && $unitType=="distance") ? "checked" : "" }}>Distance (mi. and km.)

                </li>
                <li>
                    <input type="radio" name="unitType" value="temperature"{{ (isset($temperature) && $unitType=="temperature") ? "checked" : "" }} >Temperature (&#176;F and &#176;C)
                  
                    <span class="infoNote"> *Note: The mininum valid temperature (absolute zero) is -459.67&#176; F or -273.15&#176; C</span>
                </li>
                <li>
                    <input type="radio" name="unitType" value="mass">Mass (lbs. and kg.)
                </li>
            </ul>
              @include('includes.error-fields', ["field" => "unitType"])
            <label>Conversion</label>
            <ul>
                <li>
                    <select name="system">
                        <option value="tometric" {{ (isset ($system) && $system  == "tometric") ? "selected" : "" }}>Imperial to Metric</option>
                        <option value="toimperial" {{ (isset ($system) && $system ==  "toimperial") ? "selected" : "" }}>Metric to Imperial</option>
                    </select>
                </li>
            </ul>
            @include('includes.error-fields', ["field" => "system"])
            <br>
            <label for = 'valueToConvert'>Enter value</label><span class="infoNote"> *Must be numeric</span>
            <ul>
                <li><input type="text" name="valueToConvert" value="{{ (old("valueToConvert", "")) }}"></li>
            </ul>
             @include('includes.error-fields', ["field" => "valueToConvert"])
            <input type="submit" class="btn btn-primary" id="submitButton" value="Convert!">
        </fieldset>
        
        @include('includes.returnMessage', ["message"])
        

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif
    </form>
</div>
@endsection
