# Бандл для генерации случайного контента инфоблоков (highload блоков, кастомных таблиц) под Битрикс

***INTERNAL***

## Установка

`composer require proklung/bitrix-fixture-database-generator-bundle`

## Конфигурация бандла

Пример конфига(файл `local/configs/packages/bitrix-fixture-generator.yaml`):
 
```yaml
bitrix-fixture-generator:
  # Игнорировать ошибки при создании элементов - сохранение картинок итд.
  ignore_errors: true

  # Пути к фикстурам.
  fixture_path:
    - '/local/classes/BaseFixtures/'

  # Набор команд, генерирующих нужную фикстуру.
  structure_project:
    - migrator:elements spravochnik content --truncate=true --sections=false --count=20
    - migrator:elements common content --truncate=true --sections=true --count=5
    - migrator:elements-hl ExampleHighload --truncate=true --count=5
```
## Генерация проекта

Запуск генерации содержимого проекта. Последовательно выполняются команды
из ключа `structure_project` конфигурации бандла (файл `local/configs/packages/bitrix-fixture-generator.yaml`)

`php bin/console migrator:structure`

## Генерация содержимого инфоблока

Инфоблок common, очищать элементы, генерировать подразделы, 5 элементов.

`php bin/console migrator:elements common content --truncate=true --sections=true --count=5`

Инфоблок spravochnik, не очищать элементы, не генерировать подразделы, 5 элементов

`php bin/console migrator:elements spravochnik content --truncate=false --sections=false --count=5`

## Генерация содержимого highload инфоблока

HL-block ExampleHighload. Очищать элементы, 5 элементов.

`php bin/console migrator:elements-hl ExampleHighload --truncate=true --count=5`

## Генерация содержимого кастомной таблицы

Кастомная таблица. Очищать элементы, 5 элементов.

`php bin/console migrator:seed d_ah_news --truncate=true --count=5`

## Генерация случайных пользователей

Случайные пользователи. Сначала удалять всех, 5 пользователей с номерами телефонов в качестве логина.

`php bin/console migrator:users --truncate=true --count=5 --phone=true`

## Фикстуры

ID: `content.common` -> тип инфоблока content, код инфоблока common. Файл в папке с фикстурами `content.common.php`

Пример фикстуры в виде массива:

```php
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\EnumGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\ImageGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\LinkElementGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\SentenceGenerator;

return [
//    'PREVIEW_TEXT' => 'bitrix_fixture_generator.preview_text_generator',
//    'DETAIL_TEXT' => 'bitrix_fixture_generator.detail_text_generator',
//    'NAME' => 'bitrix_fixture_generator.name_generator', // Alias сервиса
    'PROPERTY_VALUES' => [
        'STRING' => SentenceGenerator::class, // Сервис, помеченный тэгом fixture_generator.item.
        'FILE' => ImageGenerator::class, // Сервис, помеченный тэгом fixture_generator.item.
        'MULTIPLE_STRING' => 'bitrix_fixture_generator.multiple_string_generator', // Штатный сервис-генератор из бандла.
        'MULTIPLE_FILE' => 'bitrix_fixture_generator.multiple_image_generator',
        'ENUM' => EnumGenerator::class,
        'MULTIPLE_ENUM' => 'bitrix_fixture_generator.multiple_enum_generator',
        'LINK' => LinkElementGenerator::class,
        'MULTIPLE_LINK' => 'bitrix_fixture_generator.multiple_link_generator',
    ]
];
```

Указываются только поля, которые обрабатываются особым образом. Для стандартных полей предусмотрены генераторы
по умолчанию:

Элементы:

```php
[
        'PREVIEW_PICTURE' => 'bitrix_fixture_generator.preview_picture_generator',
        'DETAIL_PICTURE' => 'bitrix_fixture_generator.detail_picture_generator', // Сервис, помеченный тэгом fixture_generator.item.
        'ACTIVE_FROM' => DateGenerator::class,
        'CREATED_BY' => UserIdGenerator::class,
        'MODIFIED_BY' => UserIdGenerator::class,
        'PREVIEW_TEXT' => 'bitrix_fixture_generator.preview_text_generator',
        'PREVIEW_TEXT_TYPE' => 'html',
        'DETAIL_TEXT' => 'bitrix_fixture_generator.detail_text_generator',
        'DETAIL_TEXT_TYPE' => 'html',
        'NAME' => 'bitrix_fixture_generator.name_generator', // Alias сервиса
        'CODE' => CodeGenerator::class,
    ];
```

