<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request, $id)
    {
        $p = Product::where('id', $id)->first();
        $date = Carbon::now();

        if($request->qty_order < 0)
        {
            return redirect('/member/product/'.$id)->with('fail', 'Quantity must greater than 0!');
        }

        $val_tr = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(empty($val_tr))
        {
            $tr = new Transaction;
            $tr->user_id = Auth::user()->id;
            $tr->date = $date;
            $tr->status = 0;
            $tr->tot = 0;
            $tr->save();
        }

        $tr_new = Transaction::where('user_id', Auth::user()->id)->where('status',0)->first();

        $val_tr_detail = TransactionDetail::where('product_id', $p->id)->where('transaction_id', $tr_new->id)->first();
        if(empty($val_tr_detail))
        {
            $tr_detail = new TransactionDetail;
            $tr_detail->product_id = $p->id;
            $tr_detail->product_name = $p->name;
            $tr_detail->product_image = $p->image;
            $tr_detail->transaction_id = $tr_new->id;
            $tr_detail->quantity = $request->qty_order;
            $tr_detail->tot = $p->price*$request->qty_order;
            $tr_detail->save();
        }else
        {
            $tr_detail = TransactionDetail::where('product_id', $p->id)->where('transaction_id', $tr_new->id)->first();
            $tr_detail->quantity = $tr_detail->quantity+$request->qty_order;
            $price_tr_detail_new = $p->price*$request->qty_order;
            $tr_detail->tot = $tr_detail->tot+$price_tr_detail_new;
            $tr_detail->update();
        }
        $tr = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $tr->tot = $tr->tot+$p->price*$request->qty_order;
        $tr->update();

        return redirect('/member/product/'.$id)->with('success', 'Item added to cart!');
    }
    Public function checkout()
    {
        $tr = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if($tr==null){
            return redirect('/member-page')->with('fail', 'Cart Empty! Try Adding an Item to Your Cart! Happy Shopping!');
        }else{
            $transaction_details = TransactionDetail::where('transaction_id', $tr->id)->get();

            return view('cart', compact('tr', 'transaction_details'));
        }
    }
    public function removefromcart($id)
    {
        $tr_detail = TransactionDetail::where('id', $id)->first();
        $tr = Transaction::where('id', $tr_detail->transaction_id)->first();
        $tr->tot = $tr->tot-$tr_detail->tot;
        $tr->update();

        $tr_detail->delete();

        return redirect('/member/cart')->with('success', 'Item removed from cart!');
    }
    public function confirmcheckout()
    {
        $tr = Transaction::where('user_id', Auth::user()->id)->where('status',0)->first();
        $tr->status = 1;
        $tr->update();

        return redirect('/member-page')->with('success', 'Item Checkout! Check your History!');
    }

    //Transaction History
    public function historyindex()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

        return view('history', compact('transactions'));
    }
    public function historydetailview($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $transaction_details = TransactionDetail::where('transaction_id', $transaction->id)->get();

        return view('historydetail', compact('transaction', 'transaction_details'));
    }
}
