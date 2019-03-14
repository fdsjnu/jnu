@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit job posts')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Job Post
          <small>Edit Categorywise Vacancies & Fee</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('backend.jobposts.index') }}">Job Posts</a></li>
          <li class="active">Edit Categorywise Vacancies & Fee</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($jobpost, [
                  'method' => 'PUT',
                  'route'  => ['backend.jobposts.updatejobcategory', $jobpost->id],
                  'files'  => TRUE,
                  'id' => 'post-form'
              ]) !!}

            <div class="box">
              <div class="box-body">
                  <div class="panel-heading">                
                    <h3 class="panel-title">Categorywise Vacancies &amp;  Fee</h3>
                     @include('backend.partials.message')
                      <table class="table">
                          <tbody>
                            
                              <tr>                                
                                  <th>Category Name</th>
                                  <th>Vacancy</th>
                                  <th>Amount</th>
                                  <th>Fee</th>
                                  <th>Allow</th>
                                 
                              </tr>
                              <tr>   
                               <input type="hidden" name="post" value="{{Request::segment(4) }}"/>
                               <input type="hidden" name="job" value="{{Request::segment(3) }}"/>           

                                  @if($total_postjobcategory ==0)
                                      @foreach ($categories as $postjobcategory1)
                                      
                                       <tr>
                                        <td><input type="hidden" name="category[]" value="{{$postjobcategory1->id}}"/>{{$postjobcategory1->name}}</td>
                                        <td> <input type="text" name="vacancy[]" value=""/></td>
                                        <td> <input type="text" name="amount[]" value=""/></td>
                                        <td>
                                            <select id="postjobcategory-0-nofee" class="form-control" name="noFee[]" value="0">
                                              <option value="1">No</option>
                                              <option value="0">Yes</option>
                                            </select>
                                          </td>
                                        <td> 
                                          <select id="postjobcategory-0-nofee" class="form-control" name="allowed[]" value="0">
                                              <option value="1">No</option>
                                              <option value="0">Yes</option>
                                            </select>

                                        </td>
                                       
                                    </tr>
                                    @endforeach

                                   @else

                                    @foreach ($postjobcategory as $postjobcategory1)
                                       
                                       <tr>
                                        <td> <input type="hidden" name="category[]" value="{{$postjobcategory1->jobcategory->id}}"/>{{$postjobcategory1->jobcategory->name}}</td>
                                        <td> <input type="text" name="vacancy[]" value="{{$postjobcategory1->vacancy}}"/></td>
                                        <td> <input type="text" name="amount[]" value="{{$postjobcategory1->amount}}"/></td>
                                        <td>
                                            <select id="postjobcategory-0-nofee" class="form-control" name="noFee[]" value="0">
                                              <option value="1" <?php if($postjobcategory1->noFee ==1) echo "selected";?>>No</option>
                                              <option value="0" <?php if($postjobcategory1->noFee ==0) echo "selected";?>>Yes</option>
                                            </select>
                                          </td>
                                        <td> 
                                          <select id="postjobcategory-0-nofee" class="form-control" name="allowed[]" value="0">
                                              <option value="1" <?php if($postjobcategory1->allowed ==1) echo "selected";?>>No</option>
                                              <option value="0" <?php if($postjobcategory1->allowed ==0) echo "selected";?>>Yes</option>
                                            </select>

                                        </td>
                                       
                                    </tr>
                                    @endforeach
                                    
                                    @endif
                                
                              </tr>

                          </tbody>
                      </table>
                  </div>
                    <div class="box-footer text-center">
                      <button type="submit" class="btn btn-primary">{{ $jobposts->exists ? 'Update' : 'Save' }}</button>
                      <a href="{{ route('backend.jobposts.index') }}" class="btn btn-default">Cancel</a>
                  </div>
                </div>
                 
              </div>

            {!! Form::close() !!}
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@include('backend.jobposts.script')
