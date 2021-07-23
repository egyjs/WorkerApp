<?php

if ( ! function_exists( 'get_currency_countries' ) ) {
    /**
     * get_currency_countries.
     *
     * 158 currencies.
     * Three-letter currency code (ISO 4217) => Two-letter countries codes (ISO 3166-1 alpha-2).
     */
    function get_currency_countries($iso) {
        return [
            'AFN' => ['AF'],
            'ALL' => ['AL'],
            'DZD' => ['DZ'],
            'USD' => ['AS', 'IO', 'GU', 'MH', 'FM', 'MP', 'PW', 'PR', 'TC', 'US', 'UM', 'VI'],
            'EUR' => ['AD', 'AT', 'BE', 'CY', 'EE', 'FI', 'FR', 'GF', 'TF', 'DE', 'GR', 'GP', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'MQ', 'YT', 'MC', 'ME', 'NL', 'PT', 'RE', 'PM', 'SM', 'SK', 'SI', 'ES'],
            'AOA' => ['AO'],
            'XCD' => ['AI', 'AQ', 'AG', 'DM', 'GD', 'MS', 'KN', 'LC', 'VC'],
            'ARS' => ['AR'],
            'AMD' => ['AM'],
            'AWG' => ['AW'],
            'AUD' => ['AU', 'CX', 'CC', 'HM', 'KI', 'NR', 'NF', 'TV'],
            'AZN' => ['AZ'],
            'BSD' => ['BS'],
            'BHD' => ['BH'],
            'BDT' => ['BD'],
            'BBD' => ['BB'],
            'BYR' => ['BY'],
            'BZD' => ['BZ'],
            'XOF' => ['BJ', 'BF', 'ML', 'NE', 'SN', 'TG'],
            'BMD' => ['BM'],
            'BTN' => ['BT'],
            'BOB' => ['BO'],
            'BAM' => ['BA'],
            'BWP' => ['BW'],
            'NOK' => ['BV', 'NO', 'SJ'],
            'BRL' => ['BR'],
            'BND' => ['BN'],
            'BGN' => ['BG'],
            'BIF' => ['BI'],
            'KHR' => ['KH'],
            'XAF' => ['CM', 'CF', 'TD', 'CG', 'GQ', 'GA'],
            'CAD' => ['CA'],
            'CVE' => ['CV'],
            'KYD' => ['KY'],
            'CLP' => ['CL'],
            'CNY' => ['CN'],
            'HKD' => ['HK'],
            'COP' => ['CO'],
            'KMF' => ['KM'],
            'CDF' => ['CD'],
            'NZD' => ['CK', 'NZ', 'NU', 'PN', 'TK'],
            'CRC' => ['CR'],
            'HRK' => ['HR'],
            'CUP' => ['CU'],
            'CZK' => ['CZ'],
            'DKK' => ['DK', 'FO', 'GL'],
            'DJF' => ['DJ'],
            'DOP' => ['DO'],
            'ECS' => ['EC'],
            'EGP' => ['EG'],
            'SVC' => ['SV'],
            'ERN' => ['ER'],
            'ETB' => ['ET'],
            'FKP' => ['FK'],
            'FJD' => ['FJ'],
            'GMD' => ['GM'],
            'GEL' => ['GE'],
            'GHS' => ['GH'],
            'GIP' => ['GI'],
            'QTQ' => ['GT'],
            'GGP' => ['GG'],
            'GNF' => ['GN'],
            'GWP' => ['GW'],
            'GYD' => ['GY'],
            'HTG' => ['HT'],
            'HNL' => ['HN'],
            'HUF' => ['HU'],
            'ISK' => ['IS'],
            'INR' => ['IN'],
            'IDR' => ['ID'],
            'IRR' => ['IR'],
            'IQD' => ['IQ'],
            'GBP' => ['IM', 'JE', 'GS', 'GB'],
            'ILS' => ['IL'],
            'JMD' => ['JM'],
            'JPY' => ['JP'],
            'JOD' => ['JO'],
            'KZT' => ['KZ'],
            'KES' => ['KE'],
            'KPW' => ['KP'],
            'KRW' => ['KR'],
            'KWD' => ['KW'],
            'KGS' => ['KG'],
            'LAK' => ['LA'],
            'LBP' => ['LB'],
            'LSL' => ['LS'],
            'LRD' => ['LR'],
            'LYD' => ['LY'],
            'CHF' => ['LI', 'CH'],
            'MKD' => ['MK'],
            'MGF' => ['MG'],
            'MWK' => ['MW'],
            'MYR' => ['MY'],
            'MVR' => ['MV'],
            'MRO' => ['MR'],
            'MUR' => ['MU'],
            'MXN' => ['MX'],
            'MDL' => ['MD'],
            'MNT' => ['MN'],
            'MAD' => ['MA', 'EH'],
            'MZN' => ['MZ'],
            'MMK' => ['MM'],
            'NAD' => ['NA'],
            'NPR' => ['NP'],
            'ANG' => ['AN'],
            'XPF' => ['NC', 'WF'],
            'NIO' => ['NI'],
            'NGN' => ['NG'],
            'OMR' => ['OM'],
            'PKR' => ['PK'],
            'PAB' => ['PA'],
            'PGK' => ['PG'],
            'PYG' => ['PY'],
            'PEN' => ['PE'],
            'PHP' => ['PH'],
            'PLN' => ['PL'],
            'QAR' => ['QA'],
            'RON' => ['RO'],
            'RUB' => ['RU'],
            'RWF' => ['RW'],
            'SHP' => ['SH'],
            'WST' => ['WS'],
            'STD' => ['ST'],
            'SAR' => ['SA'],
            'RSD' => ['RS'],
            'SCR' => ['SC'],
            'SLL' => ['SL'],
            'SGD' => ['SG'],
            'SBD' => ['SB'],
            'SOS' => ['SO'],
            'ZAR' => ['ZA'],
            'SSP' => ['SS'],
            'LKR' => ['LK'],
            'SDG' => ['SD'],
            'SRD' => ['SR'],
            'SZL' => ['SZ'],
            'SEK' => ['SE'],
            'SYP' => ['SY'],
            'TWD' => ['TW'],
            'TJS' => ['TJ'],
            'TZS' => ['TZ'],
            'THB' => ['TH'],
            'TOP' => ['TO'],
            'TTD' => ['TT'],
            'TND' => ['TN'],
            'TRY' => ['TR'],
            'TMT' => ['TM'],
            'UGX' => ['UG'],
            'UAH' => ['UA'],
            'AED' => ['AE'],
            'UYU' => ['UY'],
            'UZS' => ['UZ'],
            'VUV' => ['VU'],
            'VEF' => ['VE'],
            'VND' => ['VN'],
            'YER' => ['YE'],
            'ZMW' => ['ZM'],
            'ZWD' => ['ZW'],
        ];
    }
}