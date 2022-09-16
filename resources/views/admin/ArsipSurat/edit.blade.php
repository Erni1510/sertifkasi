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
                            Edit Arsip Surat
                        </h2>
                        
                    </div>
                    <div class="body">
                        <form enctype="multipart/form-data" method="POST" action="{{url('admin/surat/update/'.$data->id)}}">
                            @csrf
                            <div class="form-group">
                            <label for="nama_kebijakan">NOMOR SURAT</label>
                                <div class="form-line">
                                    <input type="text" id="nama_kegiatan" class="form-control" placeholder="Nomor Surat" name="nomor" value="{{$data->nomor}}">
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="nama_kebijakan">KATEGORI SURAT</label>
                                <div class="form-line">
                                    <select class="form-control" name="kategori">
                                        <option value="Undangan" {{$data->kategori=='Undangan'?'selected':''}}>Undangan</option>
                                        <option value="Pengumuman" {{$data->kategori=='Pengumuman'?'selected':''}}>Pengumuman</option>
                                        <option value="Nota Dinas" {{$data->kategori=='Nota Dinas'?'selected':''}}>Nota Dinas</option>
                                        <option value="Pemberitahuan" {{$data->kategori=='Pemberitahuan'?'selected':''}}>Pemberitahuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="nama_kebijakan">JUDUL SURAT</label>
                                <div class="form-line">
                                    <input type="text" id="nama_kegiatan" class="form-control" placeholder="Judul Surat" name="judul" value="{{$data->judul}}">
                                </div></div>
                            <div class="form-group">
                            <label for="file_kebijakan">FILE</label>
                                <div class="form-line">
                                    <input type="file" name="file" id="nis" class="form-control" placeholder="file kebijakan">
                                    <input type="hidden" name="old_file" value="{{$data->file}}">
                                </div>
                                <small>Unggah file baru bila ada pergantian file</small>
                            </div>
                             <div class="row clearfix">
                                <div class="col-md-1">
                              <a href="{{url('admin/surat/detail/'.$data->id)}}"><button type="button" class="btn btn-warning center-block" >Cancel</button></a>
                         </div>
                         <div class="col-md-2">
                             <button type="submit" class="btn btn-primary center-block" >Simpan</button>
                         </div>
                     </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
        
    </div>
</section>
@endsection