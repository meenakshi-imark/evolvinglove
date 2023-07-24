@include('layouts.dashboard.header')
<style>
    .site-header .for-quiz,
    .floating-setting {
        display: block;
    }

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
        <div class="alert alert-success showbiasmsg" style="text-align: center; display:none;">
            Data updated successfully
        </div>
        <div class="alert alert-success su" id="su" style="text-align: center; display: none;">
        
        </div>
        <div class="title-head">
            <h1>Integrations</h1>
        </div>
        <div class="white-box upload">
            <form id="imortexcel_form" enctype="multipart/form-data">
                @csrf
                <div class="upload-main text-center">
                    <div class="upload-input">
            			<div class="drop-content">
            			  	<i class="fa-solid fa-cloud-arrow-up"></i>
            			    <label>Drop CSV file to upload or <small>Browse</small></label>
            			 </div>
    			        <!-- <input class="form-control" type="file" name="importexcel" id="importexcel"> -->
                        <input type="file" required class="form-control" name="uploaded_file" id="uploaded_file">
    		        </div>
        		    <div class="form-btn">
                      <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
               </div>
		    </form>
        </div>
    </section>
</main>

<script src="https://kit.fontawesome.com/3b29d5d04a.js" crossorigin="anonymous"></script>
@include('layouts.dashboard.footer')

<script type="text/javascript">
    $("#imortexcel_form").submit(function(e){
      e.preventDefault();
      var uploaded_file = $('#uploaded_file').prop('files')[0]; 
      var formData = new FormData(this);
      $.ajax({
        enctype: 'multipart/form-data',
        url: "/imortexcel_form",
        type: "POST",
        dataType: "json",

        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data){
            if(data.status==1){
               if(data.status==1){
                   $('.showbiasmsg').css('display',''); 
                   $("#faq").load(location.href + " #faq");
                }else{
                    alert('Not Done');               
                }
            }
        },
      });
    });
</script>