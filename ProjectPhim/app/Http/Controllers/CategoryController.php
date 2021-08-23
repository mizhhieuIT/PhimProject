<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\repository\category\categoryinterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    private $CategoryRepo ;
    public function __construct(categoryinterface $CategoryRepo)
    {
        $this->CategoryRepo = $CategoryRepo;
    }
    public function index()
    {
        //
        $category = $this->CategoryRepo->getAll();
        // print_r($category);
        // exit();
        return view('admin.pages.Category.view-cate',["data"=>$category]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $categorysave = $this->CategoryRepo->createCategory($request);
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $categoryud = $this->CategoryRepo->UpdateCategory($request,$id);
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorysave = $this->CategoryRepo->deleteCategory($id);
        return redirect()->route('admin.index');
    }
    public function getcate($id){
        $cate = $this->CategoryRepo->GetCategory($id);
        return $cate;

    }
}
