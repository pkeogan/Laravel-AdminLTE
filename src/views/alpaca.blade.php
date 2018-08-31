@pushonce('afterstyles:alpaca')
<link type="text/css" href="//code.cloudcms.com/alpaca/1.5.24/bootstrap/alpaca.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.css" integrity="sha256-iu+Hq7JHYN0rAeT3Y+c4lEKIskeGgG/MpAyrj6W9iTI=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha256-yMjaV542P+q1RnH6XByCPDfUFhmOafWbeLPmqKh11zo=" crossorigin="anonymous" />
<style>
.swal2-popup {
  font-size: 1.6rem !important;
}
</style>
@endpushonce

@pushonce('scripts:alpaca')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.1/ace.js" integrity="sha256-kCykSp9wgrszaIBZpbagWbvnsHKXo4noDEi6ra6Y43w=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
<script type="text/javascript" src="//code.cloudcms.com/alpaca/1.5.24/bootstrap/alpaca.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js" integrity="sha256-Y27a5HlqZwshkK8xfNfu6Y0c6+GGX9wTiRe8Xa8ITGY=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.26.12/sweetalert2.all.min.js" integrity="sha256-Y+WJP3jVjJgfw+/m2N5/GGUgxqXDCz7S3zstxj8pqng=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-promise/4.1.1/es6-promise.auto.min.js" integrity="sha256-OI3N9zCKabDov2rZFzl8lJUXCcP7EmsGcGoP6DMXQCo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
@endpushonce

@pushonce('afterstyles:select2')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/css/select2.min.css" integrity="sha256-MeSf8Rmg3b5qLFlijnpxk6l+IJkiR91//YGPCrCmogU=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha256-nbyata2PJRjImhByQzik2ot6gSHSU4Cqdz5bNYL2zcU=" crossorigin="anonymous" />
<style>.select2-selection__rendered{margin-top: 0px !important;}</style>
@endpushonce

@pushonce('scripts:select2')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.1/js/select2.min.js" integrity="sha256-190Fv8aJAduyyIOnvWVpjCmzkX1h8OEtGWbcoU1QVsA=" crossorigin="anonymous"></script>
@endpushonce


<div id='{{ $id }}'></div>


@push('scriptsdocumentready')
{{-- <script>--}}
$("#{{ $id }}").alpaca({
	@if(isset($dataSource))"dataSource": "{{$dataSource}}", @endif
    "schema": {{ $schema }},
    "options":{{ $options }},
					  
});
@endpush
	
@push('scriptsdocumentready'){{-- <script>--}}
$("#{{ $saveButton }}").click(function() {
	var data = $('#{{ $id }}').alpaca().getValue();
	$.ajax({
		type: "POST",
		url: "{{ $saveRoute }}",
		data: JSON.stringify(data),
		contentType: "application/json",
		processData: false,
		success: function(data) {
			console.log(data);
			swal('Saved', data.success,'success');
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			swal('Error', XMLHttpRequest.responseJSON.error ,'error');
		},
	});
});

@endpush