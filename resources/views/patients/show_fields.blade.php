<!-- Ktp Field -->
<div class="form-group">
    {!! Form::label('ktp', 'Ktp:') !!}
    <p>{{ $patient->ktp }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $patient->name }}</p>
</div>

<!-- Dob Field -->
<div class="form-group">
    {!! Form::label('dob', 'Dob:') !!}
    <p>{{ $patient->dob }}</p>
</div>

<!-- Blood Type Field -->
<div class="form-group">
    {!! Form::label('blood_type', 'Blood Type:') !!}
    <p>{{ $patient->blood_type }}</p>
</div>

