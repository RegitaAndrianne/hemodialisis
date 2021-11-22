<div class="table-responsive">
<div class="table-wrapper" style="height: 200px" >
  <div class="md-card-content" style="overflow-x: auto;" style="overflow-y: auto;">
    <table class="table" id="parameters-table" >
        <thead>
            <tr>
                <th>Arterial Press</th>
                <th>Venous Press</th>
                <th>Dyalizate Press</th>
                <th>Temperature</th>
                <th>Conductivity</th>
                <th>Sodium</th>
                <th>Bicarbonate</th>
                <th>Uf Remove</th>
                <th>Uf Objective</th>
                <th>Uf Rate</th>
                <th>Time</th>
                <th>Fluid</th>
                <th>Warning</th>
                <!-- <th>Machine Report Id</th> -->
                @if(Auth::user()->role!='patient')
                <th>Action</th>

                @endif
                
            </tr>
        </thead>
        <tbody>
            @foreach($parameters as $parameter)
            <tr>
                <td>{{ $parameter->arterial_press . " mmHg" }}</td>
                <td>{{ $parameter->venous_press . " mmHg" }}</td>
                <td>{{ $parameter->dyalizate_press . " mmHg" }}</td>
                <td>{{ $parameter->temperature . " ºC" }}</td>
                <td>{{ $parameter->conductivity . " mS/cm" }}</td>
                <td>{{ $parameter->sodium . " mEq/L" }}</td>
                <td>{{ $parameter->bicarbonate . " mEq/L" }}</td>
                <td>{{ $parameter->uf_remove . " L" }}</td>
                <td>{{ $parameter->uf_objective . " L" }}</td>
                <td>{{ $parameter->uf_rate . " mL/min" }}</td>
                <td>{{ $parameter->time }}</td>
                <td>{{ $parameter->fluid . " mL/min" }}</td>
                <td>{{ $parameter->warning }}</td>
                <!-- <td>{{ $parameter->machine_report_id }}</td> -->
                @if(Auth::user()->role!='patient')

                <td>
                    {!! Form::open(['route' => ['parameters.destroy', $parameter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('parameters.show', [$parameter->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('parameters.edit', [$parameter->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>
