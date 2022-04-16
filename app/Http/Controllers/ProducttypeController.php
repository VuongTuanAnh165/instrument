<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\producttype;
class ProducttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producttye = producttye::all();
        return view('admin.producttype.index')->with([
            'producttye' => $producttye
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
        $producttye = producttye::all();
        return view('admin.producttype.add')->with([
            'producttye' => $producttye
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
                'category_id' => $request->category_id,
                'type' => $request->type,
                'name_link' => convert_name($request->name)
            ];
            $categproducttyeory = producttye::create($data);
            DB::commit();
            return redirect()->route('producttye.index');
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
        $producttye = producttye::find($id);
        if ($producttye) {
            return view('admin.producttye.edit')->with('producttye', $producttye);
        }
        else{
            return redirect()->route('producttye.index');
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
            $producttye = producttye::find($id);
            if ($producttye) {
                DB::beginTransaction();
                $data = [
                    'category_id' => $request->category_id,
                    'type' => $request->type,
                    'name_link' => convert_name($request->name)
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
            $producttye = producttye::find($id);
            if ($producttye) {
                DB::beginTransaction();
                $producttye->delete();
                DB::commit();
                return redirect()->route('producttye.index');
            } else {
                return redirect()->route('producttye.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }
    }
}
