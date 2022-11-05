@foreach($subcategories as $subcategory)
    @if (isset($category_id))
        <option @if($category_id == $subcategory->id) selected @endif value="{{$subcategory->id}}"> {{$char}} {{$subcategory->name}}</br></option>
    @else
        <option value="{{$subcategory->id}}"> {{$char}} {{$subcategory->name}}</br></option>
    @endif
    @if(count($subcategory->subcategory))
        @php $char.'|---'; @endphp
        @include('admin.categories.subCategoryList', ['subcategories' => $subcategory->subcategory, 'char' => $char.'|--'])
    @endif
@endforeach
