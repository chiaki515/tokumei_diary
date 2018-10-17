<!DOCTYPE html>
<html lang="ja">
<head>
    <title>はてラボ ログイン</title>
  <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css" />
</head>

<body class="login">
  <div id="bannersub">
    <table cellspacing="0">
      <tbody>
        <!-- <tr>
          <td width="50%" nowrap="nowrap" class="username">
            ようこそゲストさん
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>

  <div id="container">
    <div id="main">
      <form action="checkLogin" method="post" name="form" class="login">
        <input type="hidden" name="mode" value="enter">
        <div>
          <br>

          <div class="input-item">
            <div class="input-item-inner">
              <input name="email" required="required" type="text" class="text"
              id="login-name" placeholder="メールアドレス"/>
            </div>
          </div>

          <div class="input-item">
            <div class="input-item-inner">
              <input required="required" name="password" class="password"
              placeholder="パスワード"/>
            </div>
          </div>

          <div id="option" class="config-button">
            <input value="ログイン" type="submit" name="submit" class="submit-button">
          </div>

        </div>
      </form>

      <p id="alternate-message">
        <span>登録がまだの方は</span>
      </p>
      <a class="submit-button register" href="<?php echo base_url('index.php/member/register'); ?>">
        新規ユーザー登録
      </a>
      <br>
      <a href="<?php echo base_url('index.php/item/'); ?>">ホームへ</a>

    </div>
  </div>

</body>
</html>
