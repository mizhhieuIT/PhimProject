<?php
namespace App\repository\category ;
use App\Models\category;
use Illuminate\Database\Eloquent\Model;
interface categoryinterface{
    public function createCategory($payload);
    //public function updateCategory($payload);
    public function deleteCategory($id);
    public function getAll();
    public function GetCategory($id);
    public function UpdateCategory($payload,$id);
}
