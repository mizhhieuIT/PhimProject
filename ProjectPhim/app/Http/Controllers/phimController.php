<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\repository\film\filminterface;
use App\Models\film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Exit_;
use Symfony\Component\VarDumper\Cloner\Data;

class phimController extends Controller
{

    public function index()
    {
        $datacate = new category();
        $datac = $datacate->all();
        $film = new film();
        $dataf = $film->all();
        $data = [
            "cate" => $datac,
            "datafilm"=>$dataf
        ];
        return view('welcome',$data);
    }

}
