<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class ProductController extends Controller
{
    function index(Request $request){

               // Get query parameters for search, sort_by, and sort_order
               $search = $request->query('search');
               $sortBy = $request->query('sort_by', 'name');
               $sortOrder = $request->query('sort_order', 'asc');

               // Create a query builder instance for the Product model
               $query = Product::query();

               // Apply search condition if search term is provided
               if ($search) {
                   $query->where('product_id', 'like', "%{$search}%")
                         ->orWhere('description', 'like', "%{$search}%");
               }

               // Apply sorting and pagination
               $products = $query->orderBy($sortBy, $sortOrder)->paginate(5);

               // Return view with the data
               return view('index', compact('products', 'search', 'sortBy', 'sortOrder'));
    }





    function create(Request $request ){

      return view('create');
    }

    public function store(Request $request){

        try {
                $request->validate([
                'product_id' => 'required|string|unique:products,product_id',
                'name' => 'required|string',
                'description' => 'nullable',
                'price' => 'required|numeric'

                ]);
                //$imagePath = null;
                if ($request->File('image')){
                    $image = $request->file("image");
                    $imageName = time().'.'.$image->getClientOriginalExtension();
                    $imageUrl = "images/".$imageName;
                    $imagePath = $image->storeAs('images',$imageName,'public');
                };

                 Product::create([
                    'product_id' => $request->input('product_id'),
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                    'stock' => $request->input('stock'),
                    'image' =>$imageUrl,

                    ]);

                     Toastr::success('Product Created successfully.');
                    return redirect()->route('products.index');

            }catch (Exception $e) {


             Toastr::error('Something Went Wrong.');
            return redirect()->back();
        }



     }



    function edit(Request $request){

        $id = $request->id;

        $product = Product::where('id', $id)->first();

        return view('edit',compact('product'));
    }


    public function show(Request $request){
        $id = $request->id;
        $product = Product::where('id', $id)->first();
        return view('show',compact('product'));

    }


    function update(Request $request ,$id){

        try {
            // Validate the request data
            $request->validate([
                'product_id' => 'required|string|unique:products,product_id,' . $id,
                 // Ignore current product's product_id
                'name' => 'required|string',
                'description' => 'nullable',
                'price' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                 // Image validation
            ]);

            // Find the product by ID
            $product = Product::findOrFail($id);

            // Default image path is the current product's image
            $imagePath = $product->image;

            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generate a unique name for the image
                $imagePath = $image->storeAs('images', $imageName, 'public');  // Store the image and get the path
            }

            // Update the product
            $product->update([
                'product_id' => $request->input('product_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'stock' => $request->input('stock'),
                'image' => $imagePath, // Store the image path
            ]);

            // Success message
            Toastr::success('Product updated successfully.');
            return redirect()->route('products.index');

        } catch (Exception $e) {
            // Error handling
             Toastr::error('Something went wrong.');
            return redirect()->back();
        }


    }


    function delete(Request $request){

        Product::where('id', $request->id)->delete();
         Toastr::success('Product delete successfully.');
        return redirect()->route('products.index');


    }
}
