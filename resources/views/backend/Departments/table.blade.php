{!! Form::open(['method' => 'GET','id' => 's-form', 'route' => ['backend.departments.search']]) !!}
<table>
    

        <tr>
             <td><input type="text" class="form-control" name="id" id="id" value="" placeholder="ID" v-model="searchQuery" ></td>
             <td><input type="text" class="form-control" name="email" value="" placeholder="Your Email"></td>
            <td><input type="text" class="form-control" name="name" value="" placeholder="Department Name"></td>
            <td><input type="text" class="form-control" name="code" value=""  placeholder="Short Form"></td>
            <td><input type="text" class="form-control" name="hod" value=""  placeholder="Hod"></td>
            <td>
                <select class="form-control" name="status">
                      <option value="">Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

            </td>
            <td> {{ Form::submit('Search', array('class'=>'btn btn-default')) }} 
            </td>

        </tr>
       

      
</table>
  {{ Form::close() }}
<table class="table table-bordered">
    <thead>
        
        <tr>
           <td width="80">ID</td>
           <td>Email</td>
            <td>Department Names</td>
            <td>Short Name</td>
            <td>Hod</td>
            <td>Status</td>
            <td width="120">Post Count</td>
            <td width="80">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)

            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->email }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->code }}</td>
                <td> {{ $department->hod }}</td>
                <td> {{ $department->status}}</td>
               
                 <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.departments.destroy', $department->id]]) !!}
                        <a href="{{ route('backend.departments.edit', $department->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if($department->id == config('cms.default_department_id'))
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
$('tbody').html(data);
}
});
})
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>