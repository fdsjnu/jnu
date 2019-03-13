  {!! Form::open(['method' => 'GET','id' => 'form', 'route' => ['backend.designations.search']]) !!}
<table>
    

        <tr>
             <td><input type="text" class="form-control" name="id" id="id" value="{{old('id')}}" placeholder="ID" v-model="searchQuery" ></td>
            <td><input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder= "Name"></td>
            <td><input type="text" class="form-control" name="code" value="{{old('code')}}"  placeholder="Code"></td>            
            <td> 
                {{ Form::submit('Search', array('class'=>'btn btn-default')) }}  
            <a href="{{ route('backend.designations.index') }}"><i class="fa fa-circle-o"></i> Refresh</a>
            </td>

        </tr>
       

      
</table>
  {{ Form::close() }}
<table class="table table-bordered">
    <thead>
        
        <tr>
           <td width="80">ID</td>
            <td>Name</td>
            <td>Code</td>
            <td>Status</td>
            <td width="80">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($candidates as $category)

            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->code }}</td>
                <td> <td>{{ $category->status == 1 ? 'Active': 'Inactive' }}</td></td> 
                 <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.designations.destroy', $category->id]]) !!}
                        <a href="{{ route('backend.designations.edit', $category->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                         <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                    {!! Form::close() !!}
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
