<?php
    //Author            : Apostolos Marcelo
    //Date Created      : 21-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 21-02-2023
    //Filename          : date.php
    //Version           : 1.0

    //Class Date
    class Date {

        //Properties
        private int $day;
        private int $month;
        private int $year;
        private int $hours;
        private int $minutes;
        private int $seconds;

        //Constructor
        public function __construct(int $day, int $month, int $year, int $hours, int $minutes, int $seconds) {
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
            $this->hours = $hours;
            $this->minutes = $minutes;
            $this->seconds = $seconds;
        }

        //Setters
        public function setDay(int $day) {
            $this->day = $day;
        }

        public function setMonth(int $month) {
            $this->month = $month;
        }

        public function setYear(int $year) {
            $this->year = $year;
        }

        public function setHours(int $hours) {
            $this->hours = $hours;
        }

        public function setMinutes(int $minutes) {
            $this->minutes = $minutes;
        }

        public function setSeconds(int $seconds) {
            $this->seconds = $seconds;
        }

        //Getters
        public function getDay() {
            return $this->day;
        }
    
        public function getMonth() {
            return $this->month;
        }

        public function getYear() {
            return $this->year;
        }

        public function getHours() {
            return $this->hours;
        }

        public function getMinutes() {
            return $this->minutes;
        }

        public function getSeconds() {
            return $this->seconds;
        }

        public function generateDateTimeString() {
            $date_time = $this->day."-".$this->month."-".$this->year." - ".$this->hours.":".$this->minutes.":".$this->seconds;
            return $date_time;
        }

        public function generateTimeString() {
            $date_time = "".$this->hours.":".$this->minutes.":".$this->seconds;
            return $date_time;
        }

        public function generateDateString() {
            if($this->month < 10) {
                $month = "0".$this->month;
            } else {
                $month = "".$this->month;
            }
            if($this->day < 10) {
                $day = "0".$this->day;
            } else {
                $day = "".$this->day;
            }
            $date = "".$this->year."-".$month."-".$day;
            return $date;
        }
    }
?>