<!-- Breadcrumb below title-->
<ol class="breadcrumb">

    @foreach($items as  $item)
        <li>
            {{$item}}
        </li>
    @endforeach
</ol>