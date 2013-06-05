<!DOCTYPE html>
<html lang="en" xmlns:ng="http://angularjs.org" ng-app="home">
  <head>       
    <?php \Core\Import::file('elements/head.php',array('pageTitle' => 'PHP - Solr - Example')); ?>
  </head>

  <body ng-controller='HomeController'>

    <?php \Core\Import::file('elements/top_nav.php'); ?>

    <?php
    $solr = new SolrClient(array(
        'hostname' => 'localhost',
        'port' => '8983'
    ));
    $response = $solr->ping();    
    ?>

    <h1>
        <?php
        $flag = $response->getResponse();
        if (empty($flag)) echo 'CONNECTED TO SOLR!';
        ?>
    </h1>
    
  </body>
</html>