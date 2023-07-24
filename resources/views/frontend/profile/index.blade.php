@include('layouts.header')
<div class="overlay-layer d-lg-none"></div>
<style>
    .site-header nav .right>.btn,
    .site-header nav .left .site-hamburgur {
        display: none;
    }
</style>
<?php 
$routes = Route::current()->getName(); 
?>
<main class="content">
    <section class="page-innerTitle" style="background-image: url('{{ asset('images/Evolving Love Background Image - Android Jones Union (hires).jpeg')}}');">
        <figure><img src="{{ asset('images/Evolving Love Polarity Wheel Updated (white lines).png')}}" alt="Evolving Love Polarity Wheel Updated (white lines)"></figure>
        <div class="container">
            <div class="content-box">
                <h1 class="mb-0">MY PROFILES</h1>
            </div>
        </div>
    </section>
    <section class="chooseProfile-section">
     @include('frontend.profile.sidebar')
        <div class="chooseProfile-body">
            @if(count($get_survey)>0)
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>PROFILE</th>
                            <th>RELATIONSHIP</th>
                            <th>SUBMITTED ON</th>
                            <th>PROGRESS</th>
                            <th>PDF</th>
                            <th>SELECT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $i=0;
                        @endphp
                        @foreach($get_survey as $get)
                        @php $i++;
                        $formval = DB::table('formdata')->where('id',$get->formid)->first();
                        $a = json_decode($formval->data, true);
                        $date = date('d F, Y', strtotime($get->created_at));
                        $check_steps = DB::table('progress_steps')->where('formid',$get->formid)->first();
                        @endphp
                        @if($check_steps)
                        @php 
                        $total = round($check_steps->page1+$check_steps->page2+$check_steps->page3+$check_steps->page4+$check_steps->page5+$check_steps->page6+$check_steps->page7+$check_steps->page8+$check_steps->page9+
                        $check_steps->page10+$check_steps->page11+$check_steps->page12+$check_steps->page13+$check_steps->page14+$check_steps->page15+$check_steps->page16+$check_steps->page17+$check_steps->page18+
                        $check_steps->page19+$check_steps->page20+$check_steps->page21+$check_steps->page22+$check_steps->page23+$check_steps->page24);
                        $finaltotal = $total;
                        @endphp
                        @else
                        @php 
                        $finaltotal = 0;
                        @endphp
                        @endif
                        @php 
                        $page = round($finaltotal/4.2);
                        $filename =   public_path('/files/pdf/evolvinglove'.$get->formid.'.pdf');
                        $id = base64_encode("formid".$get->formid);
                        $redirect_url = '/introduction?formid='.$id;
                        @endphp
                        <tr>
                            <td><span>{{$i}}</span></td>
                            <td>Relationship Profile <br>For {{$a['question20']['firstname']}} {{$a['question21']['lastname']}}</td>
                            <td>Romantic Partner <br>{{$a['question4']['answer1']}}</td>
                            <td>{{$date}}</td>
                            <td>{{$finaltotal}}% Complete <br>({{$page}} out of 24)</td>
                            <td>
                            @if (file_exists($filename)) 
                            @php 
                            $link ='evolvinglove'.$get->formid.'.pdf';
                            @endphp
                                <a href="{{asset('files/pdf/'.$link)}}" download>

                                    <img height="30px" src="{{ asset('images/Evolving Love Icon - PDF Download.png')}}" alt="Evolving Love Icon - PDF Download">
                                </a>
                             @else
                             <a href="#" download>

                                    <img height="30px" src="{{ asset('images/Evolving Love Icon - PDF Download.png')}}" alt="Evolving Love Icon - PDF Download">
                            </a>
                            @endif
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick='redirect({{$get->formid}})' class="btn btn-primary br">Select</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            
            <div class="text-center mt-5">
                <a href="/quiz" class="btn btn-green">Retake Quiz</a>
            </div>
        </div>
    </section>
</main>
<script>
function redirect(formid){
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $.ajax({
	  url: "/redirect",
         type: "POST",
         dataType: "json",
		 data: { id : formid },
		 success: function(data){
                if(data.status==1){
                    window.location.href = '/introduction';
                }

              },
          });	
}
</script>
@include('layouts.footer')