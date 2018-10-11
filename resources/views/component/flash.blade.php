<div class="row">
    <div class="col-sm-12">

        @if (Session::has('flash-error'))
            <div class="alert alert-danger bg-danger-light">
                <em class="fa fa-exclamation-circle fa-lg fa-fw"></em>
                <span>{{Session::get('flash-error')}}</span>
            </div>
        @endif

        @if (Session::has('flash-info'))
            <div class="alert alert-info bg-primary-light">
                <em class="fa fa-exclamation-circle fa-lg fa-fw"></em>
                <span>{{Session::get('flash-info')}}</span>
            </div>
        @endif

        @if (Session::has('flash-success'))
            <div class="alert alert-success bg-green-light">
                <em class="fa fa-exclamation-circle fa-lg fa-fw"></em>
                <span>{{Session::get('flash-success')}}</span>
            </div>
        @endif


        @if (count($errors) > 0)
            <div class="alert alert-danger bg-danger-light">
                <em class="fa fa-exclamation-circle fa-lg fa-fw"></em>
                <span>Invalid input, please check fields for any errors</span>
            </div>
        @endif
    </div>
</div>



@push('script')
<script>
    $(function () {
        $('.alert-success').delay(2000).fadeOut();
    });
</script>
@endpush
