<?php

include_once __DIR__ . '\..\components\DB.php';

class News
{

    public static function getNewsList()
    {
//        $host = "localhost";
//        $dbname = "mvs_site";
//        $user = "root";
//        $password = "";
//        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db = Db::getConnection();
        $result = $db->query('SELECT id, title, date, author_name, short_content FROM news ORDER BY id ASC LIMIT 10');

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;

    }

    public static function getNewsItemById($id)
    {

        $id = intval($id);

        if ($id) {
//            $host = "localhost";
//            $dbname = "mvs_site";
//            $user = "root";
//            $password = "";
//            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }
}