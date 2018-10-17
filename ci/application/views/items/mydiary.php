<div class="hatena-body" id="hatena-anond">
  <h1><?php echo($title);?></h1>
  <p id="breadcrumbs">
    <a href="<?php echo base_url('index.php/item/'); ?>">はてな匿名ダイアリー</a>
    >
    <a>
        <?php echo $title; ?>
    </a>
  </p>

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
                <?php print($item->title); ?>
                <?php if ($item->original==1) : ?>
                <?php else : ?>
                <button class="optimize-get-reference-button" onclick="location.href='<?php echo base_url('index.php/item/view/'. $item->post_id); ?>'">
                  ▼言及先エントリを開く
                </button>
                <?php endif; ?>
          </h3>
            <p><?php print(mb_substr($item->message, 0, 200)); ?></p>
            <br>
            <?php endforeach ?>
        </div>
      </div>
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

      <a href="<?php echo base_url('index.php/item/?page=' . ($page+1)); ?>">
        次の5件>
      </a>
    </div>
  </div>
</div>
