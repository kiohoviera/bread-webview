<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use App\Models\ScanLogs;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
        return view('application.home');
    }

    public function enable()
    {

    }

    public function scanner()
    {
        $settings = Settings::find(1);
        $remarks = "NA";
        if ($settings->scanner_status == "on") {
            $remarks = "in";
        }
        if ($settings->scanner_status_out == "on") {
            $remarks = "out";
        }
        $updateLogs = ScanLogs::where('status', 'Pending')->update([
            'status' => 'Completed'
        ]);


        return view('application.scanner', compact('remarks'));
    }
    public function scannerOut()
    {
        return view('application.scanner-out');
    }

    public function secure()
    {
        return view('application.secure');
    }

    public function verify(Request $request)
    {
        $verify = Settings::where('password_set', $request->post('password_set'))
            ->count();

        if ($verify > 0){
            return redirect('/application/home');
        }

        return redirect()->back()->with([
            'message' => 'Invalid Identification'
        ]);
    }

    public function home()
    {

        $data['inventoryIn'] = Inventories::latest()
            ->whereDate('created_at', Carbon::today())
            ->where('type', 'in')
            ->get()
            ->count();

        $data['inventoryOut'] = Inventories::latest()
            ->whereDate('created_at', Carbon::today())
            ->where('type', 'out')
            ->get()
            ->count();

        $data['todaySales'] = Inventories::latest()
            ->whereDate('created_at', Carbon::today())
            ->get()
            ->sum('price');

        $data['monthlySales'] = Inventories::latest()
            ->whereMonth('created_at', Carbon::today())
            ->get()
            ->sum('price');


        return view('application.dashboard', $data);
    }

    public function scannerLogs()
    {
        $data['scanLogs'] = ScanLogs::with('bread')
                                    ->latest()->get();

        return view('application.scan-logs', $data);
    }

    public function settings()
    {
        $settings = Settings::find(1);

        return view('application.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $settings = Settings::find(1);

        $scanner_in = "";
        $scanner_out = "";

        $scanner_request = $request->post('scanner');

        if ($scanner_request == "in") {
            $scanner_in = "on";
            $scanner_out = "off";
        } else {
            $scanner_in = "off";
            $scanner_out = "on";
        }

        $settings->update([
            'password_set' => $request->post('password_set'),
            'scanner_status' => $scanner_in,
            'scanner_status_out' => $scanner_out
        ]);

        return redirect()->back();
    }
}
