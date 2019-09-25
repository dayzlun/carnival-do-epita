<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class PaperPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */

function getWinningChoice($choice)
{
  if ($choice == 'paper')
    return 'scissors';
  else if ($choice == 'scissors')
    return 'rock';
  else
    return 'paper';
}


function getanotherChoice($choice)
{
  $choices['rock'] = 'scissors';
  $choices['paper'] = 'rock';
  $choices['scissors'] = 'paper';
  return $choices[$choice];
}


class DayzlunPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
      $mylastchoice = $this->result->getLastChoiceFor($this->mySide);
      $hislastchoice = $this->result->getLastChoiceFor($this->opponentSide);

      $mylastScore = $this->result->getLastScoreFor($this->mySide);
      $hislastScore = $this->result->getLastScoreFor($this->opponentSide);

      $mychoices = $this->result->getChoicesFor($this->mySide);
      $hischoices = $this->result->getChoicesFor($this->opponentSide);

      $stats = $this->result->getStats();
      $mystats = $this->result->getStatsFor($this->mySide);
      $hisStats = $this->result->getStatsFor($this->opponentSide);

      $nbRound = $this->result->getNbRound();

      //print($mylastScore);
      
      //print($hischoices);
      //print('/n');
    

      if ($nbRound > 1 && $hischoices[$nbRound - 1] == $hischoices[$nbRound - 2])
      {
        return (getWinningChoice(getanotherChoice($hischoices[$nbRound-2])));
      }

      // Si je gagne, je continue de jouer la même main sinon je change
      if ($mylastScore > 1)
        return $mylastchoice;
      else 
        return getWinningChoice($mylastchoice);

      
     
   /*   print($hislastchoice) ;
      print($hislastchoice) ;
      print($hislastchoice) ;
      print($hislastchoice) ;*/
      //$this->prettyDisplay();  


        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        
        return parent::rockChoice();            
  }
};
