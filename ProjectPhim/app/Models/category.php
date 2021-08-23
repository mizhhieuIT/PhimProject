<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id_cate';
    protected $filllabel=[
        'name_cate',
        'created_at',
        'updated_at'
    ];
    public function id_film(){
        return $this->belongsToMany(film::class,'id_film');
    }
}

