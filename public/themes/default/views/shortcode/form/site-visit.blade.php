@include('component.flash')

<form class="form form--primary" action="{{action('Web\MailController@siteVisit', ['name'=>'site-visit'])}}" method="post">

    {{csrf_field()}}

    <div class="form-row">
        <div class="form-group col-sm-6">

            <label for="fullname">{{t('full.name')}}<span class="text-red">*</span></label>

            <input class="form-control" id="fullname" name="fullname" type="text" value="{{old('fullname')}}" maxlength="200" required/>

            @include('component.error-message', ['field' => 'fullname'])

        </div>
        <div class="form-group col-sm-6">

            <label for="email">{{t('email')}}</label>
            <input class="form-control" id="email" name="email" type="email" value="{{old('email')}}" maxlength="50"/>

            @include('component.error-message', ['field' => 'email'])

        </div>
        <div class="form-group col-sm-6">

            <label for="telephone-1">{{t('telephone')}} 1<span class="text-red">*</span></label>
            <input class="form-control" id="telephone-1" name="telephone1" type="text" value="{{old('telephone1')}}" placeholder="Ex. 080-1234567" maxlength="20" required/>

            @include('component.error-message', ['field' => 'telephone1'])

        </div>
        <div class="form-group col-sm-6">

            <label for="telephone-2">{{t('telephone')}} 2</label>
            <input class="form-control" id="telephone-2" name="telephone2" type="text" value="{{old('telephone2')}}" placeholder="Ex. 080-1234567" maxlength="20"/>

        </div>
        <div class="form-group col-12">

            <label for="numberOfShares">{{t('number.of.shares')}}</label>
            <input class="form-control" id="numberOfShares" name="numberOfShares" type="text" value="{{old('numberOfShares')}}" />

        </div>
    </div>
    <div class="form-group">
        {!! t('site.visit.note') !!}
    </div>

    <div class="form-group">
        <label class="custom-control custom-checkbox">
            <input name="privacyStatement" type="checkbox" value="1" class="custom-control-input">
            <span class="custom-control-label">{!! t('privacy.statement.text') !!}</span>
        </label>
    </div>

    <div class="form-row justify-content-center mb-4">
        <div class="col-lg-4">
            <div class="recaptcha text-center">

                {!! Recaptcha::render([ 'lang' => locale() ]) !!}

                @include('component.error-message', ['field' => 'g-recaptcha-response'])

            </div>
        </div>
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-success text-uppercase" disabled>{{t('send')}}</button>
        <button type="reset" class="btn btn-outline-success text-uppercase">{{t('cancel')}}</button>
    </div>
</form>
