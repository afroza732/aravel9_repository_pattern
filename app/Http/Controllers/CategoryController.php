<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\interface\CategoryInterface;
use App\Repositories\repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $category;
    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        return response()->json([
            "status" => true,
            "data"   => $this->category->list()
        ]);
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

        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'description' => 'required',
        ]);
        if ($validator->passes()) {
            $this->category->store($request->all());
            return response()->json([
                'status'       => true,
                'message'      => "Created successfully!",
            ],200);
        }

        return response()->json(['errors' => $validator->errors()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this->category->get($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'description' => 'required',
        ]);
        if ($validator->passes()) {
            $this->category->update($category,$request->all());
            return response()->json([
                'status'       => true,
                'message'      => "Updated successfully!",
            ],200);
        }

        return response()->json(['errors' => $validator->errors()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->destroy($id);
        return response()->json([
            'status'       => true,
            'message'      => "Deleted successfully!",
        ],200);
    }
}
