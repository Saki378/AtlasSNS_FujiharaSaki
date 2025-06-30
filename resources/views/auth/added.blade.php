<x-logout-layout>
  <div id="clear">
    <div class="clear-name">
      <p><span>{{ Session('username') }}</span>さん</p>
      <p>ようこそ！AtlasSNSへ！</p>
    </div>
    <div class="clear-text">
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
    </div>

    <a class="btn btn-danger" href="login" role="button">ログイン画面へ</a>
  </div>
</x-logout-layout>
