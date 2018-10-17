<?php
function find_recursively($source, &$result, $search_id)
{
    foreach ($source as $s) {
        if ($s->post_id == $search_id) {
            $id = $s->id;
            ?>
  <ul>
    <li>
      <a href='<?php echo base_url('index.php/item/view/'. $id); ?>'>
            <?php echo($s->title); ?>
      </a>
      <div class="box-curve">
        <div class="section">
          <p class="intro-more"><?php echo($s->message); ?></p>
        </div>
      </div>
            <?php find_recursively($source, $s, $id); ?>
    </li>
  </ul>
            <?php
        }
    }
}
?>

<div class="hatena-body" id="hatena-anond">
  <p id="breadcrumbs">
    <a href="<?php echo base_url('index.php/item/'); ?>">はてな匿名ダイアリー</a>
    >
    <a>
    <?php echo $item['title']; ?>
  </p>


  <div class="toppage" id="body">
    <div id="ad-overlay-botton-sp-1"></div>

    <div class="day">
      <h2>
        <a>
          <span class="date">
            <?php print($item['updated_at']); ?>
          </span>
        </a>
      </h2>
      <div class="body">
        <div class="section">
          <h3>
            <a>
              <span class="sanchor">■</span>
            </a>
                <?php print($item['title']); ?>
                <?php if ($item['original']==1) : ?>
                <?php else : ?>
                <button id="update" mention_id="<?php echo $item['post_id'] ?>" type="submit" name="mention_id" class="optimize-get-reference-button" value="<?php echo $item['post_id'] ?>">
                  ▼言及先エントリ
                </button>
              <div id="result"></div>
                <?php endif; ?>
          </h3>
            <p><?php print($item['message']); ?></p>
            <br>
            <?php if ($user["is_logged_in"]==1) : ?>
            <div align="right">
              <a href="<?php echo base_url('index.php/item/reply?title=anond:' . date("YmdHis") . '&post_id=' . $item['id'] . '&reply=' . $item['reply']); ?>">
                言及する
              </a>
            </div>
            <?php endif ?>
        </div>
      </div>
    </div>
    <br>

    <div class="refererlist">
      <div class="caption">
        <a name="tb">記事への反応</a>
      </div>
        <?php if ($item['original']==1) : ?>
        <?php else : ?>
          <!-- <ul style="list-style-type: square;">
            <li>
              <a href='<?php echo base_url('index.php/item/view/'. $item['post_id']); ?>'>
                <?php echo('言及先タイトル'); ?>
              </a>
              <div class="box-curve">
                <div class="section">
                  <p class="intro-more">
                    <?php echo('言及先内容'); ?>
                  </p>
                </div>
              </div>
            </li>
          </ul> -->
        <?php endif; ?>
        <?php find_recursively($all_items, $result, $item['id']); ?>
    </div>

    <br>
    <hr>
    <br>
    <?php if($item['member_id']==$user['member_id']) : ?>
    <a href="<?php echo base_url('index.php/item/edit?id=' . $item['id']); ?>">編集</a>
    |
    <a href="<?php echo base_url('index.php/item/delete?id=' . $item['id']); ?>">削除</a>
    <?php endif ?>
    |
    <a href="<?php echo base_url('index.php/item/'); ?>">戻る</a>

  </div>
</div>
