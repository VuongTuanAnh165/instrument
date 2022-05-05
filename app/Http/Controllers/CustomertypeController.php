<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Customertype;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response as HttpResponse;

class CustomertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customertypes = Customertype::all();
        return view('admin.customertype.index')->with([
            'customertypes' => $customertypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customertype.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'user_id' => Auth::user()->id
            ];
            $customertype = Customertype::create($data);
            DB::commit();
            return redirect()->route('customertypes.index');
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
        $customertype = Customertype::find($id);
        if ($customertype) {
            return view('admin.customertype.edit')->with([
                'customertype' => $customertype,
            ]);
        } else {
            return redirect()->route('customertypes.index');
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
        try {
            $customertype = Customertype::find($id);
            if ($customertype) {
                DB::beginTransaction();
                $data = [
                    'name' => $request->name,
                    'user_id' => Auth::user()->id
                ];
                $customertype = $customertype->update($data);
                DB::commit();
                return redirect()->route('customertypes.index');
            } else {
                return redirect()->route('customertypes.index');
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
        try {
            $customertype = Customertype::find($id);
            if ($customertype) {
                DB::beginTransaction();
                $customertype = $customertype->delete();
                DB::commit();
                return redirect()->route('customertypes.index');
            } else {
                return redirect()->route('customertypes.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }
    }
}
