<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Date & Time</p>

            <fieldset>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Timezone</label>
                    <div class="col-sm-9">
                        <select name="timezone" class="select2">
                            @foreach($timezones as $id => $desc )
                                <option value="{{$id}}" {{setting('general.timezone') === $id ? ' selected':''}}> {{$desc}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Date Format</label>
                    <div class="col-sm-9">

                        <div class="radio c-radio">
                            <label>
                                <input type="radio" name="dateformat"
                                       value="dd MMMM yyyy" {{setting('general.dateformat') === 'dd MMMM yyyy' ? "checked":""}}>
                                <span class="fa fa-check"></span>{{intl_datetime($now, 'dd MMMM yyyy', fallback_locale())}}</label>
                        </div>


                        <div class="radio c-radio">
                            <label>
                                <input type="radio" name="dateformat"
                                       value="dd/MM/yyyy" {{setting('general.dateformat') === 'dd/MM/yyyy' ? "checked":""}}>
                                <span class="fa fa-check"></span>{{intl_datetime($now, 'dd/MM/yyyy', fallback_locale())}}</label>
                        </div>

                        <div class="radio c-radio">
                            <label>
                                <input type="radio" name="dateformat"
                                       value="dd-MM-yyyy" {{setting('general.dateformat') === 'dd-MM-yyyy' ? "checked":""}}>
                                <span class="fa fa-check"></span>{{intl_datetime($now, 'dd-MM-yyyy', fallback_locale())}}</label>
                        </div>

                        <div class="radio c-radio">
                            <label>
                                <input type="radio" name="dateformat"
                                       value="{{setting('general.dateformat')}}" {{!in_array(setting('general.dateformat'), ['dd MMMM yyyy', 'dd/MM/yyyy','dd-MM-yyyy']) ? "checked":""}}>
                                <span class="fa fa-check"></span>Custom:
                            </label>
                            &nbsp;
                            <input type="text" id="dateformat" value="{{setting('general.dateformat')}}" style="opacity:1">
                        </div>
                        <span class="help-block">Please check out the custom format from <a
                                    target="_blank"
                                    href="http://userguide.icu-project.org/formatparse/datetime">icu-project.org</a></span>
                    </div>
                </div>
            </fieldset>

            <fieldset class="pb0 mb0">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Time Format</label>
                    <div class="col-sm-9">

                        <div class="radio c-radio">
                            <label>
                                <input type="radio" name="timeformat"
                                       value="hh:mm a" {{setting('general.timeformat') === 'hh:mm a' ? "checked":""}}>
                                <span class="fa fa-check"></span>{{intl_datetime($now, 'hh:mm a', fallback_locale())}}</label>
                        </div>

                        <div class="radio c-radio">
                            <label>
                                <input type="radio" name="timeformat"
                                       value="HH:mm" {{setting('general.timeformat') === 'HH:mm' ? "checked":""}}>
                                <span class="fa fa-check"></span>{{intl_datetime($now, 'HH:mm', fallback_locale())}} (24 Hours)</label>
                        </div>

                        <div class="radio c-radio">
                            <label>
                                <input type="radio" name="timeformat"
                                       value="" {{!in_array(setting('general.timeformat'), ['hh:mm a','HH:mm']) ? "checked":""}}>
                                <span class="fa fa-check"></span>Custom:
                            </label>
                            &nbsp;
                            <input type="text" id="timeformat" value="{{setting('general.timeformat')}}" style="opacity:1">
                        </div>
                        <span class="help-block">Please check out the custom format from <a
                                    target="_blank"
                                    href="http://userguide.icu-project.org/formatparse/datetime">icu-project.org</a></span>
                    </div>

                </div>

            </fieldset>


        </div>

    </div>
</div>