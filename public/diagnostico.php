<?php
// REMOVER ESSE ARQUIVO DEPOIS DO DIAGNÓSTICO
error_reporting(E_ALL);
ini_set('display_errors', '1');

echo "<h2>Diagnóstico do Sistema</h2>";
echo "<hr>";

// 1. Versão do PHP
echo "<p><b>PHP:</b> " . PHP_VERSION . "</p>";

// 2. Extensão intl
echo "<p><b>Extensão intl:</b> " . (extension_loaded('intl') ? '✅ Ativa' : '❌ INATIVA') . "</p>";

// 3. Extensão pdo_mysql
echo "<p><b>PDO MySQL:</b> " . (extension_loaded('pdo_mysql') ? '✅ Ativa' : '❌ INATIVA') . "</p>";

// 4. Testar conexão com banco
define('ROOT', dirname(__DIR__));
echo "<p><b>ROOT:</b> " . ROOT . "</p>";

try {
    require_once ROOT . '/config/database.php';
    echo "<p><b>Banco:</b> ✅ Conectado</p>";
} catch (Throwable $e) {
    echo "<p><b>Banco:</b> ❌ ERRO: " . $e->getMessage() . "</p>";
}

// 5. Testar carregamento dos Models
$models = ['AtendimentoModel','PacienteModel','UsuarioModel','DespesaModel','ProcedimentoModel','RelatorioModel','Financeiro'];
echo "<h3>Models:</h3>";
foreach ($models as $m) {
    $file = ROOT . "/src/Model/{$m}.php";
    if (!file_exists($file)) {
        echo "<p>❌ {$m}.php NÃO ENCONTRADO</p>";
        continue;
    }
    try {
        require_once $file;
        echo "<p>✅ {$m}</p>";
    } catch (Throwable $e) {
        echo "<p>❌ {$m}: " . $e->getMessage() . " (linha " . $e->getLine() . ")</p>";
    }
}

// 6. Testar carregamento dos Controllers
$ctrls = ['AuthController','PainelController','PacienteController','AtendimentoController',
          'DespesaController','ProcedimentoController','UsuarioController','RelatorioController','ReciboController'];
echo "<h3>Controllers:</h3>";
require_once ROOT . '/src/Model/Financeiro.php';
foreach ($ctrls as $ctrl) {
    $file = ROOT . "/src/Controller/{$ctrl}.php";
    if (!file_exists($file)) {
        echo "<p>❌ {$ctrl}.php NÃO ENCONTRADO</p>";
        continue;
    }
    try {
        require_once $file;
        echo "<p>✅ {$ctrl}</p>";
    } catch (Throwable $e) {
        echo "<p>❌ {$ctrl}: " . $e->getMessage() . " (linha " . $e->getLine() . ")</p>";
    }
}

// 7. Testar instanciação do PainelController
echo "<h3>Instanciação:</h3>";
try {
    $p = new PainelController($pdo);
    echo "<p>✅ PainelController instanciado</p>";
} catch (Throwable $e) {
    echo "<p>❌ PainelController: " . $e->getMessage() . " linha " . $e->getLine() . "</p>";
}

echo "<hr><p style='color:red'><b>REMOVA diagnostico.php após usar!</b></p>";
