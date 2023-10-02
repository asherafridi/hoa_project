<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Billing;
use App\Models\BoardMembers;
use App\Models\Committee;
use App\Models\Properties;
use App\Models\Vendor;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    //
    public function index(){
        $title = "Dashboard";
        $widget['total_properties']=Properties::count();
        $widget['total_members']=BoardMembers::count();
        $widget['total_committee']=Committee::count();
        $widget['total_vendor']=Vendor::count();
        $widget['total_work_orders']=WorkOrder::count();
        $widget['work_orders']=WorkOrder::get();
        $widget['bills']=Billing::get();
        $widget['total_bills']=Billing::count();
        $widget['total_bill_amount']=Billing::sum('amount');
        $widget['announcements']=Announcement::get();
        // return $widget;
        return view('admin.dashboard',compact('title','widget'));
    }
}
