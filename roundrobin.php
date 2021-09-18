<?php

//$teams = array('A', 'B', 'C', 'D') ;
//create_round_robin_tournament($teams);

function create_round_robin_tournament($teams)
{
    if(count($teams) < 2) throw new Exception("At least 2 teams needed to build tournament");

    if( count($teams) % 2 == 1 )
        $teams[] = "dummy" ; // if number of teams is even, add a dummy team that means 'this team don't play this round'

    for($round = 0 ; $round < count($teams)-1 ; ++$round)
    {
        echo "=== Round " . ($round+1) . " ===<br>" ;
        displayRoundPairs($teams);
        echo '<br>' ;
        $teams = rotateCompetitors($teams);
    }
}

function displayRoundPairs($teams)
{
    for($i = 0 ; $i < count($teams)/2 ; ++$i)
    {
        $opponent = count($teams) - 1 - $i ;

        if($teams[$i] == 'dummy')
            echo "Team " . $teams[$opponent] . " don't play this round" . PHP_EOL ;
        elseif($teams[$opponent] == 'dummy')
            echo "Team " . $teams[$i] . " don't play this round" . PHP_EOL ;
        else
            echo $teams[$i]['name'] . ' - ' . $teams[$opponent]['name'] . '<br>' ;
    }
}

// rotate all competitors but the first one
function rotateCompetitors($teams)
{
    $result = $teams ;

    $tmp = $result[ count($result) - 1 ] ;
    for($i = count($result)-1 ; $i > 1 ; --$i)
    {
        $result[$i] = $result[$i-1] ;
    }
    $result[1] = $tmp ;

    return $result ;
}
