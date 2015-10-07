<div class="accBox" id="search">
  <div class="box">
  <form action="/search.php">
    <div class="select">
      <input type="text" name="sClient" placeholder="クライアント選択" value="" readonly="readonly" class="input">
      <span class="input">▼</span>
      <ul>
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
      <?php
        $load   = new loadDB();
        $team = $load->getTeam();
        $num = count($team);
        for($i = 0; $i < $num; $i++) {
      ?>
        <li id="team-<?php echo $team[$i]["name"]; ?>"><?php echo $team[$i]["name"]; ?></li>
      <?php } ?>
      </ul>
    </div>
    <div class="select keyword">
      <input type="text" name="sKeyword" placeholder="キーワード" value="">
    </div>
    <div class="btnsearch radbtn"><input type="submit" value="検索"></div>
  </form>
  </div>
</div>