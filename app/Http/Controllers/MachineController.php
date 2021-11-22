<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\CreateMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Repositories\MachineRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Report;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;


class MachineController extends AppBaseController
{
    /** @var  MachineRepository */
    private $machineRepository;

    public function __construct(MachineRepository $machineRepo)
    {
        $this->machineRepository = $machineRepo;
    }

    /**
     * Display a listing of the Machine.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $machines = $this->machineRepository->all();
        $patient_id = '';
        return view('machines.index')
            ->with('machines', $machines)
            ->with('patient_id', $patient_id);
    }

    /**
     * Show the form for creating a new Machine.
     *
     * @return Response
     */
    public function create()
    {
        return view('machines.create');
    }

    /**
     * Store a newly created Machine in storage.
     *
     * @param CreateMachineRequest $request
     *
     * @return Response
     */
    public function store(CreateMachineRequest $request)
    {
        $input = $request->all();

        $exist = Machine::where("type","=",$request->input('type'))->where("name","=",$request->input('name'))->first();
        if (!empty($exist)){
            Flash::warning('Machine type already exist.');
        return redirect(route('machines.index'));
        }

        $machine = $this->machineRepository->create($input);

        Flash::success('Machine saved successfully.');

        return redirect(route('machines.index'));


    }

    /**
     * Display the specified Machine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $machine = $this->machineRepository->find($id);

        if (empty($machine)) {
            Flash::error('Machine not found');

            return redirect(route('machines.index'));
        }

        return view('machines.show')->with('machine', $machine);
    }

    /**
     * Show the form for editing the specified Machine.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $machine = $this->machineRepository->find($id);

        if (empty($machine)) {
            Flash::error('Machine not found');

            return redirect(route('machines.index'));
        }

        return view('machines.edit')->with('machine', $machine);
    }

    /**
     * Update the specified Machine in storage.
     *
     * @param int $id
     * @param UpdateMachineRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMachineRequest $request)
    {
        $machine = $this->machineRepository->find($id);

        if (empty($machine)) {
            Flash::error('Machine not found');

            return redirect(route('machines.index'));
        }

        $machine = $this->machineRepository->update($request->all(), $id);

        Flash::success('Machine updated successfully.');

        return redirect(route('machines.index'));
    }

    /**
     * Remove the specified Machine from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $machine = $this->machineRepository->find($id);

        if (empty($machine)) {
            Flash::error('Machine not found');

            return redirect(route('machines.index'));
        }

        $this->machineRepository->delete($id);

        Flash::success('Machine deleted successfully.');

        return redirect(route('machines.index'));
    }


    public function index_machine_filter($patient_id)
    {
        $machines_id = Report::where('patient_id',$patient_id)->pluck('machine_id')->toArray();
        $machines = Machine::whereIn('id',$machines_id)->get();

        return view('machines.index')
            ->with('machines', $machines)
            ->with('patient_id', $patient_id);
            
    }   


    public function index_machine_role_patient(){
        $user_id = Auth::user()->patient_id;
        $patient_id = Patient::where('ktp',$user_id)->pluck('id')->toArray();
        // dd($patient_id[0]);

        $machines_id = Report::where('patient_id',$patient_id[0])->pluck('machine_id')->toArray();
        $machines = Machine::whereIn('id',$machines_id)->get();

        return view('machines.index')->with('machines', $machines)
        ->with('patient_id', $patient_id[0]);
    }


}
