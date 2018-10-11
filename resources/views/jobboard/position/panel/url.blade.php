<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">

            <p class="lead">URL</p>



            <fieldset class="mb0 pb0">

                <div class="form-group">
                    <div class="row">

                        <div class="col-sm-8 col-xs-8">
                            <input type="text" class="form-control"
                                   placeholder="Absolute Path or Absolute Url"
                                   name="external_url"
                                   value="{{old('external_url', @$position->{"external_url:$locale"})}}">
                        </div>

                        <div class="col-sm-4 col-xs-4">
                            <select class="form-control" name="external_url_target">
                                <option value="_self">Target</option>
                                <option value="_blank" {{@$position->{"external_url_target:$locale"} === "_blank" ? 'selected':''}}>
                                    _blank
                                </option>
                                <option value="_self" {{@$position->{"external_url_target:$locale"} === "_self" ? 'selected':''}}>
                                    _self
                                </option>
                                <option value="_parent" {{@$position->{"external_url_target:$locale"} === "_parent" ? 'selected':''}}>
                                    _parent
                                </option>
                                <option value="_top" {{@$position->{"external_url_target:$locale"} === "_top" ? 'selected':''}}>
                                    _top
                                </option>
                            </select>
                        </div>

                    </div>
                    <span class="help-block">Set optional external link related to position, if target is not selected, default is _self.</span>
                </div>
            </fieldset>


        </div>
    </div>
</div>