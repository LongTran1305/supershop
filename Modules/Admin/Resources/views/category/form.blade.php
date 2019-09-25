<form action="" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" class="form-control" value="{{ old('c_name',isset($category->c_name) ? $category->c_name : '') }}" name="c_name" placeholder="Tên danh mục">
        @if($errors->has('c_name'))
        <div class="has-error">
            <p class="help-block">
                {{$errors->first('c_name')}}
            </p>
        </div>
        @endif
    </div>
    <div class="form-group">
        <label>Meta title</label>
        <input type="text" class="form-control" value="{{ old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '') }}" name="c_title_seo" placeholder="Meta title">
    </div>
    <div class="form-group">
        <label>Meta description</label>
        <input type="text" class="form-control" value="{{ old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '') }}" name="c_description_seo" placeholder="Meta description">
    </div>
    <div class="form-group">
        <input type="checkbox" name="hot" /> Nổi bật
    </div>
    <button type="submit" class="btn btn-info">Lưu thông tin</button>
</form>