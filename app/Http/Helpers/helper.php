<?php
use App\Models\Calendar;
use App\Models\Document;
use App\Models\Events;
use App\Models\Settings;


function activeTemplate()
{
    $front = Settings::where('key', 'website_frontend')->firstOrFail();
    return $front->description;
}
function getPageSections($arr = false)
{
    $jsonUrl = resource_path('views/frontend/') . str_replace('.', '/', activeTemplate()) . '/sections.json';
    $sections = json_decode(file_get_contents($jsonUrl));

    if ($arr) {
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);
    }

    return $sections;
}

function keyToTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}


function getImage($image, $size = null)
{
    $clean = '';

    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }

    if ($size) {
        return route('placeholder.image', $size);
    }

    return asset('assets/images/default.png');
}

function settings($key, $exeception = null)
{
    $setting = Settings::where('key', $key)->first();
    if ($setting) {
        return $setting->description;
    } else {
        return $exeception;
    }
}

function setting_list($key)
{

    $setting = Settings::select('description')->where('key', $key)->get();
    return $setting;
}

function setting_update($key, $update_value)
{

    $setting = Settings::where('key', $key)->firstOrFail();

    $setting->update([
        "description" => $update_value
    ]);
}
function events()
{
    return Calendar::limit(5)->orderBy('id', 'DESC')->get();
}
function documents()
{
    return Document::limit(5)->get();
}
function contacts()
{
    return array("Email", "Phone", "Address", "Address1");
}
function forUser()
{
    return array("Members Only", "Vendors Only", "Both");
}

function propertyStatus()
{
    return array('Owned', 'Rented', 'Vacant', 'Under Construction', 'For Sale', 'Other');
}

function priority_level()
{
    return array('High Priority', 'Medium Priority', 'Low Priority', 'Routine Maintenance', 'Scheduled/Planned', 'Deffered', 'No Priority/Unassigned', 'Emergency', 'Non-Emergency', 'On-Hold', 'Scheduled Maintenance', 'Customer-Requested');
}

function workOrder_Status()
{
    return array(
        'New',
        'Assigned',
        'In Progress',
        'On Hold',
        'Completed',
        'Canceled',
        'Reopened'
        ,
        'Overdue',
        'Scheduled',
        'Pending Approval',
        'In Review',
        'Customer-Requested'
    );
}

function transactionStatus()
{
    return array('Paid', 'Unpaid');
}
function paymentStatus()
{
    return array('Paid', 'Pending', 'Declined');
}

function social_icon()
{
    return Settings::where('key', 'social_icon')->get();
}