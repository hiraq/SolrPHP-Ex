<?php

/*
init
 */
$solr = new SolrClient(array(
  'hostname' => 'localhost',
  'port' => '8983'
));

//indexing
$doc = new SolrInputDocument();

$doc->addField('id', 334455);
$doc->addField('cat', 'Software');
$doc->addField('cat', 'Lucene');

$updateResponse = $solr->addDocument($doc);

//SEARCHING

$query = new SolrQuery();

$query->setQuery('Software');

$query->setStart(0);

$query->setRows(50);

$query->addField('cat')->addField('id')->addField('timestamp');

$query_response = $solr->query($query);

$response = $query_response->getResponse();
?>

<!DOCTYPE html>
<html lang="en" xmlns:ng="http://angularjs.org" ng-app="home">
  <head>       
    <?php \Core\Import::file('elements/head.php',array('pageTitle' => 'PHP - Solr - Example')); ?>
  </head>

  <body ng-controller='HomeController'>

    <?php \Core\Import::file('elements/top_nav.php'); ?>    

    <h1>
        <?php
        \Core\Debug::vars($response);
        ?>
    </h1>
    
  </body>
</html>