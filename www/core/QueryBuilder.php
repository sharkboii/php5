<?php

class QueryBuilder
{

  protected $connection;
  protected $query;
  protected $parameters;
  protected $alias;

  public function __construct(BDDInterface $connection = NULL)
  {
    $this->connection = $connection;
  }

  public function select( string $values = '*'): QueryBuilder
  {
    $this->query = 'select ' . $values .' ';
    return $this;
  }

  public function from( string $table): QueryBuilder
  {
    $this->from = $table;
    return $this;
  }

  public function where( string $conditions): QueryBuilder
  {
    $this->conditions = $where;
    return $this;
  }

  public function setParameter( string $key, string $value): QueryBuilder{

    $this->parameters[$key] = $value;
    return $this;

  }
  public function join(string $table, string $aliasTarget,string $fieldSource = 'id', string $fieldTarget = 'id'): QueryBuilder{

    $this->query .= 'inner join '.$table.' '.$aliasTarget.' on '.$this->alias. '.' . $fieldSource . '=' .$aliasTarget. '.' . $fieldTarget.' ';
    return $this;

  }

  public function leftjoin(string $table, string $aliasTarget,string $fieldSource = 'id', string $fieldTarget = 'id'): QueryBuilder{

    $this->query .= 'left join '.$table.' '.$aliasTarget.' on '.$this->alias. '.' . $fieldSource . '=' .$aliasTarget. '.' . $fieldTarget.' ';
    return $this;

  }

  public function addToQuery(string $query): QueryBuilder{

    $this->query .= ' '.$query;
    return $this;

  }
  public function getQuery(string $query): QueryBuilder{

    return $this->connection->query($this->query, $this->parameters);

  }

}



 ?>
