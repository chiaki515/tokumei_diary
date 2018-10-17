<?php echo validation_errors(); ?>
<?php echo form_open('Member/register'); ?>
<html lang="ja">
<head>
	<title>はてなユーザー登録</title>
  <link rel="stylesheet" href="<?=base_url() ?>css/style.css" type="text/css" />
</head>

<body id="hatena-www-register" class="js">
  <header id="title">
    <hgroup>
      <h1>はてなユーザー登録</h1>
      <!-- <h2>
        はてなのサービスを利用するには
        <br>
        ユーザー登録(無料)をする必要があります。
      </h2> -->
    </hgroup>
  </header>

  <div id="container">
    <div id="main">
      <form action="register" method="post" name="form" class="login">
        <input type="hidden" name="mode" value="enter">
        <div>
          <br>

          <div class="input-item">
            <div class="input-item-inner">
              <input name="email" autofocus="autofocus"
              required="required" type="text" class="text" id="login-name"
              placeholder="メールアドレス"/>
            </div>
          </div>

          <div class="input-item">
            <div class="input-item-inner">
              <input required="required" name="password" class="password"
              placeholder="パスワード"/>
            </div>
          </div>

        </div>
      </form>

      <p id="alternate-message">
      </p>
      <input class="submit-button" type="submit" name="submit" value=登録>
      <br>
      <a href="<?php echo base_url('index.php/item/'); ?>">ホームへ</a>

    </div>
  </div>

</body>
</html>
