<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Customertype;
use App\Model\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response as HttpResponse;
use App\Traits\StorageImageTrait;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index')->with([
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customertypes = Customertype::all();
        return view('admin.customertype.add')->with([
            'customertypes' => $customertypes,
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
        try {
            DB::beginTransaction();
            $data = $request->only('name', 'phone', 'zalo', 'email', 'address', 'message', 'status', 'customertype_id');
            if(Auth::user()->id){
                $data['user_id'] = Auth::user()->id;
            }
            $customer = Customer::create($data);
            DB::commit();
            return redirect()->route('customers.index');
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
        $customer = Customer::find($id);
        if ($customer) {
            $customertypes = Customertype::all();
            return view('admin.customer.edit')->with([
                'customer' => $customer,
                'customertypes' => $customertypes,
            ]);
        } else {
            return redirect()->route('customers.index');
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
            $customer = Customer::find($id);
            if ($customer) {
                DB::beginTransaction();
                $data = [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'zalo' => $request->zalo,
                    'email' => $request->email,
                    'address' => $request->address,
                    'message' => $request->message,
                    'status' => $request->status,
                    'customertypes_id' => $request->customertypes_id,
                ];
                if(Auth::user()->id){
                    $data['user_id'] = Auth::user()->id;
                }
                $customer = $customer->update($data);
                DB::commit();
                return redirect()->route('customers.index');
            } else {
                return redirect()->route('customers.index');
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
            $customer = Customer::find($id);
            if ($customer) {
                DB::beginTransaction();
                $customer = $customer->delete();
                DB::commit();
                return redirect()->route('customers.index');
            } else {
                return redirect()->route('customers.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }
    }
}
