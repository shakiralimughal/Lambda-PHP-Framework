<?php
# ######################################
# PHP General Functions Class
# by Shakir Ali : naveedmemon@gmail.com
# ######################################

class clsGeneral
{
    public $aUSStatesList;
    public $aCurrencies;
    public $aCountriesList;

    public $aTimeZones;

    public $aNationalityList;

    function __CONSTRUCT()
    {
        $this->aCountriesList = array("ac" => "Ascension Island", "ad" => "Andorra", "ae" => "United Arab Emirates", "af" => "Afghanistan", "ag" => "Antigua and Barbuda", "ai" => "Anguilla", "al" => "Albania", "am" => "Armenia", "an" => "Netherlands Antilles", "ao" => "Angola", "aq" => "Antarctica", "ar" => "Argentina", "as" => "American Samoa", "at" => "Austria", "au" => "Australia", "aw" => "Aruba", "az" => "Azerbaijan", "ba" => "Bosnia and Herzegovina", "bb" => "Barbados", "bd" => "Bangladesh", "be" => "Belgium", "bf" => "Burkina Faso", "bg" => "Bulgaria", "bh" => "Bahrain", "bi" => "Burundi", "bj" => "Benin", "bm" => "Bermuda", "bn" => "Brunei Darussalam", "bo" => "Bolivia", "br" => "Brazil", "bs" => "Bahamas", "bt" => "Bhutan", "bv" => "Bouvet Island", "bw" => "Botswana", "by" => "Belarus", "bz" => "Belize", "ca" => "Canada", "cc" => "Cocos (Keeling) Islands", "cd" => "Congo, Democratic Republic of the", "cf" => "Central African Republic", "cg" => "Congo, Republic of", "ch" => "Switzerland", "ci" => "Cote d'Ivoire", "ck" => "Cook Islands", "cl" => "Chile", "cm" => "Cameroon", "cn" => "China", "co" => "Colombia", "cr" => "Costa Rica", "cu" => "Cuba", "cv" => "Cap Verde", "cx" => "Christmas Island", "cy" => "Cyprus", "cz" => "Czech Republic", "de" => "Germany", "dj" => "Djibouti", "dk" => "Denmark", "dm" => "Dominica", "do" => "Dominican Republic", "dz" => "Algeria", "ec" => "Ecuador", "ec" => "England", "ee" => "Estonia", "eg" => "Egypt", "eh" => "Western Sahara", "er" => "Eritrea", "es" => "Spain", "et" => "Ethiopia", "fi" => "Finland", "fj" => "Fiji", "fk" => "Falkland Islands (Malvina)", "fm" => "Micronesia, Federal State of", "fo" => "Faroe Islands", "fr" => "France", "ga" => "Gabon", "gd" => "Grenada", "ge" => "Georgia", "gf" => "French Guiana", "gg" => "Guernsey", "gh" => "Ghana", "gi" => "Gibraltar", "gl" => "Greenland", "gm" => "Gambia", "gn" => "Guinea", "gp" => "Guadeloupe", "gq" => "Equatorial Guinea", "gr" => "Greece", "gs" => "South Georgia", "gt" => "Guatemala", "gu" => "Guam", "gw" => "Guinea-Bissau", "gy" => "Guyana", "hk" => "Hong Kong", "hm" => "Heard and McDonald Islands", "hn" => "Honduras", "hr" => "Croatia/Hrvatska", "ht" => "Haiti", "hu" => "Hungary", "id" => "Indonesia", "ie" => "Ireland", "il" => "Israel", "im" => "Isle of Man", "in" => "India", "io" => "British Indian Ocean Territory", "iq" => "Iraq", "ir" => "Iran (Islamic Republic of)", "is" => "Iceland", "it" => "Italy", "je" => "Jersey", "jm" => "Jamaica", "jo" => "Jordan", "jp" => "Japan", "ke" => "Kenya", "kg" => "Kyrgyzstan", "kh" => "Cambodia", "ki" => "Kiribati", "km" => "Comoros", "kn" => "Saint Kitts and Nevis", "kp" => "Korea, Democratic People's Republic", "kr" => "Korea, Republic of", "kw" => "Kuwait", "ky" => "Cayman Islands", "kz" => "Kazakhstan", "la" => "Lao People's Democratic Republic", "lb" => "Lebanon", "lc" => "Saint Lucia", "li" => "Liechtenstein", "lk" => "Sri Lanka", "lr" => "Liberia", "ls" => "Lesotho", "lt" => "Lithuania", "lu" => "Luxembourg", "lv" => "Latvia", "ly" => "Libyan Arab Jamahiriya", "ma" => "Morocco", "mc" => "Monaco", "md" => "Moldova, Republic of", "mg" => "Madagascar", "mh" => "Marshall Islands", "mk" => "Macedonia, Former Yugoslav Republic", "ml" => "Mali", "mm" => "Myanmar", "mn" => "Mongolia", "mo" => "Macau", "mp" => "Northern Mariana Islands", "mq" => "Martinique", "mr" => "Mauritania", "ms" => "Montserrat", "mt" => "Malta", "mu" => "Mauritius", "mv" => "Maldives", "mw" => "Malawi", "mx" => "Mexico", "my" => "Malaysia", "mz" => "Mozambique", "na" => "Namibia", "nc" => "New Caledonia", "ne" => "Niger", "nf" => "Norfolk Island", "ng" => "Nigeria", "ni" => "Nicaragua", "nl" => "Netherlands", "no" => "Norway", "np" => "Nepal", "nr" => "Nauru", "nu" => "Niue", "nz" => "New Zealand", "om" => "Oman", "pa" => "Panama", "pe" => "Peru", "pf" => "French Polynesia", "pg" => "Papua New Guinea", "ph" => "Philippines", "pk" => "Pakistan", "pl" => "Poland", "pm" => "St. Pierre and Miquelon", "pn" => "Pitcairn Island", "pr" => "Puerto Rico", "ps" => "Palestinian Territories", "pt" => "Portugal", "pw" => "Palau", "py" => "Paraguay", "qa" => "Qatar", "re" => "Reunion Island", "ro" => "Romania", "ru" => "Russian Federation", "rw" => "Rwanda", "sa" => "Saudi Arabia", "sb" => "Solomon Islands", "sc" => "Seychelles", "sd" => "Sudan", "se" => "Sweden", "sg" => "Singapore", "sh" => "St. Helena", "si" => "Slovenia", "sj" => "Svalbard and Jan Mayen Islands", "sk" => "Slovak Republic", "sl" => "Sierra Leone", "sm" => "San Marino", "sn" => "Senegal", "so" => "Somalia", "sr" => "Suriname", "st" => "Sao Tome and Principe", "sv" => "El Salvador", "sy" => "Syrian Arab Republic", "sz" => "Swaziland", "tc" => "Turks and Caicos Islands", "td" => "Chad", "tf" => "French Southern Territories", "tg" => "Togo", "th" => "Thailand", "tj" => "Tajikistan", "tk" => "Tokelau", "tm" => "Turkmenistan", "tn" => "Tunisia", "to" => "Tonga", "tp" => "East Timor", "tr" => "Turkey", "tt" => "Trinidad and Tobago", "tv" => "Tuvalu", "tw" => "Taiwan", "tz" => "Tanzania", "ua" => "Ukraine", "ug" => "Uganda", "uk" => "United Kingdom", "um" => "US Minor Outlying Islands", "us" => "United States", "uy" => "Uruguay", "uz" => "Uzbekistan", "va" => "Holy See (City Vatican State)", "vc" => "Saint Vincent and the Grenadines", "ve" => "Venezuela", "vg" => "Virgin Islands (British)", "vi" => "Virgin Islands (USA)", "vn" => "Vietnam", "vu" => "Vanuatu", "wf" => "Wallis and Futuna Islands", "ws" => "Western Samoa", "ye" => "Yemen", "yt" => "Mayotte", "yu" => "Yugoslavia", "za" => "South Africa", "zm" => "Zambia", "zw" => "Zimbabwe");

        $this->aCurrencies = array("USD" => "United States - Dollar (USD)", "EUR" => "Euro (EUR)", "AED" => "United Arab Emirates dirham", "AFN" => "Afghan afghani", "ALL" => "Albanian lek", "AMD" => "Armenian dram", "ANG" => "Netherlands Antillean guilder", "AOA" => "Angolan kwanza", "ARS" => "Argentine peso", "AUD" => "Australian dollar", "AWG" => "Aruban florin", "AZN" => "Azerbaijani manat", "BAM" => "Bosnia and Herzegovina convertible mark", "BBD" => "Barbados dollar", "BDT" => "Bangladeshi taka", "BGN" => "Bulgarian lev", "BHD" => "Bahraini dinar", "BIF" => "Burundian franc", "BMD" => "Bermudian dollar", "BND" => "Brunei dollar", "BOB" => "Boliviano", "BOV" => "Bolivian Mvdol", "BRL" => "Brazilian real", "BSD" => "Bahamian dollar", "BTN" => "Bhutanese ngultrum", "BWP" => "Botswana pula", "BYR" => "Belarusian ruble", "BZD" => "Belize dollar", "CAD" => "Canadian dollar", "CDF" => "Congolese franc", "CHE" => "WIR Euro", "CHF" => "Swiss franc", "CHW" => "WIR Franc", "CLF" => "Unidad de Fomento", "CLP" => "Chilean peso", "CNY" => "Chinese yuan", "COP" => "Colombian peso", "COU" => "Unidad de Valor Real", "CRC" => "Costa Rican colon", "CUC" => "Cuban convertible peso", "CUP" => "Cuban peso", "CVE" => "Cape Verde escudo", "CZK" => "Czech koruna", "DJF" => "Djiboutian franc", "DKK" => "Danish krone", "DOP" => "Dominican peso", "DZD" => "Algerian dinar", "EGP" => "Egyptian pound", "ERN" => "Eritrean nakfa", "ETB" => "Ethiopian birr", "FJD" => "Fiji dollar", "FKP" => "Falkland Islands pound", "GBP" => "Pound sterling", "GEL" => "Georgian lari", "GHS" => "Ghanaian cedi", "GIP" => "Gibraltar pound", "GMD" => "Gambian dalasi", "GNF" => "Guinean franc", "GTQ" => "Guatemalan quetzal", "GYD" => "Guyanese dollar", "HKD" => "Hong Kong dollar", "HNL" => "Honduran lempira", "HRK" => "Croatian kuna", "HTG" => "Haitian gourde", "HUF" => "Hungarian forint", "IDR" => "Indonesian rupiah", "ILS" => "Israeli new sheqel", "INR" => "Indian rupee", "IQD" => "Iraqi dinar", "IRR" => "Iranian rial", "ISK" => "Icelandic krona", "JMD" => "Jamaican dollar", "JOD" => "Jordanian dinar", "JPY" => "Japanese yen", "KES" => "Kenyan shilling", "KGS" => "Kyrgyzstani som", "KHR" => "Cambodian riel", "KMF" => "Comoro franc", "KPW" => "North Korean won", "KRW" => "South Korean won", "KWD" => "Kuwaiti dinar", "KYD" => "Cayman Islands dollar", "KZT" => "Kazakhstani tenge", "LAK" => "Lao kip", "LBP" => "Lebanese pound", "LKR" => "Sri Lankan rupee", "LRD" => "Liberian dollar", "LSL" => "Lesotho loti", "LTL" => "Lithuanian litas", "LVL" => "Latvian lats", "LYD" => "Libyan dinar", "MAD" => "Moroccan dirham", "MDL" => "Moldovan leu", "MGA" => "Malagasy ariary", "MKD" => "Macedonian denar", "MMK" => "Myanma kyat", "MNT" => "Mongolian tugrik", "MOP" => "Macanese pataca", "MRO" => "Mauritanian ouguiya", "MUR" => "Mauritian rupee", "MVR" => "Maldivian rufiyaa", "MWK" => "Malawian kwacha", "MXN" => "Mexican peso", "MXV" => "Mexican Unidad de Inversion (UDI)", "MYR" => "Malaysian ringgit", "MZN" => "Mozambican metical", "NAD" => "Namibian dollar", "NGN" => "Nigerian naira", "NIO" => "Nicaraguan cordoba", "NOK" => "Norwegian krone", "NPR" => "Nepalese rupee", "NZD" => "New Zealand dollar", "OMR" => "Omani rial", "PAB" => "Panamanian balboa", "PEN" => "Peruvian nuevo sol", "PGK" => "Papua New Guinean kina", "PHP" => "Philippine peso", "PKR" => "Pakistani rupee", "PLN" => "Polish zloty", "PYG" => "Paraguayan guarani", "QAR" => "Qatari rial", "RON" => "Romanian new leu", "RSD" => "Serbian dinar", "RUB" => "Russian rouble", "RWF" => "Rwandan franc", "SAR" => "Saudi riyal", "SBD" => "Solomon Islands dollar", "SCR" => "Seychelles rupee", "SDG" => "Sudanese pound", "SEK" => "Swedish krona/kronor", "SGD" => "Singapore dollar", "SHP" => "Saint Helena pound", "SLL" => "Sierra Leonean leone", "SOS" => "Somali shilling", "SRD" => "Surinamese dollar", "SSP" => "South Sudanese pound", "STD" => "Sao Tome and Principe dobra", "SYP" => "Syrian pound", "SZL" => "Swazi lilangeni", "THB" => "Thai baht", "TJS" => "Tajikistani somoni", "TMT" => "Turkmenistani manat", "TND" => "Tunisian dinar", "TOP" => "Tongan pa?anga", "TRY" => "Turkish lira", "TTD" => "Trinidad and Tobago dollar", "TWD" => "New Taiwan dollar", "TZS" => "Tanzanian shilling", "UAH" => "Ukrainian hryvnia", "UGX" => "Ugandan shilling", "UYI" => "Uruguay Peso en Unidades Indexadas", "UYU" => "Uruguayan peso", "UZS" => "Uzbekistan som", "VEF" => "Venezuelan bolivar fuerte", "VND" => "Vietnamese d?ng", "VUV" => "Vanuatu vatu", "WST" => "Samoan tala", "XAF" => "CFA franc BEAC", "XCD" => "East Caribbean dollar", "XDR" => "Special drawing rights", "XFU" => "UIC franc", "XOF" => "CFA Franc BCEAO", "XPD" => "Palladium", "XPF" => "CFP franc", "XPT" => "Platinum", "XTS" => "Code reserved for testing purposes", "XXX" => "No currency", "YER" => "Yemeni rial", "ZAR" => "South African rand", "ZMK" => "Zambian kwacha", "ZWL" => "Zimbabwe dollar");

        $this->aNationalityList = array("", "Afghan", "Albanian", "Algerian", "American", "Andorran", "Angolan", "Argentine", "Armenian", "Australian", "Austrian", "Azerbaijani", "Bahamian", "Bahraini", "Bangladesh", "Barbadian", "Belarusian", "Belgian", "Belizean", "Beninese", "Bermudian", "Bhutanese", "Bosnian", "Botswanan", "Brazilian", "Bruneian", "Bulgarian", "Burkinabe", "Burmese", "Burundian", "Cambodian", "Cameroonian", "Canadia", "Cape Verdian", "Caymanian", "Central African", "Chadian", "Chilean", "Chinese", "Christmas Islander", "Colombian", "Comoran", "Congolese", "Congolese", "Costa Rican", "Croat", "Cuban", "Cypriot", "Czech", "Danish", "Djibouti", "Dominican", "Dutch", "Dutch Antillean", "East Timorese", "Ecuadorian", "Egyptian", "Emirati", "English", "Equatorial Guinean", "Eritrean", "Estonian", "Ethiopian", "Falkland Islander", "Faroese", "Fijian", "Filipino", "Finnish", "French", "French Polynesian", "Gabonese", "Gambian", "Georgian", "German", "Ghanaian", "Greek", "Greenlander", "Grenadian", "Guatemalan", "Guinea-Bissauan", "Guinean", "Guyanese", "Haitian", "Honduran", "Hungarian", "I-Kiribati", "Icelandic", "Indian", "Indonesian", "Iranian", "Iraqi", "Irish", "Israeli", "Italian", "Ivorian", "Jamaican", "Japanese", "Jordanian", "Kazakh", "Kenyan", "Kittitian", "Kuwaiti", "Kyrgyz", "Laotian", "Latvian", "Lebanese", "Liberian", "Libyan", "Liechtensteinish", "Lithuanian", "Luxembourgian", "Macedonian", "Malagasy", "Malawian", "Malaysian", "Maldivan", "Malian", "Maltese", "Marshallese", "Mauritanian", "Mauritian", "Mexican", "Micronesian", "Moldovan", "Monegasque", "Mongolian", "Montenegrin", "Montserratian", "Morrocan", "Mosotho", "Mozambican", "Namibian", "Nauruan", "Nepalese", "New Caledonian", "New Zealander", "Ni-Vanuatu", "Nicaraguan", "Nigerian", "Nigerien", "Niuean", "Norfolk Islander", "North Korean", "Norwegian", "Omani", "Other", "Pakistani", "Palestinian", "Palauan", "Panamanian", "Papua New Guinean", "Paraguayan", "Peruvian", "Polish", "Portuguese", "Puerto Rican", "Qatari", "Romanian", "Russian", "Rwandan", "Saint Lucian", "Salvadoran", "Sammarinese", "Samoan", "Sao Tomean", "Saudi", "Scottish", "Senegalese", "Serbian", "Seychellois", "Sierra Leonean", "Singaporean", "Slovakian", "Slovenian", "Solomon Islander", "Somalian", "South African", "South Korean", "Spanish", "Sri Lankan", "Sudanese", "Surinamer", "Swazi", "Swedish", "Swiss", "Syrian", "Taiwanese", "Tajik", "Tanzanian", "Thai", "Togolese", "Tongan", "Trinidadian", "Tunisian", "Turkish", "Turkmenistani", "Ugandan", "Ukrainian", "Uruguayan", "Uzbekistani", "Venezuelan", "Vietnamese", "Welsh", "Yemeni", "Zambian", "Zimbabwean");

        $this->aUSStatesList = array("al" => "Alabama", "ak" => "Alaska", "ar" => "Arkansas", "az" => "Arizona", "ca" => "California", "co" => "Colorado", "ct" => "Connecticut", "de" => "Delaware", "fl" => "Florida", "ga" => "Georgia", "hi" => "Hawaii", "ia" => "Iowa", "id" => "Idaho", "il" => "Illinois", "in" => "Indiana", "ks" => "Kansas", "ky" => "Kentucky", "la" => "Louisiana", "ma" => "Massachusetts", "md" => "Maryland", "me" => "Maine", "mi" => "Michigan", "mn" => "Minnesota", "mo" => "Missouri", "ms" => "Mississippi", "mt" => "Montana", "nc" => "North Carolina", "nd" => "North Dakota", "ne" => "Nebraska", "nh" => "New Hampshire", "nj" => "New Jersey", "nm" => "New Mexico", "nv" => "Nevada", "ny" => "New York", "oh" => "Ohio", "ok" => "Oklahoma", "or" => "Oregon", "ot" => "Other", "pa" => "Pennsylvania", "ri" => "Rhode Island", "sc" => "South Carolina", "sd" => "South Dakota", "tn" => "Tennessee", "tx" => "Texas", "ut" => "Utah", "va" => "Virginia", "vt" => "Vermont", "wa" => "Washington", "wi" => "Wisconsin", "wv" => "West Virginia", "wy" => "Wyoming");

        $this->aTimeZones = array('Kwajalein' => '(GMT-12:00) International Date Line West', 'Pacific/Midway' => '(GMT-11:00) Midway Island', 'Pacific/Samoa' => '(GMT-11:00) Samoa', 'Pacific/Honolulu' => '(GMT-10:00) Hawaii', 'America/Anchorage' => '(GMT-09:00) Alaska', 'America/Los_Angeles' => '(GMT-08:00) Pacific Time (US &amp; Canada)', 'America/Tijuana' => '(GMT-08:00) Tijuana, Baja California', 'America/Denver' => '(GMT-07:00) Mountain Time (US &amp; Canada)', 'America/Chihuahua' => '(GMT-07:00) Chihuahua', 'America/Mazatlan' => '(GMT-07:00) Mazatlan', 'America/Phoenix' => '(GMT-07:00) Arizona', 'America/Regina' => '(GMT-06:00) Saskatchewan', 'America/Tegucigalpa' => '(GMT-06:00) Central America', 'America/Chicago' => '(GMT-06:00) Central Time (US &amp; Canada)', 'America/Mexico_City' => '(GMT-06:00) Mexico City', 'America/Monterrey' => '(GMT-06:00) Monterrey', 'America/New_York' => '(GMT-05:00) Eastern Time (US &amp; Canada)', 'America/Bogota' => '(GMT-05:00) Bogota', 'America/Lima' => '(GMT-05:00) Lima', 'America/Rio_Branco' => '(GMT-05:00) Rio Branco', 'America/Indiana/Indianapolis' => '(GMT-05:00) Indiana (East)', 'America/Caracas' => '(GMT-04:30) Caracas', 'America/Halifax' => '(GMT-04:00) Atlantic Time (Canada)', 'America/Manaus' => '(GMT-04:00) Manaus', 'America/Santiago' => '(GMT-04:00) Santiago', 'America/La_Paz' => '(GMT-04:00) La Paz', 'America/St_Johns' => '(GMT-03:30) Newfoundland', 'America/Argentina/Buenos_Aires' => '(GMT-03:00) Georgetown', 'America/Sao_Paulo' => '(GMT-03:00) Brasilia', 'America/Godthab' => '(GMT-03:00) Greenland', 'America/Montevideo' => '(GMT-03:00) Montevideo', 'Atlantic/South_Georgia' => '(GMT-02:00) Mid-Atlantic', 'Atlantic/Azores' => '(GMT-01:00) Azores', 'Atlantic/Cape_Verde' => '(GMT-01:00) Cape Verde Is.', 'Europe/Dublin' => '(GMT) Dublin', 'Europe/Lisbon' => '(GMT) Lisbon', 'Europe/London' => '(GMT) London', 'Africa/Monrovia' => '(GMT) Monrovia', 'Atlantic/Reykjavik' => '(GMT) Reykjavik', 'Africa/Casablanca' => '(GMT) Casablanca', 'Europe/Belgrade' => '(GMT+01:00) Belgrade', 'Europe/Bratislava' => '(GMT+01:00) Bratislava', 'Europe/Budapest' => '(GMT+01:00) Budapest', 'Europe/Ljubljana' => '(GMT+01:00) Ljubljana', 'Europe/Prague' => '(GMT+01:00) Prague', 'Europe/Sarajevo' => '(GMT+01:00) Sarajevo', 'Europe/Skopje' => '(GMT+01:00) Skopje', 'Europe/Warsaw' => '(GMT+01:00) Warsaw', 'Europe/Zagreb' => '(GMT+01:00) Zagreb', 'Europe/Brussels' => '(GMT+01:00) Brussels', 'Europe/Copenhagen' => '(GMT+01:00) Copenhagen', 'Europe/Madrid' => '(GMT+01:00) Madrid', 'Europe/Paris' => '(GMT+01:00) Paris', 'Africa/Algiers' => '(GMT+01:00) West Central Africa', 'Europe/Amsterdam' => '(GMT+01:00) Amsterdam', 'Europe/Berlin' => '(GMT+01:00) Berlin', 'Europe/Rome' => '(GMT+01:00) Rome', 'Europe/Stockholm' => '(GMT+01:00) Stockholm', 'Europe/Vienna' => '(GMT+01:00) Vienna', 'Europe/Minsk' => '(GMT+02:00) Minsk', 'Africa/Cairo' => '(GMT+02:00) Cairo', 'Europe/Helsinki' => '(GMT+02:00) Helsinki', 'Europe/Riga' => '(GMT+02:00) Riga', 'Europe/Sofia' => '(GMT+02:00) Sofia', 'Europe/Tallinn' => '(GMT+02:00) Tallinn', 'Europe/Vilnius' => '(GMT+02:00) Vilnius', 'Europe/Athens' => '(GMT+02:00) Athens', 'Europe/Bucharest' => '(GMT+02:00) Bucharest', 'Europe/Istanbul' => '(GMT+02:00) Istanbul', 'Asia/Jerusalem' => '(GMT+02:00) Jerusalem', 'Asia/Amman' => '(GMT+02:00) Amman', 'Asia/Beirut' => '(GMT+02:00) Beirut', 'Africa/Windhoek' => '(GMT+02:00) Windhoek', 'Africa/Harare' => '(GMT+02:00) Harare', 'Asia/Kuwait' => '(GMT+03:00) Kuwait', 'Asia/Riyadh' => '(GMT+03:00) Riyadh', 'Asia/Baghdad' => '(GMT+03:00) Baghdad', 'Africa/Nairobi' => '(GMT+03:00) Nairobi', 'Asia/Tbilisi' => '(GMT+03:00) Tbilisi', 'Europe/Moscow' => '(GMT+03:00) Moscow', 'Europe/Volgograd' => '(GMT+03:00) Volgograd', 'Asia/Tehran' => '(GMT+03:30) Tehran', 'Asia/Muscat' => '(GMT+04:00) Muscat', 'Asia/Baku' => '(GMT+04:00) Baku', 'Asia/Yerevan' => '(GMT+04:00) Yerevan', 'Asia/Kabul' => '(GMT+04:30) Kabul', 'Asia/Yekaterinburg' => '(GMT+05:00) Ekaterinburg', 'Asia/Karachi' => '(GMT+05:00) Karachi', 'Asia/Tashkent' => '(GMT+05:00) Tashkent', 'Asia/Kolkata' => '(GMT+05:30) Calcutta', 'Asia/Colombo' => '(GMT+05:30) Sri Jayawardenepura', 'Asia/Katmandu' => '(GMT+05:45) Kathmandu', 'Asia/Dhaka' => '(GMT+06:00) Dhaka', 'Asia/Almaty' => '(GMT+06:00) Almaty', 'Asia/Novosibirsk' => '(GMT+06:00) Novosibirsk', 'Asia/Rangoon' => '(GMT+06:30) Yangon (Rangoon)', 'Asia/Krasnoyarsk' => '(GMT+07:00) Krasnoyarsk', 'Asia/Bangkok' => '(GMT+07:00) Bangkok', 'Asia/Jakarta' => '(GMT+07:00) Jakarta', 'Asia/Brunei' => '(GMT+08:00) Beijing', 'Asia/Chongqing' => '(GMT+08:00) Chongqing', 'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong', 'Asia/Urumqi' => '(GMT+08:00) Urumqi', 'Asia/Irkutsk' => '(GMT+08:00) Irkutsk', 'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar', 'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur', 'Asia/Singapore' => '(GMT+08:00) Singapore', 'Asia/Taipei' => '(GMT+08:00) Taipei', 'Australia/Perth' => '(GMT+08:00) Perth', 'Asia/Seoul' => '(GMT+09:00) Seoul', 'Asia/Tokyo' => '(GMT+09:00) Tokyo', 'Asia/Yakutsk' => '(GMT+09:00) Yakutsk', 'Australia/Darwin' => '(GMT+09:30) Darwin', 'Australia/Adelaide' => '(GMT+09:30) Adelaide', 'Australia/Canberra' => '(GMT+10:00) Canberra', 'Australia/Melbourne' => '(GMT+10:00) Melbourne', 'Australia/Sydney' => '(GMT+10:00) Sydney', 'Australia/Brisbane' => '(GMT+10:00) Brisbane', 'Australia/Hobart' => '(GMT+10:00) Hobart', 'Asia/Vladivostok' => '(GMT+10:00) Vladivostok', 'Pacific/Guam' => '(GMT+10:00) Guam', 'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby', 'Asia/Magadan' => '(GMT+11:00) Magadan', 'Pacific/Fiji' => '(GMT+12:00) Fiji', 'Asia/Kamchatka' => '(GMT+12:00) Kamchatka', 'Pacific/Auckland' => '(GMT+12:00) Auckland', 'Pacific/Tongatapu' => '(GMT+13:00) Nukualofa');
    }

   
    # ############################################################################
    # Function to Validate Email
    # Usage: $objClass->fnValidateEmail('shakir.ali@salesflo.com');
    # ############################################################################
    function fnValidateEmail($varEmail)
    {
        $sREGREX = '/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' . '(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i';
        return (preg_match($sREGREX, $varEmail));
    }

