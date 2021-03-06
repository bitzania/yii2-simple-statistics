# yii2-simple-statistics

Simple Statistics Module for Yii2 Framework

# Installation
```
composer install bitzania/yii2-simple-statistics
```

# Migrations
```
yii migrate --migrationPath="vendor\bitzania\yii2-simple-statistics\migrations"
```

# Config Modules
```
'modules' => [
    ...
    'statistic' => [
        'class' => 'bitzania\statistic\Module',
    ]
    ...
],
```

# Behaviors
```
public function behaviors()
{
    return [
        'statistic' => [
            'class' => 'bitzania\statistic\behaviors\AccountBehavior',
            'attribute'=>'stat'  // this is the public attribute of current active record
        ],
    ]
}
```

This behavior automatically add a new Account record, with code as described in 

```
Account::generateCode
```



# Usage
```
$p = Product::findOne(5);

echo $p->stat;  // for new record the value always 0

\bitzania\statistic\models\Ledger::addTransaction($p->accountCode, date("Y-m-d H:i:s"), 'xxx', 10, true);

$p = Product::findOne(5);  // need to refresh the value from database

echo $p->stat;  // 10 because above transaction
```
