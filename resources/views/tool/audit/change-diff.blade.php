@if(strlen(audit_value($old[$field])) > 15 && strlen(audit_value($new[$field])) > 15)

    <small> {{$field}}
        From
        <button type="button" data-toggle="modal" data-target="#audit-modal" class="btn btn-default btn-xs btn-value"
                data-value="{{audit_value($old[$field])}}">...
        </button>
        To
        <button type="button" data-toggle="modal" data-target="#audit-modal" class="btn btn-default btn-xs btn-value"
                data-value="{{audit_value($new[$field])}}">...
        </button>
    </small> <br/>

@elseif (strlen(audit_value($old[$field])) > 35)

    <small> {{$field}}
        From
        <button type="button" data-toggle="modal" data-target="#audit-modal" class="btn btn-default btn-xs btn-value"
                data-value="{{audit_value($old[$field])}}">...
        </button>
        To {{audit_value($new[$field])}}
    </small> <br/>

@elseif (strlen(audit_value($new[$field])) > 35)
    <small> {{$field}}
        From {{audit_value($old[$field])}}
        To
        <button type="button" data-toggle="modal" data-target="#audit-modal" class="btn btn-default btn-xs btn-value"
                data-value="{{audit_value($new[$field])}}">...
        </button>
    </small> <br/>
@else
    <small> {{$field}} From {{audit_value($old[$field])}}
        To {{audit_value($new[$field])}}</small> <br/>
@endif

