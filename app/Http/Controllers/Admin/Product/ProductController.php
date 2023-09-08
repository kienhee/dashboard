<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $result = Product::query();

        if ($request->has('keywords') && $request->keywords != null) {
            $result->where('full_name', 'like', '%' . $request->keywords . '%')
                ->orWhere('email', 'like', '%' . $request->keywords . '%')
                ->orWhere('phone_number', 'like', '%' . $request->keywords . '%');
        }

        if ($request->has('group_id') && $request->group_id != null) {
            $result->where('group_id', $request->group_id);
        }
        if ($request->has('sort') && $request->sort != null) {
            $result->orderBy('created_at', $request->sort);
        } else {
            $result->orderBy('created_at', 'desc');
        }
        if ($request->has('status') && $request->status != null && $request->status == 'active') {
            $result->where('deleted_at', "=", null);
        }
        //  elseif ($request->has('status') && $request->status != null && $request->status == 'inactive') {
        //     $result->onlyTrashed();
        // } else {
        //     $result->withTrashed();
        // }
        $products = $result->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        return view('admin.product.add');
    }
    public function store(Request $request)
    {


        if ($request->has('is_Price_includes_taxes')) {
            $request['is_Price_includes_taxes'] = 1;
        } else {
            $request['is_Price_includes_taxes'] = 0;
        }
        if ($request->tax == null) {
            $request['tax'] = 0;
        }


        $validate = $request->validate([
            "name" => "required|max:255|unique:products,name",
            "slug" => "required|unique:products,name",
            "description" => "required",
            "content" => "required",
            "product_code" => "required",
            "product_sku" => "required",
            "quantity" => "required|numeric",
            "category_id" => "required|numeric",
            "colors" => "required",
            "sizes" => "required",
            "genders" => "required",
            "regular_price" => "required|numeric",
            "sale" => "required|numeric|max_digits:2",
            "tax" => "numeric|max_digits:2",
            "images" => "required"
        ], [
            "name.required" => "Vui lòng nhập trường này!",
            "slug.required" => "Vui lòng nhập trường này!",
            "description.required" => "Vui lòng nhập trường này!",
            "content.required" => "Vui lòng nhập trường này!",
            "product_code.required" => "Vui lòng nhập trường này!",
            "product_sku.required" => "Vui lòng nhập trường này!",
            "quantity.required" => "Vui lòng nhập trường này!",
            "category_id.required" => "Vui lòng nhập trường này!",
            "colors.required" => "Vui lòng nhập trường này!",
            "sizes.required" => "Vui lòng nhập trường này!",
            "genders.required" => "Vui lòng nhập trường này!",
            "images.required" => "Vui lòng thêm ảnh cho sản phẩm",
            "regular_price.required" => "Vui lòng nhập trường này!",
            "sale.required" => "Vui lòng nhập trường này!",
            "tax.required" => "Vui lòng nhập trường này!",
            "quantity.numeric" => "Giá trị phải là số!",
            "category_id.numeric" => "Giá trị phải là số!",
            "regular_price.numeric" => "Giá trị phải là số!",
            "sale.numeric" => "Giá trị phải là số!",
            "tax.numeric" => "Giá trị phải là số!",
            "name.max" => "Tối đa :max kí tự",
            "sale.max_digits" => "Tối đa :max_digits số",
            "tax.max_digits" => "Tối đa :max_digits số",
            "name.unique" => "Tên này đã được sử dụng",
            "slug.unique" => "Đường dẫn này đã được sử dụng",

        ]);
        $images = [];
        $files = $request->file('images');

        if ($files) {
            $newFiles =  array_slice($files, 0, 9);
            foreach ($newFiles as $file) {
                $path_img = $file->store('public/photos/1');
                $name = str_replace("public", getenv('APP_URL') . "/storage", $path_img);
                $images[] = $name;
            }
        }
        $validate['images'] = json_encode($images);
        $check = Product::insert($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Thêm thành công');
        }
        return back()->with('msgError', 'Thêm thất bại!');
    }
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }
    public function update(Request $request)
    {
        dd($request->all());
    }
}