<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Landingpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response as HttpResponse;
use App\Traits\StorageImageTrait;

class LandingpageController extends Controller
{
    use StorageImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landingpages = Landingpage::all();
        return view('admin.landingpage.index')->with([
            'landingpages' => $landingpages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.landingpage.add');
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
                'link' => $request->link,
                'name_link' => convert_name($request->name),
                'user_id' => Auth::user()->id
            ];
            $dataUploadImage = $this->storageTraitUpload($request, 'image', 'landingpage');
            if (!empty($dataUploadImage)) {
                $data['image'] = $dataUploadImage['file_path'];
            }
            $landingpage = Landingpage::create($data);
            DB::commit();
            return redirect()->route('landingpages.index');
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
        $landingpage = Landingpage::find($id);
        if ($landingpage) {
            return view('admin.landingpage.edit')->with([
                'landingpage' => $landingpage,
            ]);
        } else {
            return redirect()->route('landingpages.index');
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
            $landingpage = Landingpage::find($id);
            if ($landingpage) {
                DB::beginTransaction();
                $data = [
                    'name' => $request->name,
                    'link' => $request->link,
                    'name_link' => convert_name($request->name),
                    'user_id' => Auth::user()->id
                ];
                $dataUploadImage = $this->storageTraitUpload($request, 'image', 'landingpage');
                if (!empty($dataUploadImage)) {
                    $data['image'] = $dataUploadImage['file_path'];
                }
                $landingpage = $landingpage->update($data);
                DB::commit();
                return redirect()->route('landingpages.index');
            } else {
                return redirect()->route('landingpages.index');
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
            $landingpage = Landingpage::find($id);
            if ($landingpage) {
                DB::beginTransaction();
                $landingpage = $landingpage->delete();
                DB::commit();
                return redirect()->route('landingpages.index');
            } else {
                return redirect()->route('landingpages.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return HttpResponse::HTTP_NOT_FOUND;
        }
    }
}
