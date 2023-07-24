@include('layouts.dashboard.header')

<main class="content">
    <section class="main-content" id="section1">
        <div class="title-head">
            <h1>All Submit Quiz</h1>
            
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
                            <th class="text-nowrap">Ontraport ID</th>
                            <th class="text-nowrap">Date</th>
                            
                            
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($all_submit_quiz as $get_users_value)
                        <?php
                        $quiz_json = DB::table('formdata')->where('id',$get_users_value->id)->first();                        
                        $quiz_decode = (array)json_decode($quiz_json->data);
                        // echo "<pre>";
                        // print_r($quiz_decode);exit;
                        for($bb=1;$bb<=count($quiz_decode);$bb++){
                            if (array_key_exists("firstname",$quiz_decode['question'.$bb])){
                                $val_arr1 = $bb;
                             }
                             if (array_key_exists("lastname",$quiz_decode['question'.$bb])){
                                $val_arr2 = $bb;
                             }
                             if (array_key_exists("email",$quiz_decode['question'.$bb])){
                                $val_arr3 = $bb;
                             }
                            
                        }
                        // echo'<pre>';print_r($quiz_decode['question20']->firstname);echo'</pre>';exit();
                        
                        ?>
                        
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$quiz_decode['question'.$val_arr1]->firstname}}</td>
                            <td>{{$quiz_decode['question'.$val_arr2]->lastname}}</td>
                            @if(isset($val_arr3))
                            <td>{{$quiz_decode['question'.$val_arr3]->email ?? ""}}</td>
                            @else 
                            <td>--</td>
                            @endif
                            @if($get_users_value->ontraport_id == '')
                            <td>-----</td>
                            @else
                            <td>{{$get_users_value->ontraport_id}}</td>
                            @endif
                            
                            <td>{{date("d-M-Y", strtotime($get_users_value->created_at))}}</td>
                            
                            
                            <td>
                                <a href="{{url('admin/quiz-detail/'.$get_users_value->id)}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>

                        @php
                        $count ++;
                        @endphp

                        @endforeach
                        
                        
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <section class="main-content" id="section2" style="display: none;">
        <div class="title-head">
            <h1>Submit Quiz Detail</h1>
            
        </div>
        <div class="white-box">
            <div class="table-responsive">
                
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')

<script type="text/javascript">
    $("document").ready(function(){
        $(".submitquiz-detail").click(function(){
            var quiz_id = $(this).attr('id');
            alert(quiz_id);
            if(quiz_id != ''){
                $("#section1").css("display","none")
                $("#section2").css("display","")
            }else{
                $("#section1").css("display","")
                $("#section2").css("display","none")
            }


                $.ajax({
                   
                    url: "/admin/quizdetail",
                    type: "GET",                    
                    data: {'quiz_id':quiz_id},
                    
                    success: function(data){
                        if(data.status==1){
                            alert('Ok')
                        $('#home_industries_regions')[0].reset();
                        }else{
                            Swal.fire(data.msg);
                        }
                    },
                });
         
        });
    });
</script>