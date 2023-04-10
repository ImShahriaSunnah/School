<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\School;
use App\Models\Transection;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\AccesoriesType;
use App\Models\InstituteClass;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\AccesoriesTransaction;


class ExpenseController extends Controller
{
    //

    //expense list show 

    public function expenselist(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {

            $date = $request;
            if (isset($request->searchdate)) {
                if (isset($request->enddate)) {

                    $expense = Transection::where('status', true)->whereBetween('datee', [$request->searchdate, $request->enddate])->where('type', 1)->orderBy('created_at', 'asc')->get();
                    $sumFund = Transection::where('status', true)->whereBetween('datee', [$request->searchdate, $request->enddate])->where('type', 1)->sum('amount');
                    $defaultDate = Carbon::today()->format('Y-m-d');
                    return view('frontend.school.expense.table')->with(compact('expense', 'sumFund', 'defaultDate'));
                } else {

                    $expense = Transection::where('status', true)->wheredate('datee', $request->searchdate)->where('type', 1)->orderBy('created_at', 'asc')->get();
                    $sumFund = Transection::where('status', true)->wheredate('datee', $request->searchdate)->where('type', 1)->sum('amount');
                    $defaultDate = Carbon::today()->format('Y-m-d');
                    return view('frontend.school.expense.table')->with(compact('expense', 'sumFund', 'defaultDate'));
                }
            } elseif (isset($request->searchmonth)) {
                $transectionMonth = Transection::where('status', true)->orderBy('created_at', 'asc')->get();
                $searchmonth = $request->searchmonth;
                $sumFund = Transection::where('status', true)->whereMonth('datee', $request->searchmonth)->where('type', 1)->sum('amount');
                $expense = Transection::where('status', true)->whereMonth('datee', $request->searchmonth)->where('type', 1)->orderBy('created_at', 'asc')->get();
                $defaultDate = Carbon::today()->format('Y-m-d');
                return view('frontend.school.expense.table')->with(compact('sumFund', 'expense', 'searchmonth', 'defaultDate'));
            } else {

                $expense = Transection::where('status', true)->where('type', 1)->latest()->get();
                $sumFund = Transection::where('status', true)->where('type', 1)->sum('amount');
                $defaultDate = Carbon::today()->format('Y-m-d');
                return view('frontend.school.expense.table', compact('expense', 'sumFund', 'defaultDate'));
            }
        }
    }

