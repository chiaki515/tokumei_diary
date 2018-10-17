<?php echo validation_errors(); ?>
<?php echo form_open('Item/create'); ?>
<?php
//ワンタイムチケットを生成
$ticket = md5(uniqid(rand(), true));
$this->session->set_userdata('ticket', $ticket);
?>

<div class="hatena-body" id="hatena-anond">
  <p id="breadcrumbs">
    <a href="<?php echo base_url('index.php/item/'); ?>">はてな匿名ダイアリー</a>
    >
    <a>
    <?php
    if ($user["is_logged_in"]==1) {
        echo $user["email"];
    } else {
        echo 'ゲスト';
    }
    ?>
    の日記
    </a>
    > 日記を書く
  </p>

  <h1>日記を書く</h1>
  <div class="intro">
  </div>
  <div class="toppage" id="body">
    <div class="day">
      <h2>
        <a>
          <span class="date"><?php echo date('Y-m-d')?></span>
        </a>
      </h2>

      <div class="body">
        <div class="section">
          <h3>
            <br>
            <a>■</a>
              <input id="text-title" name="title" cols="15" placeholder="タイトル" type="text" >
          </h3>
            <br>
            <textarea id="text-body" name="message" cols="60" rows="15" placeholder="本文"></textarea><br/>
            <br>
            <input type="hidden" name="ticket" value="<?php echo $ticket?>">
          </form>
        </div>
      </div>
      <br>
      <input type="submit" name="submit" value="この内容を登録する" class=createbtn/>

    </div>
  </div>
</div>
