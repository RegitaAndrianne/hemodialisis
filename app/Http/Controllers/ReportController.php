<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Repositories\ReportRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Patient;
use App\Models\Report;
use App\Models\Machine;


class ReportController extends AppBaseController
{
    /** @var  ReportRepository */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepo)
    {
        $this->reportRepository = $reportRepo;
    }

    /**
     * Display a listing of the Report.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reports = $this->reportRepository->all();

        return view('reports.index')
        ->with('reports', $reports);
    }

    /**
     * Show the form for creating a new Report.
     *
     * @return Response
     */
    public function create()
    {

        $patients = Patient::all()->pluck('name','id')->toArray();
        // dd($patients);
        $machines = Machine::all()->pluck('name','id')->toArray();
        return view('reports.create')
        ->with('patients', $patients)
        ->with('machines', $machines);
    }

    /**
     * Store a newly created Report in storage.
     *
     * @param CreateReportRequest $request
     *
     * @return Response
     */
    public function store(CreateReportRequest $request)
    {

        $input = $request->all();
        $ktp = $request->input('patient_id');
        $time_on = date("H:i:s", strtotime($request->input('time_on')));
        $time_off = date("H:i:s", strtotime($request->input('time_off')));


        if(!empty($ktp)){


            $patient = Patient::where('ktp',$ktp)->first();
            // $exist = User::where('patient_id',$ktp)->first();
            // if (!empty($exist)){
            //     Flash::warning('KTP already used');

            //     return redirect(route('users.create'));
            // }

            if (empty($patient)){
                Flash::warning('KTP not found');

                return redirect(route('reports.create'));
            }
        }
        
        $patient_id = Patient::where('ktp',$ktp)->pluck('id')->first();
        $report = $this->reportRepository->create([
            'patient_id' => $patient_id,
            'date_on' => $request->input('date_on'),
            'time_on'=> $time_on,
            'time_off'=>$time_off,
            'machine_id'=>$request->input('machine_id'),
        ]);
        Flash::success('Report saved successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Display the specified Report.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.show')->with('report', $report);
    }

    /**
     * Show the form for editing the specified Report.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $patients = Patient::all()->pluck('name','id')->toArray();
        // dd($patients);
        $machines = Machine::all()->pluck('name','id')->toArray();
        
        
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        return view('reports.edit')->with('report', $report)
        ->with('machines', $machines);
    }

    /**
     * Update the specified Report in storage.
     *
     * @param int $id
     * @param UpdateReportRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportRequest $request)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        // $request->input('patient_id') = $request->input('ktp');
        $input = $request->all();
        $ktp = $request->input('patient_id');
        $time_on = date("H:i:s", strtotime($request->input('time_on')));
        $time_off = date("H:i:s", strtotime($request->input('time_off')));

        if(!empty($ktp)){


            $patient = Patient::where('ktp',$ktp)->first();
 
            if (empty($patient)){
                Flash::warning('KTP not found');

                return redirect(route('reports.create'));
            }
        }

        $patient_id = Patient::where('ktp',$ktp)->pluck('id')->first();
        // dd($patient_id);
        $report = $this->reportRepository->update([
            'patient_id' => $patient_id,
            'date_on' => $request->input('date_on'),
            'time_on'=> $time_on,
            'time_off'=>$time_off,
            'machine_id'=>$request->input('machine_id'),
        ],$id);

        // $report = $this->reportRepository->update($request->all(), $id);
        

        Flash::success('Report updated successfully.');

        return redirect(route('reports.index'));
    }

    /**
     * Remove the specified Report from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $report = $this->reportRepository->find($id);

        if (empty($report)) {
            Flash::error('Report not found');

            return redirect(route('reports.index'));
        }

        $this->reportRepository->delete($id);

        Flash::success('Report deleted successfully.');

        return redirect(route('reports.index'));
    }


    public function index_report_filterV1($machine_id)
    {
        $reports = Report::where('machine_id',$machine_id)->get();
        return view('reports.index')
        ->with('reports', $reports);
    }

        public function index_report_filter($machine_id,$patient_id)
    {
        $reports = Report::where('machine_id',$machine_id)->where('patient_id',$patient_id)->get();
        return view('reports.index')
        ->with('reports', $reports);
    }


    // public function index_report_role_patient(){

    // }
}
