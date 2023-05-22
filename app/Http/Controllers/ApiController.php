<?php

namespace App\Http\Controllers;

use App\Models\Breads;
use App\Models\Inventories;
use App\Models\ScanLogs;
use App\Models\Settings;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function getConfiguration()
    {
        $settings = Settings::latest()->get()->first();

        return response()->json($settings);
    }

    public function readScannerInfo($inputString)
    {
        /*
         * Update existing logs to done
         */

        $inputString = str_replace(' ', '', $inputString);
        $updateLogs = ScanLogs::where('status', 'Pending')->update([
            'status' => 'Completed'
        ]);


        $qr_generated = Breads::where('qr_generated', $inputString)
            ->latest()
            ->first();
        /*
         * Save the scan logs
         */

        $remarks = "out";

        if ($qr_generated) {
            $settings = Settings::find(1);
            if ($settings->scanner_status == "on") {
                $remarks = "in";

            }
            if ($settings->scanner_status_out == "on") {
                $remarks = "out";

                if ($qr_generated->quantity >= 1){
                    Breads::where('id', $qr_generated->id)
                        ->decrement('quantity', 1);
                } else {

                    return response()->json(['message' => 'Out of Stocks']);
                }

            }


            /*
                         * Update the inventory for sales in out
                         */

            Inventories::create([
                'breads_id' => $qr_generated->id,
                'remarks' => 'Inventory '.$remarks,
                'type' => $remarks,
                'price' => $qr_generated->price,
                'quantity' => 1
            ]);

            $scan_logs = ScanLogs::create([
                'breads_id' => $qr_generated->id,
                'remarks' => $remarks,
                'quantity' => 1,
                'status' => 'Pending'
            ]);

            $echo = "Qty" . $qr_generated->quantity . "\nP" .$qr_generated->price. "\nExp:" . $qr_generated->expiration_date;

            return response()->json([
                'q' => $qr_generated->quantity,
                'p' => $qr_generated->price,
                'e' => $qr_generated->expiration_date
            ]);
        }
        else {
            return response('Invalid QR');
        }


    }

    public function readScannerInfoTest(Request $request)
    {
        $qr_generated = Breads::where('qr_generated', $request->get('qr'))
            ->latest()
            ->first();

        /*
         * Save the scan logs
         */

        if ($qr_generated) {
            $scan_logs = ScanLogs::create([
                'breads_id' => $qr_generated->id,
                'remarks' => $request->get('type'),
                'quantity' => 1,
                'status' => 'Pending'
            ]);

            return response()->json($qr_generated);
        }
        else {
            return response()->json([
                'message' => 'No QR Found'
            ]);
        }


    }

    public function getScanLogsIn()
    {
        $settings = Settings::find(1);

        $remarks = "out";

        if ($settings->scanner_status == "on") {
            $remarks = "in";
        }
        if ($settings->scanner_status_out == "on") {
            $remarks = "out";
        }

        $scanLogs = ScanLogs::where('status', 'Pending')
            ->where('remarks', $remarks)
            ->latest()->first();

        if ($scanLogs){
            $bread_info = Breads::where('id', $scanLogs->breads_id)
                ->latest()
                ->first();

            $data = [
                $scanLogs,
                $bread_info
            ];

            return response()->json($data);
        }
    }

    public function getScanLogsOut()
    {
        $scanLogs = ScanLogs::where('status', 'Pending')
            ->where('remarks', 'out')
            ->latest()->first();

        if ($scanLogs){
            $bread_info = Breads::where('id', $scanLogs->breads_id)
                ->latest()
                ->first();

            $data = [
                $scanLogs,
                $bread_info
            ];

            return response()->json($data);
        }


    }

    public function updateScanner(Request $request)
    {
        Breads::find($request->post('id'))
            ->update($request->except('scan_id'));

        ScanLogs::find($request->post('scan_id'))
            ->update([
                'status' => 'Completed'
            ]);

        return redirect()->back();
    }
}
