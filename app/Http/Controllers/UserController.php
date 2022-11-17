<?php

namespace App\Http\Controllers;

// use App\Http\Requests\UserFormRequest;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;

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
                        <a href="' . route('admin.users.view', $row->id) . '"><i class="fa fa-eye"></i></a>
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

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {  
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        $title1 = "Operation Successfull";
        $message1 = "User has been created successfully";
        $id1 = $user->id;
        $notification_id1 = $user->notification_id;
        $type1 = "basic";
        send_notification_FCM($notification_id1, $title1, $message1, $id1,$type1);
        return redirect()->route('admin.users');
    }
    public function view(User $user)
    {
        return view('admin.users.view',['user'=>$user]);
    }

    public function edit($user)
    {
        $user = User::find($user);
        return view('admin.users.edit',['user'=>$user]);
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