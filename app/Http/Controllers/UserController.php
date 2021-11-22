<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Patient;
use App\Models\User;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('users.index')
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $role = '';
        $patient_id = '';
        $name = '';
        $email = '';
        $status = '';
        return view('users.create')
        ->with('role',$role)
        ->with('patient_id',$patient_id)
        ->with('name',$name)
        ->with('email',$email)
        ->with('status',$status);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $ktp = $request->input('ktp');
        $request->validate([
        'password' => 'required|min:8',
        ]);


        if(!empty($ktp)){


            $patient = Patient::where('ktp',$ktp)->first();
            $exist = User::where('patient_id',$ktp)->first();
            if (!empty($exist)){
                Flash::warning('KTP already used');

                return redirect(route('users.create'));
            }

            if (empty($patient)){
                Flash::warning('KTP not found');

                return redirect(route('users.create'));
            }
        }

        $user = $this->userRepository->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password'=> bcrypt($request->input('password')),
            'role'=>$request->input('role'),
            'patient_id'=>$request->input('patient_id'),
            'status'=>$request->input('status'),
        ]);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $role = $user->role;
        $patient_id = $user->patient_id;
        $name = $user->name;
        $email = $user->email;
        $status = $user->status;
        
        return view('users.edit')->with('user', $user)
        ->with('role',$role)
        ->with('patient_id',$patient_id)
        ->with('name',$name)
        ->with('email',$email)
        ->with('status',$status);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);
        $ktp = $request->input('patient_id');

        if(!empty($ktp)){
            $patient = Patient::where('ktp',$ktp)->first();
            $user_id = User::where('patient_id',$ktp)->pluck('id')->first();
            // dd($user_id);
            
            if (empty($patient)){
                Flash::warning('KTP not found');

                return redirect(route('users.edit',$id));
            }


            if ($user_id!=null){
                if ($user_id!=$id){
                    Flash::warning('KTP already used');
                    return redirect(route('users.edit',$id));
                }
            }
        }

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        if (empty($request->input('password'))){
            $password = $user->password;
        }
        else {
            $password = bcrypt($request->input('password'));   
        }
        // dd($request->input('password'));

        $user = $this->userRepository->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password'=> $password,
            'role'=>$request->input('role'),
            'patient_id'=>$request->input('patient_id'),
            'status'=>$request->input('status'),
        ],$id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }


}
