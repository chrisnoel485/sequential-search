$title = 'Search Surat Cuti';
$SuratCuti = new SuratCuti();
$data = SuratCuti::all();   //select* from surat cuti
 
// searched value
$ketemu = false;// awalnya kosong belum ketemu
foreach ($data as $item) 
{//apkah data ini sama dengan data yang di cari
    if ($item->nomor_surat == $req->input('nomor_surat')) 
    {
        $SuratCuti = $item;
        $ketemu = true;
        break;
    }
}
    if ($ketemu == false) 
    {
        Session::flash('success','Nomor Surat '.$req->input('nomor_surat').' tidak ditemukan');
        return redirect('/'.Auth::user()->login_role.'/suratcuti/manage');
    }
    else
    {
        return view('admin.suratcuti.surat', ['title'=>$title,'data'=>[$SuratCuti], 'sisa_cuti'=>'null', 'tahun'=>'null']);