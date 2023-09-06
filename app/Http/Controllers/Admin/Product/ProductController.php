<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
        // dd($request->all());

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
        $check = Product::insert($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Thêm thành công');
        }
        return back()->with('msgError', 'Thêm thất bại!');
    }
}
