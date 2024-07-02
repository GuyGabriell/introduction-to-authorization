
<?php 

$config = require('config.php');
  
$db = new Database($config['database']);

$heading = 'Notes';

$currentUserId = 1;


//dd($_GET['id']);

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();

//Authorization-status-codes-and-magic-numbers

if (! $note) {

  abort();
}

if ($note['user_id'] !== $currentUserId) {

  abort(Response::FORBIDDEN);
}


require "views/note.view.php";
