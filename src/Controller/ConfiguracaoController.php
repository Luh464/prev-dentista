<?php
// src/Controller/ConfiguracaoController.php

class ConfiguracaoController
{
    private ConfiguracaoModel $model;

    public function __construct(private PDO $pdo)
    {
        $this->model = new ConfiguracaoModel($pdo);
    }

    // ─── Taxas de Cartão ──────────────────────────────────────────────────────

    public function taxasCartao(): void
    {
        $taxas    = $this->model->listarTaxasCartao();
        $bandeiras = $this->model->listarBandeiras();
        $mensagem = $_GET['msg']  ?? null;
        $erro     = $_GET['erro'] ?? null;

        // Agrupa por bandeira para exibição em tabela
        $taxas_agrupadas = [];
        foreach ($taxas as $taxa) {
            $taxas_agrupadas[$taxa['bandeira']][$taxa['parcelas']] = $taxa;
        }

        require ROOT . '/src/View/layout/header.php';
        require ROOT . '/src/View/configuracao/taxas_cartao.php';
        require ROOT . '/src/View/layout/footer.php';
    }

    public function salvarTaxa(): void
    {
        $bandeira = trim($_POST['bandeira'] ?? '');
        $parcelas = (int)($_POST['parcelas'] ?? 1);
        $taxa     = (float)str_replace(',', '.', $_POST['taxa_percentual'] ?? '0');

        if (empty($bandeira) || $parcelas < 1 || $taxa < 0) {
            header("Location: " . BASE_URL . "?rota=configuracao.taxas&erro=dados_invalidos");
            exit;
        }

        $this->model->salvarTaxa($bandeira, $parcelas, $taxa);
        header("Location: " . BASE_URL . "?rota=configuracao.taxas&msg=taxa_salva");
        exit;
    }

    public function atualizarTaxa(): void
    {
        $id   = (int)($_POST['id'] ?? 0);
        $taxa = (float)str_replace(',', '.', $_POST['taxa_percentual'] ?? '0');

        if (!$id || $taxa < 0) {
            header("Location: " . BASE_URL . "?rota=configuracao.taxas&erro=dados_invalidos");
            exit;
        }

        $this->model->atualizarTaxa($id, $taxa);
        header("Location: " . BASE_URL . "?rota=configuracao.taxas&msg=taxa_atualizada");
        exit;
    }

    public function excluirTaxa(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id) $this->model->excluirTaxa($id);
        header("Location: " . BASE_URL . "?rota=configuracao.taxas&msg=taxa_excluida");
        exit;
    }

    // ─── AJAX: buscar taxa por bandeira+parcelas ──────────────────────────────

    public function buscarTaxaAjax(): void
    {
        header('Content-Type: application/json');
        $bandeira = trim($_GET['bandeira'] ?? '');
        $parcelas = (int)($_GET['parcelas'] ?? 1);
        $taxa = $this->model->buscarTaxa($bandeira, $parcelas);
        echo json_encode($taxa ?: ['taxa_percentual' => 0]);
        exit;
    }

    // ─── Regras de Comissão ───────────────────────────────────────────────────

    public function regrasComissao(): void
    {
        $regras   = $this->model->listarTodasRegras();
        $mensagem = $_GET['msg']  ?? null;
        $erro     = $_GET['erro'] ?? null;

        // Busca dentistas para o select
        $stmt = $this->pdo->prepare("SELECT id, nome FROM usuarios WHERE perfil IN ('dentista') ORDER BY nome");
        $stmt->execute();
        $dentistas = $stmt->fetchAll();

        require ROOT . '/src/View/layout/header.php';
        require ROOT . '/src/View/configuracao/regras_comissao.php';
        require ROOT . '/src/View/layout/footer.php';
    }

    public function salvarRegra(): void
    {
        $tipo        = $_POST['tipo']        ?? 'global';
        $dentistaId  = !empty($_POST['dentista_id']) ? (int)$_POST['dentista_id'] : null;
        $categoria   = $_POST['categoria']   ?? 'geral';
        $tetoValor   = !empty($_POST['teto_valor']) ? (float)str_replace(',', '.', $_POST['teto_valor']) : null;
        $percentual  = (float)str_replace(',', '.', $_POST['percentual'] ?? '0');
        $ordem       = (int)($_POST['ordem'] ?? 1);

        if ($percentual <= 0 || $percentual > 100) {
            header("Location: " . BASE_URL . "?rota=configuracao.comissoes&erro=percentual_invalido");
            exit;
        }

        if ($tipo === 'individual' && !$dentistaId) {
            header("Location: " . BASE_URL . "?rota=configuracao.comissoes&erro=dentista_obrigatorio");
            exit;
        }

        $this->model->salvarRegra([
            ':tipo'        => $tipo,
            ':dentista_id' => $dentistaId,
            ':categoria'   => $categoria,
            ':teto_valor'  => $tetoValor,
            ':percentual'  => $percentual,
            ':ordem'       => $ordem,
        ]);

        header("Location: " . BASE_URL . "?rota=configuracao.comissoes&msg=regra_salva");
        exit;
    }

    public function excluirRegra(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id) $this->model->excluirRegra($id);
        header("Location: " . BASE_URL . "?rota=configuracao.comissoes&msg=regra_excluida");
        exit;
    }
}