<div class="accBox" id="search">
  <div class="box">
  <form action="/search.php">
    <div class="select">
      <input type="text" name="sClient" placeholder="クライアント選択" value="" readonly="readonly" class="input">
      <span class="input">▼</span>
      <ul>
      <?php if($msg): ?>
      <p class="msg"><?=$msg?></p>
      <?php endif; ?>
      <?php
        $load   = new loadDB();
        $client = $load->getClient();
        $num = count($client);
        for($i = $num - 1; $i >= 0; $i--) {
      ?>
      <li><?=$client[$i]['name']?></li>
      <?php } ?>
      </ul>
    </div>
    <div class="select">
      <input type="text" name="sTeam" placeholder="チーム選択" value="" readonly="readonly" class="input">
      <span class="input">▼</span>
      <ul>
        <li>Web</li>
        <li>Design</li>
        <li>Edit</li>
        <li>DTP</li>
      </ul>
    </div>
    <div class="select keyword">
      <input type="text" name="sKeyword" placeholder="キーワード" value="">
    </div>
    <div class="btnsearch radbtn"><input type="submit" value="検索"></div>
  </form>
  </div>
</div>