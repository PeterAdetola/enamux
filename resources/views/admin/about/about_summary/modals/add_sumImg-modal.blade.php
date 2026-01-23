
<!-- Start Modal -->
<div id="about-sum_img-modal" class="modal" style="padding:1em;">
    <div class="modal-content">
      <h6 class="card-title ml-2" style="display:inline-block;">Add Summary Image</h6>

      <div class="progress collection">
        <div id="add-sumImg-preloader" class="indeterminate"  style="display:none; 
        border:2px #ebebeb solid"></div>
      </div>
      
      <!-- <div class="card-body"> -->
      <div class="row">
        <div class="col s12">
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form method="POST" action="{{ route('add.about_summary') }}" enctype="multipart/form-data">
            <input type="hidden" name="form" >
              @csrf

            <div class="row">
              <div class="col s12 m12 mb-2">
                  <input name="image"  type="file" id="input-file-now-custom-2" class="dropify" data-height='200' />  
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Caption" name="caption" type="text" >
                </div>
                <div class="col s12">   
                  <button  id="updateImageBtn" type="submit" class="modal-action waves-effect waves-green btn-large">Save</button>
                </div> 
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>
      </div>
  </div>
</div>
<!-- /End Modal -->