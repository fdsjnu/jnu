<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            {!! Form::label('Code') !!}
            {!! Form::text('code', null, ['class' => 'form-control']) !!}

            @if($errors->has('code'))
                <span class="help-block">{{ $errors->first('code') }}</span>
            @endif
        </div>

      

         <div class="form-group">
            {!! Form::label('Status') !!}
        
           {!! Form::select('status', array('1' => 'Active', '0' => 'Inactive')); !!}
         
        </div>



    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save' }}</button>
        <a href="{{ route('backend.designations.index') }}" class="btn btn-default">Cancel</a>
    </div>
  </div>
  <!-- /.box -->
</div>
