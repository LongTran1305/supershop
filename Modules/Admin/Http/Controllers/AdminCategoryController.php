<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories = Category::select('id','c_name','c_title_seo','c_active')->get();

        $viewData = [
            'categories' => $categories
        ];

        return view('admin::category.index',$viewData);
    }

    public function create(){
        return view('admin::category.create');
    }

    public function store(RequestCategory $requestCategory){
        $this->insertOrUpdate($requestCategory);

        return redirect()->back();
    }

    public function edit($id){
        $category = Category::find($id);
        
        return view('admin::category.update',compact('category'));
    }

    public function update(RequestCategory $requestCategory,$id){
        $this->insertOrUpdate($requestCategory,$id);

        return redirect()->back();
    }

    public function insertOrUpdate($requestCategory,$id=''){

            $category = new Category();
            if($id){
                $category = Category::find($id);
            }
            $category->c_name = $requestCategory->c_name;
            $category->c_slug = str_slug($requestCategory->c_name);
            $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->c_name;
            $category->c_description_seo = $requestCategory->c_description_seo ? $requestCategory->c_description_seo : $requestCategory->c_name;
            $category->save();

    }

    public function action($action,$id){
        if ($action)
        {
            $category = Category::find($id);
            switch ($action) {
                case 'delete':
                    $category->delete();
                    break;
                case 'active':
                    $category->c_active = $category->c_active ? 0 : 1;                    
                    $category->save();                                        
                    break;
            };
        }
        
        return redirect()->back();
    }
}
