@extends('layouts.backend.main')

@section('title', 'MyBlog | Add new Job Posts')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Job Posts
          <small>Add new Job Posts</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('backend.jobposts.index') }}">jobposts</a></li>
          <li class="active">Add new</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($jobposts, [
                  'method' => 'POST',
                  'route'  => 'backend.jobposts.store',
                  'files'  => TRUE,
                  'id' => 'jobposts-form'
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
