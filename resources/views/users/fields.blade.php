<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    {{-- {!! Form::text('role', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('role', array('admin'=>'Admin','medis'=>'Medis','paramedis'=>'Paramedis','patient'=>'Patient'), $role,['class'=> 'form-control']) !!}
</div>

<!-- Search KTP Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient_id', 'KTP:') !!}
    {!! Form::text('patient_id', $patient_id, ['class' => 'form-control']) !!}
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', $name, ['class' => 'form-control']) !!}
</div>


<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', $email, ['class' => 'form-control']) !!}
</div>

<!-- Email Verified At Field -->
{{-- <div class="form-group col-sm-6"> --}}
    {{-- {!! Form::label('email_verified_at', 'Email Verified At:') !!} --}}
    {{-- {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!} --}}
{{-- </div> --}}

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    <!-- {!! Form::input('password','password', '', ['class' => 'form-control']) !!} -->
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {{-- {!! Form::text('status', null, ['class' => 'form-control']) !!} --}}
    {!! Form::select('status', array('active'=>'Active','non-active'=>'Non-active'), $status,['class'=> 'form-control']) !!}
</div>

<!-- Remember Token Field -->
<!--<div class="form-group col-sm-6">-->
    {{-- {!! Form::label('remember_token', 'Remember Token:') !!} --}}
    {{-- {!! Form::text('remember_token', null, ['class' => 'form-control']) !!} --}}
{{-- </div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
