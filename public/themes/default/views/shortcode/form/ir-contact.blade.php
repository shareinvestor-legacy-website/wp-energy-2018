@include('component.flash')

<form class="form form--primary" action="{{action('Web\MailController@irContact', ['name'=>'ir.contact'])}}" name="ir_contact" method="post" _lpchecked="1">

    {{csrf_field()}}

    <div class="form-row">
        <div class="form-group col-sm-6">

            <label for="fullname">{{t('full.name')}}<span class="text-red">*</span></label>

            <input class="form-control" id="fullname" name="fullname" type="text" value="{{old('fullname', @$fullname)}}" maxlength="200" required/>

            @include('component.error-message', ['field' => 'fullname'])

        </div>
        <div class="form-group col-sm-6">

            <label for="email">{{t('email')}}<span class="text-red">*</span></label>
            <input class="form-control" id="email" name="email" type="email" value="{{old('email', @$email)}}" maxlength="200" required/>

            @include('component.error-message', ['field' => 'email'])

        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6">

            <label for="telephone">{{t('telephone')}}<span class="text-red">*</span></label>
            <input class="form-control" id="telephone" name="telephone" type="text" value="{{old('telephone', @$telephone)}}" placeholder="Ex. 080-1234567" maxlength="20" required/>

            @include('component.error-message', ['field' => 'telephone'])
        </div>
        <div class="form-group col-sm-6">

            <label for="company">{{t('company')}}<span class="text-red">*</span></label>
            <input class="form-control" id="company" name="company" type="text" value="{{old('company', @$company)}}" maxlength="1000" required/>

            @include('component.error-message', ['field' => 'company'])
        </div>
    </div>
    <div class="form-group">
        <label for="detail">{{t('detail')}}<span class="text-red">*</span></label>
        <textarea class="form-control" id="detail" name="detail" rows="5" maxlength="10000" required>{{old('detail', @$detail)}}</textarea>

        @include('component.error-message', ['field' => 'detail'])
    </div>

    <div class="form-group">
        <label class="custom-control custom-checkbox">
            <input name="privacyStatement" type="checkbox" value="1" class="custom-control-input">
            <span class="custom-control-label">{!! t('privacy.statement.text') !!}</span>
        </label>
    </div>

    <div class="form-group justify-content-center mb-4">

            <div class="recaptcha text-center">

                {!! Recaptcha::render([ 'lang' => locale() ]) !!}

                @include('component.error-message', ['field' => 'g-recaptcha-response'])

            </div>
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-success text-uppercase" disabled>{{t('send')}}</button>
        <button type="reset" class="btn btn-outline-success text-uppercase">{{t('cancel')}}</button>
    </div>
</form>
