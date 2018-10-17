<div class="hatena-body" id="hatena-anond">
  <h1>はてな匿名ダイアリー</h1>
  <div class="intro">
    <p>名前を隠して楽しく日記</p>
  </div>

  <div class="pager-l">
    <?php
    if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else {
        $page = 1;
    }?>

    <?php if ($page >= 2) : ?>
      <a href="<?php echo base_url('index.php/item/?page=' . ($page-1)); ?>">
        <前の5件
      </a>
    <?php endif; ?>
    <?php if (!empty($items)) :?>
      <a href="<?php echo base_url('index.php/item/?page=' . ($page+1)); ?>">
        次の5件>
      </a>
    <?php endif ;?>
  </div>
  <br>

  <div class="toppage" id="body">
    <div id="ad-overlay-botton-sp-1"></div>

    <div class="day">
      <h2>
        <a>
          <span class="date">　</span>
        </a>
      </h2>
      <div class="body">
        <div class="section">
          <h3>
            <?php foreach ($items as $item): ?>
              <a href="<?php echo base_url('index.php/item/view/'. $item->id); ?>">
                <span class="sanchor">■</span>
              </a>
                <?php if ($item->original==1) : ?>
                    <?php print($item->title); ?>
                <?php else : ?>
                <a href="<?php echo base_url('index.php/item/view/'. $item->post_id); ?>">
                  <?php print($item->title); ?>
                </a>
                <button id="update" mention_id="<?php echo $item->post_id ?>" type="submit" name="mention_id" class="optimize-get-reference-button" value="<?php echo $item->post_id ?>">
                  ▼言及先エントリ
                </button>
                <div id="result"></div>
                <?php endif; ?>
          </h3>
            <p><?php print(mb_substr($item->message, 0, 200)); ?></p>
            <br>
            <?php endforeach ?>
        </div>
      </div>
    </div>

    <div class="pager-l">
        <?php if ($page >= 2) : ?>
          <a href="<?php echo base_url('index.php/item/?page=' . ($page-1)); ?>">
            <前の5件
          </a>
        <?php endif; ?>
        <?php if (!empty($items)) :?>
          <a href="<?php echo base_url('index.php/item/?page=' . ($page+1)); ?>">
            次の5件>
          </a>
        <?php endif ;?>
    </div>
  </div>
</div>
