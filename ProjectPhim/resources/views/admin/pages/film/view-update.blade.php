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
    <form action="{{route('film.update',$datafilm->id_film)}}" method="post" id="formdata" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input id="saveid"  hidden/>
        <input type="text" id="id_cate"  class="form-control" readonly hidden >
        <label for="">ảnh mô tả</label>
        <br>
        <img src="{{$datafilm->linkimg_film}}" alt="img" height="200px" width="150px" style="border-radius:5px ">
        <br>
        <label for="">Chọn Danh Mục</label>
        <select class="browser-default custom-select" name="category_id">
            <option value="Not specified" selected>chọn danh mục ...</option>
            @foreach ($cate as $i)
            <option value="{{$i->id_cate}}">{{$i->name_cate}}</option>
            @endforeach
        </select>
        <label for="name_film">Tên Phim</label>
        <input type="text" name="namefilm" id="name_film"  class="form-control" value="{{$datafilm->name_film}}" >
        <label for="date_film">Ngày tạo</label>
        <input type="date" name="datefilm" id="date_film"  class="form-control" value="{{$datafilm->date_film}}" >
        <label for="des_film">Mô Tả</label>
        <input type="text" name="desfilm" id="des_film"  class="form-control" value="{{$datafilm->des_film}}" >
        <label for="img_film">Chọn ảnh mô tả</label>
        <input type="file" name="imgfilmupload" id="img_film"  class="form-control" >

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="submit" class="btn btn-primary" id="themmoi">Sửa</button>
          </div>
</div>
@endsection
