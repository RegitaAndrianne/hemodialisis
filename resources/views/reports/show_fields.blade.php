<!-- Patient Id Field -->
<div class="form-group">
    {!! Form::label('patient_id', 'Patient:') !!}
    <p>{{ $report->patient->name }}</p>
</div>

<!-- Date On Field -->
<div class="form-group">
    {!! Form::label('date_on', 'Date On:') !!}
    <p>{{ $report->date_on }}</p>
</div>

<!-- Time On Field -->
<div class="form-group">
    {!! Form::label('time_on', 'Time On:') !!}
    <p>{{ $report->time_on }}</p>
</div>

<!-- Date Off Field -->
<div class="form-group">
    {!! Form::label('time_off', 'Time Off:') !!}
    <p>{{ $report->time_off }}</p>
</div>

<!-- Machine Id Field -->
<div class="form-group">
    {!! Form::label('machine_id', 'Machine Name:') !!}
    <p>{{ $report->machine->name }}</p>
</div>

