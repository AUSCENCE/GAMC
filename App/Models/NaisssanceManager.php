<?php 
namespace Gamc\Models;

use Gamc\Config\Db;
use PDOException;

class NaissanceManager extends Db
{

    /**
   * Returns all Naissance table rows in Naissance classes.
   * @return array
   * 
   */
  static function all(): array
  {
    try {
      $traiment = parent::getDb()->prepare("SELECT * FROM actenaissance");
      $traiment->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();   
    }

    foreach ($traiment as $row) $Naissance[] = new ModelNaissance($row);

    return (isset($Naissance)) ? $Naissance : array();
  }
}