    # ############################################################################
    # Function to Day Difference Between Two Dates 
    # Usage: $objClass->fnDaysDiffOfTwoDate('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDaysDiffOfTwoDate($dStartDateTime, $dEndDateTime)
    {
        if ($dStartDateTime == "") $dStartDateTime = $this->fnNow();
        if ($dEndDateTime == "") $dEndDateTime = $this->fnNow();

        $objStart = new DateTime($dStartDateTime);
        $objEnd = new DateTime($dEndDateTime);
        $objDiff = $objStart->diff($objEnd);
        return ($objDiff->format('%d'));
    }

    # ############################################################################
    # Function to Day Difference Between Two Dates Without Defined Day
    # Usage: $objClass->fnDaysDiffOfTwoDateWithOutSunday('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDaysDiffOfTwoDateWithOutSunday($dStartDate, $dEndDate,$sDayMinus = "Sun")
    {
        if ($dStartDate == "") $dEndDate = $this->fnDateFromDateTime();
        if ($dEndDate == "") $dEndDate = $this->fnDateFromDateTime();
        $objStartDate = new DateTime($dStartDate);
        $objEndDate = new DateTime($dEndDate);
        $objEndDate->modify('+1 day');
        $objInterval = $objEndDate->diff($objStartDate);
        $iDays = $objInterval->days;

        $aPeriod = new DatePeriod($objStartDate, new DateInterval('P1D'), $objEndDate);

        foreach ($aPeriod as $objPeriod) 
        {
            $sDays = $objPeriod->format('D');
            if ($sDays == $sDayMinus) $iDays--;
        }

        return ($iDays);
    }


