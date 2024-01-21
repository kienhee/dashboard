<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;

class CommonController extends Controller
{
    public function list()
    {
        return view('admin.common.list');
    }
    public function data()
    {
        $data = Common::select(['id', 'cover', 'name', 'slug', 'column1', 'column2']);

        return DataTables::of($data)
            ->orderColumn('id', '-id $1')
            ->editColumn('name', function ($item) {
                return '<img src="' . $item->cover . '" width="50" height="50"  alt="" class="img-circle img-avatar-list rounded-pill">';
            })
            ->orderColumn('avatar', false)
            ->rawColumns(['avatar'])->make();
    }
    public function add()
    {
        return view('admin.common.add');
    }
}
