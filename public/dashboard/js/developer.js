// For Developer Use

function deleteque(id){
    var delete_id = id;  
    alert(delete_id)  
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
            }
          }
      });
}