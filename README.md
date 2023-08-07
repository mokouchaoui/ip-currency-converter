# Currency Detection and Converter

This script uses the following functions:

* `getIPDetails()`: This function gets the IP address of the user and uses it to get the country code.
* `detectCurrency()`: This function takes the country code as input and returns the corresponding currency code.
* `convertToUSD()`: This function takes the amount to convert, the currency code, and the API key as input and returns the converted amount in USD.

The script first gets the IP address of the user and uses it to get the country code. Then, it uses the `detectCurrency()` function to get the corresponding currency code. Finally, it uses the `convertToUSD()` function to convert the amount to USD and displays the results.

The script also includes a JavaScript function that uses the `fetch()` API to fetch the exchange rate from the API Layer API. The exchange rate is then used to convert the amount to USD.

## Usage

To run the script, you will need to have the following installed:

* PHP
* cURL
* JavaScript
* The API Layer API key

Once you have installed the required dependencies, you can run the script by saving it as a PHP file and then executing it in a web browser.

## Example

The following example shows how to use the script to convert 100 MAD to USD:

```php
<?php

$apiKey = 'YOUR_API_KEY';
$amountToConvert = 100;
$currency = 'MAD';

$usdAmount = convertToUSD($amountToConvert, $currency, $apiKey);

echo "The converted amount is $usdAmount USD.";

?>


## Output

The output of the script will be the converted amount in USD. In the example above, the output would be:


The converted amount is 10.23 USD.
