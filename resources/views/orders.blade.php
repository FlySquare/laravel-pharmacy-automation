@extends('app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>İlaçlar</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tüm siparişler aşağıda listelenmektedir</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6"></div>
                                    <div class="col-sm-12 col-md-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2"
                                               class="table table-bordered table-hover dataTable dtr-inline"
                                               aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Müşeri Adı
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Müşteri Numarası
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Satılan İlaç
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Tutar
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">İŞLEMLER
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           @foreach($data['orders'] as $order)
                                               <tr class="odd">
                                                   <td class="dtr-control sorting_1" tabindex="0">#{{ $order->id }}</td>
                                                   <td>{{ $order->customer_name }}</td>
                                                   <td>{{ $order->customer_phone }}</td>
                                                   <td>{{ $order->drag->name }}</td>
                                                   <td>{{ $order->total }} ₺</td>
                                                   <td>
                                                         <a href="{{ route('siparis-duzenle', $order->id) }}"
                                                             class="btn btn-primary btn-sm">Düzenle</a>
                                                         <a href="{{ route('siparis-sil', $order->id) }}"
                                                             class="btn btn-danger btn-sm">Sil</a>
                                                   </td>
                                               </tr>
                                           @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Müşeri Adı</th>
                                                <th rowspan="1" colspan="1">Müşteri Numarası</th>
                                                <th rowspan="1" colspan="1">Satılan İlaç</th>
                                                <th rowspan="1" colspan="1">Tutar</th>
                                                <th rowspan="1" colspan="1">İŞLEMLER</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
