

<div class="floating-setting for-quiz d-lg-none">
    <a id="floating_setting" href="javascript:void(0)" class="btn btn-secondary btn-icon"><i class="las la-sliders-h"></i></a>

    <div class="layout">
        <div class="inner"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<!-- <script src="js/bootstrap-select-country.min.js"></script> -->
<script src="{{asset('/dashboard/js/bundle.min.js')}}"></script>
<script src="{{asset('/dashboard/js/custom.js')}}"></script>







<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/searchbuilder/1.4.1/js/dataTables.searchBuilder.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- For Developer use -->
<script src="{{asset('/dashboard/js/developer.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

<script>
    $("#ergvhgvh").submit(function(e) {
        
     e.preventDefault();
     $.ajax({
         
            url:'/welcome-screen-bg',
            data: {welcome_screen_bg : welcome_screen_bg  },
            
            
            sucess: function (d) {
                 alert(d);
            }
        });
  })
</script>

<script>
 $(document).ready(function() {
    $('#datatableid').DataTable( {
        dom: 'Qlfrtip'
    });
});


// Script for delete
$(".delete_question").click(function(){
    var delete_id = $(this).attr('id');  
    // alert(delete_id)
     $.ajax({
          url: "/delete-question_id",
          type: "GET",
          data: {"delete_id": delete_id},
          
          success: function(data){
            if(data.status==1){
                Swal.fire(
                  'Question Deleted!',
                  'Successfully!',
                  'success'
                )
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 2000);
            }
          }
      });

});


function publishdata(){
    $.ajax({
          url: "/pubdata",
          type: "GET",
          data: {"delete_id": "delete_id"},
          
          success: function(data){
            if(data.status==1){
                Swal.fire(
                  'All draft question have been published!',
                  'Successfully!',
                  'success'
                )
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 2000);
            }
          }
      });
}
// Publish single question
function publish_qus(id){
    var publish_id = id;
    $.ajax({
        url: "/publish-qus",
        type: "GET",
        data: {"publish_id": publish_id},
      
        success: function(data){
            if(data.status==1){
                Swal.fire(
                  'Question has been published!',
                  'Successfully!',
                  'success'
                )
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 2000);
            }
        }
    });
}



</script>


</body>

</html>