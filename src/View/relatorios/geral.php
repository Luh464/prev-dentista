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
    <a href="<?= BASE_URL ?>?rota=relatorios"               class="rel-tab active"><i class="fa fa-line-chart"></i> Financeiro</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.dentistas"     class="rel-tab"><i class="fa fa-user-md"></i> Por Dentista</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.procedimentos" class="rel-tab"><i class="fa fa-stethoscope"></i> Por Procedimentos</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.paciente"      class="rel-tab"><i class="fa fa-user"></i> Por Paciente</a>
</div>

<!-- Filtro -->
<div class="rel-card">
    <form method="GET" action="<?= BASE_URL ?>index.php">
        <input type="hidden" name="rota" value="relatorios">
        <div class="rel-filter-row">
            <div>
                <label class="rel-field-label">Data Início</label>
                <input type="date" name="inicio" class="rel-field-input" value="<?= $data_inicio ?>">
            </div>
            <div>
                <label class="rel-field-label">Data Fim</label>
                <input type="date" name="fim" class="rel-field-input" value="<?= $data_fim ?>">
            </div>
            <button type="submit" class="rel-btn-filter"><i class="fa fa-filter"></i> Filtrar</button>
        </div>
    </form>
</div>

<!-- Stats -->
<div class="rel-stats-grid">
    <div class="rel-stat azul">
        <div class="rel-stat-label">Faturamento Bruto</div>
        <div class="rel-stat-value">R$ <?= number_format($financas['bruto'] ?? 0, 2, ',', '.') ?></div>
    </div>
    <div class="rel-stat vermelho">
        <div class="rel-stat-label">Total Despesas</div>
        <div class="rel-stat-value vermelho">R$ <?= number_format($despesas ?? 0, 2, ',', '.') ?></div>
    </div>
    <div class="rel-stat verde">
        <div class="rel-stat-label">Lucro Líquido</div>
        <div class="rel-stat-value verde">R$ <?= number_format(($financas['liquido'] ?? 0) - ($despesas ?? 0), 2, ',', '.') ?></div>
    </div>
</div>

<!-- Botões gráfico -->
<div class="rel-chart-btns">
    <button id="btnEvolucao" class="rel-chart-btn active"><i class="fa fa-line-chart"></i> Ver Evolução Financeira</button>
    <button id="btnPagamentos" class="rel-chart-btn"><i class="fa fa-pie-chart"></i> Ver Distribuição de Pagamentos</button>
</div>

<div class="rel-card" id="chart-evolucao-container">
    <div class="rel-card-title"><i class="fa fa-line-chart" style="color:#005b96;"></i> Evolução Financeira</div>
    <canvas id="evolucaoFinanceiraChart" style="max-height:400px;"></canvas>
</div>

<div class="rel-card" id="chart-pagamentos-container" style="display:none;">
    <div class="rel-card-title"><i class="fa fa-pie-chart" style="color:#005b96;"></i> Distribuição de Pagamentos</div>
    <canvas id="pagamentosChart" style="max-height:400px;"></canvas>
</div>

