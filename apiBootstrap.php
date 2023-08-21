<?php 
session_start();

$config = require "config.php";

require "classes/Connection.php";

$db = Connection::connect($config['database']);

require "classes/QueryBuilder.php";
require_once "classes/User.php";
require "classes/Category.php";
require "classes/Post.php";
require "classes/Comment.php";

$user = new User($db);
$category = new Category($db);
$post = new Post($db);
$allPosts = new Post($db);
$comment = new Comment($db);

?>