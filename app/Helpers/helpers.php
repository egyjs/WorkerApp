<?php

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * @param $mime
 * @param string|array $accept
 * @return mixed|string|void
 */
function fType($mime, $accept = '*') {
    if (in_array($mime,['application/octet-stream'])){
        $type = 'video';
    }else{
        $type = explode('/',$mime)[0];
    }

//    dd($mime);
    if (is_array($accept) && !in_array($type, $accept)) return false;

    return strtoupper($type);


}

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


if (! function_exists('storageAsset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function storageAsset($path, $secure = null): string
    {
        return app('url')->asset('storage/'.$path, $secure);
    }
}



/**
 * Identify all relationships for a given model
 *
 * @param null $model Model
 * @return  array
 * @throws ReflectionException
 */
function getAllRelations($model): array
{
    $instance = new $model;

    // Get public methods declared without parameters and non inherited
    $class = get_class($instance);
    $allMethods = (new \ReflectionClass($class))->getMethods(\ReflectionMethod::IS_PUBLIC);
    $methods = array_filter(
        $allMethods,
        function ($method) use ($class) {
            return $method->class === $class
                && !$method->getParameters()                  // relationships have no parameters
                && $method->getName() !== 'getRelationships'; // prevent infinite recursion
        }
    );

    DB::beginTransaction();

    $relations = [];
    foreach ($methods as $method) {
        try {
            $methodName = $method->getName();
            $methodReturn = $instance->$methodName();
            if (!$methodReturn instanceof Relation) {
                continue;
            }
        } catch (\Throwable $th) {
            continue;
        }

        $type = (new \ReflectionClass($methodReturn))->getShortName();
        $model = get_class($methodReturn->getRelated());
        $relations[$methodName] = [$type, $model];
    }

    DB::rollBack();

    return $relations;
}

function getModels($modelNamespace = 'Models'){
    $appNamespace = Illuminate\Container\Container::getInstance()->getNamespace();


    $models = collect(File::allFiles(app_path($modelNamespace)))->map(function ($item) use ($appNamespace, $modelNamespace) {
        $rel   = $item->getRelativePathName();
        $class = sprintf('\%s%s%s', $appNamespace, $modelNamespace ? $modelNamespace . '\\' : '',
            implode('\\', explode('/', substr($rel, 0, strrpos($rel, '.')))));
        return class_exists($class) ? $class : null;
    })->filter();
    return $models;
}


function SQLTypeToGraphQL($type, $column){
    if (Str::contains($type,['varchar','enum','text']) ){
        return 'String!';
    }elseif (Str::contains($type,['timestamp','datetime'])){
        return 'DateTime!';
    }elseif (Str::contains($type,['date'])){
        return 'Date!';
    }elseif (Str::contains($type,['time'])){
        return 'Time!';
    }elseif (Str::contains($type,['bigint(20)',' unsigned'])){
        return 'ID!';
    }elseif (Str::contains($type,['tinyint(1)'])){
        return 'Boolean!';
    }elseif (Str::contains($type,['int(11)'])){
        return 'Int!';
    }

    dd($type,$column,'SQLTypeToGraphQL');
}
