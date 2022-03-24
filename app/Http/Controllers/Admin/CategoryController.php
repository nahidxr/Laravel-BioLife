<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Enums\MainCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\ICategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }


    public function index()
    {
        $data["category_list"] = $this->categoryRepo->myGet();
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["main_category"] = MainCategory::asSelectArray();
        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $category = new Category();
        // $category->name = $request->name;
        // $category->main_category_id = $request->main_category_id;
        // $category->save();
        // flash('Successfully Created')->success();
        $this->categoryRepo->CreateCategory($request);
        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // $category = Category::find($id);
        $category = $this->categoryRepo->myFind($id);
        if (!$category) {
            flash('No Item Found')->error();
            return redirect('/admin/categories');
        }
        $data["category"] = $category;

        $data["main_category"] = MainCategory::asSelectArray();
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // $category = Category::find($id);
        // $category = $this->categoryRepo->myFind($id);

        // if (!$category) {
        //     flash('No Item Found')->error();
        //     return redirect('/admin/categories');
        // }
        // $category->name = $request->name;
        // $category->main_category_id = $request->main_category_id;
        // $category->save();
        // flash('Successfully Updated')->success();

        $status = $this->categoryRepo->UpdateCategory($request, $id);
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $category = Category::find($id);
        // if (!$category) {
        //     flash('No Item Found')->error();
        //     return redirect('/admin/categories');
        // }
        // $category->delete();
        // flash('Successfully Deleted')->success();
        $this->categoryRepo->myDelete($id);
        return redirect('/admin/categories');
    }
}
