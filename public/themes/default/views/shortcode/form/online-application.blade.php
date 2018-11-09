<form class="form form--primary" action="{{action('Web\MailController@application', ['name'=>'online.application'])}}" name="application" method="post" _lpchecked="1">

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
                        <input checked type="radio" name="{{t('mr')}}">
                        <span class="text">{{t('mr')}}</span>
                        <div class="bullet"></div>
                    </li>
                    <li>
                        <input type="radio" name="{{t('mr')}}">
                        <span class="text">{{t('mrs')}}</span>
                        <div class="bullet"></div>
                    </li>
                    <li>
                        <input type="radio" name="{{t('ms')}}">
                        <span class="text">{{t('ms')}}</span>
                        <div class="bullet"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6">

            <label for="firstname">{{t('first.name')}}<span class="text-red">*</span></label>
            <input class="form-control" name="firstname" type="text" value="{{old('firstname', @$firstname)}}" required>

            @include('component.error-message', ['field' => 'firstname'])



        </div>
        <div class="form-group col-sm-6">

            <label for="lastname">{{t('last.name')}}<span class="text-red">*</span></label>
            <input class="form-control" name="lastname" type="text" value="{{old('lastname', @$lastname)}}" required>

            @include('component.error-message', ['field' => 'lastname'])


        </div>
        <div class="form-group col-sm-6">
            <label for="birthdate">{{t('date.of.birth')}}<span class="text-red">*</span></label>
            <input class="form-control" name="birthdate" type="text" value="{{old('birthdate', @$birthdate)}}">

            @include('component.error-message', ['field' => 'birthdate'])


        </div>
        <div class="form-group col-sm-6">
            <label for="nationality">{{t('nationality')}}<span class="text-red">*</span></label>
            <input class="form-control" name="nationality" type="text" value="{{old('nationality', @$nationality)}}" required>

            @include('component.error-message', ['field' => 'nationality'])


        </div>
        <div class="form-group col-sm-6">
            <label for="mobile">{{t('mobile.phone')}}<span class="text-red">*</span></label>
            <input class="form-control" name="mobile" type="text" value="{{old('mobile', @$mobile)}}" required>

            @include('component.error-message', ['field' => 'mobile'])


        </div>
        <div class="form-group col-sm-6">

            <label for="email">{{t('email')}}<span class="text-red">*</span></label>
            <input class="form-control" name="email" type="email" value="{{old('email', @$email)}}" required>

            @include('component.error-message', ['field' => 'email'])

        </div>
    </div>
    <div class="form-group">

        <label for="address">{{t('address')}}<span class="text-red">*</span></label>
        <textarea class="form-control" name="address" cols="40" rows="5">{{old('address', @$address)}}</textarea>

        @include('component.error-message', ['field' => 'address'])

    </div>
    <div class="bg-gray p-3 mb-4">
        <div class="form-row justify-content-center align-items-center">
            <div class="col-12 col-sm-2 col-lg-auto">
                <label for="picture">{{t('picture')}}</label>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <input class="form-control mb-0" name="picture" type="file" id="picture">

                @include('component.error-message', ['field' => 'picture'])

            </div>
        </div>
        <div class="form-row justify-content-center align-items-center">
            <div class="col-12 col-sm-2 col-lg-auto">
                <label for="resume">{{t('resume')}}</label>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <input class="form-control mb-0" name="resume" type="file" id="resume">

                @include('component.error-message', ['field' => 'resume'])

            </div>
        </div>
        <div class="form-row">
            <div class="col-12 text-center mt-2">
                <p>{{t('application.attachment.maximum')}}</p>
                <p>{{t('application.attachment.recommend')}}</p>
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
