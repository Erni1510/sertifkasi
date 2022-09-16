@extends('admin.layout.master')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DATA ARSIP SURAT</h2>
        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Tambah Arsip Surat
                        </h2>
                        
                    </div>
                    <div class="body">
                        <form enctype="multipart/form-data" method="POST" action="{{url('admin/surat/create')}}">
                            @csrf
                            <div class="form-group">
                            <label for="nama_kebijakan">NOMOR SURAT</label>
                                <div class="form-line">
                                    <input type="text" id="nama_kegiatan" class="form-control" placeholder="Nomor Surat" name="nomor">
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="nama_kebijakan">KATEGORI SURAT</label>
                                <div class="form-line">
                                    <select class="form-control" name="kategori">
                                        <option value="Undangan">Undangan</option>
                                        <option value="Pengumuman">Pengumuman</option>
                                        <option value="Nota Dinas">Nota Dinas</option>
                                        <option value="Pemberitahuan">Pemberitahuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="nama_kebijakan">JUDUL SURAT</label>
                                <div class="form-line">
                                    <input type="text" id="nama_kegiatan" class="form-control" placeholder="Judul Surat" name="judul">
                                </div></div>
                            <div class="form-group">
                            <label for="file_kebijakan">FILE SURAT</label>
                                <div class="form-line">
                                    <input type="file" name="file" id="nis" class="form-control-file" placeholder="file">
                                </div>
                                <small>*File harus berupa PDF</small>
                            </div>

                              <div class="row clearfix">
                                <div class="col-md-1">
                              <a href="{{url('admin/surat')}}"><button type="button" class="btn btn-warning center-block" >Cancel</button></a>
                         </div>
                         <div class="col-md-1">
                             <button type="submit" class="btn btn-primary center-block" >Simpan</button>
                         </div>
                     </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection