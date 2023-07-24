@include('layouts.dashboard.header')

<main class="content">
<section class="main-content">
        <div class="title-head">
            <h1>Dashboard</h1>
        </div>
        <div class="dashboard_wrap">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Quiz Analytics
                    </button>
                  </h2>

                  @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$started_quiz}}</h4>
                                    <p># Started Quiz</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$completed_quiz}}</h4>
                                    <p># Completed Quiz</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$started_quiz_month}}</h4>
                                    <p># Started Quiz This Month</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$completed_quiz_month}}</h4>
                                    <p># Completed Quiz This Month</p>
                                </div>
                            </div>
                            @php 
                              $total_user = $started_quiz+$completed_quiz;
                              $complete_quiz =  $completed_quiz/$total_user*100;
                              $completed = round( $complete_quiz);
                            @endphp
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$completed}}%</h4>
                                    <p>% Completed Quiz</p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Sale Analytics
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$total_sales}}</h4>
                                    <p>Total # Sales</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$month_total_sales}}</h4>
                                    <p># Sales This Month</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>${{$total_sum}}</h4>
                                    <p>Total Sale</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>${{$month_total_sum}}</h4>
                                    <p>Total Sales This Month</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>22%</h4>
                                    <p>% Sales Conversion</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>12%</h4>
                                    <p>% Cart Abandon</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>42%</h4>
                                    <p>% Upsell Conversion</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </div>
                </div> -->
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Profile Analytics
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$total_paid_user}}</h4>
                                    <p>Total # Paid Profile</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                    <h4>{{$month_paid_user}}</h4>
                                    <p># Paid Profile This Month</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="ctnt">
                                @foreach($user as $users)
                                    @php
                                    $data1 =   DB::table('users')->where('id',$users->id)->first();
                                    $profile = [];
                                    $total1 = 0;
                                    if($data1->name != ''){
                                        $total1 = 0+16;
                                    }
                                    if($data1->lastname != ''){
                                        $total1 =  $total1+16;
                                    }
                                    if($data1->email != ''){
                                        $total1 =  $total1+16;
                                    }
                                    if($data1->phone != ''){
                                        $total1 =  $total1+16;
                                    }
                                    if($data1->paid_user != ''){
                                        $total1 =  $total1+16;
                                    }
                                    if($data1->ontra_id != ''){
                                        $total1 =  $total1+16;
                                    }
                                    if($total1 == 100){
                                        $profile[] = $data1->id;
                                    }
                                   
                                    @endphp
                                @endforeach
                                                                    
                                    <h4>% @php print_r(count($profile)); @endphp </h4>
                                    <p>% Profile Completion </p>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="colum_wraper">
            <div class="title-head">
                <h5>Quizzes</h5>
                <div class="input-search">
                    <a href="{{url('admin/all-quiz')}}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="white-box px-0">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-nowrap">Quiz Name</th>
                                <th class="text-nowrap">Created On</th>
                                <th class="text-nowrap">Updated On</th>
                                <th class="text-nowrap">Started On</th>
                                <th class="text-nowrap">Completed On</th>
                                <th class="text-nowrap">% Completed</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                              $total_user = $started_quiz+$completed_quiz;
                              $complete_quiz =  $completed_quiz/$total_user*100;
                              $completed = round( $complete_quiz);
                            @endphp
                            <tr>
                                <td>{{$quiz_all->welcome_title}}</td>
                                <td>{{date('d M Y', strtotime($quiz_all->create_at))}}</td>
                                <td>{{date('d M Y', strtotime($quiz_all->updated_at))}}</td>
                                <td>{{$started_quiz}}</td>
                                <td>{{$completed_quiz}}</td>
                                <td class="text-nowrap">{{$completed}}%</td>
                                <td>
                                    <a href="{{url('admin/welcome-screen')}}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="colum_wraper">
            <div class="title-head">
                <h5>Users</h5>
                <div class="input-search">
                    <a href="{{url('/admin/add-user')}}" class="btn btn-grey">Add New User</a>
                    <a href="{{url('/admin/user')}}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="white-box px-0">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-nowrap">First Name</th>
                                <th class="text-nowrap">Last Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Date Created</th>
                                <th class="text-nowrap">Last Login</th>
                                <th class="text-nowrap">Role</th>
                                <th class="text-nowrap">ID (ontraport)</th>
                                <th class="text-nowrap">% Completed</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $users)
                            @php
                            $date = date('d M Y',strtotime($users->created_at));
                             $data =   DB::table('users')->where('id',$users->id)->first();
                           
                             $total = 0;
                             if($data->name != ''){
                                $total = 0+16;
                             }
                             if($data->lastname != ''){
                                $total =  $total+16;
                             }
                             if($data->email != ''){
                                $total =  $total+16;
                             }
                             if($data->phone != ''){
                                $total =  $total+16;
                             }
                             if($data->paid_user != ''){
                                $total =  $total+16;
                             }
                             if($data->ontra_id != ''){
                                $total =  $total+16;
                             }
                         
                            @endphp
                           
                            <tr>
                                <td>{{$users->name ?? ''}}</td>
                                <td>{{$users->lastname}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$date}}</td>
                                <td>12 Jan 2023</td>
                                <td>{{$users->role == 1 ? 'Admin' : 'User'}}</td>
                                <td>{{$users->ontra_id}}</td>
                                <td class="text-nowrap">{{$total}}%</td>
                                <td>
                                    <a href="/view-user/{{$users->id}}" class="btn btn-primary">View</a>
                                    <a href="/revoke-user/{{$users->id}}" class="btn btn-grey">Revoke</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="colum_wraper">
            <div class="title-head">
                <h5>Payments</h5>
                <div class="input-search">

                    <a data-href="/admin/csv" id="export" onclick="exportTasksss(event.target);" class="btn btn-grey">CSV</a>
                    <a href="{{url('admin/payment')}}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="white-box px-0">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="text-nowrap">First Name</th>
                                <th class="text-nowrap">Last Name</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Product Purchased</th>
                                <th class="text-nowrap">Date Purchased</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            @php 
                            $paymentdate = date('d M Y',strtotime($payment->created_at));
                            @endphp
                            <tr>
                                <td>{{$payment->first_name}}</td>
                                <td>{{$payment->last_name}}</td>
                                <td>{{$payment->email}}</td>
                                <td>{{$payment->type == 0 ? '24 LESSONS + 21 EVOLVING LOVE PRACTICES' :($payment->type == 1 ? 'Your Private 1:on:1 Evolving Love Archetype Sessions' : 'Upgrade To Receive Your Full Report + 24 Lesson Guide')}}</span></td>
                                <td>{{$paymentdate}}</td>
                                <td>
                                    <a href="/admin/payment-detail/{{$payment->id}}" class="btn btn-primary">View Payment</a>
                                </td>
                            </tr>   
                            @endforeach    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
function exportTasksss(_this) {
    let _url = $(_this).data('href');
    window.location.href = _url;
}

</script>
@include('layouts.dashboard.footer')