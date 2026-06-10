<?php
// src/Controller/ProcedimentoController.php

class ProcedimentoController
{
    public function __construct(private PDO $pdo) {}

    public function listar(): void
    {
        $stmt = $this->pdo->query("SELECT * FROM procedimentos ORDER BY nome ASC");
        $procedimentos = $stmt->fetchAll();

        $mensagem = $_GET['msg']  ?? null;
        $erro     = $_GET['erro'] ?? null;

        require ROOT . '/src/View/layout/header.php';
        require ROOT . '/src/View/procedimentos/listar.php';
        require ROOT . '/src/View/layout/footer.php';
    }

    public function salvar(): void
    {
        $id            = !empty($_POST['id']) ? (int)$_POST['id'] : null;
        $nome          = trim($_POST['nome']          ?? '');
        $categoria     = trim($_POST['categoria']     ?? 'geral');
        $tipo_execucao = trim($_POST['tipo_execucao'] ?? 'geral');
        $tipo          = (int)($_POST['tipo']         ?? 0);
        $valor_base    = (float)str_replace(',', '.', $_POST['valor_base'] ?? '0');

        if (empty($nome)) {
            header("Location: " . BASE_URL . "?rota=procedimentos&erro=nome_obrigatorio");
            exit;
        }

        $tipos_execucao_validos = ['geral', 'especializado', 'ortodoncia'];
        if (!in_array($tipo_execucao, $tipos_execucao_validos)) {
            $tipo_execucao = 'geral';
        }

        if ($id) {
            // ── Atualizar existente ──────────────────────────────────────────
            // Busca valor atual para registrar histórico se mudou
            $stmtAtual = $this->pdo->prepare("SELECT valor_base FROM procedimentos WHERE id = ?");
            $stmtAtual->execute([$id]);
            $atual = $stmtAtual->fetch();

            if ($atual && (float)$atual['valor_base'] !== $valor_base) {
                // Registra histórico — valor antigo preservado em atendimentos existentes
                $stmtHist = $this->pdo->prepare("
                    INSERT INTO procedimentos_historico_precos
                        (procedimento_id, valor_anterior, valor_novo, alterado_por)
                    VALUES (?, ?, ?, ?)
                ");
                $stmtHist->execute([
                    $id,
                    $atual['valor_base'],
                    $valor_base,
                    $_SESSION['usuario_id'] ?? null
                ]);
            }

            $stmt = $this->pdo->prepare("
                UPDATE procedimentos
                SET nome = ?, categoria = ?, tipo_execucao = ?, tipo = ?, valor_base = ?
                WHERE id = ?
            ");
            $stmt->execute([$nome, $categoria, $tipo_execucao, $tipo, $valor_base, $id]);

        } else {
            // ── Inserir novo ─────────────────────────────────────────────────
            $stmt = $this->pdo->prepare("
                INSERT INTO procedimentos (nome, categoria, tipo_execucao, tipo, valor_base)
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->execute([$nome, $categoria, $tipo_execucao, $tipo, $valor_base]);
        }

        header("Location: " . BASE_URL . "?rota=procedimentos&msg=sucesso");
        exit;
    }

    public function excluir(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        if (!$id) {
            header("Location: " . BASE_URL . "?rota=procedimentos");
            exit;
        }

        // Verifica se está vinculado a atendimentos
        $stmt = $this->pdo->prepare("
            SELECT COUNT(*) FROM atendimento_procedimentos WHERE id_procedimento = ?
        ");
        $stmt->execute([$id]);

        if ($stmt->fetchColumn() > 0) {
            header("Location: " . BASE_URL . "?rota=procedimentos&erro=conflito");
            exit;
        }

        $stmt = $this->pdo->prepare("DELETE FROM procedimentos WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: " . BASE_URL . "?rota=procedimentos&msg=sucesso");
        exit;
    }
}