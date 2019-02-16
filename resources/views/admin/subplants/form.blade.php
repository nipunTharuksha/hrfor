<div class="form-group {{ $errors->has('subplantname') ? 'has-error' : ''}}">
    <label for="subplantname" class="control-label">{{ 'Subplantname' }}</label>
    <input class="form-control" name="subplantname" type="text" id="subplantname" value="{{ isset($subplant->subplantname) ? $subplant->subplantname : ''}}" >
    {!! $errors->first('subplantname', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
