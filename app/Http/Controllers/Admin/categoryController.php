<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\categories;
use App\Model\products;
use App\Model\producttype;
use App\Model\posts;
use App\Model\policies;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();
        return view('admin.category.index')->width([
            'category', $category
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
        $category = categories::all();
        return view('admin.category.add')->width(['category', $category]);
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
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'name_link' => convert_name($request->name)
            ];
            $dataUploadImage = $this->storageTraitUpload($request, 'image', 'category');
            if (!empty($dataUploadImage)) {
                $data['image'] = $dataUploadImage['file_path'];
            }
            $category = Category::create($data);
            DB::commit();
            return redirect()->route('categories.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }

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
        //
        $category = category::find($id);
        if ($category) {
            return view('admin.category.edit')->with('category', $category);
        }
        else{
            return redirect()->route('categories.index');
        }
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $category = Category::find($id);
            if ($category) {
                DB::beginTransaction();
                $data = [
                    'name' => $request->name,
                    'user_id' => Auth::user()->id,
                    'name_link' => convert_name($request->name)
                ];
                $dataUploadImage = $this->storageTraitUpload($request, 'image', 'category');
                if (!empty($dataUploadImage)) {
                    $data['image'] = $dataUploadImage['file_path'];
                }
                $category = $category->update($data);
                DB::commit();
                return redirect()->route('categories.index');
            } else {
                return redirect()->route('categories.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $category = Category::find($id);
            if ($category) {
                DB::beginTransaction();
                $category->delete();
                DB::commit();
                return redirect()->route('categories.index');
            } else {
                return redirect()->route('categories.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }
    }
}
