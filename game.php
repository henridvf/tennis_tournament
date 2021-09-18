<?php

/* When playing against another tennis player the winner decided by multiplying the
performance rating for the surface the match is played upon by the performance rating
for weather. The highest value wins the match. In the event of a draw replay the match
with newly randomised weather & court.
Create a round robin tournament (pair off the players in matches until the final winner
is declared) and for each match randomise the court to be played on and the weather conditions.
The final winner of each tournament should be awarded a grandslam championship.
Display a leaderboard of the number of grandslams each player has won in their career. */

include 'roundrobin.php';

$db = new PDO('mysql:host=db; dbname=tennistournament', 'root', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT `name` FROM `players`");

$query->execute();

$users = $query->fetchAll();

create_round_robin_tournament($users);
//echo '<pre>';
//print_r($users);
//echo '</pre>';

echo '<h2>Users</h2>';
echo '<ol>';
foreach($users as $user) {
    echo '<li>'
        . $user['name']
        . '</li>';
}
echo '</ol>';
