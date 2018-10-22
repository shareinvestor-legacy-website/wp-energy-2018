<div class="filter ">
    <div class="filter__icon"><i class="icon-angle-arrow-down"></i></div>
    <select class="form-control filter__select">
        <option value="{{action('Web\WebController@calendar', ['root'=>$root])}}">{{t('all')}}</option>
        @foreach ($categories as $child)
        <option value="{{action('Web\WebController@calendar', ['root'=>$root, 'subCategory'=>$child->slug])}}"{{$category->slug == $child->slug ? ' selected' : ''}}>{{$child->present()->name}}</option>
        @endforeach
    </select>
</div>


@push('script')

<script>

    $(function(){
        $('.filter__select').on('change', function(){
            var value = $(this).val();
            window.location.href = value;
        });
    })
</script>

@endpush
