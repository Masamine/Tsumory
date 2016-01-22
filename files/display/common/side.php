<?php
function is_current( $uri = "" ) {
  $uri = trim( $uri, "/" );
  $request_uri = $_SERVER['REQUEST_URI'];

  if( $uri && strpos($request_uri."/", "".$uri."", 0) !== FALSE ) {
    return true;
  }
  $request_uri = trim(str_replace( "/index.php", "", $request_uri ), '/'); // top
  if( !$uri && !$request_uri ) {
    return true;
  }
  return false;
}
function echo_current( $uri = "" ) { 
  if(is_current( $uri )) {
    echo 'current';
  };
}
?>
<div id="side">
  <div class="inner">
    <ul>
      <li><a href="/home.php" class="<?php echo_current("home") ?>">案件一覧</a></li>
      <li><a href="/cost.php" class="<?php echo_current("cost") ?>">単価設定</a></li>
      <li><a href="/client.php" class="<?php echo_current("client") ?>">クライアント一覧</a></li>
    </ul>
  </div>
</div>