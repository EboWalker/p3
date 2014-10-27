<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

//Return the index page until further notice//

Route::get('/', function()
{
	return View::make('index');
});

//Return the lorem-ipsum page//

Route::get('/lorem-ipsum', function()
{
	return View::make('lorem-ipsum');	
});

//when on the lorem-ipsum page//

Route::post ('/lorem-ipsum', function(){
	$i = Input::get ( 'pNo'); //get the number of paragraphs input
		if ($i >0 && $i < 100) //check to see if between 0 and 100)
		{
		$i = $i; //check to see if the number matches the above condition
		}else
		{
		$i = NULL; //if number does not match the condition, print 0 paragraphs
		}
	$loremGen = new Lorem(); //generate new lorem-ipsum text
	$loremIpsumText = $loremGen->getParagraphs($i); //pass text to the variable
	$paragraphs = implode('<p>',$loremIpsumText); //create paragraphs
	return View::make('lorem-ipsum')->with('loremIpsumText',$paragraphs); //print the next text to the page
});

// return the user generator page

Route::get('/user-generator', function()
{
	return View::make('user-generator');
});

//Route to the user-generator page and do this... 

Route::post('/user-generator', function(){
	$j = Input::get('users'); // get the number of users
	if ($j >0 && $j < 100) //check to see if between 0 and 100)
		{
		$j = $j; //check to see if the number matches the above condition
		}else
		{
		$j = NULL; //if number does not match the condition, print 0 paragraphs
		}
	
	$birthday = Input::get('birthday'); //see if birthday box is checked
	
	$userGen = Faker\Factory::create(); //create the users

	for ($k = 0; $k < $j; $k++)
		{ 		//iterate over the number of users provided
		$userData[$k]['name'] = $userGen->name;

		if($birthday){
			$userData[$k]['birthday'] = date_format($userGen->dateTime, 'Y-m-d'); //if birthday is checked, add the birthday of the number of users
		}else{
			$userData[$k]['birthday'] = NULL; // if it's not checked add nothing
		}	
		}	

return View::make('user-generator')->with('checkbox',$userData);
});