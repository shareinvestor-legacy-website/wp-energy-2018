<div class="col-sm-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <p class="lead">General</p>



            <fieldset>

                <div class="form-group  {{ error_has('name') ? 'has-error':''}} ">
                    <label class="control-label">Name</label>
                    <input type="gallery" class="form-control" name="name"
                           value="{{old('name',@$gallery->{"name:$locale"}) }}">
                    {!!error_message('name')  !!}
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea name="description" rows="15"
                              class="form-control">{{old('description',  @$gallery->{"description:$locale"} ) }}</textarea>
                </div>

            </fieldset>


        </div>

    </div>

</div>

