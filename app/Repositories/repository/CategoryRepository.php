<?php

namespace App\Repositories\repository;

use App\Models\Category;
use App\Repositories\interface\CategoryInterface;

class CategoryRepository implements CategoryInterface{
    public function list(){
        return Category::all();
    }
    public function get($category){
        return $category;
    }
    public function store(array $data){
        return Category::create($data);
    }
    public function update($id,array $data){

    }
    public function delete($id){
        return Category::findOrFail($id)->delete();
    }
}
