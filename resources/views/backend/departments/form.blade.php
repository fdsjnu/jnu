<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('email') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}

            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('shortName') ? 'has-error' : '' }}">
            {!! Form::label('Short Form') !!}
            {!! Form::text('shortName', null, ['class' => 'form-control']) !!}

            @if($errors->has('shortName'))
                <span class="help-block">{{ $errors->first('shortName') }}</span>
            @endif
        </div>

         <div class="form-group">
            {!! Form::label('Hod') !!}
            {!! Form::text('hod',null,  ['class' => 'form-control']) !!}
         
        </div>

         <div class="form-group">
            {!! Form::label('Status') !!}
            <select class="form-control" name="status">
            <option value="active">Active</option>
             <option value="inactive">Inactive</option>
            </select>
           
         
        </div>



    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ $department->exists ? 'Update' : 'Save' }}</button>
        <a href="{{ route('backend.departments.index') }}" class="btn btn-default">Cancel</a>
    </div>
  </div>
  <!-- /.box -->
</div>
