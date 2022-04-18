<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use App\Model\Categories;


class CategoryController extends Controller
{
    use StorageImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   
        $category = Categories::all();
        return view('admin.category.index')->with([
            'category'=> $category
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
        $category = Categories::all();
        return view('admin.category.add')->with([
            'category'=> $category
        ]);

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
                'use_id' => Auth::user()->id,
                'name_link' => $request->name
            ];
            
            $dataUploadImage = $this->storageTraitUpload($request, 'image', 'category');
            if (!empty($dataUploadImage)){
                $data['image'] = $dataUploadImage['file_path'];
            }
            $category = Categories::create($data);  
            DB::commit();
            return redirect()->route('categories.index');
        } catch (\Exception $exception){
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
        $category = categories::find($id);
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
            $category = Categories::find($id);
            if ($category) {
                DB::beginTransaction();
                $data = [
                    'name' => $request->name,
                    'use_id' => Auth::user()->id,
                    'name_link' => $request->name
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
            $category = Categories::find($id);
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
