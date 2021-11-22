@if(Auth::user()->role=='admin')

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<!-- <li class="{{ Request::is('patients*') ? 'active' : '' }}">
    <a href="{{ route('patients.index') }}"><i class="fa fa-edit"></i><span>Patients</span></a>
</li> -->

<li class="{{ Request::is('machines*') ? 'active' : '' }}">
    <a href="{{ route('machines.index') }}"><i class="fa fa-edit"></i><span>Machines</span></a>
</li>

<!-- <li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{{ route('reports.index') }}"><i class="fa fa-edit"></i><span>Reports</span></a>
</li> -->

<!-- <li class="{{ Request::is('parameters*') ? 'active' : '' }}">
    <a href="{{ route('parameters.index') }}"><i class="fa fa-edit"></i><span>Parameters</span></a>
</li> -->

@endif


@if(Auth::user()->role=='medis')

<li class="{{ Request::is('patients*') ? 'active' : '' }}">
    <a href="{{ route('patients.index') }}"><i class="fa fa-edit"></i><span>Patients</span></a>
</li>

<li class="{{ Request::is('machines*') ? 'active' : '' }}">
    <a href="{{ route('machines.index') }}"><i class="fa fa-edit"></i><span>Machines</span></a>
</li>

<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{{ route('reports.index') }}"><i class="fa fa-edit"></i><span>Reports</span></a>
</li>

<li class="{{ Request::is('parameters*') ? 'active' : '' }}">
    <a href="{{ route('parameters.index') }}"><i class="fa fa-edit"></i><span>Parameters</span></a>
</li>

@endif


@if(Auth::user()->role=='paramedis')

<li class="{{ Request::is('patients*') ? 'active' : '' }}">
    <a href="{{ route('patients.index') }}"><i class="fa fa-edit"></i><span>Patients</span></a>
</li>

<li class="{{ Request::is('machines*') ? 'active' : '' }}">
    <a href="{{ route('machines.index') }}"><i class="fa fa-edit"></i><span>Machines</span></a>
</li>

<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{{ route('reports.index') }}"><i class="fa fa-edit"></i><span>Reports</span></a>
</li>

<li class="{{ Request::is('parameters*') ? 'active' : '' }}">
    <a href="{{ route('parameters.index') }}"><i class="fa fa-edit"></i><span>Parameters</span></a>
</li>


@endif


@if(Auth::user()->role=='patient')

<li class="{{ Request::is('machines*') ? 'active' : '' }}">
    <a href="{{ route('machines.index') }}"><i class="fa fa-edit"></i><span>Machines</span></a>
</li>

<li class="{{ Request::is('reports*') ? 'active' : '' }}">
    <a href="{{ route('reports.index') }}"><i class="fa fa-edit"></i><span>Reports</span></a>
</li>

<li class="{{ Request::is('parameters*') ? 'active' : '' }}">
    <a href="{{ route('parameters.index') }}"><i class="fa fa-edit"></i><span>Parameters</span></a>
</li>

@endif









