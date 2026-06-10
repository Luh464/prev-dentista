<style>
/* ── Relatórios compartilhado ── */
.rel-page-title { font-size:1.6rem; font-weight:700; color:#0f172a; margin:0 0 24px; }

.rel-tabs { display:flex; gap:8px; margin-bottom:28px; flex-wrap:wrap; }
.rel-tab {
    display:inline-flex; align-items:center; gap:7px;
    padding:8px 18px; border-radius:50px;
    font-size:0.85rem; font-weight:600;
    text-decoration:none; border:1.5px solid #e2e8f0;
    color:#64748b; background:#fff;
    transition:all 0.2s; cursor:pointer; white-space:nowrap;
}
.rel-tab:hover { border-color:#005b96; color:#005b96; background:#eef4fb; }
.rel-tab.active { background:#0f172a; color:#fff; border-color:#0f172a; }

.rel-card {
    background:#fff; border-radius:16px;
    border:1px solid #f0f4f8;
    box-shadow:0 2px 12px rgba(0,0,0,0.06);
    padding:24px; margin-bottom:20px;
}

.rel-card-title {
    font-size:0.95rem; font-weight:700; color:#0f172a; margin:0 0 18px;
    display:flex; align-items:center; gap:8px;
}

.rel-filter-row {
    display:flex; gap:16px; align-items:flex-end; flex-wrap:wrap;
}

.rel-field-label {
    display:block; font-size:0.72rem; font-weight:700;
    text-transform:uppercase; letter-spacing:0.5px; color:#64748b; margin-bottom:6px;
}

.rel-field-input {
    background:#f8fafc; border:1.5px solid #e2e8f0;
    border-radius:10px; padding:9px 14px; font-size:0.875rem;
    color:#374151; font-family:inherit; outline:none;
    transition:border-color 0.2s;
}
.rel-field-input:focus { border-color:#005b96; background:#fff; }

.rel-btn-filter {
    display:inline-flex; align-items:center; gap:6px;
    background:#005b96; color:#fff; border:none; border-radius:10px;
    padding:10px 20px; font-size:0.875rem; font-weight:600;
    cursor:pointer; font-family:inherit; transition:background 0.2s;
    white-space:nowrap;
}
.rel-btn-filter:hover { background:#004a7c; }

/* Stats grid */
.rel-stats-grid {
    display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
    gap:16px; margin-bottom:20px;
}
.rel-stat {
    background:#fff; border-radius:14px; padding:18px 20px;
    border:1px solid #f0f4f8; box-shadow:0 2px 8px rgba(0,0,0,0.05);
    position:relative; overflow:hidden;
}
.rel-stat::before {
    content:''; position:absolute; top:0; left:0;
    width:4px; height:100%; border-radius:4px 0 0 4px;
}
.rel-stat.azul::before  { background:#005b96; }
.rel-stat.vermelho::before { background:#e74c3c; }
.rel-stat.verde::before  { background:#00b894; }
.rel-stat.laranja::before { background:#f59e0b; }

.rel-stat-label {
    font-size:0.68rem; font-weight:700; text-transform:uppercase;
    letter-spacing:0.6px; color:#64748b; margin-bottom:8px;
}
.rel-stat-value { font-size:1.5rem; font-weight:800; color:#0f172a; letter-spacing:-0.5px; }
.rel-stat-value.vermelho { color:#e74c3c; }
.rel-stat-value.verde    { color:#00b894; }

/* Tabela */
.rel-table-wrap {
    border-radius:12px; overflow:hidden;
    border:1px solid #f0f4f8; margin-top:8px;
}
.rel-table { width:100%; border-collapse:collapse; }
.rel-table th {
    padding:11px 16px; font-size:0.7rem; font-weight:700;
    text-transform:uppercase; letter-spacing:0.5px; color:#64748b;
    text-align:left; border-bottom:1px solid #f1f5f9; background:#f8fafc;
}
.rel-table td {
    padding:12px 16px; font-size:0.875rem; color:#374151;
    border-bottom:1px solid #f8fafc; vertical-align:middle;
}
.rel-table tbody tr:last-child td { border-bottom:none; }
.rel-table tbody tr:hover { background:#f8fafc; }
.rel-table tfoot td {
    padding:12px 16px; font-size:0.875rem; font-weight:700;
    background:#f1f5f9; border-top:1.5px solid #e2e8f0;
}

/* Paginação */
.rel-paginacao { display:flex; justify-content:flex-end; gap:4px; margin-top:16px; }
.rel-paginacao a {
    display:inline-flex; align-items:center; justify-content:center;
    width:32px; height:32px; border-radius:8px; font-size:0.85rem;
    font-weight:600; text-decoration:none; transition:all 0.2s;
    color:#374151; background:#f1f5f9;
}
.rel-paginacao a.ativo { background:#0f172a; color:#fff; }
.rel-paginacao a:hover:not(.ativo) { background:#e2e8f0; }

/* Nav dia */
.rel-dia-nav {
    display:flex; justify-content:space-between; align-items:center;
    margin-bottom:20px; gap:16px;
}
.rel-dia-btn {
    display:inline-flex; align-items:center; gap:6px;
    background:#fff; border:1.5px solid #e2e8f0; border-radius:10px;
    padding:9px 18px; font-size:0.875rem; font-weight:600;
    color:#374151; text-decoration:none; transition:all 0.2s; white-space:nowrap;
}
.rel-dia-btn:hover { border-color:#005b96; color:#005b96; background:#eef4fb; }
.rel-dia-titulo { font-size:1rem; font-weight:700; color:#0f172a; text-align:center; }

/* Busca paciente */
.rel-busca-wrap {
    position:relative; display:flex; align-items:center; gap:10px;
    background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:10px;
    padding:10px 14px; transition:border-color 0.2s;
}
.rel-busca-wrap:focus-within { border-color:#005b96; background:#fff; }
.rel-busca-wrap i { font-size:15px; color:#94a3b8; flex-shrink:0; }
.rel-busca-wrap input {
    flex:1; border:none; background:none; outline:none;
    font-size:0.9rem; color:#374151; font-family:inherit;
}
.rel-busca-wrap input::placeholder { color:#94a3b8; }

.rel-btn-limpar {
    display:inline-flex; align-items:center; justify-content:center;
    width:24px; height:24px; background:#ef4444; color:#fff;
    border:none; border-radius:50%; cursor:pointer; font-size:12px;
    transition:background 0.2s; flex-shrink:0; text-decoration:none;
}
.rel-btn-limpar:hover { background:#dc2626; }

#lista_pac_rel {
    display:none; position:absolute; top:calc(100% + 4px); left:0; right:0;
    background:#fff; border:1.5px solid #e2e8f0; border-radius:10px;
    max-height:220px; overflow-y:auto; z-index:99999;
    box-shadow:0 8px 24px rgba(0,0,0,0.12); padding:4px 0; list-style:none; margin:0;
}

/* Sub-card procedimentos */
.rel-proc-card {
    background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px;
    padding:16px; margin-bottom:12px;
}
.rel-proc-card:last-child { margin-bottom:0; }
.rel-proc-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px 24px; margin-bottom:12px; }
.rel-proc-item label { font-size:0.68rem; font-weight:700; text-transform:uppercase; letter-spacing:0.4px; color:#94a3b8; display:block; margin-bottom:2px; }
.rel-proc-item span { font-size:0.875rem; color:#374151; }

.rel-status-badge {
    display:inline-block; padding:2px 10px; border-radius:20px;
    font-size:0.72rem; font-weight:700;
}
.rel-status-feito,.rel-status-pago { background:#e8fdf5; color:#059669; }
.rel-status-pendente { background:#fef3c7; color:#b45309; }
.rel-status-finalizado { background:#eef4fb; color:#005b96; }
.rel-status-nao_aplicavel { background:#f1f5f9; color:#64748b; }

.rel-proc-actions { display:flex; gap:8px; align-items:center; flex-wrap:wrap; margin-top:12px; padding-top:12px; border-top:1px solid #e2e8f0; }

.rel-btn-action {
    display:inline-flex; align-items:center; gap:5px;
    padding:6px 14px; border-radius:8px; font-size:0.78rem; font-weight:600;
    border:none; cursor:pointer; font-family:inherit; transition:all 0.2s; text-decoration:none;
}
.rel-btn-info    { background:#eef4fb; color:#005b96; }
.rel-btn-info:hover { background:#005b96; color:#fff; }
.rel-btn-down    { background:#f1f5f9; color:#374151; }
.rel-btn-down:hover { background:#e2e8f0; }
.rel-btn-danger  { background:#fef2f2; color:#ef4444; }
.rel-btn-danger:hover { background:#ef4444; color:#fff; }
.rel-btn-primary { background:#eef4fb; color:#005b96; }
.rel-btn-primary:hover { background:#005b96; color:#fff; }
.rel-btn-remove-proc { background:#fef2f2; color:#ef4444; margin-left:auto; }
.rel-btn-remove-proc:hover { background:#ef4444; color:#fff; }

/* Botões gráfico */
.rel-chart-btns { display:flex; gap:10px; margin-bottom:16px; }
.rel-chart-btn {
    display:inline-flex; align-items:center; gap:6px;
    padding:9px 18px; border-radius:10px; font-size:0.875rem; font-weight:600;
    border:1.5px solid #e2e8f0; cursor:pointer; font-family:inherit; transition:all 0.2s; background:#fff; color:#374151;
}
.rel-chart-btn.active { background:#0f172a; color:#fff; border-color:#0f172a; }
.rel-chart-btn:hover:not(.active) { border-color:#005b96; color:#005b96; }

/* Modais */
.rel-modal { display:none; position:fixed; z-index:10000; inset:0; background:rgba(10,25,50,0.5); justify-content:center; align-items:center; backdrop-filter:blur(3px); }
.rel-modal.show { display:flex; }
.rel-modal-box {
    background:#fff; border-radius:18px; padding:28px; width:90%; max-width:520px;
    box-shadow:0 20px 60px rgba(0,0,0,0.2); max-height:88vh; display:flex; flex-direction:column;
}
.rel-modal-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
.rel-modal-header h3 { font-size:1rem; font-weight:700; color:#0f172a; margin:0; }
.rel-modal-close { background:none; border:none; font-size:20px; color:#94a3b8; cursor:pointer; transition:color 0.15s; }
.rel-modal-close:hover { color:#374151; }
.rel-modal-body { overflow-y:auto; flex:1; }
.rel-modal-footer { margin-top:16px; display:flex; gap:10px; justify-content:flex-end; }
.rel-modal-btn-close {
    display:inline-flex; align-items:center; gap:6px;
    background:#f1f5f9; border:none; border-radius:8px;
    padding:9px 18px; font-size:0.875rem; font-weight:600;
    color:#374151; cursor:pointer; font-family:inherit; transition:background 0.2s;
}
.rel-modal-btn-close:hover { background:#e2e8f0; }
.rel-modal-btn-save {
    flex:1; padding:11px; background:#005b96; color:#fff; border:none;
    border-radius:8px; font-size:0.9rem; font-weight:700;
    cursor:pointer; font-family:inherit; transition:background 0.2s;
}
.rel-modal-btn-save:hover { background:#004a7c; }
.rel-modal-btn-danger {
    padding:11px 18px; background:#ef4444; color:#fff; border:none;
    border-radius:8px; font-size:0.9rem; font-weight:700;
    cursor:pointer; font-family:inherit; transition:background 0.2s;
}
.rel-modal-btn-danger:hover { background:#dc2626; }

/* Toast */
.toast-container { position:fixed; top:20px; right:20px; z-index:10001; display:flex; flex-direction:column; gap:10px; }
.toast { background:#fff; padding:14px 20px; border-radius:10px; opacity:0; transform:translateX(100%); transition:all 0.3s ease-in-out; box-shadow:0 4px 12px rgba(0,0,0,0.15); display:flex; align-items:center; min-width:280px; font-weight:500; font-size:0.875rem; }
.toast.show { opacity:1; transform:translateX(0); }
.toast.success { color:#155724; border-left:5px solid #28a745; }
.toast.error   { color:#721c24; border-left:5px solid #dc3545; }

/* Odontograma */
.canvas-container { position:relative; width:100%; max-width:900px; margin:0 auto; line-height:0; }
.img-odontograma { display:block; width:100%; height:auto; position:relative; z-index:1; }
.odontograma-overlay { position:absolute; top:0; left:0; width:100%; height:100%; z-index:2; pointer-events:none; }
area { cursor:pointer; outline:none; }

@media (max-width:768px) {
    .rel-stats-grid { grid-template-columns:1fr 1fr; }
    .rel-dia-nav { flex-direction:column; text-align:center; }
    .rel-filter-row { flex-direction:column; }
    .rel-proc-grid { grid-template-columns:1fr; }
}
</style>

<h1 class="rel-page-title">Relatórios</h1>

<div class="rel-tabs">
    <a href="<?= BASE_URL ?>?rota=relatorios.diario"        class="rel-tab"><i class="fa fa-calendar"></i> Relatório do Dia</a>
    <a href="<?= BASE_URL ?>?rota=relatorios"               class="rel-tab"><i class="fa fa-line-chart"></i> Financeiro</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.dentistas"     class="rel-tab"><i class="fa fa-user-md"></i> Por Dentista</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.procedimentos" class="rel-tab active"><i class="fa fa-stethoscope"></i> Por Procedimentos</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.paciente"      class="rel-tab"><i class="fa fa-user"></i> Por Paciente</a>
</div>

<div class="rel-card">
    <form method="GET" action="<?= BASE_URL ?>index.php">
        <input type="hidden" name="rota" value="relatorios.procedimentos">
        <div class="rel-filter-row">
            <div>
                <label class="rel-field-label">Data Início</label>
                <input type="date" name="inicio" class="rel-field-input" value="<?= htmlspecialchars($data_inicio) ?>">
            </div>
            <div>
                <label class="rel-field-label">Data Fim</label>
                <input type="date" name="fim" class="rel-field-input" value="<?= htmlspecialchars($data_fim) ?>">
            </div>
            <button type="submit" class="rel-btn-filter"><i class="fa fa-filter"></i> Filtrar</button>
        </div>
    </form>
</div>

<div class="rel-card">
    <div class="rel-card-title"><i class="fa fa-stethoscope" style="color:#005b96;"></i> Procedimentos no Período</div>
    <div class="rel-table-wrap">
        <table class="rel-table">
            <thead>
                <tr>
                    <th>Procedimento</th>
                    <th>Vezes Executado</th>
                    <th>Representação (%)</th>
                    <th style="text-align:right;">Valor Bruto Gerado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($procedimentos_relatorio) > 0): ?>
                    <?php foreach($procedimentos_relatorio as $proc):
                        $porcentagem = $totalProcedimentos > 0 ? ($proc['quantidade_executada'] / $totalProcedimentos) * 100 : 0;
                    ?>
                    <tr>
                        <td style="font-weight:600; color:#005b96;"><?= htmlspecialchars($proc['procedimento_nome']) ?></td>
                        <td><?= $proc['quantidade_executada'] ?></td>
                        <td>
                            <span style="font-weight:700; color:<?= $porcentagem > 20 ? '#00b894' : ($porcentagem > 5 ? '#f59e0b' : '#64748b') ?>;">
                                <?= number_format($porcentagem, 2, ',', '.') ?>%
                            </span>
                        </td>
                        <td style="text-align:right; font-weight:700; color:#00b894;">R$ <?= number_format($proc['valor_bruto_total'], 2, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr><td colspan="4" style="text-align:center; padding:32px; color:#94a3b8;">Nenhum procedimento encontrado para o período.</td></tr>
                <?php endif; ?>
            </tbody>
            <?php if (count($procedimentos_relatorio) > 0): ?>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td><?= $totalProcedimentos ?></td>
                    <td>100,00%</td>
                    <td style="text-align:right; color:#00b894;">R$ <?= number_format(array_sum(array_column($procedimentos_relatorio,'valor_bruto_total')),2,',','.') ?></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
</div>