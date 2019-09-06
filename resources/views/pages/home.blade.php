@extends('templates.admin.default')

@section('content')
<!-- Main Container -->
<main id="main-container">


    <!-- Hero -->
    <div class="bg-image overflow-hidden" style="background-image: url({{ asset('assets/media/photos/photo1.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang {{ Auth::user()->name }}</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>










    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissable d-flex" role="alert">
            <div class="flex-00-auto">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-fill ml-3">
                <p class="mb-0">{{ $message }}</p>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="block">
          <div class="block-header" style="background: #344675;">
              <h3 class="block-title text-white">Data </h3>
              <button data-toggle="modal" data-target="#add_agenda" class="btn btn-success mr-1 mb-3">
                <i class="fa fa-fw fa-plus mr-1"></i> Tambah Data
            </button>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table id="table-organizer" class="table table-bordered table-striped table-hover table-vcenter js-dataTable-full">
                <thead class="thead-dark">
                   <tr>
                      <th width="30">No</th>
                      <th>Nama Agenda</th>
                      <th>Tanggal Mulai</th>
                      <th>Durasi</th>
                      <th>Lokasi</th>
                      <th>Status</th>
                      <th width="80">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  @php($no = 1)
                  @foreach($agenda as $data)
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$data->nama_agenda}}</td>
                    <td>{{$data->tanggal_mulai}}</td>
                    <td>{{$data->durasi}}</td>
                    <td>{{$data->lokasi}}</td>
                    <td>@if ($data->status == 0)
                        <a href="home/status/{{ $data->id }}" class="btn btn-default"><font color="red">Belum Dikerjakan</font></a>
                        @else
                        <a href="#" class="btn btn-default"><font color="blue">Sudah Dikerjakan</font></a>
                        @endif</td>
                        <td class="text-center">
                          <div class="btn-group">
   <!--                    <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#destroy{{$data->id}}"   title="Edit Data">
                              <i class="fa fa-edit"></i>
                          </a> -->

                          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update{{$data->id}}" title="Edit Data">
                              <i class="fa fa-fw fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy{{$data->id}}" title="Hapus Data">
                              <i class="fa fa-fw fa-times"></i>
                          </button>
                      </div>
                  </td>
              </tr>
              @php($no++)
              <div class="modal fade" id="destroy{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin modal-block-vcenter" aria-hidden="true">
                <div class="modal-dialog modal-dialog-popin modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-danger">
                                <h3 class="block-title">Hapus Data Agenda</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content font-size-sm">
                                <p>Anda akan menghapus agenda <b>{{$data->nama_agenda}}</b> ?</p>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <a href="home/destroy/{{ $data->id }}" class="btn btn-danger text-white">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="update{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-success">
                                <h3 class="block-title">Edit Data Agenda</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content font-size-sm">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-12">
                                        <form action="{{ route('agenda.update', $data->id) }}" method="post">
                                         {{ csrf_field() }} {{ method_field('PATCH') }}
                                         <div class="form-group">
                                            <label for="">Nama Agenda</label><br>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-book"></i>
                                                    </span>
                                                </div>
                                                <input type="text" value="{{$data->nama_agenda}}" class="js-maxlength form-control" id="example-group1-input1" name="nama_agenda" maxlength="190" placeholder="Isikan nama Agenda.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Mulai</label><br>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                                <input type="date" value="{{$data->tanggal_mulai}}" class="js-maxlength form-control" id="example-group1-input1" name="tanggal_mulai" maxlength="190" placeholder="Isikan tanggal mulai.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Durasi</label><br>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" value="{{$data->durasi}}" class="js-maxlength form-control" id="example-group1-input1" name="durasi" maxlength="190" placeholder="Isikan tanggal mulai.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Lokasi</label><br>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-map-marked-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" value="{{$data->lokasi}}" class="js-maxlength form-control" id="example-group1-input1" name="lokasi" maxlength="190" placeholder="Isikan Lokasi.." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori_tiket">Status<span class="text-danger">*</span></label>
                                            <select class="js-select2 form-control" id="status" name="status" data-placeholder="Pilih Status" required>
                                                <option value="{{$data->status}}">@if ($data->status == 0)
                                                    Belum dikerjakan
                                                    @else 
                                                    Sudah dikerjakan
                                                    @endif
                                                </option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                <option value="0">Belum dikerjakan</option>
                                                <option value="1">Sudah dikerjakan</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info text-white">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</tbody>
</table>
<div class="modal fade" id="add_agenda" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-success">
                    <h3 class="block-title">Tambah Data Agenda</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content font-size-sm">
                    <div class="row">
                        <div class="col-lg-8 col-xl-12">
                            <form action="{{ route('agenda.add') }}" method="post">
                             {{ csrf_field() }} {{ method_field('POST') }}
                             <div class="form-group">
                                <label for="">Nama Agenda</label><br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-book"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="js-maxlength form-control" id="example-group1-input1" name="nama_agenda" maxlength="190" placeholder="Isikan nama agenda..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label><br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="date" class="js-maxlength form-control" id="example-group1-input1" name="tanggal_mulai" maxlength="190" placeholder="Isikan tanggal mulai..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Durasi</label><br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa  fa-clock"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="js-maxlength form-control" id="example-group1-input1" name="durasi" maxlength="190" placeholder="Isikan durasi..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label><br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map-marked-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="js-maxlength form-control" id="example-group1-input1" name="lokasi" maxlength="190" placeholder="Isikan lokasi..." data-always-show="true" data-warning-class="badge badge-primary" data-limit-reached-class="badge badge-primary" required>
                                </div>
                            </div>

                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-info text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>







</div>
</div>
</div>


</main>
@endsection