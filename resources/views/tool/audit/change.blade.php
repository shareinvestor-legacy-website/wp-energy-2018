@if (strlen(audit_value($value)) > 35)
    <small> {{$field}} =</small>
    <button type="button" data-toggle="modal" data-target="#audit-modal" class="btn btn-default btn-xs btn-value"
            data-value="{{audit_value($value)}}">...
    </button>
    <br/>
@else
    <small> {{$field}} = {{audit_value($value)}} </small> <br/>
@endif