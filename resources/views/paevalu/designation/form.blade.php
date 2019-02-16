


<div class="form-group {{ $errors->has('designationname') ? 'has-error' : ''}}">
    <label for="designationname" class="control-label">{{ 'Designation Name' }}</label>
    <input class="form-control" name="designationname" type="text" id="designationname" value="{{ isset($designation->designationname) ? $designation->designationname : ''}}" >
    {!! $errors->first('designationname', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
