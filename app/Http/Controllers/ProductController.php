<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    // This method will show product page
     public function index()
    {   
        $products = product::orderBy('created_at','DESC')->get();
        return view('products.list',[
            'product'=> $products
        ]);
    }

    // This method will show create product page
     public function create()
    {
        return view('products.create');
    }

     // This method will store product in database
      public function store(Request $request)
     { 
        
        $validator=Validator::make($request->all(),[
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'image' => 'image'
     ]);

     

        if ($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

         $product = new product();
         $product->name = $request->name;
         $product->sku = $request->sku;
         $product->price = $request->price;
         $product->description = $request->description;
         $product->save();

         if ($request->image != "")
         {
         //here we store image 
         $image=$request->image;
         $ext=$image->getClientOriginalExtension();
         $imageName=time().'.'.$ext;

         //save image to product directory
          $image->move(public_path('upload_image/products'),$imageName);

         //save image in databse
         $product->image = $imageName;
         $product->save();

         }

         return redirect()->route('products.index')->with('success','product created successfully.');
     }

     
     // This method will show edit product page
        public function edit($id)
     { 
        $product = product::findOrFail($id);
        return view('products.edit',[
            'product' => $product
        ]);
     }

     
     // This method will update a product
       public function update($id, Request $request)
     {
        $product = product::findOrFail($id);
        $validator=Validator::make($request->all(),[
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'image' => 'image'
     ]);

     

        if ($validator->fails()){
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
        }
         $product->name = $request->name;
         $product->sku = $request->sku;
         $product->price = $request->price;
         $product->description = $request->description;
         $product->save();

         if ($request->image != "")
         {
          // delete a old image
         File::delete(public_path('upload_image/products'.$product->image));

         //here we store image 
         $image=$request->image;
         $ext=$image->getClientOriginalExtension();
         $imageName=time().'.'.$ext;

         //save image to product directory
          $image->move(public_path('upload_image/products'),$imageName);

         //save image in databse
         $product->image = $imageName;
         $product->save();

         }

         return redirect()->route('products.index')->with('success','product updated successfully.');
     }

     
     // This method will delete the product
      public function destroy($id)
     {
        $product = product::findOrFail($id);
        // delete image
        File::delete(public_path('upload_image/products'.$product->image));
          $product->delete();
          return redirect()->route('products.index')->with('success','product deleted successfully.');
     }
}
