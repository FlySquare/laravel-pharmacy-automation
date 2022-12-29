@extends('app')
@section('content')
    <div style="width: 90%;
    margin: auto;
    margin-top: 20px;" class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                @if(!isset($data['order']))
                    Yeni Sipariş Ekle
                @else
                    #{{ $data['order']->id }} Sipariş Düzenleniyor
                @endif
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" @if(!isset($data['order']))
            action="{{ route('siparis-ekle-post') }}"
              @else
                  action="{{ route('siparis-duzenle-post', ['id' => $data['order']->id]) }}"
            @endif>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">İsim</label>
                    <input type="text" name="customer_name" @if(isset($data['order']))
                        value="{{ $data['order']->customer_name }}"
                           @endif class="form-control" id="exampleInputEmail1" placeholder="Müşteri Adı">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Telefon</label>
                    <input type="text" name="customer_phone" @if(isset($data['order']))
                        value="{{ $data['order']->customer_phone }}"
                           @endif class="form-control" id="exampleInputEmail1" placeholder="Müşteri Telefon">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Adresi</label>
                    <input type="text" name="customer_address" @if(isset($data['order']))
                        value="{{ $data['order']->customer_address }}"
                           @endif class="form-control" id="exampleInputEmail1" placeholder="Müşteri Adresi">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mail</label>
                    <input type="mail" name="customer_email" @if(isset($data['order']))
                        value="{{ $data['order']->customer_email }}"
                           @endif class="form-control" id="exampleInputEmail1" placeholder="Müşteri Mail">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Notu</label>
                    <input type="text" name="customer_note" @if(isset($data['order']))
                        value="{{ $data['order']->customer_note }}"
                           @endif class="form-control" id="exampleInputEmail1" placeholder="Müşteri Notu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">İlaç</label>
                    <select  name="drag_id"  class="form-control" >
                        @foreach($data['drags'] as $drag)
                            <option value="{{ $drag->id }}" @if(isset($data['order']) && $data['order']->drag_id == $drag->id) selected @endif>{{ $drag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Stok</label>
                    <input type="text" name="quantity" @if(isset($data['order']))
                        value="{{ $data['order']->quantity }}"
                           @endif class="form-control" id="exampleInputEmail1" placeholder="Stok">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                @if(!isset($data['order']))
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                @else
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                @endif
            </div>
        </form>
    </div>
@endsection
