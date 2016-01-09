<div id="works">
        <table>
          <?php
            $worksID = $_GET['pid'];
            $load    = new loadDB();
            $work    = $load->getWorks($worksID);
            $num     = count($work);
            for($i  = $num - 1; $i >= 0; $i--) {
              $works  = $work[0];
              $client = $load->getClient($works["client"] | 0);
          ?>
            <tr>
              <th>クライアント</th>
              <td><?=$client[0]['name']?></td>
              <th>案件名</th>
              <td><?=$works['title']?></td>
              <th>先方担当者</th>
              <td><?=$works['staff']?></td>
            </tr>
          <?php } ?>
            <tr>
              <th>要件</th>
              <td colspan="5"><input name="detail" value="" type="text" placeholder="Webサイトリニューアル etc" /></td>
            </tr>
            <tr>
              <th>関連チーム</th>
              <td colspan="5"><ul id="teamlist"><?php
                for($i = 0; $i < $teamnum; $i++) {
              ?>
                <li class="<?=$team[$i]["name"]?>" data-ID="<?=$team[$i]["id"]?>" id="team02-<?=$team[$i]["name"]?>"><a href="#"><?=$team[$i]["name"]?></a></li>
              <?php } ?></ul></td>
            </tr>
        </table>
        <div id="lightboxTotal">
          <p>売価金額合計：<span>￥0</span></p>
        </div>
      </div>