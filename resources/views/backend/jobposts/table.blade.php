  {!! Form::open(['method' => 'GET','id' => 'form', 'route' => ['backend.jobposts.search']]) !!}
<table>
    

        <tr>
             <td width="80"><input type="text" class="form-control" name="id" id="id" value="{{old('id')}}" placeholder="ID" v-model="searchQuery" ></td>
            <td  width="110">{!! Form::select('post', App\Designation::pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose post']) !!}</td>
            <td   width="190">{!! Form::select('department', App\Department::pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Choose department']) !!}</td>        
           
              <td width="80"><input type="text" class="form-control" name="startDate" id="startDate" value="{{old('startDate')}}" placeholder="startDate" ></td>
              <td width="110"><input type="text" class="form-control" name="closeDate" id="closeDate" value="{{old('closeDate')}}" placeholder="closeDate" ></td>
              <td width="100"> {!! Form::select('status', array('1' => 'Active', '0' => 'Inactive'),['class' => 'form-control', 'placeholder' => 'Choose Status'] ); !!}</td>
               <td > 
                {{ Form::submit('Search', array('class'=>'btn btn-default')) }}  
                  <a href="{{ route('backend.jobposts.index') }}"><i class="fa fa-circle-o"></i> Refresh</a>
            </td>

        </tr>
       

      
</table>
  {{ Form::close() }}
<table class="table table-bordered">
    <thead>
        
        <tr>
           <td width="80">ID</td>
            <td>Post</td>
           <td>Department</td>
           <td>Start Date</td>
           <td>Close Date</td>
           <td>Status</td>

            <td width="80">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($jobposts as $jobpost)

            <tr>
                <td>{{ $jobpost->id }}</td>
                <td>{{ $jobpost->designations->name }}</td>
                 <td>{{ $jobpost->departments->name }}</td>
                  <td>{{ $jobpost->startDate }}</td>
                   <td>{{ $jobpost->closeDate }}</td>
                    <td>{{ $jobpost->status == 1 ? 'Active': 'Inactive' }}</td>
                 <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.jobposts.destroy', $jobpost->id]]) !!}
                        <a href="{{ route('backend.jobposts.edit', $jobpost->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                         <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                    {!! Form::close() !!}
                      <a href="{{ route('backend.jobposts.show', $jobpost->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-eye"></i>
                        </a>
                         <butt
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
