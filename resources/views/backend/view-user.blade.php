@include('layouts.dashboard.header')


<main class="content">
    <section class="main-content">
        <div class="title-head">
            <h1>User</h1>
        </div>
        <div class="white-box">
            <form action="" class="form">
                <div class="basic_info">
                    <h4>Basic Info</h4>
                    <!--div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"><i class="fal fa-pencil"></i></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview"
                                style="background-image: url('https://html.customerdevsites.com/Evolving-love/Dashboard/images/Evolving%20Love%20Background%20Image%20-%20Android%20Jones%20Union%20(hires).jpeg');">
                            </div>
                        </div>
                    </div-->
                    <div class="progress_bar">
                        <!--span>74% Completed</span>
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar w-75"></div>
                        </div-->
                        <ul>
                            @php 
                            $date = strtotime($user->created_at); 
                            $new_date = date('d F Y', $date);
                            @endphp
                            <li><strong>Date Created</strong>{{$new_date}}</li>
                            <!--li><strong>Last Login</strong>12 May 2022</li-->
                        </ul>
                    </div>
                </div>
                <div class="user_details">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>First Name: <small>{{$user->name}}</small></td>
                                <td>Last Name:<small>{{$user->lastname}}</small></td>
                                <td>Mobile: <small>{{$user->phone}}</small></td>
                                <td>Email: <small>{{$user->email}}</small></td>
                                @if($user->role=="1")
                                @php $type ="Admin"; @endphp
                                @else
                                @php $type ="User"; @endphp
                                @endif
                                <td>Role: <small>{{$type}}</small></td>
                            </tr>
                            <tr>
                                <td>Ontraport ID:  <samll>{{$user->ontra_id}}</small></td>
                                <td>Full Profile URL: <small>{{$link}}</small></td>
                                <td colspan="5">Password: <samll>****************</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-btn">
                    <a href="/edit-user/{{$user->id}}" class="btn btn-primary">Edit</a>
                </div>



            </form>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')