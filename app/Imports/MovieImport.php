<?php

namespace App\Imports;

use App\Models\Movie;
use Maatwebsite\Excel\Concerns\ToModel;

class MovieImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Movie([
                    'id' => $row[0],
                    'title'    => $row[1],
                    'genre'    => $row[2],
                    'actor' => $row[3],
                    'poster' => $row[4],
                    'trailer' => $row[5],
                    'rating' => $row[6],
                    'review' => $row[7],

        ]);
    }
}
