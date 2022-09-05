<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Services\Auth\UserService;
use App\Http\Requests\UserPost;
use App;
use DataTables;
use Alert;
use App\Helper\MyHelper;
use App\Models\Role;
use App\Models\User;
use DB;
use Auth;
use Laratrust;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        // $user = App\User::find(1);

        return view ('rbac.user.index');
    }

    public function dt()
    {
        // $users = App\User::getUserRole();

        $users = $this->userService->all();

        return DataTables::of($users)
            ->addColumn('action', function ($model) {
                $actions = [
                    [
                        'url' => route('user.edit', $model->id),
                        'class' => 'btn btn-warning btn-sm',
                        'label' => 'Edit',
                        'icon' => 'fas fa-edit',
                        // 'can' => 'update-user'
                    ],
                    // [
                    //     'onclick' => 'deleteData(' . $model->id . ')',
                    //     'class' => 'btn btn-danger btn-sm btn-delete',
                    //     'label' => 'Delete',
                    //     'icon' => 'fas fa-edit',
                    //     // 'can' => 'delete-user'
                    // ],
                    [
                        'url' => route('edit.password', $model->id),
                        'class' => 'btn btn-info btn-sm btn-change-password',
                        'label' => 'Ubah Password',
                        'icon' => 'fas fa-key',
                    ]
                ];
                return view('components.action-button')
                    ->with('id', $model->id)
                    ->with('actions', $actions);
            })->make(true);
    }

    public function create()
    {
		return view('rbac.user.create');
    }

    public function store(Request $request, UserService $userService)
    {
		$validator = Validator::make($request->all(), [
			'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string',
                        Rule::unique('users')->where(function ($query) {
                            return $query->where('username', 'admin');
                        })],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
		]);

		$validated = $validator->validated();

		$res = $userService->saveData($request->except('_token'));

		$role = App\Models\Role::find($request->jabatan_id);

		$res->attachRole($role);

		if ($res) {
            toast('Data berhasil ditambah !', 'success');
        } else {
            toast('Terjadi kesalahan saat menambah data !', 'error');
        }

		return redirect()->route('user.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = $this->userService->find($id)->first();

        return view('rbac.user.edit', compact('user'));
    }

	public function editPassword($id)
    {
        return view('rbac.user.edit_password', compact('id'));
    }

    public function update(Request $request, UserService $userService, $id)
    {
		$roleId = $request->jabatan_id;
		$res = $userService->updateData($request->except('_token', '_method', 'password_confirmation', 'password'), $id);

		if($request->password != null){
			$userService->updatePassword($request->except('_token', '_method', 'jabatan_id', 'password_confirmation'), $id);
		}

		if($roleId != null){
			$user =App\Models\User::with('roles')->find($id);
			$user->syncRoles([$roleId]);
		}

		if ($res) {
            toast('Data berhasil diubah !', 'success');
        } else {
            toast('Terjadi kesalahan saat mengubah data !', 'error');
        }

		return redirect()->route('user.index');
    }

	public function updatePassword(Request $request, UserService $userService, $id)
	{
		$validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:5', 'confirmed'],
		]);

		$validated = $validator->validated();

		$res = $userService->updatePassword($request->password, $id);

		if ($res) {
            toast('Password berhasil diubah !', 'success');
        } else {
            toast('Terjadi kesalahan saat mengubah password !', 'error');
        }

		return redirect()->route('user.index');
	}

    public function destroy(UserService $userService, $id)
    {
        DB::beginTransaction();

        try {

            $user = $userService->deleteData($id);

            DB::commit();

            $output = [
                'icon' => 'success',
                'text' => "Data deleted succesfully",
            ];
        } catch (\Throwable $th) {
            DB::rollback();

            $output = [
                'icon' => 'error',
                'text' => $th->getMessage(),
            ];
        }

        return MyHelper::toastNotification($output);
    }

    public function selectLecturer(Request $request)
    {
        $role = DB::table('users')->select('*');
        $role->join('role_user', 'users.id', '=', 'role_user.user_id');
        $role->where('role_user.role_id', '=', 4);

        if (!empty(trim($request->input))) {
            $role->where(function($input)use($request){
                $input->where('name','LIKE','%'.trim($request->input).'%');
            });

        }
        $tag = [];
        foreach ($role->get() as $index => $value) {
            $tag[] = ['id' => $value->id, 'text' => ($value->id . ' - ' . $value->name)];
        }

        return response()->json($tag);
    }
}
