<div class="page-navigation d-flex justify-content-center pt-5">

    @if(isset($year))

    {{ $posts->appends(['year'=>$year])->links() }}

    @else

    {{ $posts->links() }}

    @endif

</div>
