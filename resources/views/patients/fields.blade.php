<!-- Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ktp', 'Ktp:') !!}
    {!! Form::text('ktp', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Dob Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dob', 'Dob:') !!}
    {!! Form::date('dob', null, ['class' => 'form-control']) !!}
</div>

<!-- Blood Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blood_type', 'Blood Type:') !!}
    {{-- {!! Form::text('blood_type', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('blood_type', array('A'=>'A','B'=>'B','AB'=>'AB','O'=>'O'),'A',['class'=> 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('patients.index') }}" class="btn btn-default">Cancel</a>
</div>
