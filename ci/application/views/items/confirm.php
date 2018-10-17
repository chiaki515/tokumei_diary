<div class="hatena-body" id="hatena-anond">
  <h1><?php echo('日記登録の確認');?></h1>
  <p id="breadcrumbs">
    <a href="<?php echo base_url('index.php/item/'); ?>">はてな匿名ダイアリー</a>
    >
    <a href="<?php echo base_url('index.php/item/mydiary'); ?>">
        <?php echo $email; ?>の日記
    </a>
    <a>
    >日記登録の確認
    </a>
  </p>


  <div class="toppage" id="body">
    <div id="ad-overlay-botton-sp-1"></div>
    <div class="day">
      <h2>
        <a>
          <span class="date">
            <?php print('日付'); ?>
          </span>
        </a>
      </h2>
      <div class="body">
        <div class="section">
          <h3>
            <a>
              <span class="sanchor">■</span>
            </a>
                <?php print('title'); ?>
          </h3>
            <p><?php print('message'); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
