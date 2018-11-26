<form class="form form--primary" action="{{action('Web\MailController@whistleblowing', ['name'=>'whistleblowing'])}}" name="whistleblowing" method="post" enctype="multipart/form-data">

    {{csrf_field()}}

    <div class="form-row">
        <div class="form-group col-sm-12">

            <label for="fullname">{{t('full.name')}}<span class="text-red">*</span></label>
            <input class="form-control" name="fullname" type="text" value="{{old('fullname', @$fullname)}}" required>

            @include('component.error-message', ['field' => 'fullname'])

        </div>
        <div class="form-group col-sm-6">
            <label for="email">{{t('email')}}<span class="text-red">*</span></label>
            <input class="form-control" name="email" type="email" value="{{old('email', @$email)}}" required>

            @include('component.error-message', ['field' => 'email'])

        </div>
        <div class="form-group col-sm-6">
            <label for="telephone">{{t('telephone')}}</label>
            <input class="form-control" name="telephone" type="text" value="{{old('telephone', @$telephone)}}">

            @include('component.error-message', ['field' => 'telephone'])

        </div>
    </div>
    <div class="form-group">
        <label for="address">{{t('address')}}</label>
        <textarea class="form-control" name="address" cols="40" rows="5">{{old('address', @$address)}}</textarea>

        @include('component.error-message', ['field' => 'address'])

    </div>
    <div class="form-group">
        <label for="subject">{{t('subject')}}<span class="text-red">*</span></label>
        <input class="form-control" name="subject" type="text" value="{{old('subject', @$subject)}}" required>

        @include('component.error-message', ['field' => 'subject'])

    </div>
    <div class="form-group">
        <label for="detail">{{t('detail')}}<span class="text-red">*</span></label>
        <textarea class="form-control" name="detail" cols="40" rows="5">{{old('detail', @$detail)}}</textarea>

        @include('component.error-message', ['field' => 'detail'])

    </div>
    <div class="bg-gray p-3 mb-4">
        <div class="form-row justify-content-center align-items-center">
            <div class="col-12 col-sm-2 col-lg-auto">
                <label for="file-upload">{{t('attachment')}}<span class="text-red">*</span></label>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <input class="form-control mb-0" name="file" type="file" id="file-upload">

                @include('component.error-message', ['field' => 'file'])

            </div>
            <div class="col-12 text-center mt-2">
                <p>{{t('whistleblowing.attachment.maximum')}}</p>
            </div>
        </div>
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
