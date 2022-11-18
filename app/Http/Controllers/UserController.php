<?php

namespace App\Http\Controllers;

// use App\Http\Requests\UserFormRequest;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                $actionBtn = '
                        <a href="' . route('admin.users.edit', $row->id) . '"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" id="' . $row->id . '" class="delete"><i class="fa fa-trash"></i></a>';
                return $actionBtn;
            })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(User $user)
    {
        $department= DB::table('department')->get();
        $campus= DB::table('campus')->get();
        return view('admin.users.create',['user'=>$user,'department'=>$department,'campus'=>$campus]);
    }

    public function store(Request $request)
    {  
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $department = DB::table('department')->where('id',$request->department)->first();
        $campus = $department->campus_id;
        $user->campus_id = $campus;
        $user->department_id = $request->department;
        $user->save();
        return redirect()->route('admin.users');
    }

    public function edit($user)
    {
        $user = User::find($user);
        $department= DB::table('department')->get();
        $campus= DB::table('campus')->get();
        return view('admin.users.edit',['user'=>$user,'department'=>$department,'campus'=>$campus]);
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
        $department = DB::table('department')->where('id',$request->department)->first();
        $campus = $department->campus_id;
        $user->campus_id = $campus;
        $user->department_id = $request->department;
        $user->update();
        return redirect('admin/users/')->with('message','User updated successfully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }

}