<?php echo validation_errors(); ?>
<?php echo form_open('Item/update'); ?>
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
              <input id="text-title" name="title" cols="15" type="text" value="<?php echo $item['title']; ?>">
            </input>
          </h3>
            <br>
            <textarea id="text-body" name="message" cols="60" rows="15"><?php echo $item['message']; ?></textarea>
            <br/>
            <br>
          </form>
        </div>
      </div>
      <br>
      <input type="submit" name="submit" value="変更する" />
      <input type="hidden" name="id" value="<?php echo $item['id'] ?>" />

    </div>
  </div>
</div>
