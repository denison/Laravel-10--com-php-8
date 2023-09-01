<?php

namespace App\Helpers;

use \League\Fractal;

class Functions
{
    // =========================================================================
    // Searchers
    // =========================================================================

    /**
     * Search an array of arrays for $searchValue on $searchKey and, if it finds a match, return the value on $returnKey or the whole subarray
     */
    public static function multidimensionalArraySearch($multiArray, $searchKey, $searchValue, $returnKey = null)
    {
        foreach ($multiArray as $array) {
            if ($array[$searchKey] == $searchValue) {
                if ($returnKey) {
                    return $array[$returnKey];
                } else {
                    return $array;
                }
            }
        }

        return null;
    }

    /**
     * Search an array of objects for $searchValue on $searchField and, if it finds a match, return the value on $returnField or the whole object
     */
    public static function objectArraySearch($objectArray, $searchField, $searchValue, $returnField = null)
    {
        foreach ($objectArray as $object) {
            if ($object->$searchField == $searchValue) {
                if ($returnField) {
                    return $object->$returnField;
                } else {
                    return $object;
                }
            }
        }

        return null;
    }

    // =========================================================================
    // Formatters
    // =========================================================================

    /**
     * Datetime format
     *
     * @return string
     */
    public static function formatDatetime($value)
    {
        return isset($value)? \Carbon::parse($value)->format('d/m/Y H:i') : null;
    }

    /**
     * Date format
     *
     * @return string
     */
    public static function formatDate($value)
    {
        return isset($value)? \Carbon::parse($value)->format('d/m/Y') : null;
    }
    
    /**
     * Date format
     *
     * @return string
     */
    public static function formatDateMonthYear($value)
    {
        return isset($value)? \Carbon::parse($value)->format('m/Y') : null;
    }

    /**
     * Time format
     *
     * @return string
     */
    public static function formatTime($value)
    {
        return isset($value)? \Carbon::parse($value)->format('H:i') : null;
    }

    /**
     * Boolean format
     *
     * @return string
     */
    public static function formatBoolean($value)
    {
        return boolval($value)? \Lang::get('text.yes') : \Lang::get('text.no');
    }

    /**
     * Percentage format
     *
     * @return string
     */
    public static function formatPercentage($value)
    {
        return isset($value) ? number_format($value, 2, ",", ".")."%" : null;
    }

    public static function getPerformancePorcentage($value, $value_compare)
    {
        $performance_porcentage = $value - $value_compare;
        if ($value_compare != 0) $performance_porcentage = ($performance_porcentage/$value_compare)*100;
        return self::formatPercentage(round($performance_porcentage , 2));
    }

    /**
     * Integer format
     *
     * @return string
     */
    public static function formatInteger($value)
    {
        return isset($value)? number_format($value, 0, ",", ".") : null;
    }

    /**
     * Decimal format
     *
     * @return string
     */
    public static function formatDecimal($value)
    {
        return isset($value)? number_format($value, 2, ",", ".") : null;
    }

    /**
     * Decimal format only if number has decimal places
     *
     * @return string
     */
    public static function formatOptionalDecimal($value)
    {
        return isset($value)? ((fmod($value, 1)===0.00? number_format($value, 0, ",", ".") : number_format($value, 2, ",", "."))) : null;
    }

    /**
     * Latitude and longitude format
     *
     * @return string
     */
    public static function formatCoordinate($value)
    {
        return isset($value)? number_format($value, 8, ",", ".") : null;
    }

    /**
     * Latitude and longitude format
     *
     * @return string
     */
    public static function formatInverseCoordinate($value)
    {
        return isset($value)? number_format($value, 8, ".", ",") : number_format(0, 1, ".", ",") ;
    }

    /**
     * BRL currency format
     *
     * @return string
     */
    public static function formatCurrency($value)
    {
        return isset($value)? (new \NumberFormatter('pt_BR', \NumberFormatter::CURRENCY))->formatCurrency($value, 'BRL') : null;
    }

    /**
     * Sentence format (only first letter capitalized)
     *
     * @return string
     */
    public static function formatSentence($value)
    {
        return isset($value)? ucfirst(strtolower($value)) : null;
    }

    // =========================================================================
    // Others
    // =========================================================================

    /**
     * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
     * @param str $hexcolor Colour as hexadecimal (with or without hash);
     *
     * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
     * @return str Lightened/Darkend colour as hexadecimal (with hash);
     */
    public static function luminance($hexcolor, $percent)
    {
        if (strlen($hexcolor) < 6) {
            $hexcolor = $hexcolor[0].$hexcolor[0].$hexcolor[1].$hexcolor[1].$hexcolor[2].$hexcolor[2];
        }
        $hexcolor = array_map('hexdec', str_split(str_pad(str_replace('#', '', $hexcolor), 6, '0'), 2));

        foreach ($hexcolor as $i => $color) {
            $from = $percent < 0 ? 0 : $color;
            $to = $percent < 0 ? $color : 255;
            $pvalue = ceil(($to - $from) * $percent);
            $hexcolor[$i] = str_pad(dechex($color + $pvalue), 2, '0', STR_PAD_LEFT);
        }

        return '#'.implode($hexcolor);
    }

