<div class="table-responsive">
    <table class="table" id="reports-table">
        <thead>
            <tr>
                {{-- <th>Patient Id</th> --}}
                <th>Date On</th>
                <th>Time On</th>
                <th>Time Off</th>
                <th>Machine Name</th>
                @if(Auth::user()->role!='patient')
                <th>Action</th>

                @endif
                <th> View Parameters</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>{{--    
                <td>{{ $report->patient_id }}</td> --}}
                <td>{{ $report->date_on }}</td>
                <td>{{ $report->time_on }}</td>
                <td>{{ $report->time_off }}</td>
                <td>{{ $report->machine->name }}</td>
                @if(Auth::user()->role!='patient')
                
                <td>
                    {!! Form::open(['route' => ['reports.destroy', $report->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reports.show', [$report->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('reports.edit', [$report->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif
                
                <td><a href="{{ route('parameters.filter', [$report->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-search"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
