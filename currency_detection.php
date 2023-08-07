<!DOCTYPE html>
<html>
<head>
    <title>Currency Detection and Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Currency Detection and Converter</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        function getIPDetails($apiKey) {
                            $url = 'http://ipinfo.io?token=' . $apiKey;
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);
                            return json_decode($response, true);
                        }

                        function detectCurrency($countryCode) {
                            $currencyMap = array(
                                'US' => 'USD',
                                'CA' => 'CAD',
                                'GB' => 'GBP',
                                'EU' => 'EUR',
                                'IN' => 'INR',
                                'AU' => 'AUD',
                                'NZ' => 'NZD',
                                'SG' => 'SGD',
                                'MA' => 'MAD',
                                'DZ' => 'DZD',
                                'TN' => 'TND',
                                'EG' => 'EGP',
                                'LY' => 'LYD',
                                'KE' => 'KES',
                                'TZ' => 'TZS',
                                
                                // Add more country codes and currencies here
                            );

                            $defaultCurrency = 'USD';

                            return isset($currencyMap[$countryCode]) ? $currencyMap[$countryCode] : $defaultCurrency;
                        }

                        // Function to fetch exchange rate and convert currency using provided API
                        function convertToUSD($amount, $currency) {
                            $apiKey = 'S9oy7TqGeT0OwHL72QYMwyOqJWEzU96J';
                            $fromCurrency = $currency;
                            $toCurrency = 'USD';

                            $url = "https://api.apilayer.com/exchangerates_data/convert?to={$toCurrency}&from={$fromCurrency}&amount={$amount}";
                            $myHeaders = array('apikey: ' . $apiKey);

                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $myHeaders);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            $conversionResult = json_decode($response, true);
                            if (isset($conversionResult['success']) && $conversionResult['success']) {
                                return number_format($conversionResult['result'], 2);
                            } else {
                                return 'N/A';
                            }
                        }

                        $apiKey = '5f9e3cfbceddc7';

                        $ipDetails = getIPDetails($apiKey);

                        $countryCode = isset($ipDetails['country']) ? $ipDetails['country'] : '';

                        $currency = detectCurrency($countryCode);

                        $amountToConvert = 100;

                        $usdAmount = convertToUSD($amountToConvert, $currency);
                        ?>
                        <div class="alert alert-success text-center">
                            Detected Currency: <?php echo $currency; ?>
                            <br>
                            Converted to USD: $<?php echo $usdAmount; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var myHeaders = new Headers();
        myHeaders.append("apikey", "S9oy7TqGeT0OwHL72QYMwyOqJWEzU96J");

        var requestOptions = {
            method: 'GET',
            redirect: 'follow',
            headers: myHeaders
        };

        fetch("https://api.apilayer.com/exchangerates_data/convert?to=USD&from=MAD&amount=10", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
    </script>
</body>
</html>
