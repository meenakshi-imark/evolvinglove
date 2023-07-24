<aside class="sidebar">
    <div class="sideMap">
        <h2 class="color_black">Mastering Your Relationship Stance</h2>
        <p>A Step By Step Guide To Your Profile</p>
        <div class="progress mb-3">
            @php
            $datasession = session()->all();
            $check_steps = DB::table('progress_steps')->where('formid',$datasession['formid'])->first();
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
            <div class="progress-bar" role="progressbar" style="width: {{$finaltotal}}%" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        @php
        $step = DB::table('progress_steps')->where('formid',$datasession['formid'])->first();
        @endphp
        @php $route = Route::current()->getName(); @endphp
        
        @if($step)
        @php
           $step1 =$step->page1!=NULL ? 'marked-complete':''; 
           $step2 =$step->page2!=NULL ? 'marked-complete':''; 
           $step3 =$step->page3!=NULL ? 'marked-complete':''; 
           $step4 =$step->page4!=NULL ? 'marked-complete':''; 
           $step5 =$step->page5!=NULL ? 'marked-complete':''; 
           $step6 =$step->page6!=NULL ? 'marked-complete':''; 
           $step7 =$step->page7!=NULL ? 'marked-complete':''; 
           $step8 =$step->page8!=NULL ? 'marked-complete':''; 
           $step9 =$step->page9!=NULL ? 'marked-complete':''; 
           $step10 =$step->page10!=NULL ? 'marked-complete':''; 
           $step11 =$step->page11!=NULL ? 'marked-complete':''; 
           $step12 =$step->page12!=NULL ? 'marked-complete':''; 
           $step13 =$step->page13!=NULL ? 'marked-complete':''; 
           $step14 =$step->page14!=NULL ? 'marked-complete':''; 
           $step15 =$step->page15!=NULL ? 'marked-complete':''; 
           $step16 =$step->page16!=NULL ? 'marked-complete':''; 
           $step17 =$step->page17!=NULL ? 'marked-complete':''; 
           $step18 =$step->page18!=NULL ? 'marked-complete':''; 
           $step19 =$step->page19!=NULL ? 'marked-complete':''; 
           $step20 =$step->page20!=NULL ? 'marked-complete':''; 
           $step21 =$step->page21!=NULL ? 'marked-complete':''; 
           $step22 =$step->page22!=NULL ? 'marked-complete':''; 
           $step23 =$step->page23!=NULL ? 'marked-complete':''; 
           $step24 =$step->page24!=NULL ? 'marked-complete':''; 
        @endphp
        @else
        @php
            $step1 ="";
            $step2 ="";
            $step3 ="";
            $step4 ="";
            $step5 ="";
            $step6 ="";
            $step7 ="";
            $step8 ="";
            $step9 ="";
            $step10 ="";
            $step11 ="";
            $step12 ="";
            $step13 ="";
            $step14 ="";
            $step15 ="";
            $step16 ="";
            $step17 ="";
            $step18 ="";
            $step19 ="";
            $step20 ="";
            $step21 ="";
            $step22 ="";
            $step23 ="";
            $step24 ="";
        @endphp
        @endif
        <p class="text-center">{{$finaltotal}}% Complete</p>
        <ul class="mt-5 mb-6 site-menu">
            <li class="{{$step1}}">
                <a href="/introduction" class="{{ $route== 'introduction' ? 'active' : '' }}">Introduction</a>
            </li>
            <li class="{{$step2}}">
                <a href="/ring-of-resolution" class="{{ $route== 'ring-of-resolution' ? 'active' : '' }}">Ring Of Resolution</a>
            </li>
            <li class="{{$step3}}">
                <a href="/how-to-read-your-results" class="{{ $route== 'how-to-read-your-results' ? 'active' : '' }}">How To Read Your Results</a>
            </li>
            <li class="{{$step4}}">
                <a href="/result-summary" class="{{ $route== 'result-summary' ? 'active' : '' }}">Result Summary</a>
            </li>
            <li class="sub-dropdown">
                <a href="javascript:void(0)">Relationship Stance</a>
                <ul>
                <li class="{{$step5}}">
                        <a href="/primary-gifts" class="{{ $route== 'primary-gifts' ? 'active' : '' }}">Primary Gifts</a>
                    </li>
                    <li class="{{$step6}}">
                        <a href="/relationship-qualities" class="{{ $route== 'relationship-qualities' ? 'active' : '' }}">Relationship Qualities</a>
                    </li>
                    <li class="{{$step7}}">
                        <a href="/themes" class="{{ $route== 'themes' ? 'active' : '' }}">Themes</a>
                    </li>
                    <li class="{{$step8}}">
                        <a href="/relationship-skills" class="{{ $route== 'relationship-skills' ? 'active' : '' }}">Relationship Skills</a>
                    </li>
                    <li class="{{$step9}}">
                        <a href="/reference" class="{{ $route== 'reference' ? 'active' : '' }}">Reference (Internal vs External)</a>
                    </li>
                    <li class="{{$step10}}">
                        <a href="/tendencies" class="{{ $route== 'tendencies' ? 'active' : '' }}">Tendencies</a>
                    </li>
                    <li class="{{$step11}}">
                        <a href="/energetic-profile"  class="{{ $route== 'energetic-profile' ? 'active' : '' }}">Energetic Profile</a>
                    </li>
                    <li class="{{$step12}}">
                        <a href="/communication-profile"  class="{{ $route== 'communication-profile' ? 'active' : '' }}">Communication Profile</a>
                    </li>
                    <li class="{{$step13}}">
                        <a href="/decision-making-profile" class="{{ $route== 'decision-making-profile' ? 'active' : '' }}">Decision-Making Profile</a>
                    </li>
                    <li class="{{$step14}}">
                        <a href="/parenting-profile" class="{{ $route== 'parenting-profile' ? 'active' : '' }}">Parenting Profile</a>
                    </li>
                    <li class="{{$step15}}">
                        <a href="/erotic-profile" class="{{ $route== 'erotic-profile' ? 'active' : '' }}">Erotic Profile</a>
                    </li>
                </ul>
            </li>
            <li class="sub-dropdown">
                <a href="javascript:void(0)">Shadow Stance</a>
                <ul>
                <li class="{{$step16}}">
                        <a href="/shadow-qualities" class="{{ $route== 'shadow-qualities' ? 'active' : '' }}">Shadow Qualities</a>
                    </li>
                    <li class="{{$step17}}">
                        <a href="/toxic-cycle" class="{{ $route== 'toxic-cycle' ? 'active' : '' }}">Toxic Cycle</a>
                    </li>
                    <li class="{{$step18}}">
                        <a href="/sensitivities" class="{{ $route== 'sensitivities' ? 'active' : '' }}">Sensitivities</a>
                    </li>
                    <li class="{{$step19}}">
                        <a href="/primary-needs" class="{{ $route== 'primary-needs' ? 'active' : '' }}">Primary Needs</a>
                    </li>
                    <li class="{{$step20}}">
                        <a href="biggest-doubts-and-fears" class="{{ $route== 'biggest-doubts-and-fears' ? 'active' : '' }}">Biggest Doubts & Fears</a>
                    </li>
                    <li class="{{$step21}}">
                        <a href="/most-triggered-by" class="{{ $route== 'most-triggered-by' ? 'active' : '' }}">Most Triggered By</a>
                    </li>
                    <li class="{{$step22}}">
                        <a href="/conflict-profile" class="{{ $route== 'conflict-profile' ? 'active' : '' }}">Conflict Profile</a>
                    </li>
                </ul>
            </li>
            <li class="{{$step23}}">
                <a href="/how-to-partner-with-you" class="{{ $route== 'how-to-partner-with-you' ? 'active' : '' }}">How To Partner With You</a>
            </li>
            <li class="{{$step24}}">
                <a href="/permanent-breakthrough" class="{{ $route== 'permanent-breakthrough' ? 'active' : '' }}">Permanent Breakthrough</a>
            </li>
        </ul>
        <a href="javascript:void(0)" class="btn btn-primary br w-100 mb-6">ASK THE COMMUNITY</a>
    </div>
    <div class="sideBox" style="background-image: url('{{ asset('images/Relationship Dynamics Sidebar _ Practices Background - Red-min.png')}}');">
        <h3>Wanna Develop Your Relationship Skills?</h3>
        <p>Get 1:1 private guidance on how to use your gifts and understand your relationship dynamics, stances, and shadow patterns.</p>
        <a href="{{route('upsell-1-on-1-session')}}" class="btn btn-white br w-100">YES, I WANT SKILLS!</a>
    </div>
</aside>