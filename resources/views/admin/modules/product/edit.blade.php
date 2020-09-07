 @extends('admin.master')
 @section('title','Thêm Sản Phẩm')
 @section('content')
   <form id="form-category" action="{{ route('admin.product.update',['id'=>$data_pro->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Sản Phẩm</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Product Name</label>
              <input type="text" value="{{$data_pro->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name">
             
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select class="form-control" name="category_id">
                  <option value="">Chọn Danh Mục</option>
                @foreach ($data_cat as $items)
                  @if($data_pro->category_id == $items->id)
                    <option selected value="{{$items->id}}">{{$items->category_name}}</option>
                  @else
                   <option value="{{$items->id}}">{{$items->category_name}}</option>
                  @endif
                @endforeach
                  
                </select>
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Brand</label>
              <select name="brand_id" class="form-control">
                 <option value="">----------Chọn Thương Hiệu---------</option>
                 @foreach ($data_br as $items)
                 @if($data_pro->brand_id==$items->id)

                  <option selected value="{{$items->id}}">{{$items->brand_name}}</option>
                  @else 
                   <option value="{{$items->id}}">{{$items->brand_name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
             <label for="">Description</label>
             <textarea style="height: 200px;" class="form-control" name="description">{{$data_pro->description}}</textarea>
            </div>
            <div class="form-group">
              <label>Content</label>
              <textarea style="height: 200px;"  class="form-control" name="content">{{$data_pro->content}}</textarea>
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="number" min="1" value="{{$data_pro->price}}" name="price" class="form-control">
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" min="1" value="{{$data_pro->quantity}}" name="quantity" class="form-control">
            </div>
            <div class="form-group">
              <label>Image</label><br/>
              <img class="w-25" src="{{ asset("./public/uploads/products/{$data_pro->image}") }}"><br/>
              <input type="file" value="{{old('image')}}" name="image" class="mt-5">
            </div>

            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                <option value="">Chọn trạng thái</option>
                  @if($data_pro->status==1)
                    <option selected value="1">On</option>
                    <option value="0">Off</option>
                  @else
                   <option selected value="0">Off</option>
                  <option  value="1">On</option>
                 
                  @endif
                   
                
               
              </select>
            </div>
            
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit" value="Edit"  class="btn btn-primary w-50">
        </div>
        <!-- /.card-footer-->
        
 </div>
 </form>
 @endsection