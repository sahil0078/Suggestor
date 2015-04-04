<?php

/**
 * suggestor actions.
 *
 * @package    p1
 * @subpackage suggestor
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class suggestorActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  public function executeSearch(sfWebRequest $request){
	$query = $request->getParameter('query');
	$suggestor = SuggestorFactory::getInstance()->getSuggestor();
	$suggestion = $suggestor->getSuggestions($query);
	return $this->renderText(json_encode($suggestion));

	
  }

}
