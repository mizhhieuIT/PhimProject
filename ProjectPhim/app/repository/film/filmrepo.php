<?php
namespace App\repository\film;

use App\Models\category;
use App\Models\film;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Exit_;

class filmrepo implements filminterface{
    protected $filmgory ;
    public function __construct()
    {
        $this->filmgory = new film();

    }
    public function getAll()
    {
        $data =  DB::table('film')
                ->join('category','film.id_cate','=','category.id_cate')
                ->get();
        return $data;

    }
    public function createFilm($payload){
        $payload = (object)$payload;
        $filmcreate = new film();
        $filmcreate->name_film = $payload->namefilm ;
        $filmcreate->date_film = $payload->datefilm ;
        $filmcreate->des_film = $payload->desfilm ;
        $filmcreate->id_cate = $payload->category_id ;
        if($payload->hasFile('imgfilmupload')){
             $file =$payload->imgfilmupload;
             $pathimg = $file->move('uploadfile',$file->getClientOriginalName());
             $filmcreate->linkimg_film = $pathimg;
        }
        $filmcreate->save();

    }
    public function deleteFilm($id){
        $filmdelete = film::find($id);
        $filmdelete->delete();
    }
    public function findFilm($id){
        $film = film::find($id);
        return $film;

    }
    public function updateFilm($payload,$id){
        $fupdated = film::find($id);
        $fupdated->name_film = $payload->namefilm ;
        $fupdated->date_film =  $payload->datefilm ;
        $fupdated->des_film = $payload->desfilm;
        $fupdated->id_cate = $payload->category_id;
        if($payload->hasFile('imgfilmupload')){
            $file =$payload->imgfilmupload;
            $pathimg = $file->move('uploadfile',$file->getClientOriginalName());
            $fupdated->linkimg_film = $pathimg;
       }
        $fupdated->save();
    }
}
