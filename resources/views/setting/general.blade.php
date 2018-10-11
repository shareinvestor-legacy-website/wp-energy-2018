@extends('layouts.app')




@section('content')

    <div class="content-heading">

        General

        @include('component.breadcrumb', ['items' => ['Setting', 'General']])

    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-sm-12">
            <!-- START panel-->
            <form method="post"
                  action="{{action('Admin\SettingController@updateGeneral')}}"
                  class="form">
                {!! csrf_field() !!}
                {{ method_field('PATCH') }}

                <div class="row">

                    @include('setting.general.overview')
                    @include('setting.general.publish')
                    @include('setting.general.favicon')
                    @include('setting.general.verification')


                </div>


            </form>
            <!-- END panel-->
        </div>
    </div>


@stop



@push('script')
<script>
    $(function () {

        //image
        $('#image').change(function () {
            var $image = $(this);
            var $thumbnail = $image.next().children();
            var val = $image.val();

            if (val) {
                var url = val ? '//' + window.location.hostname + '/' + val : '';
                var image = new Image();

                image.onload = function () {
                    $thumbnail.attr('src', url);
                    $('.elfinder-remove, .img-responsive').removeClass('hide');
                }

                image.onerror = function (e) {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: "This is not valid image file"
                    });
                    $image.val('');

                }
                image.src = url;
            } else {

                $thumbnail.attr('src', '');
                $('.elfinder-remove, .img-responsive').addClass('hide');
            }

        });

        $('.elfinder-remove').click(function (e) {
            e.preventDefault();
            $('#image').val('').trigger('change');
        });

        $('#image').trigger('change');


        //timezone
        $('.select2').select2({
            theme: 'bootstrap',
            width: '100%',
        });


        $('#dateformat').change(function () {
            $('input[name=dateformat]').val($(this).val());
        });
        $('#timeformat').change(function () {
            $('input[name=timeformat]').val($(this).val());
        });
    });
</script>
@endpush




