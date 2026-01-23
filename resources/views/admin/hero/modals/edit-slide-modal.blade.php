
<!-- Start Modal -->
<div id="edit{{ $slide->id }}" class="modal" style="padding:1em;">
    <div class="modal-content">
      <h6 class="card-title ml-2" style="display:inline-block;">Edit Slide</h6>

      <div class="progress collection">
        <div id="preloader{{ $slide->id }}" class="indeterminate"  style="display:none; 
        border:2px #ebebeb solid"></div>
      </div>
      
      <!-- <div class="card-body"> -->
      <div class="row">
        <div class="col s12" id="account">
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form method="POST" action="{{ route('update.slide') }}" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $slide->id }}">
            @csrf

            <div class="row">
              <div class="col s12 m12 l6 mb-2">
                  <input name="image" type="file" data-default-file="{{ url($slide->image) }}" id="input-file-now-custom-2" class="dropify" data-height='250' />  
              @error('image')
              <small class="errorTxt3  red-text">{{ $message }}*</small>
              @enderror   
              </div>


              <div class="col s12 m6">
                <div class="row">

                  <div class="col s12 input-field">
                    <input id="heading" name="heading" value="{{ $slide->heading }}" type="text" class="validate" data-error=".errorTxt3" />
                    <label for="heading">Heading</label>
                    @error('heading')
                    <small class="errorTxt3 red-text">{{ $message }}*</small>
                    @enderror
                  </div>

                  <div class="col s12 input-field">
                    <input id="sub_heading"  value="{{ $slide->sub_heading }}" name="sub_heading" type="text" class="validate" 
                      data-error=".errorTxt2" required />
                    <label for="sub_heading">Sub Heading</label>
                    @error('short_title')
                    <small class="errorTxt3  red-text">{{ $message }}*</small>
                    @enderror
                  </div>   
                    
              <div class="col s12 mt-7">   
                <button  id="updateSlideBtn{{ $slide->id }}" type="submit" class="modal-action waves-effect waves-green btn-large">Update</button>
                <a href="javascript:void(0)" class="btn-large btn-flat modal-close">Cancel</a>
              </div>     

                </div>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>

      </div>
      <!-- </div> -->
  </div>
</div>
<script type="text/javascript"> 
      // Preloader Script
document.getElementById("updateSlideBtn{{$slide->id}}").addEventListener("click", function() {
  var preloader = document.getElementById("preloader{{$slide->id}}");
  preloader.style.display = "block";
});
</script>
<!-- /End Modal -->