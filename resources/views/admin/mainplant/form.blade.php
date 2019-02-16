<div class="form-group {{ $errors->has('mainplant') ? 'has-error' : ''}}">
    <label for="mainplant" class="control-label">{{ 'Mainplant' }}</label>
    <input class="form-control" name="mainplant" type="text" id="mainplant" value="{{ isset($mainplant->mainplant) ? $mainplant->mainplant : ''}}" >
    {!! $errors->first('mainplant', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
