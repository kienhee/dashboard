<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('admin.group.index', compact('groups'));
    }
    public function add()
    {
        return view('admin.group.add');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:50',

        ], [
            "name.max" => "Tối đa :max kí tự",
            "name.required" => "Vui lòng nhập tên nhóm",
        ]);

        $check = Group::insert($validate);
        if ($check) {
            return back()->with('msgSuccess', 'Thêm nhóm thành công');
        }
        return back()->with('msgError', 'Thêm nhóm thất bại!');
    }
}
