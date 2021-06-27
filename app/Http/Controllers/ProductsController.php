<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    public function index(){
        return view('admin.products.index');
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Request $request, Product $product){
        if($request->file('product_cr')){
            $file = $request->file('product_cr');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);
            $product->brand_cr = $filename;
        }
        $product->name = $request['name'];
        $product->email = $request['email'];
        $product->brand_name = $request['product_name'];

        $product->save();

        return $product;
    }

    public function sendAdminEmail(Request $request){
        // return $request;
        $data = [
            'name' => 'Mahmoud Hammad',
            'msg' => 'Message To Admin'
        ];

        // mail('mahmoudhammad423@gmail.com','Test','test msg');

        Mail::to('mahmoudhammad423@gmail.com')->send(new SendMail($data));
    }

    public function sendUserEmail(Request $request){
        // return $request;
        $data = [
            'name' => 'Mahmoud Hammad',
            'msg' => 'Message To User'
        ];

        Mail::to('mahmoudhammad423@gmail.com')->send(new SendMail($data));
    }
}
