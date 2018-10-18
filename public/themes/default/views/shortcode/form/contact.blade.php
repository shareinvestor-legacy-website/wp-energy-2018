<form class="form form--primary" action="{{action('Web\MailController@contact', ['name'=>'contact.us'])}}" name="contact" method="post" _lpchecked="1">

    {{csrf_field()}}

    <div class="form-group">
        <label for="department">{{t('department')}}<span class="text-red">*</span></label>
        <select name="department" class="form-control">

            <option selected disabled>{{t('please.select')}}</option>

            <option  value="department-1">Department 1</option>
            <option  value="department-2">Department 2</option>
            <option  value="department-3">Department 3</option>

        </select>
    </div>

    <div class="form-row">
        <div class="form-group col-sm-6">

            <label for="fullname">{{t('full.name')}}<span class="text-red">*</span></label>

            <input class="form-control" id="fullname" name="fullname" type="text" value="{{old('fullname', @$fullname)}}" required />

            @include('component.error-message', ['field' => 'fullname'])

        </div>
        <div class="form-group col-sm-6">

            <label for="email">{{t('email')}}<span class="text-red">*</span></label>
            <input class="form-control" id="email" name="email" type="email" value="{{old('email', @$email)}}" required />

            @include('component.error-message', ['field' => 'email'])

        </div>
        <div class="form-group col-sm-6">

            <label for="telephone">{{t('telephone')}}</label>
            <input class="form-control" id="telephone" name="telephone" type="text" value="{{old('telephone', @$telephone)}}" />

            @include('component.error-message', ['field' => 'telephone'])

        </div>
        <div class="form-group col-sm-6">

            <label for="fax">{{t('fax')}}</label>
            <input class="form-control" id="fax" name="fax" type="text" value="{{old('fax', @$fax)}}" />

            @include('component.error-message', ['field' => 'fax'])

        </div>
    </div>
    <div class="form-group">

        <label for="detail">{{t('address')}}</label>
        <textarea class="form-control" id="address" name="address" rows="5">{{old('address', @$address)}}</textarea>

        @include('component.error-message', ['field' => 'address'])

    </div>
    <div class="form-group">

        <label for="subject">{{t('subject')}}</label>
        <input class="form-control" id="subject" name="subject" type="text" value="{{old('subject', @$subject)}}" />

        @include('component.error-message', ['field' => 'subject'])
    </div>

    <div class="form-group">

        <label for="question">{{t('question')}}<span class="text-red">*</span></label>
        <textarea class="form-control" id="question" name="question" rows="5">{{old('question', @$question)}}</textarea>

        @include('component.error-message', ['field' => 'question'])

    </div>
    <div class="form-row justify-content-center mb-4">
        <div class="col-lg-4">
            <div class="recaptcha text-center">

                {!! Recaptcha::render([ 'lang' => locale() ]) !!}

                @include('component.error-message', ['field' => 'g-recaptcha-response'])

                @include('component.flash')

            </div>
        </div>
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-success text-uppercase">{{t('send')}}</button>
        <button type="reset" class="btn btn-outline-success text-uppercase">{{t('cancel')}}</button>
    </div>
</form>