  {!! Form::open(['method' => 'GET','id' => 'form', 'route' => ['backend.categories.search']]) !!}
<table>
    

        <tr>
             <td><input type="text" class="form-control" name="id" id="id" value="{{old('id')}}" placeholder="ID" v-model="searchQuery" ></td>
            <td><input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Category Name"></td>
            <td><input type="text" class="form-control" name="code" value="{{old('code')}}"  placeholder="Short Form"></td>
            <td><input type="text" class="form-control" name="description" value="{{old('description')}}"  placeholder="Description"></td>
            
            <td> 
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
            <td>Code</td>
           <td>Department</td>
            <td width="80">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($jobposts as $category)

            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->code }}</td>
                 <td>{{ $category->department->name }}</td>
                 <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.jobposts.destroy', $jobposts->id]]) !!}
                        <a href="{{ route('backend.jobposts.edit', $category->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if($category->id == config('cms.default_category_id'))
                            <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                                <i class="fa fa-times"></i>
                            </button>
                        @else
                            <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                        @endif
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
