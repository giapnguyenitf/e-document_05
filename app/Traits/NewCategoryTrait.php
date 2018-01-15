<?php
namespace App\Traits;

use Auth;
use App\Models\Category;

trait NewCategoryTrait
{
    public function addNewCategory($request)
    {
        $category = new Category;
        $category->name = trim($request->new_category);
        $category->user_id = Auth::user()->id;
        $category->parent_id = $request->parent_category;
        $category->save();

        $new_category = $category->where('name', 'like', trim($request->new_category));
        $category_id = $new_category->first()->id;

        return $category_id;
    }
}
?>
