@extends('admin.layout.layout-admin')
{{-- kế thừa từ layout cha là lây out nào --}}
@section('title')
Phim | Admin - view category
@endsection
@section('titlePage')
@endsection
@section('content')
<h3 style="text-align: center">Thêm Phim Mới</h3>
<div style="margin:auto;" class="border border-light p-3 w-50 shadow">
    <form action="{{route('film.create')}}" method="post" id="formdata" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input id="saveid"  hidden/>
        <input type="text" id="id_cate"  class="form-control" readonly hidden >
        <label for="">Chọn Danh Mục</label>
        <select class="browser-default custom-select" name="category_id">
            <option value="Not specified" selected>chọn danh mục ...</option>
            @foreach ($data as $i)
            <option value="{{$i->id_cate}}">{{$i->name_cate}}</option>
            @endforeach
        </select>
        <label for="name_film">Tên Phim</label>
        <input type="text" name="namefilm" id="name_film"  class="form-control"  >
        <label for="date_film">Ngày tạo</label>
        <input type="date" name="datefilm" id="date_film"  class="form-control" >
        <label for="des_film">Mô Tả</label>
        <input type="text" name="desfilm" id="des_film"  class="form-control" >
        <label for="img_film">Chọn ảnh mô tả</label>
        <input type="file" name="imgfilmupload" id="img_film"  class="form-control" >
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary" id="themmoi">Tạo Mới</button>
          </div>
    </form>
</div>
@endsection
