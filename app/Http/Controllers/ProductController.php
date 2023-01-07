<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);

        return view('memberpage', compact('products'));
    }
    public function indexadmin()
    {
        $products = Product::paginate(8);

        return view('adminpage', compact('products'));
    }
    public function show($id)
    {
        $p = Product::all()->find($id);

        return view('productdetail', compact('p'));
    }
    public function showforadmin($id)
    {
        $p = Product::all()->find($id);

        return view('productdetailadmin', compact('p'));
    }
    public function search(Request $request)
    {
        $query = $request->search;
        $products = Product::where('name', 'like', '%'.$query.'%')
        ->paginate(8)->withQueryString();

        return view('memberpage', compact('products', 'query'));
    }
    public function searchforadmin(Request $request)
    {
        $query = $request->search;
        $products = Product::where('name', 'like', '%'.$query.'%')
        ->paginate(8)->withQueryString();

        return view('adminpage', compact('products', 'query'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'image' => 'required|mimes:jpeg,png,jpg',
            'name' => 'required|unique:products|min:5|max:20',
            'detail' => 'required|min:5',
            'price' => 'required|integer|min:1000',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $imageFile = $request->file('image');
        $imageName = time().'.'.
        $imageFile->getClientOriginalExtension();
        Storage::putFileAs('public/images', $imageFile,$imageName);

        DB::table('products')->insert([
            'image' => $imageName,
            'name' => $request->get('name'),
            'detail' => $request->get('detail'),
            'price' => $request->get('price')
        ]);
        return redirect('admin-page');
    }
    public function destroy($id)
    {
        Product::all()->find($id)->delete();
        return redirect()->back();
    }
}
