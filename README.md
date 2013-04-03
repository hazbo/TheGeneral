# The General
The General is an extensive component that allows you to sort data based on categories,
possibilities and levels.

## Usage
First, you must provide the data we are going to use to do the calculations.
This is done using a JSON file, for example:

	{
		"categories" : {
			"horror" : {
				"funny" 	: "5",
				"gore" 		: "60",
				"explosive" : "20",
				"shock" 	: "40",
				"crazy" 	: "30"
			},
			"comedy" : {
				"funny" 	: "80",
				"gore" 		: "5",
				"explosive" : "15",
				"shock" 	: "10",
				"crazy" 	: "15"
			},
			"action" : {
				"funny" 	: "15",
				"gore" 		: "17",
				"explosive" : "75",
				"shock" 	: "25",
				"crazy" 	: "30"
			},
			"adventure" : {
				"funny" 	: "45",
				"gore" 		: "5",
				"explosive" : "20",
				"shock" 	: "5",
				"crazy" 	: "50"
			}
		},
		"possibilities" : ["funny","gore","explosive","shock","crazy"]
	}

Here we have 4 types of films. Each film has various attributes, and we score
those attributes using an integer. You can use your own system for how big or little
the number is. An easy way is to stick to 1 - 100. But you can use any range.

	use Hazbo\TheGeneral;

	$general = new TheGeneral\Processor();
	$loader  = $general->createLoader();

	$loader->loadJsonFile('Movies.json');

	$general->digest($loader);

	$result = $general->score(array(
		'funny' => 2,
		'gore'  => 5,
		'explosive' => 2,
		'shock' => 3,
		'crazy' => 2
	));

	echo $result->getCategoryName();
	// returns 'horror'

So in the example above, we return the category name, and in this case, using the data we have, the result
is 'horror'.