<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParameterRequest;
use App\Http\Requests\UpdateParameterRequest;
use App\Repositories\ParameterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Parameter;
use App\Models\Report;
use PDF;

class ParameterController extends AppBaseController
{
    /** @var  ParameterRepository */
    private $parameterRepository;

    public function __construct(ParameterRepository $parameterRepo)
    {
        $this->parameterRepository = $parameterRepo;
    }

    /**
     * Display a listing of the Parameter.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $parameters = $this->parameterRepository->all();

        return view('parameters.index')
            ->with('parameters', $parameters);
    }

    /**
     * Show the form for creating a new Parameter.
     *
     * @return Response
     */
    public function create()
    {
        return view('parameters.create');
    }

    /**
     * Store a newly created Parameter in storage.
     *
     * @param CreateParameterRequest $request
     *
     * @return Response
     */
    public function store(CreateParameterRequest $request)
    {
        $input = $request->all();

        $parameter = $this->parameterRepository->create($input);

        Flash::success('Parameter saved successfully.');

        return redirect(route('parameters.index'));
    }

    /**
     * Display the specified Parameter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parameter = $this->parameterRepository->find($id);

        if (empty($parameter)) {
            Flash::error('Parameter not found');

            return redirect(route('parameters.index'));
        }

        return view('parameters.show')->with('parameter', $parameter);
    }

    /**
     * Show the form for editing the specified Parameter.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parameter = $this->parameterRepository->find($id);

        if (empty($parameter)) {
            Flash::error('Parameter not found');

            return redirect(route('parameters.index'));
        }

        return view('parameters.edit')->with('parameter', $parameter);
    }

    /**
     * Update the specified Parameter in storage.
     *
     * @param int $id
     * @param UpdateParameterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParameterRequest $request)
    {
        $parameter = $this->parameterRepository->find($id);

        if (empty($parameter)) {
            Flash::error('Parameter not found');

            return redirect(route('parameters.index'));
        }

        $parameter = $this->parameterRepository->update($request->all(), $id);

        Flash::success('Parameter updated successfully.');

        return redirect(route('parameters.index'));
    }

    /**
     * Remove the specified Parameter from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parameter = $this->parameterRepository->find($id);

        if (empty($parameter)) {
            Flash::error('Parameter not found');

            return redirect(route('parameters.index'));
        }

        $this->parameterRepository->delete($id);

        Flash::success('Parameter deleted successfully.');

        return redirect(route('parameters.index'));
    }

    public function index_parameter_filter($report_id)
    {
        // $parameters = Parameter::where('machine_report_id',$report_id)->orderBy("id","desc")->take(5)->get();
        $parameters = Parameter::where('machine_report_id',$report_id)->get();
        for($i=0; $i<count($parameters); $i++){
            if($i%10==0){
                $data[] = $parameters[$i];
            }

        }
        if(count($parameters)<10){
            $data = $parameters;
        }
        $parameters = $data;
        $arterial_press = Parameter::where('machine_report_id',$report_id)->pluck("arterial_press")->toArray();
        $venous_press = Parameter::where('machine_report_id',$report_id)->pluck("venous_press")->toArray();        

        return view('parameters.index')
            ->with('parameters', $parameters)
            ->with('arterial_press', $arterial_press)
            ->with('venous_press', $venous_press)
            ->with('report_id', $report_id);
    }

    public function cetak_pdf($report_id)
    {
    	$report = Report::find($report_id);
        $parameters = Parameter::where('machine_report_id',$report_id)->get();
        for($i=0; $i<count($parameters); $i++){
            if($i%10==0){
                $data[] = $parameters[$i];
            }
        }
        if(count($parameters)<10){
            $data = $parameters;
        }
        $parameters = $data;
        $patient_name= $report->patient->name;
        $pdf = PDF::loadview('parameters.parameter_pdf',compact('parameters','patient_name'))->setPaper('A4','landscape');
        
    	return $pdf->download('laporan-parameters.pdf');
    }

}
