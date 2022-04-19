<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use App\Model\producttype;
use App\Model\categories;
use App\Traits\StorageImageTrait;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;

class ProducttypeController extends Controller
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
        $producttype = producttype::all();
        return view('admin.producttype.index')->with([
            'producttype' => $producttype
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
        $producttype = producttype::all();
        return view('admin.producttype.add')->with([
            'producttye' => $producttype,
            'category' =>$category
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
        
            DB::beginTransaction();
            $data = [

                'categories_id' => $request->input('categories_id'),
                'type' => $request->type,
                'name_link' => $request->type
            ];
           
            $producttye = producttype::create($data);
            DB::commit();
            return redirect()->route('producttype.index');
       
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
        $producttye = producttype::find($id);
        $category = Categories::all();
        if ($producttye) {
            return view('admin.producttype.edit')->with([
                'producttype'=> $producttye,
                'category' => $category
        ]);
        }
        else{
            return redirect()->route('producttype.index');
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
            $producttye = producttype::find($id);
            if ($producttye) {
                DB::beginTransaction();
                $data = [
                    'categories_id' => $request->input('categories_id'),
                    'type' => $request->type,
                    'name_link' => $request->type
                ];
                $producttye = $producttye->update($data);
                DB::commit();
                return redirect()->route('producttype.index');
            } else {
                return redirect()->route('producttype.index');
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
            $producttype = producttype::find($id);
            if ($producttype) {
                DB::beginTransaction();
                $producttype->delete();
                DB::commit();
                return redirect()->route('producttype.index');
            } else {
                return redirect()->route('producttype.index');
            }
            
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }
    }
}
