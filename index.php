<?php


require_once('./vendor/autoload.php');

use GuzzleHttp\Client;


class Weather {
    const PUBLIC_URI = 'http://api.openweathermap.org/data/2.5/weather?q=';
    private $guzzle = null;
    
    public function __construct(string $city) {
        $fullUri = static::PUBLIC_URI . $city . '&appid=9ff0098f46622f4a11e6c5894d2b2c0f';
        $this->guzzle = new Client(['base_uri' => $fullUri]);
    }
    
    public function get_weather() {
        $response = $this->guzzle->get('');
        $response = (string)$response->getBody();
        $response = json_decode($response);
        return $response->main->temp_min;
    }
}
$weather_object = new Weather('Lviv');

echo $weather_object->get_weather();










//use App\Weathe;




// require_once('./vendor/autoload.php');
// require_once('./autoloader.php');

// $guzzle = new Client([
//     'base_uri' => 'http://api.openweathermap.org/data/2.5/weather?q=Lviv&appid=9ff0098f46622f4a11e6c5894d2b2c0f',
// ]);


// $weather_object = new Weathe();

// echo $weather_object->get_temperature($guzzle);

//var_dump((string)$response->getBody());



