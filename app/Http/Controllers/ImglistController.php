<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImglistController extends Controller
{
    //
    public function index()
    {
    	//jsonパース
		$url = asset('js/imgconfig.json');
		$json = file_get_contents($url);
		$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
		$data = json_decode($json,true);


        return view('imglist.list',compact('data'));
    }



    //セッションクリア
    public function clear( Request $request )
    {
    	$request->session()->get('tmp_ids');
		$request->session()->forget('tmp_ids');
        return view('imglist.clear');
    }



    //一時リストから選択削除
    public function del( Request $request )
    {
    	$post_data = $request->all();
    	$session_ids = $request->session()->get('tmp_ids');


    	//削除処理
		//セッションの中に既にあるかチェック
		$chk_list = array_column($session_ids, 'no');

		if( in_array( $post_data['id'] , $chk_list ) ) {
			//ある　→　削除する

			$columns = array_column($session_ids, 'no');	//session_idsからnoだけを抽出
			$result_index = array_search($post_data["id"], $columns);

			unset($session_ids[ $result_index ]);	//選択削除
			$session_ids = array_values($session_ids);	//添字を振り直す
			$request->session()->put('tmp_ids', $session_ids);

		}else{
			//イレギュラー　処理なし
		}



		if( count($session_ids) > 0 ){
			//まだカートにあり
			$view_ary = $session_ids;	//viewで表示するデータ
			return view('imglist.cart',compact('view_ary'));
		}else{
			//カートに選択ない場合はトップにリダイレクト
			return redirect('/imglist');
		}

    }



    //カート
    public function cart( Request $request )
    {

        $post_data = $request->all();
		$session_ids = $request->session()->get('tmp_ids');

		if( is_null($session_ids) ){
			$session_ids = array();	//セッションなければ初期化
		}

    	//jsonパース
		$url = asset('js/imgconfig.json');
		$json = file_get_contents($url);
		$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
		$data = json_decode($json,true);


		//セッションの中に既にあるかチェック
		$chk_list = array_column($session_ids, 'no');

		if( in_array( $post_data['id'] , $chk_list ) ) {
			//既にリスト済

		}else{
			// echo "ない";
			$columns = array_column($data, 'no');	//json(data)からnoだけを抽出
			$result_index = array_search($post_data["id"], $columns);

			// dump($result_index );
			// dump($data[ $result_index ]);

			//セッション登録
			array_push( $session_ids , $data[ $result_index ] );
			$request->session()->put('tmp_ids', $session_ids);

		}


		$view_ary = $session_ids;
		return view('imglist.cart',compact('view_ary'));
    }



    public function requestform( Request $request )
    {
		return view('imglist.requestform');
    }

}
