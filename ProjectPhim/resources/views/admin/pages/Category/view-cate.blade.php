@extends('admin.layout.layout-admin')
{{-- kế thừa từ layout cha là lây out nào --}}
@section('title')
Phim | Admin - view category
@endsection
@section('titlePage')

@endsection
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" id="createnew">Tạo Danh Mục Mới</button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">Tạo Danh Mục Mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div style="margin:auto;" class="border border-light p-3  shadow">
                <form action="{{route('create.category')}}" method="post" id="formdata" onsubmit="UpdateCate()">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input id="saveid"  hidden/>
                    <input type="text" id="id_cate"  class="form-control" readonly hidden >
                    <label for="title">Tiêu Đề</label>
                    <input type="text" name="title" id="tit_cate"  class="form-control" >
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="themmoi">Tạo Mới</button>
                        <button type="submit" class="btn btn-danger" id="suatt" onclick="UpdateCate()">Sửa Thông Tin</button>
                      </div>
                </form>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Số thứ tự</th>
            <th>tiêu đề</th>
            <th>thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item )
          <tr>
            <td>{{$item->id_cate}}</td>
            <td>{{$item->name_cate}}</td>
            <td style="padding: 0px">
                    <form action="{{route('delete.category', $item->id_cate)}}" method="POST" style="display: inline;margin-right: 5px" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit"  class="btn btn-danger"  >Xóa </button>
                </form>
                    <button type="submit" id="ud" onclick="GETData({{$item->id_cate}})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >Sửa </button>
            </td>



          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@section("script")
    <script>
        $("#titleModal").text("Thêm Mới Danh Mục");
        $("#createnew").click(function (){
            $("#titleModal").text("Thêm Mới Danh Mục");
            $("saveid").val("");
            $("#id_cate").val("");
            $("#tit_cate").val("");
            $("#daycreate_cate").val("");
            $("#stt_cate").val("");
            $("#themmoi").show();
            $("#suatt").hide();
        }

        );
        $("#ud").click(function(){
            $("#themmoi").hide();
            $("#suatt").show();
        })
        function GETData(id) {
            $.ajax({
                url: "admin/get-category/" + id,
                type: 'GET',
            }).done(function (reponse, status, data) {
                //console.log(data);
                idcate = data.responseJSON.id_cate;
                $('#id_cate').removeAttr('hidden');
                $("#saveid").val(data.responseJSON.id_cate);
                $("#id_cate").val(data.responseJSON.id_cate);
                $("#tit_cate").val(data.responseJSON.name_cate);
            }).fail(function (reponse, status, data) {
                console.log(data);

            })
        }
        function UpdateCate(){
            let dataF = {
                    "id_cate": $("#id_cate").val(),
                    "name_cate": $("#tit_cate").val(),
                };
            if (!$('#saveid').val()) {
                $.ajax({
                    url: "admin/update-category/" + $("#id_cate").val(),
                    type: 'POST',
                    data: dataF


                }).done(function (reponse, status, xhr) {
                    if (xhr.status == 201) {
                        console.log(dataF);
                        $('#exampleModalCenter').modal('hide');
                        alert("thêm dữ liệu thành công thành công !");


                    }


                })
        }
        }

    </script>
@endsection

@endsection

@section('script')
@endsection
