<?php
// src/Model/ConfiguracaoModel.php

class ConfiguracaoModel
{
    public function __construct(private PDO $pdo) {}

    // ─── Parâmetros do sistema ────────────────────────────────────────────────

    public function getParametro(string $chave, mixed $default = null): mixed
    {
        try {
            $stmt = $this->pdo->prepare("SELECT valor FROM parametros_sistema WHERE chave = ?");
            $stmt->execute([$chave]);
            $row = $stmt->fetchColumn();
            return $row !== false ? $row : $default;
        } catch (Throwable $e) {
            return $default;
        }
    }

    public function setParametro(string $chave, string $valor): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO parametros_sistema (chave, valor)
            VALUES (?, ?)
            ON DUPLICATE KEY UPDATE valor = VALUES(valor), atualizado_em = NOW()
        ");
        $stmt->execute([$chave, $valor]);
    }

    public function getPercentualIndicador(): float
    {
        return (float) $this->getParametro('percentual_indicador', 10.00);
    }

    public function getPercentualAuxiliar(): float
    {
        return (float) $this->getParametro('percentual_auxiliar', 15.00);
    }

    // ─── Taxas de Cartão ──────────────────────────────────────────────────────

    public function listarTaxasCartao(): array
    {
        $stmt = $this->pdo->query("
            SELECT * FROM taxas_cartao
            ORDER BY FIELD(bandeira,'Dinheiro','Pix','Debito','Visa','Master','Elo','Amex','Hipercard'), parcelas ASC
        ");
        return $stmt->fetchAll();
    }

    public function listarBandeiras(): array
    {
        $stmt = $this->pdo->query("SELECT DISTINCT bandeira FROM taxas_cartao ORDER BY bandeira");
        return array_column($stmt->fetchAll(), 'bandeira');
    }

    public function buscarTaxa(string $bandeira, int $parcelas): array|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM taxas_cartao WHERE bandeira = ? AND parcelas = ?");
        $stmt->execute([$bandeira, $parcelas]);
        return $stmt->fetch();
    }

    public function buscarTaxaPorId(int $id): array|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM taxas_cartao WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function salvarTaxa(string $bandeira, int $parcelas, float $taxa): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO taxas_cartao (bandeira, parcelas, taxa_percentual)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE taxa_percentual = VALUES(taxa_percentual)
        ");
        $stmt->execute([$bandeira, $parcelas, $taxa]);
    }

    public function atualizarTaxa(int $id, float $taxa): void
    {
        $stmt = $this->pdo->prepare("UPDATE taxas_cartao SET taxa_percentual = ? WHERE id = ?");
        $stmt->execute([$taxa, $id]);
    }

    public function excluirTaxa(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM taxas_cartao WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function calcularTaxaValor(string $bandeira, int $parcelas, float $valor): float
    {
        $taxa = $this->buscarTaxa($bandeira, $parcelas);
        if (!$taxa) return 0.0;
        return round($valor * ($taxa['taxa_percentual'] / 100), 2);
    }

    // ─── Regras de Comissão ───────────────────────────────────────────────────

    public function listarTodasRegras(): array
    {
        $stmt = $this->pdo->query("
            SELECT r.*, u.nome AS dentista_nome
            FROM regras_comissao r
            LEFT JOIN usuarios u ON r.dentista_id = u.id
            ORDER BY r.tipo, r.categoria, r.ordem ASC
        ");
        return $stmt->fetchAll();
    }

    public function listarRegrasComissao(string $tipo = 'global', ?int $dentistaId = null): array
    {
        if ($tipo === 'individual' && $dentistaId) {
            $stmt = $this->pdo->prepare("
                SELECT * FROM regras_comissao
                WHERE tipo = 'individual' AND dentista_id = ? AND ativo = 1
                ORDER BY categoria, ordem ASC
            ");
            $stmt->execute([$dentistaId]);
        } else {
            $stmt = $this->pdo->prepare("
                SELECT * FROM regras_comissao
                WHERE tipo = ? AND dentista_id IS NULL AND ativo = 1
                ORDER BY categoria, ordem ASC
            ");
            $stmt->execute([$tipo]);
        }
        return $stmt->fetchAll();
    }

    public function salvarRegra(array $dados): int
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO regras_comissao (tipo, dentista_id, categoria, teto_valor, percentual, ordem)
            VALUES (:tipo, :dentista_id, :categoria, :teto_valor, :percentual, :ordem)
        ");
        $stmt->execute($dados);
        return (int) $this->pdo->lastInsertId();
    }

    public function excluirRegra(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM regras_comissao WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function calcularComissao(float $valor, string $categoria, ?int $dentistaId = null): float
    {
        if ($dentistaId) {
            $regras = $this->listarRegrasComissao('individual', $dentistaId);
            if (!empty($regras)) {
                return $this->aplicarRegrasProgressivas($valor, $regras, $categoria);
            }
        }
        $regras = $this->listarRegrasComissao('global');
        return $this->aplicarRegrasProgressivas($valor, $regras, $categoria);
    }

    private function aplicarRegrasProgressivas(float $valor, array $regras, string $categoria): float
    {
        $regras = array_filter($regras, fn($r) => $r['categoria'] === $categoria);
        $regras = array_values($regras);
        if (empty($regras)) return 0.0;
        usort($regras, fn($a, $b) => $a['ordem'] <=> $b['ordem']);
        foreach ($regras as $regra) {
            if ($regra['teto_valor'] === null || $valor <= (float)$regra['teto_valor']) {
                return round($valor * ($regra['percentual'] / 100), 2);
            }
        }
        $ultima = end($regras);
        return round($valor * ($ultima['percentual'] / 100), 2);
    }
}