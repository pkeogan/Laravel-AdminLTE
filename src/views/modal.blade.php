
    <button type="button" class="btn btn-@if(isset($buttonStyle)){{ $buttonStyle }}@else{{ @config('adminlte.defaultActionButtonStyle') }}@endif " data-toggle="modal" data-target="#{{$modalID}}" data-toggle="tooltip" title="@if(isset($tooltip)){{ $tooltip }}@else{{ $modalHeader }}@endif">
    @if(isset($buttonLabel)){{ $buttonLabel }} @endif   
    @if(isset($buttonIcon)) <i class="{{ $buttonIcon }}" aria-hidden="true"></i> @endif
</button>

  <div class="modal modal-@if(isset($modalStyle)){{ $modalStyle }}@else{{ config('adminlte.defaultModalStyle') }}@endif fade" id="{{$modalID}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
     @if(isset($modalHeader))
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">{{ $modalHeader  }}</h4>
      </div>
      @endif
      @if(isset($modalBody))
      <div class="modal-body">
        <p>{{ $modalBody  }}</p>
      </div>
      @endif
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
        <a href="{{ $submitLink }}" class="btn btn-outline">
          
         @if(isset($modalIcon)) <i class="{{ $modalIcon }}" aria-hidden="true"></i> {{ $modalHeader  }}
        @endif  @if(isset($modalSubmit)) {{ $modalSubmit  }} @endif
    </a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>