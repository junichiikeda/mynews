<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    // 追記
    public function add()
    {
        return view('admin.profile.create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    /* public function update()
    {
        return redirect('admin/profile/edit');
    } */
    
    // 08 ニュース投稿画面を作成しよう 課題6
    public function update()
    {
        return view('admin.profile.edit');
    } 
    
    public function create(Request $request)
    {
         // Validationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        // データベースに保存する
        $profile->fill($form);
        $profile->save();
       
        // admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
}