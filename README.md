# Eve Api, PHP

Its a thing that makes it dead simple to consume the EVE EveApi. 
It removes any ambiguity between raw api calls and presents a clean, simple API.

The basic idea is that all API DataScopes are implemented as a Class, and each available API function is implemented as a 
static method of that class. So to get a character sheet from the EVE Api, you construct the URL as follows

    https://api.eveonline.com/char/CharacterSheet.xml.aspx?characterId=9999999&keyID=999999&vCode=______

This structure is now directly translated into a static class method call. Where API methods have ambiguous or confusing access
parameters for public/private data, or require an API key to return data, that is all hardcoded into the method constructors. 

    <?php
    
    // characterID of a character provided by the API Key
    $characterID = 99999999;
    
    // Create an ApiKey Object with the known key details
    $api_key = new Eve\Api\ApiKey('KEY_ID', 'KEY_vCODE');
    
    // Execute an API request.
    $char = Eve\Character::CharacterSheet($characterID, $api_key);
    
    // get the data returned from the API call.
    echo $char->name;

# Documentation

I have not written non-code documentation yet. Most functions are heavily documented in code doc blocks. 
Please take a look and feel free to contribute back some docs.

# Todo

* Documentation
* Community Requests

# Example Usage

This is a example of the API system at work, including configuration options and error checking.

    <?php
    
    // Imports
    use Eve\Api\Config as EveApiConfig;
    use Eve\Api\ApiKey as EveApiKey;
    use Eve\Character as CharacterApi;
    
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler as LogStreamHandler;
    
    // EveApi Config Object
    $config = EveApiConfig::Instance();
    $config->user_agent = 'MY SITE NAME (v1.0) [email@domain.com]';
    $config->log_handler = new LogStreamHandler('path/to/your.log', Logger::WARNING);
    
    // Create an ApiKey Object with api key info
    $key = new EveApiKey('KEY_ID', 'KEY_vCODE');
    
    // Execute the API request.
    $character = CharacterApi::CharacterSheet($characterID, $key);
    
    // Get the character name from the returned data
    if (!$key->getKeyError()) {
        echo $character->name;
    }
    else {
        throw new \Exception('EVE Api Exception: '.$key->getKeyErrorMessage());
    }

# Copyright

&copy; 2015 Matthew Glinski and Contributors

Released under the standard MIT license
