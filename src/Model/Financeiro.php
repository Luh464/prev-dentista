<?php
// src/Model/Financeiro.php
// Classe estática de cálculos financeiros — agora usa ConfiguracaoModel para valores dinâmicos

class Financeiro
{
    // ─── Taxa de cartão dinâmica ──────────────────────────────────────────────

    public static function calcularLiquidoMaquininha(
        float $valor,
        string $forma,
        int $parcelas = 1,
        ?PDO $pdo = null
    ): array {
        $taxa      = 0.0;
        $valorTaxa = 0.0;

        // Se tiver PDO e a tabela existe, usa taxa dinâmica do banco
        if ($pdo !== null) {
            try {
                $cfgModel = new ConfiguracaoModel($pdo);
                $taxaObj  = $cfgModel->buscarTaxa($forma, $parcelas);
                if ($taxaObj) {
                    $taxa      = (float)$taxaObj['taxa_percentual'];
                    $valorTaxa = round($valor * ($taxa / 100), 2);
                    return [
                        'liquido'    => round($valor - $valorTaxa, 2),
                        'valor_taxa' => $valorTaxa,
                        'taxa_pct'   => $taxa,
                    ];
                }
            } catch (Throwable $e) {
                // fallback para valores fixos abaixo
            }
        }

        // Fallback: taxas fixas originais
        switch ($forma) {
            case 'credito':
                $taxa = match(true) {
                    $parcelas <= 1  => 2.49,
                    $parcelas <= 3  => 3.49,
                    $parcelas <= 6  => 4.49,
                    $parcelas <= 9  => 5.49,
                    default         => 6.49,
                };
                break;
            case 'debito':
                $taxa = 1.49;
                break;
            case 'pix':
            case 'dinheiro':
            default:
                $taxa = 0.0;
                break;
        }

        $valorTaxa = round($valor * ($taxa / 100), 2);
        return [
            'liquido'    => round($valor - $valorTaxa, 2),
            'valor_taxa' => $valorTaxa,
            'taxa_pct'   => $taxa,
        ];
    }

    // ─── Comissão dinâmica ────────────────────────────────────────────────────

    public static function calcularComissaoProcedimento(
        float  $valor,
        float  $custoAux,
        string $categoria,
        string $natureza,
        float  $fatMensalAcumulado,
        ?PDO   $pdo = null,
        ?int   $dentistaId = null
    ): float {
        // Se tiver PDO, usa regras dinâmicas do banco
        if ($pdo !== null) {
            try {
                $cfgModel = new ConfiguracaoModel($pdo);
                // Mapeia categoria do procedimento para categoria da comissão
                $catComissao = in_array($categoria, ['especializado']) ? 'especialista' : 'geral';
                return $cfgModel->calcularComissao($valor, $catComissao, $dentistaId);
            } catch (Throwable $e) {
                // fallback para regras fixas abaixo
            }
        }

        // Fallback: regras fixas originais
        if ($categoria === 'especializado' && $natureza === 'especializado') {
            return round($valor * 0.50, 2); // 50% especialista
        }

        // Regra progressiva original: 20% até 10k, 30% acima
        $pct = $fatMensalAcumulado <= 10000 ? 0.20 : 0.30;
        return round(($valor - $custoAux) * $pct, 2);
    }

    // ─── Custo auxiliar dinâmico ──────────────────────────────────────────────

    public static function calcularCustoAuxiliar(
        float $valor,
        ?PDO  $pdo = null
    ): float {
        if ($pdo !== null) {
            try {
                $cfgModel = new ConfiguracaoModel($pdo);
                $pct = $cfgModel->getPercentualAuxiliar();
                return round($valor * ($pct / 100), 2);
            } catch (Throwable $e) {
                // fallback
            }
        }
        return round($valor * 0.15, 2); // 15% fixo como fallback
    }
}