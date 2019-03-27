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

    <form>
        <fieldset>
            <legend>Converter</legend>
            <label>Unit Type</label>
            <ul>
                <li>
                    <input type="radio" name="unitType" value="distance" <?=(isset($unitType) && $unitType=="distance" ) ? "checked" : "" ?>>Distance (mi. and km.)

                </li>
                <li>
                    <input type="radio" name="unitType" value="temperature" <?=(isset($unitType) && $unitType=="temperature" ) ? "checked" : "" ?>>Temperature (&#176;F and &#176;C)

                    <span class="infoNote"> *Note: The mininum valid temperature (absolute zero) is -459.67&#176; F or -273.15&#176; C</span>
                </li>
                <li>
                    <input type="radio" name="unitType" value="mass" <?=(isset($unitType) && $unitType=="mass" ) ? "checked" : "" ?>>Mass (lbs. and kg.)
                </li>
            </ul>
            <label>Conversion</label>
            <ul>
                <li>
                    <select name="system">
                        <option value="tometric" <?=(isset($system) && $system=="tometric" ) ? "selected" : "" ?>>Imperial to Metric</option>
                        <option value="toimperial" <?=(isset($system) && $system=="toimperial" ) ? "selected" : "" ?>>Metric to Imperial</option>
                    </select>
                </li>
            </ul>
            <br>
            <label>Enter value</label><span class="infoNote"> *Must be numeric</span>
            <ul>
                <li><input type="text" name="valueToConvert" value="<?=(isset($valueToConvert)) ? $valueToConvert : 0 ?>"></li>
            </ul>
            <input type="submit" class="btn btn-primary" id="submitButton" value="Convert!">
        </fieldset>

        <div class="output">
            <?php if (isset($returnMessage)) : ?>
            <p>
                <?= $returnMessage ?>
            </p>
            <?php endif ?>
        </div>

        <!--Error message display code (using Form.php) from form validation example and    
            using 'validate.php'.
            I hope it's OK to use it here with attribution; since we are using
            Form.php in this project, I didn't see a need to 'reinvent the wheel'.-->
        <div id="errors">
            <?php if (isset($errors) && $errors) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                    <li>
                        <?= $error ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php elseif ($submitted): ?>
            <div class="alert alert-info">
                No errors
            </div>
            <?php endif ?>
        </div>
    </form>

</div>
@endsection
