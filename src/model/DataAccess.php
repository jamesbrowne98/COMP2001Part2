<?php

include_once 'statistics_crime.php';

class DataAccess
{
    public function Statistics_Crime()
    {
        //extracts the data and returns all the items as an array
        $crimes = [];
        $headers = [];

        $file = fopen('../assets/data/PlymouthCrimes.csv', 'r');

        if($file)
        {
            $lineCount = 0;

        while($data = fgetcsv($file, 1000, ","))
        {
            if ($lineCount > 0) {

                $crim = new Statistics_Crime($data[0], $data[1], $data[2], $data[3]);
                $crimes[] = $crim; //saving to array
                $lineCount++; //Line count adds one
            }
            else
            {
                $headers = $data;
                $lineCount++;
            }
        }
    }

        return $crimes;
    }





}