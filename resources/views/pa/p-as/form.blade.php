<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
    <label for="firstname" class="control-label">{{ 'Firstname' }}</label>
    <input class="form-control" name="firstname" type="text" id="firstname" value="{{ isset($pa->firstname) ? $pa->firstname : ''}}" >
    {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
    <label for="lastname" class="control-label">{{ 'Lastname' }}</label>
    <input class="form-control" name="lastname" type="text" id="lastname" value="{{ isset($pa->lastname) ? $pa->lastname : ''}}" >
    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dateofbirh') ? 'has-error' : ''}}">
    <label for="dateofbirh" class="control-label">{{ 'Dateofbirh' }}</label>
    <input class="form-control" name="dateofbirh" type="date" id="dateofbirh" value="{{ isset($pa->dateofbirh) ? $pa->dateofbirh : ''}}" >
    {!! $errors->first('dateofbirh', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mobilenumber') ? 'has-error' : ''}}">
    <label for="mobilenumber" class="control-label">{{ 'Mobilenumber' }}</label>
    <input class="form-control" name="mobilenumber" type="number" id="mobilenumber" value="{{ isset($pa->mobilenumber) ? $pa->mobilenumber : ''}}" >
    {!! $errors->first('mobilenumber', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
