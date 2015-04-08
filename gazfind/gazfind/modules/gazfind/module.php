<?php

$ViewList = array();
$ViewList['reindex']= array( 'script'=>'reindex.php',
                             'params'=>array('NodeID'),
                             'single_post_actions'=>
                                        array('ReIndex'
                                                => 'ReIndex'),
                             'functions' => array( 'reindex' ),
                          );

$FunctionList = array(
    'reindex' => array()
);

?>
