@push('script')
<script>

    //$button   ->  the css selector of delete button
    //$form -> the css selector of form
    //$item -> item name to be displayed in warning dialog

    $(function () {


        @if (isset($button) && isset($form) && isset($text))
        //delete confirm dialog
        $('{{$button}}').click(function (e) {

            e.preventDefault();

            swal({
                        title: "Are you sure?",
                        text: '{!! addslashes($text) !!}',
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false,
                        html: true
                    },
                    function (isConfirm) {

                        if (isConfirm) {
                            $form = $('{{$form}}');
                            $form.submit();
                        }

                    });
        });

        @endif
    });
</script>
@endpush


