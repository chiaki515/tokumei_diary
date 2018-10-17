
<html lang="ja">
<head>
  <meta character="utf-8">
  <!-- cssスタイルシート ファイル読み込み宣言 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css" />
  <title><?php echo $title;?></title>
</head>

<body>
  <div class="banner" id="globalheader">
    <div class="wide" id="bannersub">
      <table>
        <tbody>
          <tr>
            <td class="username">
              ようこそ
                <?php if ($user["is_logged_in"]==1) :?>
                  <a href="<?php echo base_url('index.php/item/mydiary'); ?>">
                    <?php echo $user["email"] ?>
                  </a>さん
                <?php else :?>
                  <a><?php echo 'ゲスト'; ?></a>さん
                <?php endif ;?>
            </td>

            <?php if ($user["is_logged_in"]==1) : ?>
              <td class="gmenu">
                <a href="<?php echo base_url('index.php/item/mydiary'); ?>">
                  <?php echo $user["email"]; ?>の日記
                </a>
              </td>
              <td class="gmenu">
                <a href="<?php echo base_url('index.php/item/create'); ?>">
                  日記を書く
                </a>
              </td>
              <td class="gmenu">
                <a href="<?php echo base_url('index.php/member/logout'); ?>">
                  ログアウト
                </a>
              </td>
            <?php else :?>
              <td class="gmenu">
                <a href="<?php echo base_url('index.php/member/login'); ?>">
                  ログイン
                </a>
              </td>
              <td class="gmenu">
                <a href="<?php echo base_url('index.php/member/register'); ?>">
                  ユーザー登録
                </a>
              </td>
            <?php endif ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
