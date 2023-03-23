<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <article>
        <h1>プロフィール入力フォーム</h1>
        <p>下記入力フォームよりアンケートのご入力をお願いします。</p>
            <form action="{{ route('admin.profile.create') }}" method="post">
            
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
        
        </form>
    </article>
<!--</body>
</html>