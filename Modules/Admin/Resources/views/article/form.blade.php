<form action="" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Tên bài viết</label>
        <input type="text" class="form-control" value="{{ old('a_name',isset($article->a_name) ? $article->a_name : '') }}" name="a_name" placeholder="Tên bài viết">
        @if($errors->has('a_name'))
        <div class="has-error">
            <p class="help-block">
                {{$errors->first('a_name')}}
            </p>
        </div>
        @endif
    </div>
    <div class="form-group">
        <label>Mô tả</label>
        <textarea class="form-control" id="" cols="30" rows="3" name="a_description" placeholder="Mô tả bài viết">{{ old('a_description',isset($article->a_description) ? $article->a_description : '') }}</textarea>
        @if($errors->has('a_description'))
        <div class="has-error">
            <p class="help-block">
                {{$errors->first('a_description')}}
            </p>
        </div>
        @endif
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea class="form-control" id="a_content" cols="30" rows="5" name="a_content" placeholder="Nội dung">{{ old('a_content',isset($article->a_content) ? $article->a_content : '') }}</textarea>
        @if($errors->has('a_content'))
        <div class="has-error">
            <p class="help-block">
                {{$errors->first('a_content')}}
            </p>
        </div>
        @endif
    </div>
    <div class="form-group">
        <label>Meta title</label>
        <input type="text" class="form-control" value="{{ old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '') }}" name="a_title_seo" placeholder="Meta title">
    </div>
    <div class="form-group">
        <label>Meta description</label>
        <input type="text" class="form-control" value="{{ old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '') }}" name="a_description_seo" placeholder="Meta description">
    </div>
    <div class="form-group">
        <label>Avatar</label>
        <input type="file" name="a_avatar" class="form-control">
    </div>

    <button type="submit" class="btn btn-info">Lưu thông tin</button>
</form>
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}">
    </script>
    <script>
        CKEDITOR.replace('a_content');
    </script>
@endsection