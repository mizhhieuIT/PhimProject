@extends('admin.layout.layout-admin')
{{-- kế thừa từ layout cha là lây out nào --}}
@section('title')
Phim | Admin - view category
@endsection
@section('titlePage')
@endsection
@section('content')
<div class="row">
    <a href="/admin/view-create-film" class="btn btn-danger">Thêm Mới Phim</a>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Danh Mục</th>
            <th>Tên Phim</th>
            <th>Ngày Tạo Phim</th>
            <th>Mô Tả Phim</th>
            <th>Ảnh Phim</th>
            <th>thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item )
          <tr>
            <td>{{$item->name_cate}}</td>
            <td>{{$item->name_film}}</td>
            <td>{{$item->date_film}}</td>
            <td>{{$item->des_film}}</td>
            <td><img src="{{$item->linkimg_film}}" alt="images film"  height="200px" width="150px" ></td>
            <td style="padding: 0px">
                    <form action="{{route('film.delete', $item->id_film)}}" method="POST" style="display: inline;margin-right: 5px" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit"  class="btn btn-danger"  >Xóa </button>
                </form>
                    <a href="admin/view-update-film/{{$item->id_film}}" class="btn btn-outline-success">Sửa</a>
            </td>



          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@endsection
