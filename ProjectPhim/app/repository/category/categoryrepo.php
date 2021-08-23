<?php
namespace App\repository\category;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category ;


class categoryrepo implements categoryInterface
{
    protected $category ;
    public function __construct()
    {
        $this->category = new Category();

    }
    public function getAll()
    {
        return $this->category->all();

    }
    public function createCategory($payload)
    {
            $payload =(object)$payload ;
            $category = new category();
            $category->name_cate = $payload->title ;
            $category->save();
    }
    public function deleteCategory($id){
        $catedelete = Category::find($id);
        $catedelete->delete();
    }
    public function GetCategory($id){
        $cate= Category::find($id);
        return $cate;
    }
    public function UpdateCategory($payload,$id){
        $payload =(object)$payload ;
        $cateud = new category();
        $cateud = Category::find($id);
        $cateud->name_cate = $payload->title;
        $cateud->save();
    }


}