    /**
     * Add timestamp to data before insering into database
     */
    public static function addTimestamp($data)
    {
        return array_merge($data, ['created_at' => \DB::raw('CURRENT_TIMESTAMP'), 'updated_at' => \DB::raw('CURRENT_TIMESTAMP')]);
    }

    // =========================================================================
    // Unformatters
    // =========================================================================

    /**
     * BRL currency format to double
     *
     * @return double
     */
    public static function unformatCurrency($value)
    {
        if (!isset($value)) {
            return null;
        }
        
        $cleanValue = str_replace(["R", "$", " "], "", $value);
        if (strpos($cleanValue, ",") !== false) {
            $cleanValue = str_replace(".", "", $cleanValue);
            $cleanValue = str_replace(",", ".", $cleanValue);
        }
        return (double) $cleanValue;
    }

    public static function normalizePhone($phone)
    {
        if ($phone)
        {
            $_phone = preg_replace('/[^0-9+]/', '', $phone);

            if ($_phone != '')
            {
                $phone = $_phone;
                
                if (strpos($phone, '+') === false) $phone = '+55'.$phone;

                if (strpos($phone, '+55') !== false)
                {
                    if (strlen($phone) == 13)
                    {
                        //$phone = substr($phone, 0, 5)."9". substr($phone, 5);
                    }
                }
            }
        }
        
        return $phone;
    }

    public static function normalizeDocument($document)
    {
        if ($document) $document = preg_replace('/[^0-9]/', '', $document);
        return $document;
    }

    public static function isCnpj($number, $check_validity = false)
    {
        $number = self::normalizeDocument($number);

        if (strlen($number) === 14) 
        {
            if ($check_validity)
            {
                //INSERIR VALIDÃO FUTURAMENTE
            }
            else return true; 
        }
        else return false;
    }

    public static function isCpf($number, $check_validity = false)
    {
        $number = self::normalizeDocument($number);

        if (strlen($number) === 11) 
        {
            if ($check_validity)
            {
                //INSERIR VALIDÃO FUTURAMENTE
            }
            else return true; 
        }
        else return false;
    }

    public static function formatNumber($value, $lang = null, $decimal = 0)
    {
        switch ($lang) {
            case 'PT-BR':
                return number_format($value, $decimal, ",", ".");
                break;
            case 'ENG':
                return number_format($value, $decimal, ".", ",");
                break;
            default:
                return number_format($value, $decimal, ",", ".");
            break;
        }
    }    

    public static function getCities($select_array = false)
    {
        $path = base_path()."/resources/json/states_cities.json"; 
        $string = file_get_contents($path);   
        $data = json_decode($string);

        $cities = collect();
        
        foreach ($data->states as $state)
        {
            foreach ($state->cities as $city) 
            {
                $cities->push(
                    [
                        'name' => $city,
                        'state' =>
                        [
                            'name' => $state->name,
                            'UF' => $state->UF,
                        ],
                    ]
                );
            }
        }

        if ($select_array) 
        {
            $cities_select = [];
            foreach ($cities as $city) $cities_select[$city['name']] = $city['name'].' - '.$city['state']['name'].' ('.$city['state']['UF'].')';
            return $cities_select;
        }
        else return $cities;
    }

    public static function isCellPhone($number)
    {
        // ^\([1-9]{2}\) (?:[2-8]|9[1-9])[0-9]{3}\-[0-9]{4}$ REGEX PRA VALIDAR TELEFONE FIXO E CELULAR COM DDD E MASCARA
        $number = self::normalizePhone($number);        
        $ddi = substr($number, 0, 3);

        switch ($ddi)
        {
            case '+55': return preg_match('/^(\\'.$ddi.')([1-9]{2})(9[1-9])([0-9]{7})$/', $number) ? true : false;
            break;

            default: return true;
            break;
        }        
    }

    public static function formatBytes($bytes, $decimals = 2) {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)).@$sz[$factor];
    }

    public static function formatDayOfWeek($day_of_week_number)
    {
        $day_of_week_names =
        [
            \Lang::get('text.sunday'),
            \Lang::get('text.monday'),
            \Lang::get('text.tuesday'),
            \Lang::get('text.wednesday'),
            \Lang::get('text.thursday'),
            \Lang::get('text.friday'),
            \Lang::get('text.saturday')
        ];

        return $day_of_week_names[$day_of_week_number - 1];
    }

    public static function transform($resource_method, $data, $transformer, $includes = []) : array
    {
        $fractal_manager = new Fractal\Manager();
        $fractal_manager->setSerializer(new \App\Api\V1\Serializers\NoDataArraySerializer());
        $fractal_manager->parseIncludes($includes);
        
        switch ($resource_method)
        {
            case 'item': $resource = new Fractal\Resource\Item($data, $transformer);
            break;

            case 'collection': $resource = new Fractal\Resource\Collection($data, $transformer);
            break;
        }
    
        return $fractal_manager->createData($resource)->toArray();
    }
}
