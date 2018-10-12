<form method="get">
    <div class="form-row mb-4 justify-content-end">
        <div class="col-md-6 col-lg-3">
            <div class="filter">
                <label class="filter__title" for="year">{{t('year')}}: </label>
                <div class="filter__selection">
                    <div class="filter__icon"><i class="icon-arrow-down"></i></div>
                    <select name="year" class="form-control filter__select" onchange="this.form.submit()">
                        <option value="">{{t('all')}}</option>

                        @foreach ($years as $key => $value)
                        <option value="{{$key}}"{{$key == $year ? ' selected' : ''}}>
                            {{$value}}
                        </option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
    </div>
</form>
