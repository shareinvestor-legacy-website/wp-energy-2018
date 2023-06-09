@include('component.flash')

<form class="form form--primary" action="{{action('Web\MailController@application', ['name'=>'online.application'])}}" name="application" method="post"  enctype="multipart/form-data" autocomplete="off">

    {{csrf_field()}}

    <div class="form-row align-items-center mb-4">
        <div class="col-auto">
            <label for="position">{{t('position')}}<span class="text-red">*</span></label>
        </div>
        <div class="col-12 col-sm-6">

            <select name="position" class="form-control mb-0">
                <option selected disabled>{{t('please.select')}}</option>

                @foreach ($positions as $position)
                    <option>{{$position->present()->title}}</option>
                @endforeach

            </select>

            @include('component.error-message', ['field' => 'position'])

        </div>
    </div>
    <hr>
    <div class="form-row align-items-center mb-4">
        <div class="col-12 col-sm-auto">
            <label for="h1 text-blue pb-2 mb-4">{{t('title')}}</label>
        </div>
        <div class="col-12 col-sm">
            <div class="input-radio">
                <ul>
                    <li>
                        <input checked type="radio" name="title" value="{{t('mr')}}">
                        <span class="text">{{t('mr')}}</span>
                        <div class="bullet"></div>
                    </li>
                    <li>
                        <input type="radio" name="title" value="{{t('mrs')}}">
                        <span class="text">{{t('mrs')}}</span>
                        <div class="bullet"></div>
                    </li>
                    <li>
                        <input type="radio" name="title" value="{{t('ms')}}">
                        <span class="text">{{t('ms')}}</span>
                        <div class="bullet"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12 col-sm-6">
            <label for="fullname">{{t('full.name')}}<span class="text-red">*</span></label>
            <input class="form-control" name="fullname" type="text" value="{{old('fullname', @$fullname)}}" maxlength="200" required>

            @include('component.error-message', ['field' => 'fullname'])
        </div>
        <div class="form-group col-12 col-sm-6">
            <label for="birthdate">{{t('date.of.birth')}}<span class="text-red">*</span></label>
            <div class="input-group">
                <input class="form-control datepicker" id="birthdate" name="birthdate" type="text" value="{{old('birthdate', @$birthdate)}}">
                <div class="input-group-append">
                    <a class="btn btn-outline-primary" onclick="$('.datepicker').focus()"><i class="icon-calendar icon-birthdate"></i></a>
                </div>
            </div>

            @include('component.error-message', ['field' => 'birthdate'])
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6">
            <label for="nationality">{{t('nationality')}}<span class="text-red">*</span></label>
            <input class="form-control" name="nationality" type="text" value="{{old('nationality', @$nationality)}}" maxlength="200" required>

            @include('component.error-message', ['field' => 'nationality'])
        </div>
        <div class="form-group col-sm-6">
            <label for="mobile">{{t('mobile.phone')}}<span class="text-red">*</span></label>
            <input class="form-control" name="mobile" type="text" value="{{old('mobile', @$mobile)}}" placeholder="Ex. 080-1234567" maxlength="20" required>

            @include('component.error-message', ['field' => 'mobile'])
        </div>
    </div>
    <div class="form-group">
        <label for="email">{{t('email')}}<span class="text-red">*</span></label>
        <input class="form-control" name="email" type="email" value="{{old('email', @$email)}}" maxlength="200" required>

        @include('component.error-message', ['field' => 'email'])
    </div>
    <div class="form-group">

        <label for="address">{{t('address')}}<span class="text-red">*</span></label>
        <textarea class="form-control" name="address" cols="40" rows="5" maxlength="10000" required>{{old('address', @$address)}}</textarea>

        @include('component.error-message', ['field' => 'address'])

    </div>
    <div class="bg-gray p-3 mb-4">
        <div class="form-row justify-content-center align-items-center">
            <div class="col-12 col-sm-2 col-lg-2">
                <label for="picture">{{t('picture')}}</label>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <input class="form-control mb-0 px-0" name="picture" type="file" id="picture">

                @include('component.error-message', ['field' => 'picture'])

            </div>
        </div>
        <div class="form-row">
            <div class="col-12 text-center">
                <p class="mb-0">{{t('application.attachment.image')}}</p>
                <p>{{t('application.attachment.recommend')}}</p>
            </div>
        </div>
        <div class="form-row justify-content-center align-items-center">
            <div class="col-12 col-sm-2 col-lg-2">
                <label for="resume">{{t('resume')}}</label>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <input class="form-control mb-0 px-0" name="resume" type="file" id="resume">

                @include('component.error-message', ['field' => 'resume'])

            </div>
        </div>
        <div class="form-row">
            <div class="col-12 text-center">
                <p>{{t('application.attachment.doc')}}</p>
            </div>
        </div>
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
