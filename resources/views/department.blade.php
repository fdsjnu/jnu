{!! Form::open(['route' => 'department.store']) !!}

<div class="form-group">
    {!! Form::label('email', 'Your Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Your Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('shortname', 'Shortname') !!}
    {!! Form::text('shortname', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('hod', 'Your hod') !!}
    {!! Form::text('hod', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
<select name="status">
   <option {{old('status',$profile->status)=="active"? 'selected':''}}  value="active">Active</option>
   <option {{old('status',$profile->status)=="inactive"? 'selected':''}} value="inactive">Inactive</option>
</select>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}
