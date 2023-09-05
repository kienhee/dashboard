<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }
    public function add()
    {
        return view('admin.color.add');
    }
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|max:50|unique:colors,name',
            'code' => 'required|max:50|unique:colors,code',
        ], [
            "name.required" => "Vui lòng nhập trường này",
            "name.unique" => "Tên này đã tồn tại!",
            "name.max" => "Tối đa :max kí tự",
            "code.required" => "Vui lòng chọn màu",
            "code.unique" => "Mã hex đã tồn tại!",
            "code.max" => "Tối đa :max kí tự",
        ]);

        $check = Color::insert($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Thêm thành công');
        }
        return back()->with('msgError', 'Thêm thất bại!');
    }
}
