<?php

namespace App\Http\Controllers\Vendor;

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
    public function index()
    {
        $title = "Dashboard";

        $widget['total_unpaid_bills'] = Transaction::count();
        $widget['total_pending_payments'] = Payment::where('status', 'Pending')->count();
        $widget['total_committee'] = Committee::count();
        $widget['total_vendor'] = Calendar::where('startDate', '>', date('YYYY-m-d H:s:i'))->count();
        $widget['total_work_orders'] = WorkOrder::count();
        $widget['work_orders'] = WorkOrder::get();
        $widget['bills'] = Transaction::get();
        $widget['total_bills'] = Transaction::count();
        $widget['total_bill_amount'] = Transaction::sum('amount');
        $widget['announcements'] = Announcement::whereIn('forUser', ['Vendors Only', 'Both'])->get();
        $widget['announcemen'] = Announcement::whereIn('forUser', ['Vendors Only', 'Both'])->get();
        return view('vendor.dashboard', compact('title', 'widget'));
    }
}
