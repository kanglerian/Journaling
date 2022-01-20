<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailNgaos extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_ngaos';

    protected $fillable = [
        'bulan_ngaos','juz','surah','ayat','status'
    ];

    public function ngaos(){
        return $this->belongsTo(Ngaos::class,'bulan_ngaos','id');
    }
}
