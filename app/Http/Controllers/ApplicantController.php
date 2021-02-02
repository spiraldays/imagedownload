<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Applicant;
//バリデーション用
use App\Http\Requests\StoreApplicant;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //jsonパース
        $url = asset('js/imgconfig.json');
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $data = json_decode($json,true);

        return view('imglist.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicant $request)
    {
        Applicant::create($request->all());
        $applicant = Applicant::all();

        $session_ids = (array)$request->session()->get('tmp_ids');

        return view('applicant.getimage',compact('applicant','session_ids'));

//        return redirect()->route('applicant.getimage')->with('success', '新規登録完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::find($id);
        return view('applicant.show', compact('applicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        return view('applicant.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreApplicant $request, $id)
    {
        $update = [
            'title' => $request->title,
            'author' => $request->author
        ];
        Applicant::where('id', $id)->update($update);
        return back()->with('success', '編集完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Applicant::where('id', $id)->delete();
        return redirect()->route('applicant.index')->with('success', '削除完了しました');
    }




    function downloadimg(Request $request) {

        $session_ids = $request->session()->get('tmp_ids');

        $columns = array_column($session_ids, 'no');
        if( in_array( $request->id , $columns ) ) {
            $result_index = array_search($request->id, $columns);
        }else{
            //イレギュラー
            return;
        }

        // ファイルサイズを調べたいファイルへのパス
        $path = "img/".$session_ids[$result_index]["filepath"].$session_ids[$result_index]["filename"];

        //画像のパスとファイル名
        $downname = $session_ids[$result_index]["filename"];    //  'downloadimg.jpg';  //ダウンロードするファイル名

        //画像のダウンロード
        header('Content-Type: application/octet-stream');
        header('Content-Length: '.filesize($path));
        header('Content-disposition: attachment; filename="'.$downname.'"');
        readfile($path);
    }
}
