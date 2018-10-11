@push('script')
<script>
    $(function () {

        //delete confirm dialog
        $('{{$selector}}').click(function () {
            swal({
                        title: "Are you sure?",
                        text: "This item will be permanently deleted",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    },
                    function () {
                         swal("Deleted!", "This item has been deleted.", "success");
                    });
        });
    });
</script>
@endpush