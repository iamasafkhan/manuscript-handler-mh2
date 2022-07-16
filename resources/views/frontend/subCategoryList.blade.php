
@foreach($subcategories as $subcategory)

<ul>
	<li style="list-style: none;"  ><input type="checkbox" name="classifyInterest[]" id="select_{{ $subcategory->id }}" data-title="{{$subcategory->title}}" value="{{ $subcategory->id }}">	{{$subcategory->title}}
	@if(count($subcategory->subcategory))
		@include('frontend.subCategoryList',['subcategories' => $subcategory->subcategory])
	@endif
    </li>
</ul>
@endforeach
