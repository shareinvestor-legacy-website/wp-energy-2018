<div class="btn-group m-sm pull-right">
    <button type="button" class="btn btn-sm btn-default btn-collapse">Collapse All</button>
    <button type="button" class="btn btn-sm btn-default btn-expand">Expand All</button>
</div>



@push('script')
<script>
    $(function () {
        //index
        $('.tree').treegrid({
            //or collapsed
            initialState: 'expanded'
        });

        $('.btn-collapse').click(function () {
            $('.tree').treegrid('collapseAll');
            return false;
        });
        $('.btn-expand').click(function () {
            $('.tree').treegrid('expandAll');
            return false;
        });

    });
</script>
@endpush