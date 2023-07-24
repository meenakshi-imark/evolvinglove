@include('layouts.dashboard.header')

<style>
    /*.alert-success {
    animation: fadeOut 2s forwards;
    animation-delay: 3s;
  
    }

    @keyframes fadeOut {
        from {opacity: 1;}
        to {opacity: 0;}
    }*/


    .alert-success {
      animation: cssAnimation 0s 3s forwards;
      visibility: visible;
    }

    @keyframes cssAnimation {
      to   {visibility: hidden;}
    }
</style>
<main class="content">
    <section class="main-content">

        <div class="alert alert-success showbiasmsg" style="text-align: center; display:none">
            Data updated successfully
        </div>

        <div class="title-head">
            <h1>Adjust Answer Bias</h1>
        </div>
        <div class="white-box px-0">
            <div class="table-responsive">
                <table class="ansBias-table">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Answer Categories</th>
                            <th class="text-nowrap">% of Total Scores</th>
                            <th class="text-nowrap">% Ranked 1st</th>
                            <th class="text-nowrap">Bias</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <?php $i = 0; ?>
                        @foreach($get_all as $x => $get_all_value)
                       
                        <tr>
                            <td>{{$get_all_value->categories}}</td>
                            <td>{{sprintf("%.2f", $total_array[$i])}}%</td>
                            <td>{{$ranking[$i]}}%</td>
                            <td><input type="text" id="inpur_bias{{$get_all_value->id}}" value="{{$get_all_value->bias}}" readonly></td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-primary br ansBiasEdit" id="ansBiasEdit{{$get_all_value->id}}" valueid="{{$get_all_value->id}}">Edit</a>
                                <a href="javascript:void(0)" class="btn btn-primary ansBiasSave" id="ansBiasSave{{$get_all_value->id}}" valueidsave="{{$get_all_value->id}}" style="display: none;">Save</a>
                            </td>
                        </tr>
                        <?php $i ++; ?>
                        @endforeach            
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

@include('layouts.dashboard.footer')

<script type="text/javascript">
    $(document).ready(function(){
            $('.ansBiasEdit').on('click',function(){
                var click_id_value = $(this).attr('valueid');
                $('#inpur_bias'+click_id_value).removeAttr('readonly');
                $(this).hide().next('#ansBiasSave'+click_id_value).show();
            });
        });

        $(document).ready(function(){
            $('.ansBiasSave').on('click',function(){
                // alert('Hi')
                var save_click = $(this).attr('valueidsave');
                $('#inpur_bias'+save_click).attr("readonly", "");
                var input_value = $('#inpur_bias'+save_click).val();
                $(this).hide().prev('#ansBiasEdit'+save_click).show();
                $.ajax({
                    url: "/update-bias",
                    type: "POST",
                    dataType: "json",
                    data: {"_token": "{{ csrf_token() }}",'input_value':input_value,'save_click':save_click},
                    success: function(data){
                      if(data.status==1){
                        $('.showbiasmsg').css('display','');
                         // Swal.fire('Data updated succesfully!');
                         // $('#submit_add_que')[0].reset();
                            }
                    },
                });
            })
        }) 
</script>