<!-- Tabela atendimentos -->
<div class="rel-card">
    <div class="rel-card-title"><i class="fa fa-list" style="color:#005b96;"></i> Detalhes de Atendimentos</div>
    <div class="rel-table-wrap">
        <table class="rel-table">
            <thead><tr><th>Data</th><th>Paciente</th><th>Procedimento</th><th>Valor Bruto</th><th style="text-align:right;">Valor Líquido</th></tr></thead>
            <tbody>
                <?php foreach($atendimentos as $at): ?>
                <tr>
                    <td style="color:#64748b;white-space:nowrap;"><?= date('d/m/Y', strtotime($at['data_atendimento'])) ?></td>
                    <td style="font-weight:600;"><?= htmlspecialchars($at['paciente_nome']) ?></td>
                    <td style="color:#4b5563;"><?= htmlspecialchars($at['procedimento'] ?? '') ?></td>
                    <td>R$ <?= number_format($at['valor_bruto'], 2, ',', '.') ?></td>
                    <td style="text-align:right; font-weight:700; color:#00b894;">R$ <?= number_format($at['valor_liquido_clinica'], 2, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if ($paginasAt > 1): ?>
    <div class="rel-paginacao">
        <?php for ($i=1;$i<=$paginasAt;$i++): $q=$_GET; $q['pagina_at']=$i; ?>
        <a href="?<?= http_build_query($q) ?>" class="<?= $i===$pagina_at?'ativo':'' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>

<!-- Tabela despesas -->
<div class="rel-card">
    <div class="rel-card-title"><i class="fa fa-money" style="color:#e74c3c;"></i> Detalhes de Despesas</div>
    <div class="rel-table-wrap">
        <table class="rel-table">
            <thead><tr><th>Data</th><th>Descrição</th><th>Tipo</th><th style="text-align:right;">Valor</th></tr></thead>
            <tbody>
                <?php foreach($listaDespesas as $dp): ?>
                <tr>
                    <td style="color:#64748b;white-space:nowrap;"><?= date('d/m/Y', strtotime($dp['data_despesa'])) ?></td>
                    <td style="font-weight:600;"><?= htmlspecialchars($dp['descricao']) ?></td>
                    <td><span style="background:#fef3c7;color:#b45309;padding:2px 8px;border-radius:20px;font-size:0.72rem;font-weight:700;"><?= ucfirst($dp['tipo']) ?></span></td>
                    <td style="text-align:right; font-weight:600; color:#e74c3c;">R$ <?= number_format($dp['valor'], 2, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php if ($paginasDe > 1): ?>
    <div class="rel-paginacao">
        <?php for ($i=1;$i<=$paginasDe;$i++): $q=$_GET; $q['pagina_de']=$i; ?>
        <a href="?<?= http_build_query($q) ?>" class="<?= $i===$pagina_de?'ativo':'' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btnEvolucao = document.getElementById('btnEvolucao');
    const btnPagamentos = document.getElementById('btnPagamentos');
    const evolucaoContainer = document.getElementById('chart-evolucao-container');
    const pagamentosContainer = document.getElementById('chart-pagamentos-container');

    btnEvolucao.addEventListener('click', () => {
        evolucaoContainer.style.display='block'; pagamentosContainer.style.display='none';
        btnEvolucao.classList.add('active'); btnPagamentos.classList.remove('active');
    });
    btnPagamentos.addEventListener('click', () => {
        evolucaoContainer.style.display='none'; pagamentosContainer.style.display='block';
        btnPagamentos.classList.add('active'); btnEvolucao.classList.remove('active');
    });

    const ctx = document.getElementById('evolucaoFinanceiraChart').getContext('2d');
    new Chart(ctx, {
        type:'line',
        data:{
            labels: <?= json_encode($labels) ?>,
            datasets:[
                { label:'Faturamento Bruto', data:<?= json_encode($faturamentoData) ?>, borderColor:'rgba(54,162,235,1)', backgroundColor:'rgba(54,162,235,0.15)', fill:true, tension:0.4 },
                { label:'Despesas', data:<?= json_encode($despesaData) ?>, borderColor:'rgba(255,99,132,1)', backgroundColor:'rgba(255,99,132,0.15)', fill:true, tension:0.4 },
                { label:'Lucro Líquido', data:<?= json_encode($lucroLiquidoData) ?>, borderColor:'rgba(75,192,192,1)', backgroundColor:'rgba(75,192,192,0.15)', fill:true, tension:0.4 }
            ]
        },
        options:{ responsive:true, scales:{ y:{ beginAtZero:true, ticks:{ callback:v=>'R$ '+v.toLocaleString('pt-BR') } } }, plugins:{ tooltip:{ callbacks:{ label:c=>c.dataset.label+': '+new Intl.NumberFormat('pt-BR',{style:'currency',currency:'BRL'}).format(c.parsed.y) } } } }
    });

    <?php if (!empty($pagamentoData)): ?>
    const ctxP = document.getElementById('pagamentosChart').getContext('2d');
    new Chart(ctxP, {
        type:'pie',
        data:{ labels:<?= json_encode($pagamentoLabels) ?>, datasets:[{ data:<?= json_encode($pagamentoData) ?>, backgroundColor:['rgba(255,99,132,0.7)','rgba(54,162,235,0.7)','rgba(255,206,86,0.7)','rgba(75,192,192,0.7)','rgba(153,102,255,0.7)','rgba(255,159,64,0.7)'], borderColor:'#fff', borderWidth:2 }] },
        options:{ responsive:true, maintainAspectRatio:false, plugins:{ legend:{position:'bottom'}, tooltip:{ callbacks:{ label:c=>c.label+': '+new Intl.NumberFormat('pt-BR',{style:'currency',currency:'BRL'}).format(c.parsed) } } } }
    });
    <?php endif; ?>
});
</script>