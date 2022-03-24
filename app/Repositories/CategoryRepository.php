<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\ICategoryRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{


    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    public function CreateCategory($request)
    {
        // $category = new Category();
        $category = $this->model;
        $category->name = $request->name;
        $category->main_category_id = $request->main_category_id;
        $category->save();
        flash('Successfully Created')->success();
    }
    public function UpdateCategory($request, $id)
    {
        $category = $this->myFind($id);
        if (!$category) {
            return false;
        }
        $category->name = $request->name;
        $category->main_category_id = $request->main_category_id;
        $category->save();
        flash('Successfully Updated')->success();
        return true;
    }
}
