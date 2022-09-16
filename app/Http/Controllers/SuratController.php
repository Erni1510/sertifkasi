<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class SuratController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
       //helper
    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];
            $fixname = str_replace('.pdf','_',$name);
            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = $fixname.'_'.rand();
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "surat";
            $file->move($tmp_file_path,$tmp_file_name);
            $result = ' ';
            //if(move_uploaded_file($tmp_name, $tmp_file_path)){
                $result = $tmp_file_name;
            //}
        return url('surat').'/'.$result;
    }

    public function index()
    {
        $data = DB::table('arsip_surat')
        ->get();
        return view('admin.ArsipSurat.index',compact('data'));
    }

    public function createPage()
    {
        return view('admin.ArsipSurat.create');
    }

    public function editPage($id)
    {
        $data = DB::table('arsip_surat')->where('id',$id)->first();
        return view('admin.ArsipSurat.edit',compact('data'));
    }


    public function detailPage($id)
    {
        $data = DB::table('arsip_surat')->where('id',$id)->first();
        return view('admin.ArsipSurat.detail',compact('data'));
    }

    public function create(Request $request)
    {
        DB::table('arsip_surat')->insert(
            [
                'judul'=>$request->judul,
                'kategori'=>$request->kategori,
                'nomor'=>$request->nomor,
                'file'=>$this->uploadFile($request,'file'),
                'created_at'=>Carbon::now()->format('Y-m-d')
            ]);
        return redirect('admin/surat')->with('success','Data berhasil disimpan');
    }

    public function update(Request $request,$id)
    {
        if($request->file('file') != null)
        {
            $fixGambar = $this->uploadFile($request,'file');
        }else
        {
            $fixGambar = $request->old_file;
        }
        DB::table('arsip_surat')->where('id',$id)->update(
            [
                'judul'=>$request->judul,
                'kategori'=>$request->kategori,
                'nomor'=>$request->nomor,
                'file'=>$fixGambar,
                'created_at'=>Carbon::now()->format('Y-m-d')
            ]);
        return redirect('admin/surat')->with('success','Data berhasil diubah');
    }


    public function delete($id)
    {
        DB::table('arsip_surat')->where('id',$id)->delete();
        return redirect('admin/surat')->with('success','Data berhasil dihapus');
    }

    public function download_pdf($id)
    {
        $data = DB::table('arsip_surat')->where('id',$id)->select('file','judul')->first();
        $headers = array('Content-Type: application/pdf');
        $fixname = explode('/', $data->file);
        $fixfile= end($fixname);
        $file = public_path().'/surat/'.$fixfile;
        return response()->download($file, ''.$data->judul.'.pdf', $headers);              
        
    }

    public function about()
    {
        return view('admin.ArsipSurat.about');
    }
}
