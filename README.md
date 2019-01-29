# Channable API Module

[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/rose-bikes-spryker/channable-api)

> This module is still in development. We will publish a stable version soon. Stay tuned!

## Installation

### 1. Add the module to your project

```bash
composer require rose-bikes-spryker/channable-api
```

### 2. Extend the project namespaces (config_default.php)

```php
<?php

$config[KernelConstantsInterface::PROJECT_NAMESPACES] = [
    'RoseBikesSpryker',
    '...',
];
```

### 3. Adjust the configurations

```php
<?php

$config[ChannableApiConstants::CONFIG_CHANNABLE_COMPANY_ID] = '';
$config[ChannableApiConstants::CONFIG_CHANNABLE_PROJECT_ID] = '';
$config[ChannableApiConstants::CONFIG_CHANNABLE_TOKEN] = '';
$config[ChannableApiConstants::CONFIG_CHANNABLE_HOST] = 'https://api.channable.com/v1';
```

### 4. Generate the transfer objects

```bash
vendor/bin/console transfer:generate -vvv
```

