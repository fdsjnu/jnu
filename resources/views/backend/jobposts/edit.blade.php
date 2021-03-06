@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit job posts')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Job Post
          <small>Edit jobposts</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('backend.jobposts.index') }}">Job Posts</a></li>
          <li class="active">Edit Job Posts</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($jobpost, [
                  'method' => 'PUT',
                  'route'  => ['backend.jobposts.update', $jobpost->id],
                  'files'  => TRUE,
                  'id' => 'post-form'
              ]) !!}

              @include('backend.jobposts.form')

            {!! Form::close() !!}
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@include('backend.jobposts.script')
