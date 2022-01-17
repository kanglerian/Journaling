<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ngaos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ngaos';

    protected $fillable = [
        'tanggal','target'
    ];

    public function detailngaos(){
        return $this->hasMany(DetailNgaos::class,'bulan_ngaos');
    }

}
