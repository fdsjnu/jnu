@extends('layouts.backend.main')

@section('title', 'MyBlog | Add designation')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Designation
          <small>Add new designation</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('backend.designations.index') }}">Designation</a></li>
          <li class="active">Add new</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              {!! Form::model($category, [
                  'method' => 'POST',
                  'route'  => 'backend.designations.store',
                  'files'  => TRUE,
                  'id' => 'designation-form'
              ]) !!}

              @include('backend.designations.form')

            {!! Form::close() !!}
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@include('backend.designations.script')
