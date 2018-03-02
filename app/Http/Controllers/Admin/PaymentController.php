<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Request('search')) {
            $search = Request('search');
            $payments = Payment::
            where('name', 'like', '%' . $search . '%')
                ->orWhere('payment_id', 'like', '%' . $search . '%')
                ->orWhere('national_id', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('mobile', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->paginate(20);
        }
        elseif (Request('status')) {
            $status = Request('status');
            $payments = Payment::where('status',$status)->orderBy('id', 'desc')->paginate(20);
        }

        else {
            $payments = Payment::orderBy('id', 'desc')->paginate(20);
        }
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return $payment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        if ($payment->status > 1) {
            $payment->delete();
            return back()->with('success', 'پرداخت مورد نظر از سیستم حذف شد.');
        } else {
            return back()->with('error', 'درخواست مورد نظر قابل اجرا نیست .');
        }
    }

    public function status(Payment $payment, Request $request)
    {
        if ($payment && $payment->status == 0) {
            $payment->status = $request->status;
            $payment->save();
            return back()->with('success', 'تغییر وضعیت پرداخت با موفقیت انجام شد.');
        } else {
            return back()->with('error', 'درخواست مورد نظر قابل اجرا نیست ، یا قبلا انجام شده.');
        }
    }
}
