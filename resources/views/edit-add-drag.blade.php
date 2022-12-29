@extends('app')
@section('content')
    <div style="width: 90%;
    margin: auto;
    margin-top: 20px;" class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                @if(!isset($data['drag']))
                    Yeni İlaç Ekle
                @else
                    #{{ $data['drag']->id }} İlaç Düzenleniyor
                @endif
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" @if(!isset($data['drag']))
            action="{{ route('ilac-ekle-post') }}"
              @else
                  action="{{ route('ilac-duzenle-post', ['id' => $data['drag']->id]) }}"
            @endif>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">İsim</label>
                    <input type="text" name="name" @if(isset($data['drag']))
                        value="{{ $data['drag']->name }}"
                           @endif class="form-control" id="exampleInputEmail1" placeholder="İsim">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Fiyat</label>
                    <input type="number" name="price" @if(isset($data['drag']))
                        value="{{ $data['drag']->price }}" @endif class="form-control" id="exampleInputPassword1"
                           placeholder="Fiyat">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Stok</label>
                    <input type="number" name="stock" @if(isset($data['drag']))
                        value="{{ $data['drag']->stock }}"
                           @endif class="form-control" id="exampleInputPassword1" placeholder="Stok">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                @if(!isset($data['drag']))
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                @else
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                @endif
            </div>
        </form>
    </div>
@endsection
