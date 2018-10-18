<form method="get">
    <div class="form-row justify-content-between mb-4">
        <div class="col-md-6 col-lg-7 mb-4 mb-md-0 ">
            <div class="search">
                <input type="text" name="search" value="{{$search}}" class="form-control" placeholder="{{t('search.news')}}">
                <input type="submit" class="btn btn-success" value="{{t('search')}}">
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="filter">
                <label class="filter__title" for="year">{{t('year')}}: </label>
                <div class="filter__selection">
                    <div class="filter__icon"><i class="icon-arrow-down"></i></div>
                    <select name="year" class="form-control filter__select" onchange="this.form.submit()">
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
