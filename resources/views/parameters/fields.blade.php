<!-- Arterial Press Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arterial_press', 'Arterial Press:') !!}
    {!! Form::text('arterial_press', null, ['class' => 'form-control']) !!}
</div>

<!-- Venous Press Field -->
<div class="form-group col-sm-6">
    {!! Form::label('venous_press', 'Venous Press:') !!}
    {!! Form::text('venous_press', null, ['class' => 'form-control']) !!}
</div>

<!-- Dyalizate Press Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dyalizate_press', 'Dyalizate Press:') !!}
    {!! Form::text('dyalizate_press', null, ['class' => 'form-control']) !!}
</div>

<!-- Temperature Field -->
<div class="form-group col-sm-6">
    {!! Form::label('temperature', 'Temperature:') !!}
    {!! Form::text('temperature', null, ['class' => 'form-control']) !!}
</div>

<!-- Conductivity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('conductivity', 'Conductivity:') !!}
    {!! Form::text('conductivity', null, ['class' => 'form-control']) !!}
</div>

<!-- Sodium Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sodium', 'Sodium:') !!}
    {!! Form::text('sodium', null, ['class' => 'form-control']) !!}
</div>

<!-- Bicarbonate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bicarbonate', 'Bicarbonate:') !!}
    {!! Form::text('bicarbonate', null, ['class' => 'form-control']) !!}
</div>

<!-- Uf Remove Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uf_remove', 'Uf Remove:') !!}
    {!! Form::text('uf_remove', null, ['class' => 'form-control']) !!}
</div>

<!-- Uf Objective Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uf_objective', 'Uf Objective:') !!}
    {!! Form::text('uf_objective', null, ['class' => 'form-control']) !!}
</div>

<!-- Uf Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uf_rate', 'Uf Rate:') !!}
    {!! Form::text('uf_rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class' => 'form-control']) !!}
</div>

<!-- Fluid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fluid', 'Fluid:') !!}
    {!! Form::text('fluid', null, ['class' => 'form-control']) !!}
</div>

<!-- Warning Field -->
<div class="form-group col-sm-6">
    {!! Form::label('warning', 'Warning:') !!}
    {!! Form::text('warning', null, ['class' => 'form-control']) !!}
</div>

<!-- Machine Report Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('machine_report_id', 'Machine Report Id:') !!}
    {!! Form::number('machine_report_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('parameters.index') }}" class="btn btn-default">Cancel</a>
</div>
