@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>Payments</h1>
        </div>
        <div class="white-box">
            <div class="table-responsive">
                <table id="datatableid">
                    <thead>
                        <tr>
                            <th class="text-nowrap">#</th>
                            <th class="text-nowrap">First Name</th>
                            <th class="text-nowrap">Last Name</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">Amount</th>
                            <th class="text-nowrap">Paymrny Date</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        ?>
                        @foreach($get_payments as $get_payments_value) 
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{ucfirst($get_payments_value->first_name)}}</td>
                            <td>{{ucfirst($get_payments_value->last_name)}}</td>
                            <td>{{$get_payments_value->email}}</td>
                            <td class="text-nowrap">${{$get_payments_value->amount}}</td>
                            <td class="text-nowrap">{{date('d - M - Y',strtotime($get_payments_value->created_at));}}</td>
                            <td>
                                <a href="{{url('admin/payment-detail/'.$get_payments_value->id)}}" class="btn btn-primary">View Payment</a>
                            </td>
                        </tr>
                        <?php
                        $count ++;
                        ?>
                        @endforeach
                        
                        
                        
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')