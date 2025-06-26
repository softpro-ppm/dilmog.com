<?php
namespace App\Http\Controllers\FrontEnd;

use App\Deliverycharge;
use App\History;
use App\Http\Controllers\Controller;
use App\Merchant;
use App\Booking;
use App\Parcelnote;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel; 
use Mail;
use Session;
use App\Parcel;
use App\Logo;


class TrackingController extends Controller
{
    public function __construct() {
        $favicon = Logo::where('type', 3)->where('status', 1)->orderByDesc('id')->first();
        view()->share('favicon', $favicon ? asset($favicon->image) : asset('favicon.png'));
    }

    public  function tracking(Request $request){
        if(isset($_GET['trackingCode'])){
            $track = $_GET['trackingCode'];
        }else{
            $track = 'null';
        }
        $parcel = DB::table('parcels')
           ->where('trackingCode', 'LIKE', '%'.$track.'%')
           ->get();

        $count = $parcel->count();

        return view('frontEnd.layouts.pages.tracking',compact('parcel','count'));
    }
 
}