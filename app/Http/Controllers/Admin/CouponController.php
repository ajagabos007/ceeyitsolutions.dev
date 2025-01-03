<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function allCoupons(Request $request)
    {
        if($request->search){
            $search = $request->search;
            $pageTitle = "Search Result of $search";
            $coupons = Coupon::where('coupon_code','like',"%$search%")->where('name','like',"%$search%")->paginate(15);
        } else {
            $pageTitle = "All Coupons";
            $coupons = Coupon::latest()->paginate(15);
        } 

        $empty_message = 'No coupons available';

        return view('admin.coupon.allCoupons',compact('pageTitle','coupons','empty_message'));
    }

    public function addCoupons()
    {
        $pageTitle ='Add New Coupon';
        $courses = Course::where([['status',1],['value',1]])->get(['id','title']);
        return view('admin.coupon.addCoupon',compact('pageTitle','courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required|max:100',
            'amount_type' => 'required|numeric|in:1,2',
            'course_id' => 'required|numeric',
            'coupon_amount' => 'required|numeric|min:1',
            'min_order_amount' => 'nullable|numeric|min:0',
            'coupon_code' => 'required|unique:coupons',
            'use_limit' => 'numeric|min:',
            'usage_per_user' => 'numeric|min:',
            'start_date' => 'required|date',
            'end_date' => 'required|after:start_date',

        ],[
            'exam_id.required' => 'Please select the exam'
        ]);

        $coupon = new Coupon();
        $coupon->course_id = $request->course_id;
        $coupon->name = $request->name;
        $coupon->details  = $request->details;
        $coupon->amount_type = $request->amount_type;
        $coupon->coupon_amount = $request->coupon_amount;
        $coupon->min_order_amount = $request->min_order_amount;
        $coupon->coupon_code = strtoupper($request->coupon_code);
        $coupon->use_limit = $request->use_limit;
        $coupon->usage_per_user = $request->usage_per_user;
        $coupon->start_date =  Carbon::parse($request->start_date)->format('Y-m-d');
        $coupon->end_date =  Carbon::parse($request->end_date)->format('Y-m-d');
        $coupon->status = $request->status ? 1:0;
        $coupon->save();
        $notify[]=['success','Coupon added successfully'];
        return back()->withNotify($notify);
    }

    public function edit($id)
    {
        $pageTitle = 'Update Coupon';
        $coupon = Coupon::findOrFail($id);
        $courses = Course::where([['status',1],['value',1]])->get(['id','title']);
        return view('admin.coupon.editCoupon',compact('pageTitle','coupon','courses'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required|max:100',
            'course_id' => 'required|numeric',
            'amount_type' => 'required|numeric|in:1,2',
            'coupon_amount' => 'required|numeric|min:1',
            'min_order_amount' => 'nullable|numeric|min:0',
            'coupon_code' => 'required|unique:coupons,coupon_code,'.$id,
            'use_limit' => 'numeric|min:',
            'usage_per_user' => 'numeric|min:',
            'start_date' => 'required|date',
            'end_date' => 'required|after:start_date',

        ],[
            'exam_id.required' => 'Please select the exam'
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->course_id = $request->course_id;
        $coupon->name = $request->name;
        $coupon->details  = $request->details;
        $coupon->amount_type = $request->amount_type;
        $coupon->coupon_amount = $request->coupon_amount;
        $coupon->min_order_amount = $request->min_order_amount;
        $coupon->coupon_code = strtoupper($request->coupon_code);
        $coupon->use_limit = $request->use_limit;
        $coupon->usage_per_user = $request->usage_per_user;
        $coupon->start_date =  Carbon::parse($request->start_date)->format('Y-m-d');
        $coupon->end_date =  Carbon::parse($request->end_date)->format('Y-m-d');
        $coupon->status = $request->status ? 1:0;
        $coupon->save();
        $notify[]=['success','Coupon updated successfully'];
        return back()->withNotify($notify);
    }
}