    # ############################################################################
    # Function to Difference Between Two Dates
    # Usage: $objClass->fnDiffBetweenTwoDate('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDiffBetweenTwoDate($dStartDateTime, $dEndDateTime)
    {
        if ($dStartDateTime == "") $dStartDateTime = $this->fnNow();
        if ($dEndDateTime == "") $dEndDateTime = $this->fnNow();

        $objStart = new DateTime($dStartDateTime);
        $objEnd = new DateTime($dEndDateTime);
        $objDiff = $objStart->diff($objEnd);
        return ($objDiff->format('%h Hours %i Min %s Sec'));
    }
    
    # ############################################################################
    # Function to Difference Between Two Dates
    # Usage: $objClass->fnDiffBetweenTwoDate('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDiffBetweenTwoDateFormated($sStartDate = "", $sEndDate = "", $sInWhich = "S")
    {
        
        if ($sStartDate == "") 
            $sStartDate = time(); 
        else
            $sStartDate = strtotime($sStartDate);

        if ($sEndDate == "") 
            $sEndDate = time(); 
        else
            $sEndDate = strtotime($sEndDate);

        $sDiff = $sEndDate - $sStartDate;
        if ($sInWhich === "S") 
            $iReturn = $sDiff; 
        else if ($sInWhich === "M") 
            $iReturn = ($sDiff / 60); 
        else if ($sInWhich === "H") 
            $iReturn = (($sDiff / 60) / 60); 
        else if ($sInWhich === "D") 
            $iReturn = (($sDiff / 60) / 60 / 24);
        else 
            $iReturn = 0;
            
            
        return ($iReturn);
    }
    

