

@if (Session::has('flash-success') || Session::has('flash-error'))

<div class="flash flash--modal">
    <!-- Modal -->
    <div class="modal modal--flash fade" id="flashModal" tabindex="-1" role="dialog" aria-labelledby="flashModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header bg-light">
                    <h4 class="modal-title">
                        <!-- form title -->
                        {{ $title }}
                    </h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                        
                <div class="modal-body py-5">

                    <div class="flash__text text-center">
                        
                        <!-- Success message block -->
                        @if (Session::has('flash-success'))

                            <i class="flash__icon fal fa-check-circle text-success mb-3"></i>
                            <span class="d-block text-success heading-h4 mb-3">
                                Successfully!
                            </span>
                            <span class="d-block">
                                {{ Session::get('flash-success') }}
                            </span>

                        @endif

                        <!-- Error message block -->
                        @if (Session::has('flash-error'))

                            <i class="flash__icon fal fa-times-circle text-danger mb-3"></i>
                            <span class="d-block text-danger heading-h4 mb-3">
                                Error!
                            </span>
                            <span class="d-block">
                                {{ Session::get('flash-error') }}
                            </span>

                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endif



@push('script')
<script>
    if($('.flash--modal').length)
    {
        $('.flash--modal').children('.modal').modal('show');
    }
</script>
@endpush

@push('style')
<style>

    .flash__icon {
        font-size: 10rem; 
    }

    .flash .modal--flash .close {
        opacity: 1; 
    }

</style>
@endpush