## P3 Peer Review

+ Reviewer's name: Gerry Walden
+ Reviwee's name: Diane R.
+ URL to Reviewer's P3 Github Repo URL: *<https://github.com/bibliodrone/p3>*

## 1. Interface
I like the use of colors  -- understated but sufficient to make the interface work. The font is easy to read. The Nav Bar is clearly delineated, and it persists across all the site's pages, with a different color and font-weight representing the page one is currently on. I also like the inclusion of small graphical elements representing odometers and fuel pumps which provide a bit more visual context and variety alongside the text.

I looked at the HTML and as far as I can tell, the use of labels and inputs seems correct and the names and id's make sense and would be informative to someone else who was updating the code. 

It took me a moment to figure out how to use the interface on the right -- the two odometer inputs of type "number" for 'last fill-up' and 'this fill-up' -- I would probably just use text fields with validation, but I understand that part of the assignment was to use a variety of different input types so from that perspective it is not a problem, and in fact the inputs can be typed in like text fields anyway. 

The option menu from which to choose between gallons and liters is only labeled "Select option", so a more descriptive label such as "Select Units" would be helpful. 

There is an 'about' page and a 'contact' page which makes the App seem more professional and user-friendly. 

I would suggest that it might be helpful to persist the form-settings for miles/kilometers and gallons/vs. liters after returning the mileage calculation. These settings would probably not change too often once a user made their initial choices. 

I like the idea of having a viewable log, which makes perfect sense for tracking mileage. A feature to add would be allowing the form to populate with values from the most recent log entry as a starting point for the current calculation (which would be more easily implemented in Project 4).


## 2. Functional testing
I tried leaving fields blank, and entering invalid form data. The Odometer fields only allow integer values, so one must round to the nearest whole mile. 

Most 'user error' cases have the expected error messages about required fields, and entering non-number data into the "Fuel reading from gas pump" field yields the expected error message about the input format.

I did find one loop-hole: I got a Server 500 error by leaving the 'last-fill-up' field blank and entering a number into the 'this fill-up' field and hitting 'Calculate'.

Also, as I've noticed with my own project as well, text fields which accept number input seem to allow scientific notation (e.g. 10e19). By setting the odometers to reflect a trip of 11km and entering 10e19 liters for the fuel-pump reading, I was able to get a fuel consumption of 0 kilometers/liter (which makes sense if the fuel consumption readout is limited to only a few decimal points.). One way to deal with this is of course to limit the maximum allowable number one can input (Judging from the Fuel log, the maximum trip distance for purposes of calculation appears to be 999,999,999 units). 

## 3. Code: Routes
The Routes in web.php look good to me, with no extraneous code. The routes have logical names and are commented as toe their specific function as well. 

## 4. Code: Views
Views look good; proper use of Blade syntax and statements as far as I can tell; nav-bar is defined in master.blade which makes sense as it is persistent across all pages; template inheritance is used to display the unique content of the other pages (form, log, about, contact).

## 5. Code: General
The code in the Controllers and Routes looks good to me. The FuelConsumptionController.php seems to follow the style conventions regarding layout, indentation, variable names. Code has comments explaining the logic of each section. 

It was interesting to see the use of JSON to store and retrieve data, along with the use of a Cookie to allow a returning user to see their past mileage data in the log. From a coding perspective, I would consider these to be relatively more advanced functions to implement (I find JSON to be tricky to use at times, anyway). This was a good workaround given the lack of a true database to use for this project. 

## 6. Misc
Overall I think this is a good project that meets the class requirements and demonstrates proficiency with the material. It properly implements many of the features that were demonstrated to us in class. There are a few improvements I have mentioned but I would imagine the author herself has probably considered some of them as well for the next phase of the class. 
As with my own project, I can think of other improvements to the interface and function that could be implemented with Javascript, but that is not relevant to this class.

-Gerry Walden
