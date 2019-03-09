  {!! Form::open(['method' => 'GET','id' => 's-form', 'route' => ['backend.categories.search']]) !!}
<table>
    

        <tr>
             <td><input type="text" class="form-control" name="id" id="id" value="" placeholder="ID" v-model="searchQuery" ></td>
            <td><input type="text" class="form-control" name="name" value="" placeholder="Category Name"></td>
            <td><input type="text" class="form-control" name="code" value=""  placeholder="Short Form"></td>
            <td><input type="text" class="form-control" name="description" value=""  placeholder="Description"></td>
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
            <td>Category Name</td>
            <td>Short Form</td>
            <td>Description</td>
            <td>Status</td>
            <td width="120">Post Count</td>
            <td width="80">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)

            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->code }}</td>
                <td> {{ $category->description }}</td>
                <td> {{ $category->status}}</td>
                <td>{{ $category->posts->count() }}</td>
                 <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['backend.categories.destroy', $category->id]]) !!}
                        <a href="{{ route('backend.categories.edit', $category->id) }}" class="btn btn-xs btn-default">
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