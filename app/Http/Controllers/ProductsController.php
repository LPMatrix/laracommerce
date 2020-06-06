<?php

namespace App\Http\Controllers;

use Auth;
use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
       $products = Products::orderBy('created_at', 'desc')->paginate(6);
    
        return view('welcome',compact('products'));
    }

    
    public function create(Request $request)
    {
        $action = $request->action;

        switch ($action) {
        case 'create':
             $product = new Products();
            if ($request->hasFile('image')) {
                
                $image = $request->file('image');
                $filename = time(). '.' . $image->getClientOriginalExtension();
                $image->move('storage/uploads', $filename);

                $product->user_id =  Auth::user()->id;
                $product->name = $request->name;
                $product->image = $filename;
                $product->description = $request->description;
                $product->price = $request->price;

                $product->save();
     
                }else{
                    dd('error');
                }   
            return redirect()->back();
   
            break;    
        case 'update':
            $id = $request->update_id;

            $data = array(
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                     );

            Products::where('id', '=', $id)->update($data);
            if ($request->hasFile('image')) {
               $image = $request->file('image');
               $filename = time(). '.' . $image->getClientOriginalExtension();
               $image->move('storage/uploads', $filename);
               $dataImage = array('image' => $filename,);
               Products::where('id', '=', $id)->update($dataImage);
            }  
          return redirect()->back();
        break;
            
            default:
                # code...
                break;
        }

       

    }

    public function show(Request $request, $id)
    {
      $product = Products::where('id','=',$id)->first();
      return view('product',compact('product'));
    }

    public function update($id)
    {
      $product = Products::where('id','=',$id)->first();
      return $product;
    }

    public function delete(Request $request, $id)
    {

        $notify = array('alert' => 'success', 'message' => 'Deleted Successfully...' );
        Products::where('id','=',$id)->delete();
        return $notify;
    }
}
