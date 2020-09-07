 <h2>Brands</h2>
<div class="brands-name">
	@foreach ($get_brand as $items)
		<ul class="nav nav-pills nav-stacked">
        	<li><a href="#">{{$items->brand_name}}</a></li>
    	</ul>
	@endforeach
    
</div>