    /** --------------- expense data table
     * =============================================*/
    public function expensecreate()
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            return view('frontend.school.expense.form');
        }
    }
    /** --------------- Store expense
     * =============================================*/
    public function expensestore(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $request->validate([

                'datee'  => 'required',
                'amount'  => 'required|integer',
                'purpose'  => 'required',
                'payment_method' => 'required',
                'type' => 'required',
                'name' => 'required',


            ]);

            $data = $request->all();
            $data['school_id'] = Auth::user()->id;

            // return $data;

            $expense = Transection::create($data);

            if ($request->type == 1) {
                return redirect()->route('expense.show')->with('success', 'Record created successfully');
            } else {
                return redirect()->route('fund.show')->with('success', 'Record created successfully');
            }
        }
    }
    /** --------------- expense data edit
     * =============================================*/
    public function expenseedit(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $key = $request->key;
            $expense = Transection::find($key);

            return view('frontend.school.expense.form')->with(compact('expense'));
        }
    }
    /** --------------- Update expense
     * =============================================*/
    public function expenseupdate(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $key = $request->key;

            $request->validate([

                'datee'  => 'required',
                'amount'  => 'required|integer',
                'purpose'  => 'required',
                'payment_method' => 'required',
                'type' => 'required',
                'name' => 'required',
            ]);


            $data = $request->except("key");
            $data['school_id'] = Auth::user()->id;

            $expense = Transection::find($key)->update($data);

            if ($request->type == 1) {
                return redirect()->route('expense.show')->with('success', 'Record created successfully');
            } else {
                return redirect()->route('fund.show')->with('success', 'Record created successfully');
            }
        }
    }
    /** --------------- Delete expense
     * =============================================*/
    public function expensedestroy(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $key = $request->key;

            $expense = Transection::destroy($key);

            if ($request->type == 1) {
                return redirect()->route('expense.show')->with('success', 'Record created successfully');
            } else {
                return redirect()->route('fund.show')->with('success', 'Record created successfully');
            }
        }
    }


    // this part is for fund Control

    //Fund list show 

    public function fundlist(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $date = $request;
            if (isset($request->searchdate)) {
                if (isset($request->enddate)) {
                    $expense = Transection::where('status', true)->whereBetween('datee', [$request->searchdate, $request->enddate])->where('type', 2)->orderBy('datee', 'desc')->get();
                    $sumFund = Transection::where('status', true)->whereBetween('datee', [$request->searchdate, $request->enddate])->where('type', 2)->sum('amount');
                    $defaultDate = Carbon::today()->format('Y-m-d');
                    return view('frontend.school.fund.table')->with(compact('expense', 'sumFund', 'defaultDate'));
                } else {
                    $expense = Transection::where('status', true)->wheredate('datee', $request->searchdate)->where('type', 2)->orderBy('datee', 'desc')->get();
                    $sumFund = Transection::where('status', true)->wheredate('datee', $request->searchdate)->where('type', 2)->sum('amount');
                    $defaultDate = Carbon::today()->format('Y-m-d');
                    return view('frontend.school.fund.table')->with(compact('expense', 'sumFund', 'defaultDate'));
                }
            } elseif (isset($request->searchmonth)) {
                $transectionMonth = Transection::where('status', true)->orderBy('created_at', 'asc')->get();
                $searchmonth = $request->searchmonth;
                $sumFund = Transection::where('status', true)->whereMonth('datee', $request->searchmonth)->where('type', 2)->sum('amount');
                $defaultDate = Carbon::today()->format('Y-m-d');
                $expense = Transection::where('status', true)->whereMonth('datee', $request->searchmonth)->where('type', 2)->orderBy('datee', 'desc')->get();
                return view('frontend.school.fund.table')->with(compact('expense', 'searchmonth', 'sumFund', 'defaultDate'));
            } else {
                $expense = Transection::where('status', true)->where('type', 2)->orderBy('datee', 'desc')->get();
                $sumFund = Transection::where('status', true)->where('type', 2)->sum('amount');
                $defaultDate = Carbon::today()->format('Y-m-d');
                return view('frontend.school.fund.table', compact('expense', 'sumFund', 'defaultDate'));
            }
        }
    }


    public function  accesoriesType()
    {
        $data = AccesoriesType::where('school_id', Auth::id())->get();

        return view('frontend.school.Accesories.accesoriesType', compact('data'));
    }
    public function  receiptShow()
    {
        $data = AccesoriesTransaction::all();
        return view('frontend.school.Accesories.receipt', compact('data'));
    }
    /**
     *  store accesories by school
     */
    public function accesoriesTypePost(Request $request)
    {

        $request->validate([
            'accesories' => 'required',
            'price' => 'required'
        ]);

        AccesoriesType::create([
            'school_id' =>  Auth::id(),
            'accesories' => $request->accesories,
            'price' => $request->price,
        ]);

        return back();
    }


    public function receipt()
    {
        $class = InstituteClass::where('school_id', Auth::user()->id)->get();

        $school = School::find(Auth::user()->id);
        $orders = AccesoriesType::where('school_id', Auth::id())->get();
        return view("frontend.school.Accesories.accesories", compact('orders', 'school', 'class'));
    }
    public function receiptDelete($id)
    {
        // syllabus delete
        AccesoriesTransaction::find($id)->delete();
        toast('opps deleted', 'danger');

        return back();
    }

    public function getPrice($id)
    {
        $price  = AccesoriesType::find($id)->price;
        return $price;
    }




    /** --------------- expense data table
     * =============================================*/
    public function fundcreate()
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            return view('frontend.school.expense.form');
        }
    }


    /** --------------- Store expense
     * =============================================*/
    public function fundstore(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $request->validate([

                'datee'  => 'required',
                'amount'  => 'required|integer',
                'purpose'  => 'required',
                'payment_method' => 'required',
                'type' => 'required',
                'name' => 'required',


            ]);

            $data = $request->all();
            $data['school_id'] = Auth::user()->id;

            // return $data;

            $expense = Transection::create($data);

            if ($request->type == 1) {
                return redirect()->route('expense.show')->with('success', 'Record created successfully');
            } elseif ($request->type == 2) {
                return redirect()->route('fund.show')->with('success', 'Record created successfully');
            }
        }
    }



    /** --------------- expense data edit
     * =============================================*/
    public function fundedit(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $key = $request->key;
            $expense = Transection::find($key);

            return view('frontend.school.expense.form')->with(compact('expense'));
        }
    }



    /** --------------- Update expense
     * =============================================*/
    public function fundupdate(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $key = $request->key;

            $request->validate([

                'datee'  => 'required',
                'amount'  => 'required|integer',
                'purpose'  => 'required',
                'payment_method' => 'required',
                'type' => 'required',
                'name' => 'required',
            ]);


            $data = $request->all();
            $data['school_id'] = Auth::user()->id;

            $expense = Transection::find($key)->update($data);

            if ($request->type == 1) {
                return redirect()->route('expense.show')->with('success', 'Record created successfully');
            } else {
                return redirect()->route('fund.show')->with('success', 'Record created successfully');
            }
        }
    }



    /** --------------- delete fund
     * =============================================*/
    public function funddestroy(Request $request)
    {
        if (Auth::user()->status == 0) {
            return redirect()->route('school.payment.info');
        } elseif (Auth::user()->status == 2) {
            toast('Sorry Admin can Inactive Your Account Please Contact', 'error');
            return back();
        }
        if (Auth::user()->is_editor != 3) {
            return back();
        } else {
            $key = $request->key;

            $expense = Transection::destroy($key);

            if ($request->type == 1) {
                return redirect()->route('expense.show')->with('success', 'Record created successfully');
            } else {
                return redirect()->route('fund.show')->with('success', 'Record created successfully');
            }
        }
    }
}
