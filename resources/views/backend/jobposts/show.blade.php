@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit job posts')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Job Post
          <small>{{$jobpost->departments->name }} ({{$jobpost->code}})</small>
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
             
           <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                    <h3>General details</h3>
                      <div class="row">
                        <div class="col-md-2"> <a class="btn btn-xs  btn-info" href="">View All Applications</a></div>   
                        <div class="col-md-2"><a class="btn btn-xs btn-warning" href="">View All Paid Applications</a></div>   
                        <div class="col-md-2"> <a class="btn btn-xs btn-primary" href="">All Applicants Summary</a></div>   
                        <div class="col-md-2"> <a class="btn btn-xs btn-success" href="">View Shortlist Candidates</a></div>   
                        <div class="col-md-2"> <a class="btn btn-xs btn-danger" href="">Print Applicants Summary</a></div> 
                        <div class="col-md-2"> <a href="{{ route('backend.jobposts.edit', $jobpost->id) }}" class="btn btn-xs btn-primary">Update </a></div>
                      </div>
                  <table id="w0" class="table table-striped table-bordered detail-view">
                    <tbody>
                    <tr><th>Post</th><td>{{ $jobpost->designations->name }}</td></tr>
                    <tr><th>ID</th><td>{{$jobpost->id}}</td></tr>
                    <tr><th>Advertisement No.</th><td>{{$jobpost->code}}</td></tr>
                    <tr><th>Department</th><td>{{$jobpost->departments->name }}</td></tr>
                    <tr><th>Total Vacancies</th><td>{{$totalVacancy}}</td></tr>
                    <tr><th>Session</th><td>{{$jobpost->session}}</td></tr>
                    <tr><th>Start Date</th><td>{{$jobpost->startDate}}</td></tr>
                    <tr><th>Satrting Time</th><td>{{$jobpost->startingTime}}</td></tr>
                    <tr><th>Close Date</th><td>{{$jobpost->closeDate}}</td></tr>
                    <tr><th>Closing Time</th><td>{{$jobpost->closingTime}}</td></tr>
                    <tr><th>Status</th><td>{{ $jobpost->status == 1 ? 'Active': 'Inactive' }}</td></tr>
                    <tr><th>Upload Acadmic</th><td>{{ $jobpost->uAcadmic == 1 ? 'Yes': 'No' }}</td></tr>
                    <tr><th>Upload Teaching Experience</th><td>{{ $jobpost->uTeachExp  == 1 ? 'Yes': 'No' }}</td></tr>
                    <tr><th>Upload Research Experience</th><td>{{ $jobpost->uResExp == 1 ? 'Yes': 'No' }}</td></tr>
                    <tr><th>Upload Present Employee certificate</th><td>{{ $jobpost->uPreDetails == 1 ? 'Yes': 'No' }}</td></tr>
                    <tr><th>Upload Research Article</th><td>{{ $jobpost->uResArt == 1 ? 'Yes': 'No' }}</td></tr>
                    <tr><th>Upload Research Publication</th><td>{{ $jobpost->uResPub == 1 ? 'Yes': 'No' }}</td></tr>
                    <tr><th>Upload NOC Certificate</th><td>{{ $jobpost->uNoc == 1 ? 'Yes': 'No' }}</td></tr>
                    <tr><th>Created At</th><td>{{$jobpost->created_at}}</td></tr>
                    <tr><th>Updated At</th><td>{{$jobpost->updated_at}}</td></tr>
                    <tr><th>Created By</th><td><span class="not-set">{{$jobpost->created_by}}</span></td></tr>
                    <tr><th>Updated By</th><td>{{$jobpost->updated_by}}</td></tr>
                    </tbody>
                  </table>
                  <!-- End  -->
                        <div class="panel panel-bordered panel-primary">
          <div class="panel-heading">

              <h3 class="panel-title">Categorywise  Vacancy and fee </h3>
          </div>
          <div class="panel-body">
              <div class="panel-control">
                  <a class="pull-right btn btn-warning" href="{{ route('backend.jobposts.editjobcategory', ['jobid'=>$jobpost->id,'postid'=>$jobpost->post] ) }}">Update</a>
                  <button type="button" id="btn-cal-stat-jobpost" class="pull-right btn btn-danger " data-url="/jnurecRC57admin/index.php/postjobcategory/calstat" data-id="198">Calculate Statistics </button>
              </div>
             
              <div id="content-cal-stat-jobpost">
                  <div class="postjobcategory-view">
                      <table class="table table-bordered table-condensed table-striped">
                          <tbody>
                              <tr>
                                  <td colspan="6" class="text-center">Settings</td>
                                  <td colspan="5" class="text-center"> Statistics </td>
                              </tr>
                              <tr>
                                  <th style="width:3%;">S.No.</th>
                                  <th>Id</th>
                                  <th>Category Name</th>
                                  <th>Vacancy</th>
                                  <th>Amount</th>
                                  <th>Fee</th>
                                  <th>Allow</th>
                                  <th>Applied</th>
                                  <th>Not Paid</th>
                                  <th>Paid</th>
                                  <th>Shortlisted</th>
                                  <th>Selected</th>
                              </tr>
                              <tr>
                                @if($total_postjobcategory ==0)
                                  <td colspan="10">
                                      <h3 class="text-danger">Please Configure category wise fee otherwise, the applicants will not be able to submit their APPLICATION</h3></td>
                                  @else
                                  @php
                                    $sno =1;
                                    $totalvacancy = 0;
                                  @endphp
                                  
                                    @foreach ($postjobcategory as $postjobcategory1)
                                        @php
                                          $totalvacancy += $postjobcategory1->vacancy;
                                        @endphp
                                       <tr>
                                        <td> {{$sno++}}</td>
                                        <td> {{$postjobcategory1->id}}</td>
                                        <td> {{$postjobcategory1->jobcategory->name}}</td>
                                        <td> {{$postjobcategory1->vacancy}}</td>
                                        <td>  {{$postjobcategory1->amount}}</td>
                                        <td>  {{ $postjobcategory1->noFee == 1 ? 'Yes': 'No' }}</td>
                                        <td> {{ $postjobcategory1->allowed == 1 ? 'Yes': 'No' }}</td>
                                        <td> {{$postjobcategory1->applied}}</td>
                                        <td> {{$postjobcategory1->notPaid}}</td>
                                        <td> {{$postjobcategory1->feePaid}}</td>
                                        <td> {{$postjobcategory1->shortlisted}}</td>                    
                                        <td> {{$postjobcategory1->selected}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td> </td>
                                         <td> </td>
                                        <td colspan="2" align="center">Total Vacancy: {{$totalvacancy}}</td>
                                          <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                         <td> </td>           
                                        <td> </td>
                                    </tr>

                                  @endif
                              </tr>

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="panel-footer">
              <small> *Sum of "Not Paid" &amp; "Paid" may not equals to total "Applied Applicants" because some of not paid applicants din't filled their category.  </small>
          </div>
      </div>
                </div>
              </div>
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@include('backend.jobposts.script')
