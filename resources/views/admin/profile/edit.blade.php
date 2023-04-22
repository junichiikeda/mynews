@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')

    <div class="container">
        <h2プロフィール編集></h2>
        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <P><label>お名前(name)</br>
            <input type="text" name="name" value="{{ $profile_form->name }}"></label></P>
            <p>性別(gender)
                <label><input type="radio" name="gender" value="male" {{ old("gender", $profile_form->gender) === "male" ? 'checked' : '' }}>男性</label>
                <label><input type="radio" name="gender" value="female" {{ old("gender", $profile_form->gender) === "female" ? 'checked' : '' }}>女性</label>
            </p>
            <p><label>趣味(hobby)</br>
            <textarea name="hobby" cols="30" rows="5">{{ $profile_form->hobby }}</textarea></label></p>
            <p><label>自己紹介(introduction)</br>
            <textarea name="introduction" cols="30" rows="15" placeholder="こちらに入力してください">{{ $profile_form->introduction }}</textarea></label></p>
            @csrf
            <input type="hidden" name="id" value="{{ $profile_form->id }}">
            <input type="submit" class="btn btn-primary" value="更新">
        </form>
         {{-- 以下を追記 --}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h3>編集履歴</h3>
                        <ul class="list-group">
                            @if ($profile_form->profile_histories != NULL)
                                @foreach ($profile_form->profile_histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                {{-- 以上を追記 --}}
    </div>
@endsection