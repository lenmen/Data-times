<?php namespace MyDateManager;

    class DateManager
    {
            // Static Properties
            static public $formatDate;
            static public $formatTime;
            static public $timezone;

            // Properties
            static public $today;
            static public $newDate;

            // Construct the database
            // functions 
            public function __construct($date = 'd-m-Y', $time = 'H:i:s', $timezone = "Europe/Amsterdam") {
                    // Set the default timezone
                    date_default_timezone_set($timezone);

                    // give the properties some values
                    self::$formatDate = $date;
                    self::$formatTime = $time;
                    self::$timezone = $timezone;

                    self::$today= date($date);
                    self::$newDate = null;
            }

            // Void
            public function moveTo($year = 0, $month = 0, $day = 0) {
                // booleans 
                $issetYear = (is_numeric($year) && $year != 0);
                $issetMonth = (is_numeric($month) && $month != 0);
                $issetDay = (is_numeric($day) && $day != 0);

                // add new date
                $date = (is_null(self::$newDate)) ? self::$today : self::$newDate;

                if($issetYear) {
                    echo 'year true';
                    $time = $date. " +". $year. " year"; 
                    $new_year = date(self::$formatDate, strtotime($time));

                    // Add the new date to the date variable
                    $date = $new_year;
                }

                if($issetMonth) {
                     echo 'month true';
                    $time = $date. " +". $month. " month"; 
                    $new_month = date(self::$formatDate, strtotime($time));

                    // Add the new date to the date variable
                    $date = $new_month;
                }

                if($issetDay) {
                    echo 'day true';
                    $time = $date. " +". $day. " day"; 
                    $new_day = date(self::$formatDate, strtotime($time));

                    // Add the new date to the date variable
                    $date = $new_day;
                }

                // Assing the date to the propertie
                self::$newDate = $date;
            }

            public function convertDate($format, $date) { 
                    return date($format, strtotime($date));
            }

            public function validDate($date) {
                    // Convert the date to a proper date format
                    $converted = $this->convertDate('d-m-y', $date);

                    // transform to array 
                    $date_elements = explode('-', $converted);

                    // Check if the date is valid
                    if (checkdate($date_elements[1], $date_elements[0], $date_elements[2])) {
                            return true;
                    } else {
                            return false;
                    }
            }

            public function diffDays($date1, $date2) {
                    // Transform the dates
                    $begin = strtotime($date1);
                    $end = strtotime($date2);

                    $diff = $end - $begin;

                    return floor($diff / (60*60*24));
            }

            public function Now($type) {
                    // if type is not an string return false
                    if (is_numeric($type)) {
                            return false;
                    }

                    // lowercase the string
                    $string = strtolower($type);

                    // Look wich type command he wants to execute
                    switch(constant('parent::'. $string)) {
                            case 0:
                                    // Normal date (dd-mm-yyyy)
                                    return date(self::$formatDate);
                            case 1:
                                    // Return full date
                                    return date(self::$formatDate . ' '. self::$formatTime);
                            default: 
                                    return false;
                    }
            }

            // Static functions 
            static function selectDateProperty() {
                    if (!is_null(self::$newDate)) {
                            return self::$newDate;
                    } else {
                            return self::$today;
                    }
            }

            static function timestamp() {
                    return date(self::$formatDate . ' '. self::$formatTime);
            }


            static function Date() {
                    return date(self::$formatDate);
            }

            static function addDay() {
                    $date = self::selectDateProperty();

                    // Calc new date 
                    $next = date(self::$formatDate, strtotime($date. " +1 day"));

                    // assign the date to the propertie
                    self::$newDate = $next;

                    // Return the new calc date
                    return $next;
            }

            static function addMonth() {
                    $date = self::selectDateProperty();

                    // Calc new date 
                    $next = date(self::$formatDate, strtotime($date. " +1 month"));

                    // assign the date to the propertie
                    self::$newDate = $next;

                    // Return the new calc date
                    return $next;
            }

            static function addYear() {
                    $date = self::selectDateProperty();

                    // Calc new date 
                    $next = date(self::$formatDate, strtotime($date. " +1 year"));

                    // assign the date to the propertie
                    self::$newDate = $next;

                    // Return the new calc date
                    return $next;
            }

            static function showDay() {
                    $date = self::selectDateProperty();

                    $day = date('l', strtotime($date));

                    return $day;
            }

            static function showWeek() {
                    $date = self::selectDateProperty();

                    $week = date('W', strtotime($date));

                    return $week;
            }

            static function showMonth() {
                    $date = self::selectDateProperty();

                    $month = date('F', strtotime($date));

                    return $month;
            }

            static function showyear() {
                    $date = self::selectDateProperty();

                    $month = date('Y', strtotime($date));

                    return $month;
            }

            // Void static function
            static function resetDate() {
                    self::$newDate = null;
            }
    }