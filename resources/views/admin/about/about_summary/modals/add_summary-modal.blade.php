
<!-- Start Modal -->
<div id="about-summary-modal" class="modal" style="padding:0.1em;">
    <div class="modal-content">
      <h6 class="card-title ml-2" style="display:inline-block;">About Summary</h6>

      <div class="progress collection">
        <div id="about-text-preloader" class="indeterminate"  style="display:none; 
        border:2px #ebebeb solid"></div>
      </div>
      
      <!-- <div class="card-body"> -->
    <form method="POST" action="{{ route('update.about_summary') }}">
      <input type="hidden" name="form" value="sum-text">
      <input type="hidden" name="id" />
            @csrf

    <div class="row">
      <div class="input-field col s12">
        <textarea name="summary"  id="myeditorinstance" class="materialize-textarea" ></textarea>
      </div>
    </div>
      <!-- </div> -->
      <div class="divider mb-2"></div>
      <div class="row">
        <button  id="saveAboutTextBtn" type="submit" class="btn-large right">Save</button>
      </div>
    </form>
  </div>
</div>
<!-- /End Modal -->