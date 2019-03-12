<div class="col-xs-9">
  <div class="box">
    <div class="box-body ">

        <div class="form-group col-md-6 {{ $errors->has('postNo') ? 'has-error' : '' }}">
            {!! Form::label('Post No') !!}
            {!! Form::text('postNo', null, ['class' => 'form-control']) !!}

            @if($errors->has('postNo'))
                <span class="help-block">{{ $errors->first('postNo') }}</span>
            @endif
        </div>
        <div class="form-group col-md-6 {{ $errors->has('code') ? 'has-error' : '' }}">
            {!! Form::label('Advertisement No.') !!}
            {!! Form::text('code', null, ['class' => 'form-control']) !!}

            @if($errors->has('code'))
                <span class="help-block">{{ $errors->first('code') }}</span>
            @endif
        </div>
        
         <div class="form-group col-md-6">
            {!! Form::label('Essentials') !!}
            {!! Form::textarea('description',null,  ['class' => 'form-control']) !!}
         
        </div>

         <div class="form-group col-md-6">
            {!! Form::label('Desirable') !!}
            {!! Form::textarea('desirable',null,  ['class' => 'form-control ']) !!}
         
        </div>

         <div class="form-group col-md-6">
            {!! Form::label('Post') !!}
        
          <select class="form-control" name="post">
             <option value="">Select</option>
            @foreach($items as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group col-md-6">
            {!! Form::label('Department') !!}
        
          <select class="form-control" name="department">
             <option value="">Select</option>
            @foreach($departments as $department)
              <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
        </div>
         <div class="form-group col-md-4 {{ $errors->has('session') ? 'has-error' : '' }}">
            {!! Form::label('Session') !!}
            {!! Form::text('session', null, ['class' => 'form-control']) !!}

            @if($errors->has('session'))
                <span class="help-block">{{ $errors->first('session') }}</span>
            @endif
        </div>

        <div class="form-group col-md-4 {{ $errors->has('startDate') ? 'has-error' : '' }}">
                {!! Form::label('startDate', 'Start Date') !!}
                <div class='input-group date' id='datetimepicker1'>
                    {!! Form::text('startDate', date("Y-m-d"), ['class' => 'form-control', 'placeholder' => 'Y-m-d']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                @if($errors->has('startDate'))
                    <span class="help-block">{{ $errors->first('startDate') }}</span>
                @endif
         </div>

          <div class="form-group col-md-4 {{ $errors->has('startingTime') ? 'has-error' : '' }}">
                {!! Form::label('startingTime', 'Satrting Time') !!}
                <div class='input-group date' id='datetimepicker2'>
                    {!! Form::text('startingTime', date("HH:mm:ss"), ['class' => 'form-control', 'placeholder' => 'HH:mm:ss']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>

                @if($errors->has('startingTime'))
                    <span class="help-block">{{ $errors->first('startingTime') }}</span>
                @endif
         </div>

          <div class="form-group col-md-4 {{ $errors->has('closeDate') ? 'has-error' : '' }}">
                {!! Form::label('closeDate', 'Close Date') !!}
                <div class='input-group date' id='datetimepicker3'>
                    {!! Form::text('closeDate', date("Y-m-d"), ['class' => 'form-control', 'placeholder' => 'Y-m-d']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                @if($errors->has('closeDate'))
                    <span class="help-block">{{ $errors->first('closeDate') }}</span>
                @endif
         </div>

          <div class="form-group col-md-4 {{ $errors->has('closingTime') ? 'has-error' : '' }}">
                {!! Form::label('closingTime', 'Satrting Time') !!}
                <div class='input-group date' id='datetimepicker4'>
                    {!! Form::text('closingTime', date("HH:mm:ss"), ['class' => 'form-control', 'placeholder' => 'HH:mm:ss']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>

                @if($errors->has('closingTime'))
                    <span class="help-block">{{ $errors->first('closingTime') }}</span>
                @endif
         </div>

         <div class="form-group col-md-4">
            {!! Form::label('Status') !!}        
           <select class="form-control" name="status">
            <option value="0">Active</option>
             <option value="1">Inactive</option>
            </select>
         
        </div>
        <div class="col-md-12">Upload Required Section</div>
        <div class="form-group col-md-4">
           {{ Form::checkbox('uAcadmic', '1', true) }} Upload Acadmic
        </div>
         <div class="form-group col-md-4">
           {{ Form::checkbox('uTeachExp', '1', true) }} Upload Teaching Experience
        </div>
         <div class="form-group col-md-4">
           {{ Form::checkbox('uResExp', '1', true) }} Upload Research Experience
        </div>

         <div class="form-group col-md-4">
           {{ Form::checkbox('uPreDetails', '1', true) }} Upload Present Employee certificate
        </div>
         <div class="form-group col-md-4">
           {{ Form::checkbox('uNoc', '1', true) }} Upload NOC Certificate
        </div>
         <div class="form-group col-md-4">
           {{ Form::checkbox('uResArt ', '1', true) }} Upload Research Article
        </div>
         <div class="form-group col-md-12">
           {{ Form::checkbox('uResPub', '1', true) }} Upload Research Publication
        </div>



    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">{{ $jobposts->exists ? 'Update' : 'Save' }}</button>
        <a href="{{ route('backend.jobposts.index') }}" class="btn btn-default">Cancel</a>
    </div>
  </div>
  <!-- /.box -->
</div>
