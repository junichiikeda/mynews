@extends('layouts.profile')
@section('title', 'プロフィールの新規作成')
@section('content')

    <article>
        <h1></h1>
        <p>下記フォームよりプロフィールのご入力をお願いします。</p>
            <form action="{{ route('admin.profile.create') }}" method="post">
                
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            <P><label>お名前(name)</br>
            <input type=""text name="name"></label></P>
            <p>性別(gender)
                <label><input type="radio" name="gender" value="male">男性</label>
                <label><input type="radio" name="gender" value="female">女性</label>
            </p>
            <p><label>趣味(hobby)</br>
            <textarea name="comment" cols="30" rows="5"></textarea></label></p>
            <p><label>自己紹介(introduction)</br>
            <textarea name="comment" cols="30" rows="20" placeholder="こちらに入力してください"></textarea></label></p>
            @csrf
            <input type="submit" class="btn btn-primary" value="更新">
        </form>
    </article>
@endsection