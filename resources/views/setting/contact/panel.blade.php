<div class="panel panel-default">

    <div class="panel-body">

        <fieldset>

            <div class="form-group  {{ error_has('name') ? 'has-error':''}} ">
                <label class="control-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name',  @$contact->name)  }}">
                {!!error_message('name')  !!}
            </div>
        </fieldset>

        <fieldset>

            <div class="form-group">
                <label class="control-label">Department</label>
                <input type="text" class="form-control" name="department" value="{{old('department',  @$contact->department)  }}">

            </div>
        </fieldset>

        <fieldset>

            <div class="form-group">
                <label class="control-label">Location</label>
                <input type="text" class="form-control" name="location" value="{{old('location',  @$contact->location)  }}">

            </div>
        </fieldset>



        <fieldset>

            <div class="form-group  {{ error_has('emails') ? 'has-error':''}} ">
                <label class="control-label">Email</label>


                <select name="emails[]" class="form-control select2-tag" multiple>
                    @foreach($emails as $email)
                        <option value="{{$email}}" {{in_array($email, $emails) ? 'selected':''}}>{{$email}}</option>
                    @endforeach
                </select>

                {!!error_message('emails')  !!}
                <span class="help-block">Specifies the addresses of the intended recipients</span>

            </div>
        </fieldset>


        <fieldset>

            <div class="form-group">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" value="{{old('subject',  @$contact->subject)  }}">
                <span class="help-block">Specifies the subject line that is displayed in the recipients' mail client</span>
            </div>
        </fieldset>


    </div>
    <div class="panel-footer">
        <div class="clearfix">

            <div class="pull-right">

                <button type="submit" class="btn btn-primary ">
                    <em class="fa fa-check fa-fw"></em>Save
                </button>
            </div>

        </div>
    </div>
</div>



@push('script')
<script>
    $(function () {

        //select2 - tag
        $('.select2-tag').select2({
            theme: 'bootstrap',
            width: '100%',
            tags: true,
            tokenSeparators: [',', ' ']
        });

    });
</script>
@endpush