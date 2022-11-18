<?php

namespace App\Http\Controllers;

use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HODController extends Controller
{
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::where('role', 'hod')->get();
    //         dd($data);
    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //             $actionBtn = '
    //                     <a href="' . route('admin.hod.view', $row->id) . '"><i class="fa fa-eye"></i></a>
    //                     <a href="' . route('admin.hod.edit', $row->id) . '"><i class="fa fa-pencil"></i></a>
    //                     <a href="javascript:void(0)" id="' . $row->id . '" class="delete"><i class="fa fa-trash"></i></a>';
    //             return $actionBtn;
    //         })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     return view('admin.hod.index');
    // }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->where('role','hod')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                $actionBtn = '
                        <a href="' . route('admin.hod.edit', $row->id) . '"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" id="' . $row->id . '" class="delete"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.hod.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('admin.hod.create');
    }

    public function store(Request $request)
    {  
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->route('admin.hod');
    }
    public function view(User $user)
    {
        return view('admin.hod.view',['user'=>$user]);
    }

    public function edit($user)
    {
        $user = User::find($user);
        return view('admin.hod.edit',['user'=>$user]);
    }
    public function update(Request $request, $id)
    {
        $validatedData= $request->validate(
            [
                'name' => 'required|string|max:255',
                'role'=>'required'
            ]
        );
        $user = User::find($id);
        $user->name=$validatedData['name'];
        $user->role=$validatedData['role'];
        $user->update();
        return redirect('admin/users/')->with('message','User updated successfully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
