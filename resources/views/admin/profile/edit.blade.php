@extends('layouts.profile')
@section('title', 'プロフィールの新規作成')

@section('content')

    <div class="container">
        <h2下記フォームよりプロフィールのご入力をお願いします。></h2>
        <form action="{{ route('admin.profile.update') }}" method="post">
            <P><label>お名前(name)</br>
            <input type=""text name="name"></label></P>
            <p>性別(gender)
                <label><input type="radio" name="gender" value="male">男性</label>
                <label><input type="radio" name="gender" value="female">女性</label>
            </p>
            <p><label>趣味(hobby)</br>
            <textarea name="hobby" cols="30" rows="5"></textarea></label></p>
            <p><label>自己紹介(introduction)</br>
            <textarea name="introduction" cols="30" rows="15" placeholder="こちらに入力してください"></textarea></label></p>
            @csrf
            <input type="submit" class="btn btn-primary" value="更新">
        </form>
    </div>
@endsection