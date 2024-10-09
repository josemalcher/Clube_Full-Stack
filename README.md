# Clube Full-Stack

https://www.udemy.com/course/clube-fullstack/


## <a name="indice">Índice</a>

1. [Seção 1: PHP para quem não sabe PHP](#parte1)     
2. [Seção 2: PHP para quem entende PHP](#parte2)     
3. [Seção 3: PHP Profissional](#parte3)     
4. [Seção 4: PHP Orientado a Objetos](#parte4)     
5. [Seção 5: PHP Orientado a Objetos - Atualizado 2021](#parte5)     
6. [Seção 6: Composer](#parte6)     
7. [Seção 7: PHP 8](#parte7)     
8. [Seção 8: Design Patterns com PHP](#parte8)     
9. [Seção 9: Autenticação JWT com PHP](#parte9)     
10. [Seção 10: Carrinho de Compras com PHP](#parte10)     
11. [Seção 11: Criando um MVC do Zero](#parte11)     
12. [Seção 12: Criando um ActiveRecord com PHP Orientado a Objetos](#parte12)     
13. [Seção 13: MVC - Atualizado 2021](#parte13)     
14. [Seção 14: PDO para quem não sabe PDO](#parte14)     
15. [Seção 15: PDO - Paginação](#parte15)     
16. [Seção 16: Slim Framework 4](#parte16)     
17. [Seção 17: Slim Framework v4 - Update 2022](#parte17)     
18. [Seção 18: Slim Framework 4 - Componentes Externos](#parte18)     
19. [Seção 19: Upload e resize de imagens com PHP](#parte19)     
20. [Seção 20: Lumen 8 para quem não sabe Lumen 8](#parte20)     
21. [Seção 21: Laravel 8](#parte21)     
22. [Seção 22: Criando uma QueryBuilder com PHP](#parte22)     
23. [Seção 23: Ajax com PHP](#parte23)     
24. [Seção 24: Javascript para quem não sabe javascript](#parte24)     
25. [Seção 25: Aprendendo e Entendendo o NPM](#parte25)     
26. [Seção 26: Como funcionam os módulos no front e backend](#parte26)     
27. [Seção 27: Webpack com Babel](#parte27)     
28. [Seção 28: Projeto#01 - Lista de produtos com busca dinâmica com vanilla javascript](#parte28)     
29. [Seção 29: Node para quem não sabe Node](#parte29)     
30. [Seção 30: Redis e Session no Node](#parte30)     
31. [Seção 31: Validação e flash messages no Node](#parte31)     
32. [Seção 32: AlpineJS para quem não sabe AlpineJS](#parte32)     
33. [Seção 33: Projeto#02 - Carrinho de compras com AlpineJS](#parte33)     
34. [Seção 34: Projeto#03 - Crop de Imagens com Alpine e PHP](#parte34)     
35. [Seção 35: Projeto#04 - Upload com resize de imagens usando node e formidable](#parte35)     
36. [Seção 36: Sequelize para quem não sabe Sequelize](#parte36)     
37. [Seção 37: Sequelize - Paginação](#parte37)     
38. [Seção 38: Projeto#06 - Todo com AlpineJS](#parte38)     
39. [Seção 39: Typescript](#parte39)     
40. [Seção 40: Projeto#07 - Site com Typescript](#parte40)     
41. [Seção 41: Visual Studio Code](#parte41)     
42. [Seção 42: Sublime Text](#parte42)     
43. [Seção 43: Seção Bônus](#parte43)     
---


## <a name="parte1">1 - Seção 1: PHP para quem não sabe PHP</a>

### 01 PHP para quem não sabe PHP#01 - Instalando php no windows, mac e linux

```dockerfile
FROM php:8.2-apache

# Instalar dependências e extensões necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Copiar o código da aplicação para o contêiner
COPY . /var/www/html

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html

```

```dockerfile
version: '3.8'

services:
  php:
    build: .
    ports:
      - "8888:80"
    volumes:
      - .:/var/www/html
    depends_on:
      - mysql

  mysql:
    image: mysql:5.7
    restart: always
    environment:
      MYSQL_DATABASE: 'meu_banco'
      MYSQL_USER: 'usuario'
      MYSQL_PASSWORD: '123'
      MYSQL_ROOT_PASSWORD: '123123'
    ports:
      - "3306:3306"
    volumes:
      - mysql-data:/var/lib/mysql

volumes:
  mysql-data:

```

### 02 PHP para quem não sabe PHP#02 - Onde digitar meu código e include/require


### 1. `include`
A função `include` é usada para incluir e avaliar o conteúdo de um arquivo especificado. Se o arquivo não for encontrado, o PHP emitirá um aviso (`warning`), mas o script continuará a ser executado.

**Exemplo:**
```php
<?php
include 'header.php';
echo "Conteúdo da página...";
include 'footer.php';
?>
```

### 2. `require`
A função `require` é semelhante ao `include`, mas com uma diferença crucial: se o arquivo não for encontrado, o PHP emitirá um erro fatal (`fatal error`) e interromperá a execução do script.

**Exemplo:**
```php
<?php
require 'config.php';
require 'functions.php';
echo "Conteúdo da página...";
require 'footer.php';
?>
```

### 3. `include_once`
A função `include_once` funciona como o `include`, mas garante que o arquivo seja incluído apenas uma vez durante a execução do script. Isso evita problemas de redeclaração de funções ou classes.

**Exemplo:**
```php
<?php
include_once 'header.php';
echo "Conteúdo da página...";
include_once 'footer.php';
?>
```

### 4. `require_once`
A função `require_once` é semelhante ao `require`, mas também garante que o arquivo seja incluído apenas uma vez. Se a inclusão falhar, resultará em um erro fatal, assim como o `require`.

**Exemplo:**
```php
<?php
require_once 'config.php';
require_once 'functions.php';
echo "Conteúdo da página...";
require_once 'footer.php';
?>
```

### Resumo das Diferenças
- **`include`**: Inclui o arquivo e continua a execução mesmo se o arquivo não for encontrado (gera um aviso).
- **`require`**: Inclui o arquivo e interrompe a execução se o arquivo não for encontrado (gera um erro fatal).
- **`include_once`**: Inclui o arquivo apenas uma vez e continua a execução mesmo se o arquivo não for encontrado (gera um aviso).
- **`require_once`**: Inclui o arquivo apenas uma vez e interrompe a execução se o arquivo não for encontrado (gera um erro fatal).

Essas funções são fundamentais para modularizar e reutilizar código em projetos PHP, facilitando a manutenção e a organização do código¹²³.

FONTE: COPILOT

### 03 PHP para quem não sabe PHP#03 - Variáveis, seus tipos de dados e referência

Claro! Vamos explorar os principais tipos de dados em PHP com exemplos de uso:

### 1. String
Uma string é uma sequência de caracteres. Pode ser definida usando aspas simples ou duplas.

**Exemplo:**
```php
<?php
$nome = "João";
$mensagem = 'Olá, mundo!';
echo $nome; // Saída: João
echo $mensagem; // Saída: Olá, mundo!
?>
```

### 2. Numbers
Existem dois tipos principais de números em PHP: inteiros (integers) e números de ponto flutuante (floats).

**Inteiros:**
```php
<?php
$idade = 25;
$ano = 2024;
echo $idade; // Saída: 25
echo $ano; // Saída: 2024
?>
```

**Floats:**
```php
<?php
$preco = 19.99;
$pi = 3.14159;
echo $preco; // Saída: 19.99
echo $pi; // Saída: 3.14159
?>
```

### 3. Booleans
Um booleano pode ter apenas dois valores: `true` ou `false`.

**Exemplo:**
```php
<?php
$verdadeiro = true;
$falso = false;
echo $verdadeiro; // Saída: 1
echo $falso; // Saída: (nenhuma saída)
?>
```

### 4. Arrays
Um array é uma coleção de valores. Pode ser indexado numericamente ou associativamente.

**Array indexado numericamente:**
```php
<?php
$frutas = array("Maçã", "Banana", "Laranja");
echo $frutas[0]; // Saída: Maçã
?>
```

**Array associativo:**
```php
<?php
$idades = array("João" => 25, "Maria" => 30, "Pedro" => 35);
echo $idades["Maria"]; // Saída: 30
?>
```

### 5. Objects
Objetos são instâncias de classes, que podem conter propriedades e métodos.

**Exemplo:**
```php
<?php
class Pessoa {
    public $nome;
    public $idade;

    public function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function saudacao() {
        return "Olá, meu nome é " . $this->nome;
    }
}

$pessoa = new Pessoa("João", 25);
echo $pessoa->saudacao(); // Saída: Olá, meu nome é João
?>
```

### 6. NULL
O tipo `NULL` representa uma variável sem valor.

**Exemplo:**
```php
<?php
$variavel = NULL;
echo $variavel; // Saída: (nenhuma saída)
?>
```

FONTE: COPILOT

### 04 PHP para quem não sabe PHP#04 - Constantes

Em PHP, uma constante é um identificador (nome) para um valor simples que não pode ser alterado durante a execução do script. As constantes são úteis para definir valores que não devem mudar, como configurações, valores matemáticos ou outros dados fixos. Existem duas maneiras principais de definir constantes em PHP: usando a função `define()` e a palavra-chave `const`.

### Definindo Constantes com `define()`
A função `define()` é usada para definir uma constante. Ela aceita dois argumentos: o nome da constante e o valor.

**Exemplo:**
```php
<?php
define("GREETING", "Bem-vindo ao meu site!");
echo GREETING; // Saída: Bem-vindo ao meu site!
?>
```

### Definindo Constantes com `const`
A palavra-chave `const` é outra maneira de definir constantes, geralmente usada dentro de classes.

**Exemplo:**
```php
<?php
const SITE_NAME = "MeuSite";
echo SITE_NAME; // Saída: MeuSite
?>
```

### Diferenças entre `define()` e `const`
- **Escopo**: `const` só pode ser usado no escopo global ou dentro de classes, enquanto `define()` pode ser usado em qualquer lugar, incluindo dentro de funções, loops e condições.
- **Tempo de Execução**: `const` é definido em tempo de compilação, enquanto `define()` é definido em tempo de execução.

### Constantes de Array
A partir do PHP 7, é possível definir constantes de array usando `define()`.

**Exemplo:**
```php
<?php
define("FRUITS", ["Maçã", "Banana", "Laranja"]);
echo FRUITS[0]; // Saída: Maçã
?>
```

### Constantes Globais
As constantes são automaticamente globais e podem ser acessadas de qualquer lugar no script.

**Exemplo:**
```php
<?php
define("GREETING", "Olá, mundo!");

function minhaFuncao() {
    echo GREETING;
}

minhaFuncao(); // Saída: Olá, mundo!
?>
```

### Resumo
- **Constantes** são valores fixos que não podem ser alterados durante a execução do script.
- **`define()`** é usado para definir constantes em qualquer lugar do código.
- **`const`** é usado para definir constantes no escopo global ou dentro de classes.
- **Constantes de array** podem ser definidas a partir do PHP 7.
- **Constantes são globais** por padrão e podem ser acessadas de qualquer lugar no script¹²³.

- FONTE COPILOT

Em PHP, `__FUNCTION__` e `__METHOD__` são constantes mágicas que fornecem informações sobre o contexto em que são usadas. Vamos explorar cada uma delas com exemplos:

### `__FUNCTION__`
A constante `__FUNCTION__` retorna o nome da função onde é usada. É útil para depuração e logging.

**Exemplo:**
```php
<?php
function minhaFuncao() {
    echo "Você está na função: " . __FUNCTION__;
}

minhaFuncao(); // Saída: Você está na função: minhaFuncao
?>
```

### `__METHOD__`
A constante `__METHOD__` retorna o nome do método da classe onde é usada, incluindo o nome da classe. É especialmente útil em programação orientada a objetos.

**Exemplo:**
```php
<?php
class MinhaClasse {
    public function meuMetodo() {
        echo "Você está no método: " . __METHOD__;
    }
}

$obj = new MinhaClasse();
$obj->meuMetodo(); // Saída: Você está no método: MinhaClasse::meuMetodo
?>
```

### Outras Constantes Mágicas
Além de `__FUNCTION__` e `__METHOD__`, PHP oferece outras constantes mágicas úteis:

1. **`__CLASS__`**: Retorna o nome da classe onde é usada.
   ```php
   <?php
   class Exemplo {
       public function mostrarClasse() {
           echo "Classe: " . __CLASS__;
       }
   }

   $obj = new Exemplo();
   $obj->mostrarClasse(); // Saída: Classe: Exemplo
   ?>
   ```

2. **`__LINE__`**: Retorna o número da linha onde é usada.
   ```php
   <?php
   echo "Esta é a linha número: " . __LINE__; // Saída: Esta é a linha número: 2
   ?>
   ```

3. **`__FILE__`**: Retorna o caminho completo e o nome do arquivo onde é usada.
   ```php
   <?php
   echo "Este arquivo é: " . __FILE__;
   ?>
   ```

4. **`__DIR__`**: Retorna o diretório do arquivo onde é usada.
   ```php
   <?php
   echo "O diretório deste arquivo é: " . __DIR__;
   ?>
   ```

5. **`__TRAIT__`**: Retorna o nome do trait onde é usada.
   ```php
   <?php
   trait ExemploTrait {
       public function mostrarTrait() {
           echo "Trait: " . __TRAIT__;
       }
   }

   class Exemplo {
       use ExemploTrait;
   }

   $obj = new Exemplo();
   $obj->mostrarTrait(); // Saída: Trait: ExemploTrait
   ?>
   ```

6. **`__NAMESPACE__`**: Retorna o nome do namespace atual.
   ```php
   <?php
   namespace MeuNamespace;

   echo "Namespace: " . __NAMESPACE__; // Saída: Namespace: MeuNamespace
   ?>
   ```

Essas constantes mágicas são extremamente úteis para depuração, logging e para obter informações contextuais sobre o código em execução¹²³. Se precisar de mais alguma coisa, estou aqui para ajudar! 😊

Fonte: conversa com o Copilot, 09/10/2024

### 05 PHP para quem não sabe PHP#05 - Instrução e ponto e virgula


### Blocos de Código em PHP
Um bloco de código em PHP é uma seção de código que é delimitada pelas tags de abertura `<?php` e fechamento `?>`. Dentro dessas tags, você pode escrever qualquer código PHP.

**Exemplo:**
```php
<?php
// Este é um bloco de código PHP
echo "Olá, mundo!";
?>
```

### Uso do Ponto e Vírgula
Em PHP, cada instrução deve terminar com um ponto e vírgula (`;`). Isso é semelhante a outras linguagens de programação como C e JavaScript. O ponto e vírgula indica o fim de uma instrução.

**Exemplo:**
```php
<?php
$nome = "João"; // Instrução termina com ponto e vírgula
echo $nome; // Outra instrução termina com ponto e vírgula
?>
```

### Exceções
A última linha de um bloco PHP não precisa necessariamente terminar com um ponto e vírgula se for seguida imediatamente pela tag de fechamento `?>`. No entanto, é uma boa prática sempre usar o ponto e vírgula para evitar erros.

**Exemplo:**
```php
<?php
echo "Olá, mundo!"
?>
```

### Blocos de Código com Estruturas de Controle
Blocos de código também são usados em estruturas de controle como `if`, `for`, `while`, etc. Nesses casos, o bloco de código é delimitado por chaves `{}`.

**Exemplo:**
```php
<?php
$idade = 20;

if ($idade >= 18) {
    echo "Você é maior de idade.";
} else {
    echo "Você é menor de idade.";
}
?>
```

### Resumo
- **Blocos de Código**: Delimitados por `<?php` e `?>`.
- **Ponto e Vírgula**: Usado para terminar instruções.
- **Estruturas de Controle**: Usam chaves `{}` para delimitar blocos de código.

Esses conceitos são fundamentais para escrever código PHP de forma correta e eficiente²³⁴. Se precisar de mais alguma coisa, estou aqui para ajudar! 😊

Fonte: conversa com o Copilot, 09/10/2024

### 06 PHP para quem não sabe PHP#06 - Operadores aritméticos

### 1. Soma (`+`)
O operador de soma é usado para adicionar dois valores.

**Exemplo:**
```php
<?php
$a = 10;
$b = 5;
$soma = $a + $b;
echo "A soma de $a e $b é: $soma"; // Saída: A soma de 10 e 5 é: 15
?>
```

### 2. Subtração (`-`)
O operador de subtração é usado para subtrair um valor de outro.

**Exemplo:**
```php
<?php
$a = 10;
$b = 5;
$subtracao = $a - $b;
echo "A subtração de $b de $a é: $subtracao"; // Saída: A subtração de 5 de 10 é: 5
?>
```

### 3. Multiplicação (`*`)
O operador de multiplicação é usado para multiplicar dois valores.

**Exemplo:**
```php
<?php
$a = 10;
$b = 5;
$multiplicacao = $a * $b;
echo "A multiplicação de $a por $b é: $multiplicacao"; // Saída: A multiplicação de 10 por 5 é: 50
?>
```

### 4. Divisão (`/`)
O operador de divisão é usado para dividir um valor por outro.

**Exemplo:**
```php
<?php
$a = 10;
$b = 5;
$divisao = $a / $b;
echo "A divisão de $a por $b é: $divisao"; // Saída: A divisão de 10 por 5 é: 2
?>
```

### 5. Resto (`%`)
O operador de resto (ou módulo) é usado para obter o resto de uma divisão entre dois valores.

**Exemplo:**
```php
<?php
$a = 10;
$b = 3;
$resto = $a % $b;
echo "O resto da divisão de $a por $b é: $resto"; // Saída: O resto da divisão de 10 por 3 é: 1
?>
```

Esses operadores são fundamentais para realizar operações matemáticas básicas em PHP¹²³. Se precisar de mais alguma coisa, estou aqui para ajudar! 😊

Fonte: conversa com o Copilot, 09/10/2024

A precedência dos operadores em PHP determina a ordem em que as operações são avaliadas em expressões complexas. Operadores com maior precedência são avaliados antes dos operadores com menor precedência. Aqui está uma visão geral da precedência dos operadores em PHP, do mais alto para o mais baixo:

1. **Parênteses**: `()`
    - Usados para agrupar expressões e forçar a precedência.
    - **Exemplo**: `($a + $b) * $c`

2. **Incremento/Decremento**: `++`, `--`
    - **Exemplo**: `$a++`, `--$b`

3. **Negação Lógica**: `!`
    - **Exemplo**: `!$a`

4. **Aritméticos**: `*`, `/`, `%`
    - **Exemplo**: `$a * $b`, `$a / $b`, `$a % $b`

5. **Aritméticos e Concatenação**: `+`, `-`, `.`
    - **Exemplo**: `$a + $b`, `$a - $b`, `$a . $b`

6. **Bitwise Shift**: `<<`, `>>`
    - **Exemplo**: `$a << $b`, `$a >> $b`

7. **Comparação**: `<`, `<=`, `>`, `>=`, `<>`
    - **Exemplo**: `$a < $b`, `$a >= $b`

8. **Igualdade**: `==`, `!=`, `===`, `!==`
    - **Exemplo**: `$a == $b`, `$a !== $b`

9. **Bitwise AND**: `&`
    - **Exemplo**: `$a & $b`

10. **Bitwise XOR**: `^`
    - **Exemplo**: `$a ^ $b`

11. **Bitwise OR**: `|`
    - **Exemplo**: `$a | $b`

12. **Lógicos**: `&&`, `||`
    - **Exemplo**: `$a && $b`, `$a || $b`

13. **Coalescência Nula**: `??`
    - **Exemplo**: `$a ?? $b`

14. **Ternário**: `? :`
    - **Exemplo**: `$a ? $b : $c`

15. **Atribuição**: `=`, `+=`, `-=`, `*=`, `/=`, `.=` etc.
    - **Exemplo**: `$a = $b`, `$a += $b`

16. **Yield**: `yield`, `yield from`
    - **Exemplo**: `yield $a`, `yield from $b`

17. **Print**: `print`
    - **Exemplo**: `print $a`

18. **Lógicos**: `and`, `xor`, `or`
    - **Exemplo**: `$a and $b`, `$a xor $b`, `$a or $b`

### Exemplo de Precedência
Considere a expressão:
```php
<?php
$a = 5;
$b = 10;
$c = 15;

$resultado = $a + $b * $c; // Multiplicação tem maior precedência que adição
echo $resultado; // Saída: 155
?>
```
Aqui, a multiplicação (`$b * $c`) é avaliada antes da adição (`$a + ...`), resultando em `5 + (10 * 15)`.

Para alterar a precedência, você pode usar parênteses:
```php
<?php
$resultado = ($a + $b) * $c; // Parênteses forçam a adição a ser avaliada primeiro
echo $resultado; // Saída: 225
?>
```

Essas regras de precedência ajudam a garantir que as expressões sejam avaliadas da maneira esperada¹²³. Se precisar de mais alguma coisa, estou aqui para ajudar! 😊

Fonte: conversa com o Copilot, 09/10/2024
(1) Precedência de Operadores - PHP. https://www.php.net/manual/pt_BR/language.operators.precedence.php.
(2) PHP: Operadores - Manual. https://www.php.net/manual/pt_BR/language.operators.php.


### 07 PHP para quem não sabe PHP#07 - Operadores de atribuição

### Operadores de Atribuição
Os operadores de atribuição são usados para atribuir valores a variáveis. O operador básico de atribuição é o `=`. Além disso, existem operadores de atribuição combinados que realizam uma operação e atribuem o resultado à variável ao mesmo tempo.

#### Operador Básico de Atribuição (`=`)
Atribui o valor da expressão à direita para a variável à esquerda.

**Exemplo:**
```php
<?php
$a = 10;
echo $a; // Saída: 10
?>
```

#### Operadores de Atribuição Combinados
1. **Atribuição de Adição (`+=`)**
   ```php
   <?php
   $a = 10;
   $a += 5; // Equivalente a $a = $a + 5;
   echo $a; // Saída: 15
   ?>
   ```

2. **Atribuição de Subtração (`-=`)**
   ```php
   <?php
   $a = 10;
   $a -= 3; // Equivalente a $a = $a - 3;
   echo $a; // Saída: 7
   ?>
   ```

3. **Atribuição de Multiplicação (`*=`)**
   ```php
   <?php
   $a = 10;
   $a *= 2; // Equivalente a $a = $a * 2;
   echo $a; // Saída: 20
   ?>
   ```

4. **Atribuição de Divisão (`/=`)**
   ```php
   <?php
   $a = 10;
   $a /= 2; // Equivalente a $a = $a / 2;
   echo $a; // Saída: 5
   ?>
   ```

5. **Atribuição de Módulo (`%=`)**
   ```php
   <?php
   $a = 10;
   $a %= 3; // Equivalente a $a = $a % 3;
   echo $a; // Saída: 1
   ?>
   ```

6. **Atribuição de Exponenciação (`**=`)**
   ```php
   <?php
   $a = 2;
   $a **= 3; // Equivalente a $a = $a ** 3;
   echo $a; // Saída: 8
   ?>
   ```

### Operadores de Concatenação
Os operadores de concatenação são usados para unir strings.

#### Operador de Concatenação (`.`)
Concatena duas strings.

**Exemplo:**
```php
<?php
$a = "Olá";
$b = " mundo!";
$c = $a . $b; // Concatena $a e $b
echo $c; // Saída: Olá mundo!
?>
```

#### Operador de Atribuição de Concatenação (`.=`)
Concatena a string à direita com a variável à esquerda e atribui o resultado à variável.

**Exemplo:**
```php
<?php
$a = "Olá";
$a .= " mundo!"; // Equivalente a $a = $a . " mundo!";
echo $a; // Saída: Olá mundo!
?>
```

### Resumo
- **Operadores de Atribuição**: Usados para atribuir valores a variáveis (`=`, `+=`, `-=`, `*=`, `/=`, `%=`, `**=`).
- **Operadores de Concatenação**: Usados para unir strings (`.`, `.=`) ¹²³.

Esses operadores são fundamentais para manipular variáveis e strings de forma eficiente em PHP. Se precisar de mais alguma coisa, estou aqui para ajudar! 😊

Fonte: conversa com o Copilot, 09/10/2024
(1) PHP: Atribuição - Manual. https://www.php.net/manual/pt_BR/language.operators.assignment.php.
(2) PHP: String - Manual. https://www.php.net/manual/pt_BR/language.operators.string.php.
(3) Operadores de Atribuição no PHP - SouNoob. https://sounoob.com.br/operadores-de-atribuicao-no-php/.

### 08 PHP para quem não sabe PHP#08 - Operadores de Incremento/Decremento
### 09 PHP para quem não sabe PHP#09 - Operadores de comparação
### 10 PHP para quem não sabe PHP#10 - Operadores lógicos
### 11 PHP para quem não sabe PHP#11 - Truthy e Falsy
### 12 PHP para quem não sabe PHP#12 - Condicionais - If-else
### 13 PHP para quem não sabe PHP#13 - Condicionais - Switch
### 14 PHP para quem não sabe PHP#14 - Tipos de dados - Booleans
### 15 PHP para quem não sabe PHP#15 - Tipos de dados - Strings
### 16 PHP para quem não sabe PHP#16 - Tipos de dados - Numbers
### 17 PHP para quem não sabe PHP#17 - Tipos de dados - Arrays
### 18 PHP para quem não sabe PHP#18 - Mudando tipos de dados
### 19 PHP para quem não sabe PHP#19 - Loopings - For
### 20 PHP para quem não sabe PHP#20 - Loopings - While
### 21 PHP para quem não sabe PHP#21 - Loopings - Do While
### 22 PHP para quem não sabe PHP#22 - Loopings - Foreach
### 23 PHP para quem não sabe PHP#23 - Loopings - Continue e break
### 24 PHP para quem não sabe PHP#24 - Funções
### 25 PHP para quem não sabe PHP#25 - Closures
### 26 PHP para quem não sabe PHP#26 - Callbacks
### 27 PHP para quem não sabe PHP#27 - Verificando se uma variável existe
### 28 PHP para quem não sabe PHP#28 - Escopo e variável global
### 29 PHP para quem não sabe PHP#29 - Introdução sobre as variáveis super globais
### 30 PHP para quem não sabe PHP#30 - Cookies
### 31 PHP para quem não sabe PHP#31 - Session
### 32 PHP para quem não sabe PHP#32- Variáveis de ambiente
### 33 PHP para quem não sabe PHP#33 - Variáveis do servidor
### 34 PHP para quem não sabe PHP#34 - GET e POST
### 35 PHP para quem não sabe PHP#35 - Pegando arquivos enviados pelo formulário
### 36 PHP para quem não sabe PHP#36 - Sanitizadores e Validates

[Voltar ao Índice](#indice)

---


## <a name="parte2">2 - Seção 2: PHP para quem entende PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - Seção 3: PHP Profissional</a>



[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - Seção 4: PHP Orientado a Objetos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Seção 5: PHP Orientado a Objetos - Atualizado 2021</a>



[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Seção 6: Composer</a>



[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - Seção 7: PHP 8</a>



[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - Seção 8: Design Patterns com PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Seção 9: Autenticação JWT com PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - Seção 10: Carrinho de Compras com PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - Seção 11: Criando um MVC do Zero</a>



[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - Seção 12: Criando um ActiveRecord com PHP Orientado a Objetos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - Seção 13: MVC - Atualizado 2021</a>



[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - Seção 14: PDO para quem não sabe PDO</a>



[Voltar ao Índice](#indice)

---


## <a name="parte15">15 - Seção 15: PDO - Paginação</a>



[Voltar ao Índice](#indice)

---


## <a name="parte16">16 - Seção 16: Slim Framework 4</a>



[Voltar ao Índice](#indice)

---


## <a name="parte17">17 - Seção 17: Slim Framework v4 - Update 2022</a>



[Voltar ao Índice](#indice)

---


## <a name="parte18">18 - Seção 18: Slim Framework 4 - Componentes Externos</a>



[Voltar ao Índice](#indice)

---


## <a name="parte19">19 - Seção 19: Upload e resize de imagens com PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte20">20 - Seção 20: Lumen 8 para quem não sabe Lumen 8</a>



[Voltar ao Índice](#indice)

---


## <a name="parte21">21 - Seção 21: Laravel 8</a>



[Voltar ao Índice](#indice)

---


## <a name="parte22">22 - Seção 22: Criando uma QueryBuilder com PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte23">23 - Seção 23: Ajax com PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte24">24 - Seção 24: Javascript para quem não sabe javascript</a>



[Voltar ao Índice](#indice)

---


## <a name="parte25">25 - Seção 25: Aprendendo e Entendendo o NPM</a>



[Voltar ao Índice](#indice)

---


## <a name="parte26">26 - Seção 26: Como funcionam os módulos no front e backend</a>



[Voltar ao Índice](#indice)

---


## <a name="parte27">27 - Seção 27: Webpack com Babel</a>



[Voltar ao Índice](#indice)

---


## <a name="parte28">28 - Seção 28: Projeto#01 - Lista de produtos com busca dinâmica com vanilla javascript</a>



[Voltar ao Índice](#indice)

---


## <a name="parte29">29 - Seção 29: Node para quem não sabe Node</a>



[Voltar ao Índice](#indice)

---


## <a name="parte30">30 - Seção 30: Redis e Session no Node</a>



[Voltar ao Índice](#indice)

---


## <a name="parte31">31 - Seção 31: Validação e flash messages no Node</a>



[Voltar ao Índice](#indice)

---


## <a name="parte32">32 - Seção 32: AlpineJS para quem não sabe AlpineJS</a>



[Voltar ao Índice](#indice)

---


## <a name="parte33">33 - Seção 33: Projeto#02 - Carrinho de compras com AlpineJS</a>



[Voltar ao Índice](#indice)

---


## <a name="parte34">34 - Seção 34: Projeto#03 - Crop de Imagens com Alpine e PHP</a>



[Voltar ao Índice](#indice)

---


## <a name="parte35">35 - Seção 35: Projeto#04 - Upload com resize de imagens usando node e formidable</a>



[Voltar ao Índice](#indice)

---


## <a name="parte36">36 - Seção 36: Sequelize para quem não sabe Sequelize</a>



[Voltar ao Índice](#indice)

---


## <a name="parte37">37 - Seção 37: Sequelize - Paginação</a>



[Voltar ao Índice](#indice)

---


## <a name="parte38">38 - Seção 38: Projeto#06 - Todo com AlpineJS</a>



[Voltar ao Índice](#indice)

---


## <a name="parte39">39 - Seção 39: Typescript</a>



[Voltar ao Índice](#indice)

---


## <a name="parte40">40 - Seção 40: Projeto#07 - Site com Typescript</a>



[Voltar ao Índice](#indice)

---


## <a name="parte41">41 - Seção 41: Visual Studio Code</a>



[Voltar ao Índice](#indice)

---


## <a name="parte42">42 - Seção 42: Sublime Text</a>



[Voltar ao Índice](#indice)

---


## <a name="parte43">43 - Seção 43: Seção Bônus</a>



[Voltar ao Índice](#indice)

---

