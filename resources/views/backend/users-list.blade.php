@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>All User </h1>
           
        </div>
        
        <div class="white-box">
            <div class="table-responsive" style="overflow-x: visible;">
                <table id="datatableid">
                    <thead>
                        <tr>
                            <th class="text-nowrap">First Name</th>
                            <th class="text-nowrap">Last Name</th>
                            <th class="text-nowrap">Email</th>
                            <th class="text-nowrap">User Type</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($get_users as $get_users_value)
                        
                        <tr>
                            <td>{{ucfirst($get_users_value->name)}}</td>
                            <td>{{ucfirst($get_users_value->name)}}</td>
                            <td>{{$get_users_value->email}}</td>
                            @if($get_users_value->paid_user == 1)
                            <td class="text-nowrap">Paid User</td>
                            @else
                            <td class="text-nowrap">Unpaid User</td>
                            @endif
                            <td>
                                <a href="/view-user/{{$get_users_value->id}}" class="btn btn-primary">View</a>
                                <a href="javascript:void(0)" class="btn btn-primary br">Block</a>
                                <a href="/edit-user/{{$get_users_value->id}}" class="btn btn-primary">Edit</a>

                            </td>
                        </tr>

                        @endforeach
                        
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')