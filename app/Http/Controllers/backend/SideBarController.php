<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Contact;
use App\Models\BulkOrder;

class SideBarController extends Controller
{
    //

    public function contact_index()
    {
        $forms = Contact::latest()->get();
        $no = 1;
        return view('backend.contactform.index', compact('forms', 'no'));
    }

    public function vendor_index()
    {
        $forms = Vendor::latest()->get();
        $no = 1;
        return view('backend.vendorform.index', compact('forms', 'no'));
    }

    public function bulkproduct_index()
    {
        $forms = BulkOrder::latest()->get();
        $no = 1;
        return view('backend.bulkorderform.index', compact('forms', 'no'));
    }

    public function contact_destroy($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Form Deleted !.');
    }

    public function vendor_destroy($id)
    {

        Vendor::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Form Deleted !.');
    }

    public function bulkorder_destroy($id)
    {
        BulkOrder::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Form Deleted !.');
    }
}
