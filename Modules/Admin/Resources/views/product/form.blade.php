<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" class="form-control" value="{{ old('pro_name',isset($product->pro_name) ? $product->pro_name : '') }}" name="pro_name" placeholder="Tên sản phẩm">
                @if($errors->has('pro_name'))
                <div class="has-error">
                    <p class="help-block">
                        {{$errors->first('pro_name')}}
                    </p>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" id="" cols="30" rows="3" name="pro_description" placeholder="Mô tả ngắn sản phẩm">{{ old('pro_description',isset($product->pro_description) ? $product->pro_description : '') }}</textarea>
                @if($errors->has('pro_description'))
                <div class="has-error">
                    <p class="help-block">
                        {{$errors->first('pro_description')}}
                    </p>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" id="pro_content" cols="30" rows="5" name="pro_content" placeholder="Nội dung">{{ old('pro_content',isset($product->pro_content) ? $product->pro_content : '') }}</textarea>
                @if($errors->has('pro_content'))
                <div class="has-error">
                    <p class="help-block">
                        {{$errors->first('pro_content')}}
                    </p>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Meta title</label>
                <input type="text" class="form-control" value="{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}" name="pro_title_seo" placeholder="Meta title">
            </div>
            <div class="form-group">
                <label>Meta description</label>
                <input type="text" class="form-control" value="{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}" name="pro_description_seo" placeholder="Meta description">
            </div>

        </div>
        
        <div class="col-sm-4">
            <div class="form-group">
                <label>Loại sản phẩm</label>
                <select name="pro_category_id" id="" class="form-control">
                    <option value="">---Chọn loại sản phẩm---</option>
                    @if($categories)
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected='selected'" : "" }}>{{ $category->c_name }}</option>
                    @endforeach                        
                    @endif                    
                </select>
                @if($errors->has('pro_category_id'))
                <div class="has-error">
                    <p class="help-block">
                        {{$errors->first('pro_category_id')}}
                    </p>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Giá sản phẩm</label>
                <input type="number" min="0" class="form-control" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}" name="pro_price" placeholder="Giá sản phẩm">
                @if($errors->has('pro_price'))
                <div class="has-error">
                    <p class="help-block">
                        {{$errors->first('pro_price')}}
                    </p>
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>% Khuyến mãi</label>
                <input type="number" value="0" name="pro_sale" placeholder="% giảm giá" class="form-control">
            </div>
            <div class="form-group">
                <img id="output_img" src="{{asset('backend/images/no-image.jpg')}}"  alt="" class="img-responsive">
            </div>
            <div class="form-group">
                <label>Avatar</label>
                <input type="file" id="input_img" name="pro_avatar" class="form-control">
            </div>
            <div class="form-group">
                <input type="checkbox" name="hot" /> Nổi bật
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-info">Lưu thông tin</button>
</form>

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}">
    </script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
@endsection