    # ########################################################################
    # Function to Date From Date Time
    # Usage: $objClass->fnDateFromDateTime('2019-07-31 12:01:10');
    # #########################################################################
    function fnDateFromDateTime($dDateTime = "")
    {
        if ($dDateTime == "") $dDateTime = $this->fnNow();
        $objDate = new DateTime($dDateTime);
        $sReturn = $objDate->format("Y-m-d");
        return ($sReturn);
    }

    # ########################################################################
    # Function to Time From Date Time
    # Usage: $objClass->fnTimeFromDateTime('2019-07-31 12:01:10');
    # #########################################################################
    function fnTimeFromDateTime($dDateTime = "")
    {
        if ($dDateTime == "") $dDateTime = $this->fnNow();
        $objDate = new DateTime($dDateTime);
        $sReturn = $objDate->format("H:i:s");
        return ($sReturn);
    }

    # ########################################################################
    # Function to Convert Date Time into Format
    # Usage: $objClass->fnFormatDateTime('2019-07-31 12:01:10');
    # #########################################################################
    function fnFormatDateTime($dDateTime)
    {
        if ($dDateTime == "") $dDateTime = $this->fnNow();
        $sReturn = date("F j, Y", strtotime($dDateTime)) . " at " . date("g:i a", strtotime($dDateTime));
        return ($sReturn);
    }


