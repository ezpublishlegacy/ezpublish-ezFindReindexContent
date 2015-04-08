<?php
/**
 * Set up
 */
$Module = $Params['Module'];
$NodeID = $Params['NodeID'];
$node   = false;
$errors = array();

$tpl = eZTemplate::factory();
$http = new eZHTTPTool();

$inputRadioName = 'gazfind_reindex_option';
/**
 *
 * End Set up
 */

/**
 * Do Things
 */
// Do the update, redirect after
if( $node = eZContentObjectTreeNode::fetch( $NodeID ) ){
    if( $http->hasPostVariable( $inputRadioName ) === true ){
        $solr = eZSearch::getEngine();
        // Naming. postVariable actually returns, or 'gets', the variable.
        $selectedOption = $http->postVariable( $inputRadioName );
        /** @var ezContentObjectTreeNode[]  $indexList */
        $indexList = [ $node ];

        // if the "with children" option is selected then we add the children here
        if( $selectedOption == 'children' ) {
            $indexList = array_merge( $indexList, $node->children() );
        }

        $successCount = 0;

        for( $index = 0, $count = count( $indexList ); $index < $count; $index++ ) {
            $result = $solr->addObject( $indexList[$index]->object() );
            if( $result === true ){
                $successCount++;
            }
            else{
                $errors[]=ezpI18n::tr( 'gazfind/reindex', "There was a problem indexing node with id: <b>{$indexList[$index]->NodeID}</b>. <i>Please try again.</i>" );
            }
        }

        // we redirect only if 100% of objects were indexed. If there was 1 or more errors we stay on the page and view
        // the errors.
        if( $successCount == $count ){
            $Module->redirectTo( 'content/view/full/'. $NodeID );
        }
    }
}
/**
 * End Do Things
 */

/**
 * Send Result of things to Template
 */
// Sets the title and breadcrumb text
$path[] = array( 'url'  => false, 'text' => $node->attribute( 'name' ) );
// Set template variables
$tpl->setVariable( 'node', $node );
$tpl->setVariable( 'error_list', $errors );
// Render
$Result['content'] = $tpl->fetch( 'design:gazfind/reindex.tpl' );
$Result['path'] = $path;