Разделы:

```php
    [
        'NAME' => 'bitrix_fixture_generator.name_generator', // Alias сервиса
        'CODE' => CodeGenerator::class,
        'PICTURE' => 'bitrix_fixture_generator.preview_picture_generator',
        'DETAIL_PICTURE' => 'bitrix_fixture_generator.detail_picture_generator',
        'DESCRIPTION' => 'bitrix_fixture_generator.preview_text_generator',
        'DESCRIPTION_TYPE' => 'html',
        'MODIFIED_BY' => UserIdGenerator::class,
    ];
```

Фикстуры в виде класса, реализующего `FixtureInterface` (подтягиваются автоматически из массива с директориями
фикстур, задаются в конфиге бандла):

```php
use Prokl\BitrixFixtureGeneratorBundle\Services\Annotations\FieldParams;
use Prokl\BitrixFixtureGeneratorBundle\Services\Contracts\FixtureInterface;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\EnumGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\ImageGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\LinkElementGenerator;
use Prokl\BitrixFixtureGeneratorBundle\Services\Generators\SentenceGenerator;

class ContentCommonFixture implements FixtureInterface
{
   /**
     * ID фикстуры (тип инфоблока . код инфоблока).
     *
     * @return string
     */
    public function id() : string
    {
        return 'content.common';
    }

    /**
     * Фикстура
     * @FieldParams(
     *    params={
     *     "PREVIEW_PICTURE"= { "width"=400, "height"=400 },
     *     "PROPERTY_VALUES" = {
     *          "STRING"= { "length"=22 }
     *      }
     *    }
     * )
     */
    public function fixture() : array
    {
        return [
            'PREVIEW_PICTURE' => ImageGenerator::class,
            'PROPERTY_VALUES' => [
                'STRING' => SentenceGenerator::class,
                'FILE' => ImageGenerator::class,
                'MULTIPLE_STRING' => 'bitrix_fixture_generator.multiple_string_generator',
                'MULTIPLE_FILE' => 'bitrix_fixture_generator.multiple_image_generator',
                'ENUM' => EnumGenerator::class,
                'MULTIPLE_ENUM' => 'bitrix_fixture_generator.multiple_enum_generator',
                'LINK' => LinkElementGenerator::class,
                'MULTIPLE_LINK' => 'bitrix_fixture_generator.multiple_link_generator',
                // 'YES' => 1,
            ]
        ];
    }
}
```

Через аннотации задаются дополнительные параметры генератора. Они попадают в метод `generate` генератора в параметр

`payload`:

```php
    public function generate(?array $payload = null)
    {
        $width = array_key_exists('width', $payload['params']) ? $payload['params']['width'] : 0;
    }
```

## Генераторы контента

Интерфейс `FixtureGeneratorInterface`, наследуются от `AbstractGenerator`. Нужно реализовать только метод 
`abstract public function generate(?array $payload = null)`.

Помечаются тэгом `fixture_generator.item`.

Штатно:

- `ImageIdGenerator`
- `UserIdGenerator`
- `HtmlGenerator`
- `TextGenerator`
- `CodeGenerator`
- `SortGenerator`
- `ImageGenerator`
- `DateGenerator`
- `LinkElementGenerator`
- `RandomLinkElementGenerator`
- `MultipleGeneratorDecorator` - декоратор, чтобы любой генератор обычного свойства сделать генератором множественного свойства.

Как-то так:

```yaml
  # Множественное поле типа Cтрока.
  bitrix_fixture_generator.multiple_string_generator:
    class: Prokl\BitrixFixtureGeneratorBundle\Services\Generators\MultipleGeneratorDecorator
    arguments:
      - '@Prokl\BitrixFixtureGeneratorBundle\Services\Generators\SentenceGenerator' # Базовый генератор
      - 5 # Количество элементов
    tags:
      - { name: fixture_generator.item }
```

- `RandomLinkSectionGenerator`
- `LinkSectionsGenerator`
- `EnumGenerator`
- `SentenceGenerator`
- `IntGenerator`
- `StringGenerator`
- `BaseOptionGenerator`
- `YesNoGenerator`