<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request){
        $year = $request->input('year', date('Y'));

        // Initialize an array to store monthly totals
        $monthlyTotals = [];
        
        for ($month = 1; $month <= 12; $month++) {
            $monthlyTotals[] = Donation::totalRaisedInMonth($month, $year);
        }

        return view('admin.report', compact('monthlyTotals', 'year'));
    }

}
