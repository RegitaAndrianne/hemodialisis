<div class="table-responsive">
    <table class="table" id="machines-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                @if(Auth::user()->role!='patient')
                <th>Action</th>

                @endif
                <th> View Reports</th>
            </tr>
        </thead>
        <tbody>
            @foreach($machines as $machine)
            <tr>
                <td>{{ $machine->name }}</td>
                <td>{{ $machine->type }}</td>
                @if(Auth::user()->role!='patient')
                

                <td>
                    {!! Form::open(['route' => ['machines.destroy', $machine->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('machines.show', [$machine->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('machines.edit', [$machine->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                @endif
                @if (Request::is('machines'))
                <td><a href="{{ route('reports.filterV1', [$machine->id])}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-search"></i></a></td>

                @else 
                <td><a href="{{ route('reports.filter', [$machine->id,$patient_id])}}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-search"></i></a></td>

                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
