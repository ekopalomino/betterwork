@foreach($grouped as $index=>$detail)
{{ $index }}
	@foreach($detail as $data)
	{{$data['budget_period']}}
	@endforeach
@endforeach