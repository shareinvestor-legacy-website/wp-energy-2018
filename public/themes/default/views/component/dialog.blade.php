@if(isset($dialog))
    <div class="intro-dialog">

        {!! $dialog->present()->body !!}

        {{--  boostrap modal only  --}}
    </div>


    @push('style')

        {!! $dialog->present()->custom_css !!}

    @endpush


    @push('script')
        {!! $dialog->present()->custom_js !!}
        <script>
            if($('.intro-dialog').length)
            {
                $('.intro-dialog').children('.modal').modal('show');
            }
        </script>
    @endpush

@endif
