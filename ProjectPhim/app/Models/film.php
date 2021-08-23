<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    protected $table = 'film';
    protected $primaryKey = 'id_film';
    protected $filllabel=[

        'name_film',
        'date_film',
        'des_film',
        'linkimg_film',
        'id_cate',
        'created_at',
        'updated_at'
    ];
    public function id_category(){
        return $this->belongsTo(category::class,'id_cate');
    }
}
