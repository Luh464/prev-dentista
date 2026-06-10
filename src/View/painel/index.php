<style>
    /* =====================================================
       DASHBOARD — Prev Dentistas
    ===================================================== */
    .dash-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .dash-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .dash-nav-mes {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .dash-nav-mes h2 {
        font-size: 1rem;
        font-weight: 600;
        color: #374151;
        margin: 0;
        min-width: 140px;
        text-align: center;
    }

    .btn-mes {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        color: #374151;
        font-size: 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.2s;
        box-shadow: 0 1px 4px rgba(0,0,0,0.06);
    }

    .btn-mes:hover {
        background: #005b96;
        color: #fff;
        border-color: #005b96;
    }

    /* Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 2rem;
    }

    .stat-card-new {
        background: #fff;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #f0f4f8;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        position: relative;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .stat-card-new:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.10);
    }

    .stat-card-new::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 4px;
        height: 100%;
        border-radius: 4px 0 0 4px;
    }

    .stat-card-new.azul::before    { background: #005b96; }
    .stat-card-new.vermelho::before { background: #e74c3c; }
    .stat-card-new.verde::before   { background: #00b894; }

    .stat-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
    }

    .stat-card-label {
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        color: #64748b;
        margin: 0;
    }

    .stat-card-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .stat-card-icon.azul    { background: #eef4fb; color: #005b96; }
    .stat-card-icon.vermelho { background: #fef2f2; color: #e74c3c; }
    .stat-card-icon.verde   { background: #e8fdf5; color: #00b894; }

    .stat-card-value {
        font-size: 1.9rem;
        font-weight: 800;
        color: #0f172a;
        margin: 4px 0 6px;
        letter-spacing: -0.5px;
        line-height: 1.1;
    }

    .stat-card-desc {
        font-size: 0.8rem;
        color: #94a3b8;
        margin: 0;
    }

    /* Tabela */
    .table-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid #f0f4f8;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .table-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        border-bottom: 1px solid #f1f5f9;
    }

    .table-card-header h3 {
        font-size: 1rem;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .table-actions {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .input-busca {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        padding: 8px 14px;
        transition: border-color 0.2s;
    }

    .input-busca:focus-within {
        border-color: #005b96;
        background: #fff;
    }

    .input-busca i { font-size: 14px; color: #94a3b8; }

    .input-busca input {
        border: none;
        background: none;
        outline: none;
        font-size: 0.875rem;
        color: #374151;
        min-width: 200px;
        font-family: inherit;
    }

    .input-busca input::placeholder { color: #94a3b8; }

    .btn-novo {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #0f172a;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 9px 18px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.2s;
        white-space: nowrap;
        font-family: inherit;
    }

    .btn-novo:hover { background: #005b96; }

    /* Tabela interna */
    .dash-table {
        width: 100%;
        border-collapse: collapse;
    }

    .dash-table thead tr { background: #f8fafc; }

    .dash-table th {
        padding: 12px 16px;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.6px;
        text-transform: uppercase;
        color: #64748b;
        text-align: left;
        border-bottom: 1px solid #f1f5f9;
    }

    .dash-table tbody tr {
        border-bottom: 1px solid #f8fafc;
        transition: background 0.15s;
        cursor: pointer;
    }

    .dash-table tbody tr:last-child { border-bottom: none; }
    .dash-table tbody tr:hover { background: #f8fafc; }

    .dash-table td {
        padding: 14px 16px;
        font-size: 0.875rem;
        color: #374151;
        vertical-align: middle;
    }

    .td-data { font-size: 0.8rem; color: #64748b; white-space: nowrap; }
    .td-paciente { font-weight: 700; color: #0f172a; text-transform: uppercase; font-size: 0.82rem; }
    .td-valor { font-weight: 700; color: #00b894; text-align: right; white-space: nowrap; }
    .td-valor.pendente { color: #f59e0b; }

    .badge-pendente {
        display: inline-block;
        background: #fef3c7;
        color: #b45309;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 20px;
        margin-top: 3px;
        letter-spacing: 0.3px;
        text-decoration: none;
        transition: background 0.2s, color 0.2s;
    }

    a.badge-pendente:hover {
        background: #f59e0b;
        color: #fff;
    }

    .btn-recibo {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        background: #f1f5f9;
        border: none;
        border-radius: 8px;
        color: #64748b;
        text-decoration: none;
        font-size: 15px;
        transition: all 0.2s;
    }

    .btn-recibo:hover { background: #005b96; color: #fff; }

    /* Rodapé da tabela */
    .dash-table-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 24px;
        border-top: 1px solid #f1f5f9;
    }

    .dash-contador {
        font-size: 0.82rem;
        color: #94a3b8;
        font-weight: 500;
    }

    .dash-paginacao {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .dash-paginacao a, .dash-paginacao span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        color: #374151;
        background: #f1f5f9;
        border: none;
    }

    .dash-paginacao a.ativo { background: #0f172a; color: #fff; }
    .dash-paginacao a:hover:not(.ativo) { background: #e2e8f0; }
    .dash-paginacao a.seta { font-size: 1rem; color: #64748b; }
    .dash-paginacao a.seta:hover { background: #e2e8f0; color: #0f172a; }
    .dash-paginacao a.seta.disabled { opacity: 0.3; pointer-events: none; }

    /* Vazio */
    .table-empty {
        text-align: center;
        padding: 48px 20px;
        color: #94a3b8;
        font-size: 0.9rem;
    }

    .table-empty i { font-size: 2rem; display: block; margin-bottom: 10px; color: #cbd5e1; }

    /* Modal de detalhes */
    .modal-detalhe-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(10,25,50,0.5);
        z-index: 9000;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(3px);
    }

    .modal-detalhe-overlay.open { display: flex; }

    .modal-detalhe-box {
        background: #fff;
        border-radius: 18px;
        width: 100%;
        max-width: 580px;
        max-height: 88vh;
        display: flex;
        flex-direction: column;
        box-shadow: 0 20px 60px rgba(0,0,0,0.18);
        animation: modalIn 0.25s ease;
    }

    @keyframes modalIn {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .modal-detalhe-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        border-bottom: 1px solid #f1f5f9;
        flex-shrink: 0;
    }

    .modal-detalhe-header h2 {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .modal-detalhe-fechar {
        background: none;
        border: none;
        font-size: 20px;
        color: #94a3b8;
        cursor: pointer;
        padding: 4px;
        transition: color 0.15s;
        line-height: 1;
    }

    .modal-detalhe-fechar:hover { color: #374151; }

    .modal-detalhe-body {
        overflow-y: auto;
        padding: 24px;
        flex: 1;
    }

    .modal-detalhe-body .form-group { margin-bottom: 14px; }

    .modal-detalhe-body .form-group label {
        display: block;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        margin-bottom: 5px;
    }

    .modal-detalhe-body .form-group input[readonly],
    .modal-detalhe-body .form-group textarea[readonly] {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #e2e8f0;
        background: #f8fafc;
        border-radius: 8px;
        font-size: 0.875rem;
        color: #374151;
        font-family: inherit;
        outline: none;
        resize: none;
    }

    .modal-detalhe-footer {
        display: flex;
        justify-content: flex-end;
        padding: 16px 24px;
        border-top: 1px solid #f1f5f9;
        flex-shrink: 0;
    }

    .btn-fechar-detalhe {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f1f5f9;
        border: none;
        border-radius: 8px;
        padding: 9px 20px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        cursor: pointer;
        font-family: inherit;
        transition: background 0.2s;
    }

    .btn-fechar-detalhe:hover { background: #e2e8f0; }

    @media (max-width: 768px) {
        .stats-grid { grid-template-columns: 1fr; }
        .table-card-header { flex-direction: column; gap: 12px; align-items: flex-start; }
        .stat-card-value { font-size: 1.5rem; }
        .dash-table-footer { flex-direction: column; gap: 10px; align-items: center; }
    }
</style>

<!-- CABEÇALHO -->
<div class="dash-header">
    <h1>Dashboard Financeiro</h1>
    <div class="dash-nav-mes">
        <a href="<?= BASE_URL ?>?rota=painel&mes=<?= $mes_anterior ?>" class="btn-mes" title="Mês Anterior">&#8249;</a>
        <h2><?= ucfirst($mesAtual) ?></h2>
        <a href="<?= BASE_URL ?>?rota=painel&mes=<?= $mes_proximo ?>" class="btn-mes" title="Próximo Mês">&#8250;</a>
    </div>
</div>

<!-- CARDS -->
<?php if (is_admin()): ?>
<div class="stats-grid">
    <div class="stat-card-new azul">
        <div class="stat-card-top">
            <p class="stat-card-label">Faturamento Bruto</p>
            <div class="stat-card-icon azul"><i class="fa fa-line-chart"></i></div>
        </div>
        <div class="stat-card-value">R$ <?= number_format($faturamentoBruto, 2, ',', '.') ?></div>
        <p class="stat-card-desc">Total transacionado no mês</p>
    </div>

    <div class="stat-card-new vermelho">
        <div class="stat-card-top">
            <p class="stat-card-label">Total de Despesas</p>
            <div class="stat-card-icon vermelho"><i class="fa fa-arrow-down"></i></div>
        </div>
        <div class="stat-card-value">R$ <?= number_format($totalDespesas, 2, ',', '.') ?></div>
        <p class="stat-card-desc">Soma de custos do mês</p>
    </div>

    <div class="stat-card-new verde">
        <div class="stat-card-top">
            <p class="stat-card-label">Resultado Líquido</p>
            <div class="stat-card-icon verde"><i class="fa fa-dollar"></i></div>
        </div>
        <div class="stat-card-value">R$ <?= number_format($lucroLiquido - $totalDespesas, 2, ',', '.') ?></div>
        <p class="stat-card-desc">Lucro de atendimentos - despesas no mês</p>
    </div>
</div>
<?php endif; ?>

<!-- TABELA -->
<div class="table-card">
    <div class="table-card-header">
        <h3>Histórico de Atendimentos</h3>
        <div class="table-actions">
            <div class="input-busca">
                <i class="fa fa-search"></i>
                <input type="text" id="busca_painel"
                       placeholder="Filtrar por paciente..."
                       value="<?= htmlspecialchars($busca ?? '') ?>"
                       autocomplete="off">
            </div>
            <?php if (is_admin()): ?>
            <a href="<?= BASE_URL ?>?rota=atendimentos.novo" class="btn-novo">
                <i class="fa fa-plus"></i> Novo Lançamento
            </a>
            <?php endif; ?>
        </div>
    </div>

    <table class="dash-table mobile-card-table" id="tabela_painel">
        <thead>
            <tr>
                <th>Data</th>
                <th>Paciente</th>
                <th>Ações</th>
                <th>Procedimentos</th>
                <th>Dentista</th>
                <?php if (is_admin()): ?><th style="text-align:right;">Valor Líquido</th><?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (count($ultimosAtendimentos) > 0): ?>
                <?php foreach ($ultimosAtendimentos as $at): ?>
                    <?php
                        $isNaoAplicavel = $at['status_pagamento'] === 'nao_aplicavel';
                        $isPendente     = $at['status_pagamento'] === 'pendente';
                    ?>
                    <tr class="clickable-row"
                        data-id="<?= $at['id'] ?>"
                        data-pendente="<?= $isPendente ? '1' : '0' ?>"
                        data-data="<?= date('d/m/Y H:i', strtotime($at['data_atendimento'])) ?>"
                        data-paciente="<?= htmlspecialchars($at['paciente_nome']) ?>"
                        data-taxa-cartao="<?= $isNaoAplicavel ? 'N/A' : 'R$ ' . number_format($at['taxa_cartao'], 2, ',', '.') ?>"
                        data-custo-auxiliar="<?= $isNaoAplicavel ? 'N/A' : 'R$ ' . number_format($at['custo_auxiliar'], 2, ',', '.') ?>"
                        data-comissao-dentista="<?= $isNaoAplicavel ? 'N/A' : 'R$ ' . number_format($at['comissao_dentista'], 2, ',', '.') ?>"
                        data-procedimentos="<?= htmlspecialchars($at['procedimentos'] ?? '') ?>"
                        data-dentista="<?= htmlspecialchars($at['dentista']) ?>"
                        data-arquivo="<?= htmlspecialchars($at['url_arquivo'] ?? '') ?>"
                        data-valor="<?= $isNaoAplicavel ? 'N/A' : 'R$ ' . number_format($at['valor_liquido_clinica'], 2, ',', '.') ?>"
                        data-bruto="<?= $isNaoAplicavel ? 'N/A' : 'R$ ' . number_format($at['valor_bruto_total'] ?? 0, 2, ',', '.') ?>"
                        title="<?= $isPendente ? 'Clique para confirmar pagamento' : 'Clique para ver detalhes' ?>">

                        <td data-label="Data">
                            <span class="td-data"><?= date('d/m/Y', strtotime($at['data_atendimento'])) ?><br><?= date('H:i', strtotime($at['data_atendimento'])) ?></span>
                        </td>
                        <td data-label="Paciente">
                            <span class="td-paciente"><?= htmlspecialchars($at['paciente_nome']) ?></span>
                        </td>
                        <td data-label="Ações" onclick="event.stopPropagation()">
                            <a href="<?= BASE_URL ?>?rota=recibo&id=<?= $at['id'] ?>" class="btn-recibo" target="_blank" title="Gerar Recibo">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td data-label="Procedimentos" style="max-width:260px; color:#4b5563;">
                            <?= htmlspecialchars($at['procedimentos'] ?? '') ?>
                        </td>
                        <td data-label="Dentista" style="color:#4b5563;">
                            <?= htmlspecialchars($at['dentista']) ?>
                        </td>
                        <?php if (is_admin()): ?>
                        <td data-label="Valor Líquido">
                            <div style="text-align:right;">
                                <span class="td-valor <?= $isPendente ? 'pendente' : '' ?>">
                                    <?= $isNaoAplicavel ? 'N/A' : 'R$ ' . number_format($at['valor_liquido_clinica'], 2, ',', '.') ?>
                                </span>
                                <?php if ($isPendente): ?>
                                    <br>
                                    <a href="<?= BASE_URL ?>?rota=atendimentos.pagamento&atendimento_id=<?= $at['id'] ?>"
                                       class="badge-pendente"
                                       onclick="event.stopPropagation();"
                                       title="Clique para confirmar pagamento">
                                        ⏳ Pendente
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">
                        <div class="table-empty">
                            <i class="fa fa-calendar-o"></i>
                            Nenhum atendimento registrado neste mês.
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Rodapé: contador + paginação com setas -->
    <div class="dash-table-footer">
        <span class="dash-contador" id="dash-contador">
            <?= count($ultimosAtendimentos) ?> registro<?= count($ultimosAtendimentos) !== 1 ? 's' : '' ?> encontrado<?= count($ultimosAtendimentos) !== 1 ? 's' : '' ?>
        </span>

        <?php if ($totalPaginas > 1): ?>
        <div class="dash-paginacao">
            <?php
                $queryBase = $_GET;
                $queryBase['pagina'] = max(1, $pagina - 1);
                $urlAnterior = '?' . http_build_query($queryBase);
            ?>
            <a href="<?= $urlAnterior ?>" class="seta <?= $pagina <= 1 ? 'disabled' : '' ?>" title="Página anterior">&#8249;</a>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <?php
                    $queryBase['pagina'] = $i;
                    $url = '?' . http_build_query($queryBase);
                    $ativo = $i === $pagina ? 'ativo' : '';
                ?>
                <a href="<?= $url ?>" class="<?= $ativo ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php
                $queryBase['pagina'] = min($totalPaginas, $pagina + 1);
                $urlProximo = '?' . http_build_query($queryBase);
            ?>
            <a href="<?= $urlProximo ?>" class="seta <?= $pagina >= $totalPaginas ? 'disabled' : '' ?>" title="Próxima página">&#8250;</a>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- MODAL DE DETALHES -->
<div class="modal-detalhe-overlay" id="detalhesModal">
    <div class="modal-detalhe-box">
        <div class="modal-detalhe-header">
            <h2><i class="fa fa-file-text-o" style="color:#005b96; margin-right:8px;"></i> Detalhes do Atendimento</h2>
            <button class="modal-detalhe-fechar" id="modalCloseBtn" aria-label="Fechar">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="modal-detalhe-body" id="modalBody"></div>
        <div class="modal-detalhe-footer">
            <button class="btn-fechar-detalhe" id="modalFooterCloseBtn">
                <i class="fa fa-times"></i> Fechar
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Contador dinâmico ao filtrar ─────────────────────
    const inputBusca = document.getElementById('busca_painel');
    const contador   = document.getElementById('dash-contador');
    const tabela     = document.getElementById('tabela_painel');

    if (inputBusca && contador && tabela) {
        inputBusca.addEventListener('input', function () {
            setTimeout(function () {
                const visiveis = tabela.querySelectorAll('tbody tr:not([style*="display: none"]):not([style*="display:none"])');
                const n = visiveis.length;
                contador.textContent = n + ' registro' + (n !== 1 ? 's' : '') + ' encontrado' + (n !== 1 ? 's' : '');
            }, 200);
        });
    }

    // ── Modal de detalhes ─────────────────────────────────
    const modal     = document.getElementById('detalhesModal');
    const modalBody = document.getElementById('modalBody');

    const fecharModal = () => {
        modal.classList.remove('open');
        modalBody.innerHTML = '';
    };

    document.getElementById('modalCloseBtn').addEventListener('click', fecharModal);
    document.getElementById('modalFooterCloseBtn').addEventListener('click', fecharModal);
    modal.addEventListener('click', (e) => { if (e.target === modal) fecharModal(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') fecharModal(); });

    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', function () {
            const baseUrl    = '<?= BASE_URL ?>';
            const isPendente = this.dataset.pendente === '1';
            const atendId    = this.dataset.id;

            // Se pendente, redireciona para tela de pagamento
            if (isPendente) {
                window.location.href = baseUrl + '?rota=atendimentos.pagamento&atendimento_id=' + atendId;
                return;
            }

            // Senão, abre modal de detalhes
            const data             = this.dataset.data;
            const paciente         = this.dataset.paciente;
            const procedimentos    = this.dataset.procedimentos;
            const dentista         = this.dataset.dentista;
            const valor            = this.dataset.valor;
            const taxaCartao       = this.dataset.taxaCartao;
            const custoAuxiliar    = this.dataset.custoAuxiliar;
            const comissaoDentista = this.dataset.comissaoDentista;
            const valorBruto       = this.dataset.bruto;
            const arquivo          = this.dataset.arquivo;
            const isAdmin          = <?= is_admin() ? 'true' : 'false' ?>;

            let html = `
                <div class="form-group"><label>Data do Atendimento</label><input type="text" value="${data}" readonly></div>
                <div class="form-group"><label>Paciente</label><input type="text" value="${paciente}" readonly></div>
                <div class="form-group"><label>Procedimentos</label><textarea readonly rows="3">${procedimentos}</textarea></div>
                <div class="form-group"><label>Dentista</label><input type="text" value="${dentista}" readonly></div>
            `;

            if (isAdmin) {
                html += `
                    <div class="form-group"><label>Valor Bruto</label><input type="text" value="${valorBruto}" readonly></div>
                    <div class="form-group"><label>Taxa do Cartão</label><input type="text" value="${taxaCartao}" readonly></div>
                `;
            }

            html += `
                <div class="form-group"><label>Custo Auxiliar</label><input type="text" value="${custoAuxiliar}" readonly></div>
                <div class="form-group"><label>Comissão do Dentista</label><input type="text" value="${comissaoDentista}" readonly></div>
            `;

            if (isAdmin) {
                html += `<div class="form-group"><label>Valor Líquido (Clínica)</label><input type="text" value="${valor}" readonly></div>`;
            }

            if (arquivo) {
                html += `
                    <div class="form-group" style="margin-top:1rem; border-top:1px solid #f1f5f9; padding-top:1rem;">
                        <label>Arquivo Anexado</label>
                        <div style="display:flex; gap:10px; margin-top:4px;">
                            <a href="${baseUrl}${arquivo}" target="_blank"
                               style="display:inline-flex; align-items:center; gap:6px; background:#eef4fb; color:#005b96; padding:8px 16px; border-radius:8px; text-decoration:none; font-size:0.85rem; font-weight:600;">
                                <i class="fa fa-eye"></i> Visualizar
                            </a>
                            <a href="${baseUrl}${arquivo}" download
                               style="display:inline-flex; align-items:center; gap:6px; background:#f1f5f9; color:#374151; padding:8px 16px; border-radius:8px; text-decoration:none; font-size:0.85rem; font-weight:600;">
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                `;
            }

            modalBody.innerHTML = html;
            modal.classList.add('open');
        });
    });
});
</script>

<style>
.busca-wrapper { position: relative; }
.busca-dropdown {
    display:none; position:absolute; top:100%; left:0; right:0;
    background:#fff; border:1px solid #ccc; border-radius:4px;
    max-height:240px; overflow-y:auto; margin:2px 0 0; padding:0;
    list-style:none; z-index:99999; box-shadow:0 4px 12px rgba(0,0,0,.15);
}
.busca-status { font-size:12px; color:#888; margin-top:3px; display:block; min-height:16px; }
</style>

<script>
(function() {
    window.buscaLiveTable = function(cfg) {
        var input = document.getElementById(cfg.inputId);
        var table = document.getElementById(cfg.tableId);
        if (!input || !table) return;
        input.addEventListener('keydown', function(e) { if (e.key === 'Enter') e.preventDefault(); });
        var _t = null;
        input.addEventListener('input', function() {
            clearTimeout(_t);
            var term = this.value.toLowerCase().trim();
            _t = setTimeout(function() {
                table.querySelectorAll('tbody tr').forEach(function(row) {
                    var txt = cfg.colIndex !== undefined
                        ? (row.cells[cfg.colIndex] ? row.cells[cfg.colIndex].textContent.toLowerCase() : '')
                        : row.textContent.toLowerCase();
                    row.style.display = (!term || txt.includes(term)) ? '' : 'none';
                });
            }, 150);
        });
    };

    window.buscaLiveDropdown = function(cfg) {
        var input  = document.getElementById(cfg.inputId);
        var lista  = document.getElementById(cfg.listId);
        var status = cfg.statusId ? document.getElementById(cfg.statusId) : null;
        if (!input || !lista) return;
        input.addEventListener('keydown', function(e) { if (e.key === 'Enter') { e.preventDefault(); lista.style.display='none'; } });
        var _t = null;
        input.addEventListener('input', function() {
            var term = this.value;
            clearTimeout(_t);
            lista.innerHTML = ''; lista.style.display = 'none';
            if (!term) { if(status) status.textContent = ''; return; }
            if(status) status.textContent = 'Buscando...';
            _t = setTimeout(function() {
                fetch(window.__BASE_URL + 'ajax/buscar_paciente.php?term=' + encodeURIComponent(term))
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        lista.innerHTML = '';
                        if (!data.length) {
                            if(status) status.textContent = 'Nenhum paciente encontrado.';
                            lista.style.display = 'none';
                            if (cfg.onNone) cfg.onNone(term);
                            return;
                        }
                        data.forEach(function(p) {
                            var li = document.createElement('li');
                            li.style.cssText = 'padding:10px 14px;cursor:pointer;border-bottom:1px solid #eee;font-size:14px;';
                            li.innerHTML = '<strong>' + esc(p.nome) + '</strong>'
                                + (p.cpf      ? ' <span style="color:#999;font-size:12px;"> · CPF: '  + esc(p.cpf)      + '</span>' : '')
                                + (p.telefone ? ' <span style="color:#999;font-size:12px;"> · '        + esc(p.telefone) + '</span>' : '');
                            li.onmouseover = function(){ this.style.background='#f0f4ff'; };
                            li.onmouseout  = function(){ this.style.background=''; };
                            li.onmousedown = function(e) {
                                e.preventDefault();
                                lista.style.display = 'none';
                                if (cfg.onSelect) cfg.onSelect(p);
                            };
                            lista.appendChild(li);
                        });
                        lista.style.display = 'block';
                        if(status) status.textContent = data.length + ' encontrado(s).';
                    })
                    .catch(function(err){ if(status) status.textContent = 'Sem conexão com o servidor.'; console.error(err); });
            }, 220);
        });
        document.addEventListener('click', function(e) {
            if (!input.contains(e.target) && !lista.contains(e.target))
                lista.style.display = 'none';
        });
    };

    function esc(s) {
        return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }
})();
</script>

<script>
buscaLiveTable({ inputId: 'busca_painel', tableId: 'tabela_painel' });
</script>