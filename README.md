# Eve Api, PHP

Its a thing that makes it dead simple to consume the EVE Api. 
It removes any ambiguity between raw api calls and presents a clean, simple API.

# Documentation

I have not written non-code documentation yet. Most functions are heavily documented in the code. 
Please take a look and feel free to contribute back some docs.

# Example Usage

    <?php
    
    // singleton based config object
    Eve\Api\Config::Instance()->user_agent = 'MY SITE NAME (v1.0) [email@domain.com]';
    Eve\Api\Config::Instance()->log_handler = new Monolog\Handler\StreamHandler('path/to/your.log', Monolog\Logger::WARNING);
    
    // Create an ApiKey Object with the known key details
    $key = new Eve\Api\ApiKey('KEY_ID', 'KEY_vCODE');
    
    // Execute an API request.
    $char = Eve\Character::CharacterSheet($characterID, $key);
    
    echo $char->name;

# License

Standard MIT license