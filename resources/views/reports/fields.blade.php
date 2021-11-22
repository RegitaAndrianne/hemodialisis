<!-- Patient Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient_id', 'KTP:') !!}
    {!! Form::number('patient_id', null, ['class' => 'form-control']) !!}
    {{-- {!! Form::select('patient_id', $patients, null, ['class' => 'form-control']) !!} --}}
</div>

<!-- Date On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_on', 'Date On:') !!}
    {!! Form::date('date_on', null, ['class' => 'form-control']) !!}
</div>

<!-- Time On Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_on', 'Time On:') !!}
    {!! Form::time('time_on', null, ['class' => 'form-control']) !!}

</div>

<!-- Date Off Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_off', 'Time Off:') !!}
    {!! Form::time('time_off', null, ['class' => 'form-control']) !!}
</div>

<!-- Machine Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('machine_id', 'Machine:') !!}
    {!! Form::select('machine_id', $machines, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('reports.index') }}" class="btn btn-default">Cancel</a>
</div>
