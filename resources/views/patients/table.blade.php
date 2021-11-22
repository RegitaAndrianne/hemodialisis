<div class="table-responsive">
    <table class="table" id="patients-table">
        <thead>
            <tr>
                <th>Ktp</th>
                <th>Name</th>
                <th>Dob</th>
                <th>Blood Type</th>
                <th>Action</th>
                <th > View Machine</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->ktp }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->dob }}</td>
                <td>{{ $patient->blood_type }}</td>
                <td>
                    {!! Form::open(['route' => ['patients.destroy', $patient->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('patients.show', [$patient->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('patients.edit', [$patient->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
                <td><a href="{{ route('machines.filter', [$patient->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-search"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
