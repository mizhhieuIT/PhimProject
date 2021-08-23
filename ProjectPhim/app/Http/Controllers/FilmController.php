<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\repository\film\filminterface;
use App\Models\film;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Exit_;
use Symfony\Component\VarDumper\Cloner\Data;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $filmRepo ;
    public function __construct(filminterface $filmRepo)
    {
        $this->filmRepo = $filmRepo;
    }
    public function index()
    {
        $film = $this->filmRepo->getAll();
        return view('admin.pages.film.view-film',["data"=>$film]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = new category();
        $datacate = $cate->all();
        return view('admin.pages.film.view-createfilm',["data"=> $datacate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $respon = $this->filmRepo->createFilm($request);
        return redirect()->route('view.listfilm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $datacate = new category();
        $datac = $datacate->all();
        $dataf = $this->filmRepo->findFilm($id);
        $data = [
            "cate" => $datac,
            "datafilm"=>$dataf
        ];

        return view('admin.pages.film.view-update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)

    {
        //
        $filmdel = $this->filmRepo->updateFilm($request,$id);
        return redirect()->route('view.listfilm');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $filmdel = $this->filmRepo->deleteFilm($id);
        return redirect()->route('view.listfilm');
    }
}
