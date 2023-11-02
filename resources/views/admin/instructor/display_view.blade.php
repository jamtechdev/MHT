<div id="imageListId">
  @forelse($instructorDBData as $key => $data)
    <div id="{{ $data->id }}" class="card listitemClass" style="width: 18rem;">
      <img src="{{ $data->photo }}" class="card-img-top" alt="...">
      <div class="card-body">
        <h3 class="card-title">{{ $data->name }}</h3>
        <h4 class="card-title">{{ $data->school_name }}</h4>
      </div>
    </div>
  @empty
  @endforelse
</div>

<div class="my-3">
  <form action="{{ route('admin::instructor.save.display.order') }}" method="POST">
    @csrf
    <input type="hidden" name="order" id="outputvalues">
    <button class="btn btn-primary">Save</button>
  </form>
</div>

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
  $(function() {
    $("#imageListId").sortable({
      update: function(event, ui) {
        getIdsOfImages();
      } //end update  
    });
  });
  
  function getIdsOfImages() {
    var values = [];
    $('.listitemClass').each(function(index) {
      values.push($(this).attr("id"));
    });
    $('#outputvalues').val(values);
  }
  
</script>