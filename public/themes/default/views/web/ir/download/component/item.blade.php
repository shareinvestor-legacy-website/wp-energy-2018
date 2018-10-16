<tr>
    <td>{{$post->present()->title}}</td>
    <td>{{$post->present()->fileSize}}</td>
    <td>
        <a href="{{$post->present()->file}}" target="_blank">
            <i class="icon-pdf"></i> .PDF
        </a>
    </td>
</tr>
