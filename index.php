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
                                'AF' => 'AFN',
                                'AL' => 'ALL',
                                'DZ' => 'DZD',
                                'AD' => 'EUR',
                                'AO' => 'AOA',
                                'AG' => 'XCD',
                                'AR' => 'ARS',
                                'AM' => 'AMD',
                                'AU' => 'AUD',
                                'AT' => 'EUR',
                                'AZ' => 'AZN',
                                'BS' => 'BSD',
                                'BH' => 'BHD',
                                'BD' => 'BDT',
                                'BB' => 'BBD',
                                'BY' => 'BYN',
                                'BE' => 'EUR',
                                'BZ' => 'BZD',
                                'BJ' => 'XOF',
                                'BT' => 'BTN',
                                'BO' => 'BOB',
                                'BA' => 'BAM',
                                'BW' => 'BWP',
                                'BR' => 'BRL',
                                'BN' => 'BND',
                                'BG' => 'BGN',
                                'BF' => 'XOF',
                                'BI' => 'BIF',
                                'CV' => 'CVE',
                                'KH' => 'KHR',
                                'CM' => 'XAF',
                                'CA' => 'CAD',
                                'CF' => 'XAF',
                                'TD' => 'XAF',
                                'CL' => 'CLP',
                                'CN' => 'CNY',
                                'CO' => 'COP',
                                'KM' => 'KMF',
                                'CD' => 'CDF',
                                'CG' => 'XAF',
                                'CR' => 'CRC',
                                'CI' => 'XOF',
                                'HR' => 'HRK',
                                'CU' => 'CUP',
                                'CY' => 'EUR',
                                'CZ' => 'CZK',
                                'DK' => 'DKK',
                                'DJ' => 'DJF',
                                'DM' => 'XCD',
                                'DO' => 'DOP',
                                'EC' => 'USD',
                                'EG' => 'EGP',
                                'SV' => 'USD',
                                'GQ' => 'XAF',
                                'ER' => 'ERN',
                                'EE' => 'EUR',
                                'ET' => 'ETB',
                                'FJ' => 'FJD',
                                'FI' => 'EUR',
                                'FR' => 'EUR',
                                'GA' => 'XAF',
                                'GM' => 'GMD',
                                'GE' => 'GEL',
                                'DE' => 'EUR',
                                'GH' => 'GHS',
                                'GR' => 'EUR',
                                'GD' => 'XCD',
                                'GT' => 'GTQ',
                                'GN' => 'GNF',
                                'GW' => 'XOF',
                                'GY' => 'GYD',
                                'HT' => 'HTG',
                                'HN' => 'HNL',
                                'HU' => 'HUF',
                                'IS' => 'ISK',
                                'IN' => 'INR',
                                'ID' => 'IDR',
                                'IR' => 'IRR',
                                'IQ' => 'IQD',
                                'IE' => 'EUR',
                                'IL' => 'ILS',
                                'IT' => 'EUR',
                                'JM' => 'JMD',
                                'JP' => 'JPY',
                                'JO' => 'JOD',
                                'KZ' => 'KZT',
                                'KE' => 'KES',
                                'KI' => 'AUD',
                                'KP' => 'KPW',
                                'KR' => 'KRW',
                                'KW' => 'KWD',
                                'KG' => 'KGS',
                                'LA' => 'LAK',
                                'LV' => 'EUR',
                                'LB' => 'LBP',
                                'LS' => 'LSL',
                                'LR' => 'LRD',
                                'LY' => 'LYD',
                                'LI' => 'CHF',
                                'LT' => 'EUR',
                                'LU' => 'EUR',
                                'MG' => 'MGA',
                                'MW' => 'MWK',
                                'MY' => 'MYR',
                                'MV' => 'MVR',
                                'ML' => 'XOF',
                                'MT' => 'EUR',
                                'MH' => 'USD',
                                'MR' => 'MRU',
                                'MU' => 'MUR',
                                'MX' => 'MXN',
                                'FM' => 'USD',
                                'MD' => 'MDL',
                                'MC' => 'EUR',
                                'MN' => 'MNT',
                                'ME' => 'EUR',
                                'MA' => 'MAD',
                                'MZ' => 'MZN',
                                'MM' => 'MMK',
                                'NA' => 'NAD',
                                'NR' => 'AUD',
                                'NP' => 'NPR',
                                'NL' => 'EUR',
                                'NZ' => 'NZD',
                                'NI' => 'NIO',
                                'NE' => 'XOF',
                                'NG' => 'NGN',
                                'MK' => 'MKD',
                                'NO' => 'NOK',
                                'OM' => 'OMR',
                                'PK' => 'PKR',
                                'PW' => 'USD',
                                'PA' => 'PAB',
                                'PG' => 'PGK',
                                'PY' => 'PYG',
                                'PE' => 'PEN',
                                'PH' => 'PHP',
                                'PL' => 'PLN',
                                'PT' => 'EUR',
                                'QA' => 'QAR',
                                'RO' => 'RON',
                                'RU' => 'RUB',
                                'RW' => 'RWF',
                                'KN' => 'XCD',
                                'LC' => 'XCD',
                                'VC' => 'XCD',
                                'WS' => 'WST',
                                'SM' => 'EUR',
                                'ST' => 'STN',
                                'SA' => 'SAR',
                                'SN' => 'XOF',
                                'RS' => 'RSD',
                                'SC' => 'SCR',
                                'SL' => 'SLL',
                                'SG' => 'SGD',
                                'SK' => 'EUR',
                                'SI' => 'EUR',
                                'SB' => 'SBD',
                                'SO' => 'SOS',
                                'ZA' => 'ZAR',
                                'SS' => 'SSP',
                                'ES' => 'EUR',
                                'LK' => 'LKR',
                                'SD' => 'SDG',
                                'SR' => 'SRD',
                                'SZ' => 'SZL',
                                'SE' => 'SEK',
                                'CH' => 'CHF',
                                'SY' => 'SYP',
                                'TW' => 'TWD',
                                'TJ' => 'TJS',
                                'TZ' => 'TZS',
                                'TH' => 'THB',
                                'TL' => 'USD',
                                'TG' => 'XOF',
                                'TO' => 'TOP',
                                'TT' => 'TTD',
                                'TN' => 'TND',
                                'TR' => 'TRY',
                                'TM' => 'TMT',
                                'TV' => 'AUD',
                                'UG' => 'UGX',
                                'UA' => 'UAH',
                                'AE' => 'AED',
                                'GB' => 'GBP',
                                'US' => 'USD',
                                'UY' => 'UYU',
                                'UZ' => 'UZS',
                                'VU' => 'VUV',
                                'VA' => 'EUR',
                                'VE' => 'VES',
                                'VN' => 'VND',
                                'WS' => 'WST',
                                'YE' => 'YER',
                                'ZM' => 'ZMW',
                                'ZW' => 'ZWL'
                            );
                            


                            $defaultCurrency = 'USD';

                            return isset($currencyMap[$countryCode]) ? $currencyMap[$countryCode] : $defaultCurrency;
                        }

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

                        $amountToConvert = isset($_POST['amount']) ? floatval($_POST['amount']) : 10;

                        $usdAmount = convertToUSD($amountToConvert, $currency);
                        ?>
                        <form method="post">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Enter Amount of <?php echo $currency; ?> to convert it to USD:</label>
                                <input type="number" step="any" class="form-control" id="amount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Convert</button>
                        </form>
                        <div class="mt-3 alert alert-success text-center">
                            Detected Currency: <?php echo $currency; ?>
                            <br>
                            Converted to USD: <?php echo $usdAmount; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
