<div class="hatena-body" id="hatena-anond">
  <div class="toppage" id="body">
    <div class="hotentries-wrapper">
      <br><br>
      <h2 class="title">
        <span class="date">人気エントリ</span>
      </h2>

      <div id="popularentriesblock">
        <ul class="block-link list list-entry" style="padding-left:0px;">
          <?php foreach ($popular_items as $popular_item): ?>
            <li>
            <a href="<?php echo base_url('index.php/item/view/'. $popular_item->id); ?>">
              <?php print($popular_item->title); ?>
            </a>
            <span class="note">
              <a class="trackback">
                <img alt="記事への反応" src="<?=base_url() ?>/images/replies.gif">
                <?php print($popular_item->reply); ?>
              </a>
            </span>
          </li>
          <?php endforeach ?>
        </ul>
      </div>

    </div>
  </div>
</div>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js?ver=1.7.1'></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/trunk8.js">
</script>
<script type="text/javascript">
  // ------返信コメント折りたたみ------
  // if(typeof $.fn.trunk8 != "undefined"){ //jQueryの読み込み確認
  //     $(function(){
  //         alert('jQuery is ready.')
  //     });
  // }
  $(function() {
    $('.intro-more').trunk8({
      lines: 3,
      fill: '&hellip; <a class="read-more btn" href="#">...</a>'
    });
    $(document).on('click', '.read-more', function(event) {
      $(this).parent().trunk8('revert').append(' <a class="read-less btn" href="#">close</a>');
      return false;
    });

    $(document).on('click', '.read-less', function(event) {
      $(this).parent().trunk8();
      return false;
    });
  });
</script>

<script>
  //------言及先表示------
  $(function() {
    $('#update').click(function() {
      var id =  $(this).attr("mention_id");
      id = '' + id;
      $('#result').load('<?php echo base_url('index.php/item/mention?mention_id=') ?>' + id);
      $('#result').toggle();
    });
  });
</script>
</body>
<html>
