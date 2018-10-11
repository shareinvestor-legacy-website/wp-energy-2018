@if (Session::has('flash-success'))
    <div class="alert alert-success bg-green-light">
        <em class="fa fa-check fa-fw"></em>
        <span>{{Session::get('flash-success')}}</span>
    </div>
@endif

@if (Session::has('flash-error'))
    <div class="alert alert-danger bg-danger-light">
        <em class="fa fa-exclamation-circle fa-fw"></em>
        <span>{{Session::get('flash-error')}}</span>
    </div>
@endif



