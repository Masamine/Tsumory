<?php
  //require('../conf/config.php');
  require('connectDB.php');
  //require('function.php');
  //require('load.php');

  function searchData() {

    global $pdo;

    $getClient = $_GET['sClient'];
    $getTeam   = $_GET['sTeam'];
    $getWord   = $_GET['sKeyword'];

    $isClient = ($getClient !== "");
    $isTeam   = ($getTeam !== "");
    $isWord   = ($getWord !== "");

    //posts.id, post_name, team, author, recent_date, total, works.id, client, title
    $query = "SELECT posts.id as postID, post_name, team, author, recent_date, total, details, client.name as clientName, works.id as worksID, client, title FROM posts INNER JOIN (client INNER JOIN works ON works.client = client.id) ON posts.works_id = works.id";

    // if($isClient) {
    //   $query = "SELECT * FROM team";
    // }
    
    // $query = "SELECT * FROM team";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $array = array();

    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      $array[] = array(
        "postID"   => $row['postID'],
        "postName" => $row['post_name'],
        "team"     => unserialize($row['team']),
        "author"   => $row['author'],
        "time"     => $row['recent_date'],
        "total"    => $row['total'],
        "worksID"  => $row['worksID'],
        "client"   => $row['clientName'],
        "title"    => $row['title'],
        "detail"   => unserialize($row['details'])
      );
    }

    $pdo = null;

    return $array;
  }

  function getData($data) {

    $count = count($data);

    return $count;
  }

?>