    # ########################################################################
    # Function to Browser Name
    # Usage: $objClass->fnBrowserName();
    # #########################################################################
    function fnBrowserName()
    {
        $sUserAgent = $_SERVER['HTTP_USER_AGENT'];
        $sBrowserName = "Unknown Browser";
        $aBrowserName = array('/msie/i' => 'Internet Explorer', '/firefox/i' => 'Firefox', '/safari/i' => 'Safari', '/chrome/i' => 'Chrome', '/opera/i' => 'Opera', '/netscape/i' => 'Netscape', '/maxthon/i' => 'Maxthon', '/konqueror/i' => 'Konqueror', '/mobile/i' => 'Handheld Browser');

        foreach ($aBrowserName as $iKey => $sValue) {
            if (preg_match($iKey, $sUserAgent)) $sBrowserName = $sValue;
        }

        return ($sBrowserName);
    }

   
    # ############################################################################
    # Function to Current Date & Time in the format of MySQL DateTime Field
    # Usage: $objClass->fnNow();
    # ############################################################################
    function fnNow()
    {
        return (date("Y-m-d H:i:s"));
    }
    

    # ##################################################################################
    # Function User to get Distance Difference btw to lat long..
    # ##################################################################################
    function fnDiffBetweenTwoLocation($dLat1, $dLon1, $dLat2, $dLon2)
    {
        $R = 6371; // Radius of the earth in km
        $dLat = deg2rad($dLat2 - $dLat1);
        $dLon = deg2rad($dLon2 - $dLon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($dLat1)) * cos(deg2rad($dLat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c; // Distance in km
        return ($d);
    }

    # ############################################################################
    # Function to Get QueryString and Form Post value, Default = AutoDetect
    # Usage: $objClass->fnGet("search"); same as $objClass->fnGet("search", "GET");
    #        -or- $objClass->fnGet("search", "POST");
    # ############################################################################
    function fnGet($varQuery, $varType = "AUTO")
    {
        $varType = trim($varType);
        $varQuery = trim($varQuery);
        if ($varType === "POST") {
            if (isset($_POST[$varQuery])) return ($_POST[$varQuery]);
        } else if ($varType === "GET") {
            if (isset($_GET[$varQuery])) return ($_GET[$varQuery]);
        } else if ($varType === "AUTO") {
            if (isset($_REQUEST[$varQuery])) return ($_REQUEST[$varQuery]);
        }

        return ("");

    }

    
    function fnEncryption($sString, $sEncryptionKey = "", $sEncryptionIV = "")
    {
        global $objEncryption;
        if ($sString == "") return ("");
        $sEncrypted = $objEncryption->Encryption($sString, $sEncryptionKey = "", $sEncryptionIV = "");
        return ($sEncrypted);
    }

    function fnDecryption($sString, $sEncryptionKey = "", $sEncryptionIV = "")
    {
        global $objEncryption;
        if ($sString == '') return ('');
        if (!ctype_xdigit($sString)) return ('');
        $sDecrypted = $objEncryption->Decryption($sString, $sEncryptionKey, $sEncryptionIV);
        return ($sDecrypted);
    }

    ########################################################################
    # Password Encryption with Bcrypt Alogrithm (One way Encryption)
    function fnPasswordEncrypt($sPassword,$fAlgo = PASSWORD_BCRYPT)
    {
        $sPasswordEncrypt = password_hash($sPassword,$fAlgo);
        return($sPasswordEncrypt);
    }

    ########################################################################
    # Bcrytion hash verify function
    function fnVerifyPassword($sPassword,$sHash)
    {
        $fResult = password_verify($sPassword,$sHash);
        if($fResult) return(true);
        return(false);
    }

    ########################################################################
    # FUNCTION use to Ecode String
    function fnEncode($sString, $fCSVInjection = true)
    {
        global $objDatabase;
        $sEncodeString = "";
        if ($sString === "") return ($sEncodeString);
        if ($sString === null) return ($sEncodeString);
        if ($sString === "null") return ($sEncodeString);
        if ($sString === "NULL") return ($sEncodeString);
        if ($sString === "0") return (0);
        if ($fCSVInjection) {
            $aMatchArray = array();
            $sFirstChar = substr($sString, 0, 1);
            preg_match('/[\^£$%*()}{@#~?><>,!|=_+¬-]/', $sFirstChar, $aMatchArray);
            if (!empty($aMatchArray)) $sString = "'" . $sString;
        }

        $sString = trim($sString);
        $sString = str_replace("'", "&#39;", $sString);
        $sString = str_replace('"', "&#34;", $sString);
        $sString = str_replace("<", "&#60;", $sString);
        $sString = str_replace(">", "&#62;", $sString);
        $sEncodeString = $objDatabase->RealEscapeString($sString);
        return ($sEncodeString);
    }

    ########################################################################
    # FUNCTION use to Decode String
    function fnDecode($sString)
    {
        global $objDatabase;
        $sEncodeString = urldecode($sString);
        $sEncodeString = $objDatabase->RealEscapeString($sEncodeString);
        return ($sEncodeString);
    }

    function fnRedirectWithPost($varLocation, $sParameters = "")
    {
        $sReturn = '<form id="idMyForm" action="' . $varLocation . '" method="POST">';
        $aParameter = $this->ParametersStringToArray($sParameters);
        foreach ($aParameter AS $iKey => $sValue) {
            $sFieldName = $sValue["Name"];
            $sFieldValue = $sValue["Value"];
            $sReturn .= '<input type = "hidden" name = "' . $sFieldName . '" value = "' . $sFieldValue . '" />';
        }
        $sReturn .= '</form>';
        $sReturn .= '<script> document.getElementById("idMyForm").submit();</script>';
        print($sReturn);
    }

    function fnParametersStringToArray($sParameters)
    {
        $aParameter = array();
        $aArray = explode("&", $sParameters);
        $iPNo = 0;
        foreach ($aArray AS $iKey => $sValue) {
            $aValue = explode("=", $sValue);
            if ($aValue[0] !== "") {
                $aParameter[$iPNo]["Name"] = $aValue[0];
                $aParameter[$iPNo]["Value"] = $aValue[1];
                $iPNo++;
            }

        }

        return ($aParameter);
    }

    function fnTopURLRefresh($sURL)
    {
        $sScript = '<script>top.location.href = "'.$sURL.'";</script>';
        print($sScript);
    }

    function fnGetIPAddress()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $sIPAddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $sIPAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $sIPAddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $sIPAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $sIPAddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $sIPAddress = $_SERVER['REMOTE_ADDR'];
        else
            $sIPAddress = "UNKNOWN";
        return($sIPAddress);

    }

    ######################################################################
    # Read CSV File
    function fnReadCSV($sFileName,$fSetHeader = false)
    {
        $iNumber = 0;
        $aCSVArray = array();
        //$fHandle = @fopen($sFileName, "r");
        $fHandle = fopen($sFileName, "r");
        if ($fHandle)
        {
            while (!feof($fHandle))
            {
                $buffer = fgets($fHandle, 4096);
                $aCSVArray[$iNumber++] = $buffer;
                if ($buffer == "") continue;
            }

            fclose($fHandle);
            ###########################################
            # Remove CSV Header from array
            if(!$fSetHeader) array_shift($aCSVArray);

            ###########################################
            # Remove CSV Last Empty row..
            array_pop($aCSVArray);
        }

        return($aCSVArray);
    }


    ######################################################################
    # Function use to convert string parameters into array
    function fnFiltersStringToArray($sFilters = "")
    {
        $aArrayFilters = array();
        $aFilters = explode("&",$sFilters);
        for($i=0;$i<sizeof($aFilters);$i++)
        {
            $aArrayTemp = explode("=",$aFilters[$i]);
            $iKey = $this->Decode($aArrayTemp[0]);
            $sValue = $this->Decode($aArrayTemp[1]);
            $aArrayFilters[$iKey] = $sValue;
        }

        return($aArrayFilters);

    }





}