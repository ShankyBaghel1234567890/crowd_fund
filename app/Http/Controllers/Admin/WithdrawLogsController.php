<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawLogsController extends Controller
{
    public function index(){

        $withdrawals = Withdraw::with('campaign', 'user')->get(); // Assuming Withdraw has relationships with Campaign and User
        return view('admin.withdrawlogs',compact('withdrawals'));
    }

    public function approve($id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        $withdrawal->status = 'completed';
        $withdrawal->save();

        return redirect()->route('admin.withdrawlogs')->with('success', 'Withdrawal approved.');
    }

    public function reject($id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        $withdrawal->status = 'rejected';
        $withdrawal->save();

        return redirect()->route('admin.withdrawlogs')->with('success', 'Withdrawal rejected.');
    }

    public function edit($id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        return view('admin.withdrawlogs.edit', compact('withdrawal'));
    }

    public function update(Request $request, $id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        $withdrawal->remarks = $request->input('remarks');
        $withdrawal->save();

        return redirect()->route('admin.withdrawlogs')->with('success', 'Withdrawal updated.');
    }
}
