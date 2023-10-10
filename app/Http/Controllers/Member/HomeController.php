<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Billing;
use App\Models\Committee;
use App\Models\Properties;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vendor;
use App\Models\WorkOrder;

class HomeController extends Controller
{
    function dashboard(){
        $title="Dashboard";
        
        $widget['total_unpaid_bills']=Transaction::where('userId',auth()->user()->id)->where('status','Unpaid')->count();
        $widget['total_pending_payments']=Payment::where('userId',auth()->user()->id)->where('status','Pending')->count();
        $widget['total_committee']=Committee::count();
        $widget['total_vendor']=Calendar::where('startDate','>', date('YYYY-m-d H:s:i'))->count();
        $widget['total_work_orders']=WorkOrder::count();
        $widget['work_orders']=WorkOrder::where('requestedBy',auth()->user()->id)->get();
        $widget['bills']=Transaction::where('userId',auth()->user()->id)->get();
        $widget['total_bills']=Transaction::where('userId',auth()->user()->id)->count();
        $widget['total_bill_amount']=Transaction::where('userID',auth()->user()->id)->sum('amount');
        $widget['announcements']=Announcement::get();
        return view('member.dashboard',compact('title','widget'));
    }
}
