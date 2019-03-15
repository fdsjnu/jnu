@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
         
            <div class="table-responsive">
								<table class="table">
									<thead>
									  <tr class="danger">
										<th>Posts</th>
										<th>Application Start Date/Time</th>
										<th>Application Close Date/Time</th>
										<th>Total Post</th>
									  </tr> 

									 <!--  <tr class="success">
										<th>Assistant Professor</th>
										<td>2017-12-30 Time: 09:00:00</td>
										<td>2018-01-29 Time: 17:30:00</td>
										<td>58</td>
									  </tr> -->
									</thead>
									<tbody>
										@php
											$all_total_vacancy = 0;
										@endphp
										 @foreach($jobposts as $jobpost)
										 	
									  <tr class="success">
										 <td>{{ $jobpost->designations->name }}</td>
						                  <td>{{ $jobpost->startDate }} {{$jobpost->startingTime}}</td>
						                   <td>{{ $jobpost->closeDate }} {{$jobpost->closingTime}}</td>
										<td> 
												@inject('provider', 'App\Http\Controllers\SideController')
												{{ $provider::totalVacancy($jobpost->post) }}
												@php
													$all_total_vacancy += $provider::totalVacancy($jobpost->post);
												@endphp

											
										</td> 
									  </tr> 
									   @endforeach
									
									  <tr class="info">
										
										<td></td>
										<td></td>
										<th>Total: </th>
										<td>{{$all_total_vacancy}}</td>
									  </tr> 
									</tbody>
								</table>
								<p>A number of faculty positions at the level of Professor, Associate Professor and Assistant Professor are available in various Schools/Centres of the University. &nbsp;Candidates with good academic record, teaching and research experience and working in related areas, are encouraged to apply. &nbsp;University also solicits applications from candidates with research interests that are interdisciplinary. At present, the number of vacancies at each level are as under:</p>

								<table class="table table-bordered">
									<thead>
									  <tr class="info">
										<th>Position/Scale of Pay</th>
										<th>Essential Qualifications</th>
										<th>SC</th>
										<th>ST</th>
										<th>OBC</th>
										<th>UR</th>
										<th>Total</th>

									  </tr> 
									</thead>
									<tbody>
										<tr>
											<td>Professor 37400-67000/- (PB-IV) AGP Rs. 10000/-</td>
											<td rowspan="3">As per UGC Regulations, 2010 as amended from time to time for all the teaching posts.</td>
											<td>02</td>
											<td>01</td>
											<td>-</td>
											<td>19</td>
											<td>22</td>
										</tr>
										<tr class="info">
											<td>Associate Professor 37400-67000/- (PB-IV) AGP Rs. 9000/-</td>
											<td>04</td>
											<td>03</td>
											<td>-</td>
											<td>19</td>
											<td>26</td>
										</tr>
										<tr class="info">
											<td>Assistant Professor 15600-39100/- (PB-III) AGP Rs. 6000/-</td>
											<td>04</td>
											<td>03</td>
											<td>-</td>
											<td>19</td>
											<td>26</td>
										</tr>
										<tr>
											<td>Total-</td>
											<td></td>
											<td>04</td>
											<td>03</td>
											<td>-</td>
											<td>19</td>
											<td>26</td>
										</tr>

									</tbody>
								</table>
								<h3><b>The deadline to submit recommendation is 22nd February 2018</b></h3>
								<h4><a target="_blank" href="/upload57/AdvtNoRC-57-2017Corrigendum.pdf">Corrigendum Advertisement No. RC/57/2017</a></h4>
								<h4><a target="_blank" href="/upload57/RC-57-2017.pdf">Click here to view the detailed advertisement for RC-57-2017</a></h4>

							</div>
            </div>

            @include('layouts.sidebar')
        </div>
    </div>

@endsection
