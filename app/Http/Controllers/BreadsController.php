<?php

namespace App\Http\Controllers;

use App\Models\Breads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * @throws \Exception
     */
    public function generateQr(Request $request)
    {
        DB::beginTransaction();
        try {
            Log::info("Generating QR Code: " . now());
            list($r, $g, $b) = sscanf($request->post('bgColor'), "#%02x%02x%02x");
            $request->merge([
                'qr_generated' => $this->generateQruid(),
                'r' => (int) $r,
                'g' => (int) $g,
                'b' => (int) $b
            ]);
            $data['content'] = $request->all();

            Breads::create($request->except('bgColor', 'rgb', 'r', 'g', 'b'));
            DB::commit();

            return view('qr-list', $data);
        }
        catch (\Exception $exception){

            $errorMsg = [
                'line' => $exception->getLine(),
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'file' => $exception->getFile(),
                'exception_data' => $exception
            ];

            Log::error("Error in Generating of QR", $errorMsg);
            DB::rollBack();

            throw new \Exception('Error generating QR Code');
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Breads  $breads
     * @return \Illuminate\Http\Response
     */
    public function show(Breads $breads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Breads  $breads
     * @return \Illuminate\Http\Response
     */
    public function edit(Breads $breads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Breads  $breads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breads $breads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Breads  $breads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breads $breads)
    {
        //
    }

    private function generateQruid() {
        return Str::limit(time(), 10);
    }
}
