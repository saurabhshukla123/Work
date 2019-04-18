<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['id', 'name', 'image'];
    public function countryDelete($id)
    {
        $result =Country::where('id', $id)->delete();
        return $result;
    }

}
