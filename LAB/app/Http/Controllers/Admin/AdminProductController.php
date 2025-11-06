<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller{
    public function index(){
        $viewData = [];
        $viewData["title"] = "Admin Page - Quản lý sản phẩm";
        $viewData["products"]=Product::all();
        return view("admin.product.index")->with("viewData", $viewData);
    }
    public function store(Request $request){
        $request->validate([
            "name"=>"required|max:255",
            "description"=>"required",
            "price"=>"required|numeric|gt:0",
            "image"=>"image",
        ]);
        $newProduct= new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage("no-img.jpeg");
        $newProduct->save();
        
        if($request->hasFile('image')){
            $imageName=$newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }
        return back();
    }
    public function trash(){
        $viewData = [];
        $viewData["title"] = "Thùng rác sản phẩm";
        $viewData["subtitle"] = "Danh sách sản phẩm đã xóa mềm";
        $viewData["products"] = Product::onlyTrashed()->paginate(10);

        return view("product.trash")->with("viewData", $viewData);
    }
    public function restore($id){
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('admin.product.trash')->with('success', 'Khôi phục thành công!');
    }
    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        
        // Nếu có hình ảnh thì xóa luôn file khỏi storage
        if ($product->image) {
            Storage::delete('public/'.$product->image);
        }

        $product->forceDelete();
        return redirect()->route('admin.product.trash')->with('success', 'Xóa vĩnh viễn thành công!');
    }
} 