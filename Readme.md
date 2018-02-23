# YottaCMS Security Bundle


## Installation
```Bash
composer require yottacms/yotta-security-bundle
```
```PHP    
// config/bundles.php
// ...
return [
    \YottaCms\Bundle\YottaSecurityBundle\YottaSecurityBundle::class => ['all' => true],
    // ...
];
```

```YAML
# config/services.yml
parameters:
    mailer_user: 'mail@example.com'
```
