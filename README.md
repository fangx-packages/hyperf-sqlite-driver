# hyperf-sqlite-driver

在 hyperf 中使用 sqlite 作为数据驱动.

**SQLite 不支持协程, 请不要在生产中使用, 本扩展的初衷是使用 SQLite 作为驱动来进行单元测试.**

# 安装

```bash
composer require fangx/sqlite-driver --dev
```

# 使用

> 使用前需配置好相关数据回滚迁移等配置, 推荐使用 [`fangx/testing`](https://github.com/nfangxu/hyperf-testing)

### 修改 `phpunit.xml` 中的数据库配置

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
         backupStaticAttributes="false"
         bootstrap="./test/bootstrap.php"
         colors="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false">
    <testsuites>
        <testsuite name="Tests">
            <directory suffix="Test.php">./test</directory>
        </testsuite>
    </testsuites>
    <filter>
        <whitelist processUncoveredFilesFromWhitelist="true">
            <directory suffix=".php">./app</directory>
        </whitelist>
    </filter>
    <php>
        <env name="DB_DRIVER" value="sqlite"/>
        <env name="DB_DATABASE" value=":memory:"/>
    </php>
</phpunit>
```

### 运行测试

```bash
composer test
```
