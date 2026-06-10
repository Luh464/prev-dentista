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

<div id="toast-container" class="toast-container"></div>

<h1 class="rel-page-title">Relatórios</h1>

<div class="rel-tabs">
    <a href="<?= BASE_URL ?>?rota=relatorios.diario"        class="rel-tab"><i class="fa fa-calendar"></i> Relatório do Dia</a>
    <?php if (is_admin()): ?>
    <a href="<?= BASE_URL ?>?rota=relatorios"               class="rel-tab"><i class="fa fa-line-chart"></i> Financeiro</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.dentistas"     class="rel-tab"><i class="fa fa-user-md"></i> Por Dentista</a>
    <a href="<?= BASE_URL ?>?rota=relatorios.procedimentos" class="rel-tab"><i class="fa fa-stethoscope"></i> Por Procedimentos</a>
    <?php endif; ?>
    <a href="<?= BASE_URL ?>?rota=relatorios.paciente"      class="rel-tab active"><i class="fa fa-user"></i> Por Paciente</a>
</div>

<!-- Busca paciente -->
<div class="rel-card">
    <div class="rel-card-title"><i class="fa fa-search" style="color:#005b96;"></i> Buscar Paciente</div>
    <div style="position:relative;">
        <div class="rel-busca-wrap">
            <i class="fa fa-search"></i>
            <input type="text" id="busca_pac_rel"
                   value="<?= htmlspecialchars($paciente_nome) ?>"
                   placeholder="Digite o nome do paciente..."
                   autocomplete="off"
                   oninput="buscaPacRel(this.value)">
            <?php if ($paciente_nome): ?>
            <a href="<?= BASE_URL ?>?rota=relatorios.paciente" class="rel-btn-limpar" title="Limpar">&#10005;</a>
            <?php endif; ?>
        </div>
        <ul id="lista_pac_rel"></ul>
    </div>
    <small id="status_pac_rel" style="font-size:0.78rem; color:#64748b; margin-top:6px; display:block;">
        <?php if ($paciente_nome && $paciente): ?>
            <span style="color:#00b894; font-weight:600;">✓ Exibindo dados de <strong><?= htmlspecialchars($paciente['nome']) ?></strong></span>
        <?php elseif ($paciente_nome): ?>
            Nenhum paciente encontrado com esse nome.
        <?php else: ?>
            Digite o nome do paciente para buscar.
        <?php endif; ?>
    </small>
</div>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'upload_sucesso'): ?>
<div class="cad-alert cad-alert-success" style="background:#e8fdf5;color:#059669;border:1px solid #a7f3d0;padding:12px 16px;border-radius:10px;margin-bottom:16px;"><i class="fa fa-check-circle"></i> Arquivo enviado com sucesso!</div>
<?php elseif (isset($_GET['erro'])): ?>
<div class="cad-alert cad-alert-error" style="background:#fef2f2;color:#dc2626;border:1px solid #fecaca;padding:12px 16px;border-radius:10px;margin-bottom:16px;"><i class="fa fa-exclamation-circle"></i> <?= htmlspecialchars($_GET['erro']) ?></div>
<?php endif; ?>

<?php if ($paciente): ?>

<!-- Odontograma -->
<div class="rel-card" style="text-align:center;">
    <div class="rel-card-title" style="justify-content:center;">🦷 Odontograma de <?= htmlspecialchars($paciente['nome']) ?></div>
    <div class="canvas-container">
        <img src="<?= BASE_URL ?>assets/img/odontograma.png" usemap="#image-map" class="img-odontograma" id="odontograma-img">
        <svg class="odontograma-overlay" id="odontograma-svg"></svg>
        <map name="image-map" id="image-map">
            <area data-dente="18" onclick="abrirModal(18,'Arcada Superior')" alt="18" coords="53,251,99,157" shape="rect">
            <area data-dente="17" onclick="abrirModal(17,'Arcada Superior')" alt="17" coords="147,156,103,249" shape="rect">
            <area data-dente="16" onclick="abrirModal(16,'Arcada Superior')" alt="16" coords="207,155,151,246" shape="rect">
            <area data-dente="15" onclick="abrirModal(15,'Arcada Superior')" alt="15" coords="241,152,209,242" shape="rect">
            <area data-dente="14" onclick="abrirModal(14,'Arcada Superior')" alt="14" coords="274,149,246,241" shape="rect">
            <area data-dente="13" onclick="abrirModal(13,'Arcada Superior')" alt="13" coords="314,148,277,238" shape="rect">
            <area data-dente="12" onclick="abrirModal(12,'Arcada Superior')" alt="12" coords="352,152,317,243" shape="rect">
            <area data-dente="11" onclick="abrirModal(11,'Arcada Superior')" alt="11" coords="397,153,355,246" shape="rect">
            <area data-dente="21" onclick="abrirModal(21,'Arcada Superior')" alt="21" coords="442,154,403,244" shape="rect">
            <area data-dente="22" onclick="abrirModal(22,'Arcada Superior')" alt="22" coords="479,153,446,243" shape="rect">
            <area data-dente="23" onclick="abrirModal(23,'Arcada Superior')" alt="23" coords="521,142,481,243" shape="rect">
            <area data-dente="24" onclick="abrirModal(24,'Arcada Superior')" alt="24" coords="561,146,525,239" shape="rect">
            <area data-dente="25" onclick="abrirModal(25,'Arcada Superior')" alt="25" coords="590,146,564,237" shape="rect">
            <area data-dente="26" onclick="abrirModal(26,'Arcada Superior')" alt="26" coords="648,148,593,238" shape="rect">
            <area data-dente="27" onclick="abrirModal(27,'Arcada Superior')" alt="27" coords="703,151,653,239" shape="rect">
            <area data-dente="28" onclick="abrirModal(28,'Arcada Superior')" alt="28" coords="741,149,705,241" shape="rect">
            <area data-dente="48" onclick="abrirModal(48,'Arcada Inferior')" alt="48" coords="51,285,103,360" shape="rect">
            <area data-dente="47" onclick="abrirModal(47,'Arcada Inferior')" alt="47" coords="109,284,160,363" shape="rect">
            <area data-dente="46" onclick="abrirModal(46,'Arcada Inferior')" alt="46" coords="167,281,219,363" shape="rect">
            <area data-dente="45" onclick="abrirModal(45,'Arcada Inferior')" alt="45" coords="221,278,258,378" shape="rect">
            <area data-dente="44" onclick="abrirModal(44,'Arcada Inferior')" alt="44" coords="260,275,296,390" shape="rect">
            <area data-dente="43" onclick="abrirModal(43,'Arcada Inferior')" alt="43" coords="298,276,336,384" shape="rect">
            <area data-dente="42" onclick="abrirModal(42,'Arcada Inferior')" alt="42" coords="338,275,368,384" shape="rect">
            <area data-dente="41" onclick="abrirModal(41,'Arcada Inferior')" alt="41" coords="370,276,395,383" shape="rect">
            <area data-dente="31" onclick="abrirModal(31,'Arcada Inferior')" alt="31" coords="398,275,426,380" shape="rect">
            <area data-dente="32" onclick="abrirModal(32,'Arcada Inferior')" alt="32" coords="428,275,454,382" shape="rect">
            <area data-dente="33" onclick="abrirModal(33,'Arcada Inferior')" alt="33" coords="456,274,493,391" shape="rect">
            <area data-dente="34" onclick="abrirModal(34,'Arcada Inferior')" alt="34" coords="496,274,531,383" shape="rect">
            <area data-dente="35" onclick="abrirModal(35,'Arcada Inferior')" alt="35" coords="534,274,571,379" shape="rect">
            <area data-dente="36" onclick="abrirModal(36,'Arcada Inferior')" alt="36" coords="575,274,636,384" shape="rect">
            <area data-dente="37" onclick="abrirModal(37,'Arcada Inferior')" alt="37" coords="640,274,688,384" shape="rect">
            <area data-dente="38" onclick="abrirModal(38,'Arcada Inferior')" alt="38" coords="694,272,742,375" shape="rect">
            <area data-dente="Todos" onclick="abrirModal('Todos','Geral')" alt="Todos" coords="85,31,727,83" shape="rect">
            <area data-dente="Todos" onclick="abrirModal('Todos','Geral')" alt="Todos" coords="72,449,727,498" shape="rect">
        </map>
    </div>
</div>

<!-- Histórico -->
<div class="rel-card">
    <div class="rel-card-title"><i class="fa fa-history" style="color:#005b96;"></i> Histórico de Procedimentos</div>

    <?php if (empty($procedimentos)): ?>
        <p style="text-align:center; color:#94a3b8; padding:24px 0;">Nenhum procedimento encontrado para este paciente.</p>
    <?php else: ?>

        <?php if (!empty($procedimentos_todos)): ?>
        <div style="margin-bottom:20px;">
            <div style="font-size:0.82rem; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#005b96; margin-bottom:12px; padding-left:4px; border-left:3px solid #005b96; padding-left:10px;">Tratamentos Gerais (Todos)</div>
            <?php foreach($procedimentos_todos as $proc): ?>
            <div class="rel-proc-card">
                <div class="rel-proc-grid">
                    <div class="rel-proc-item"><label>Data</label><span><?= date('d/m/Y H:i', strtotime($proc['data_atendimento'])) ?></span></div>
                    <div class="rel-proc-item"><label>Procedimento</label><span style="font-weight:600;"><?= htmlspecialchars($proc['procedimento_nome']) ?></span></div>
                    <div class="rel-proc-item"><label>Descrição</label><span><?= htmlspecialchars($proc['descricao'] ?: 'N/A') ?></span></div>
                    <div class="rel-proc-item">
                        <label>Status Execução</label>
                        <span class="rel-status-badge rel-status-<?= strtolower($proc['status_execucao']) ?>"><?= ucfirst($proc['status_execucao']) ?></span>
                    </div>
                    <div class="rel-proc-item">
                        <label>Status Pagamento</label>
                        <span class="rel-status-badge rel-status-<?= strtolower($proc['status_pagamento']) ?>"><?= ucfirst($proc['status_pagamento']) ?></span>
                    </div>
                </div>
                <div class="rel-proc-actions">
                    <?php if (!empty($proc['url_arquivo'])): ?>
                        <a href="<?= BASE_URL . htmlspecialchars($proc['url_arquivo']) ?>" target="_blank" class="rel-btn-action rel-btn-info"><i class="fa fa-eye"></i> Visualizar</a>
                        <a href="<?= BASE_URL . htmlspecialchars($proc['url_arquivo']) ?>" download class="rel-btn-action rel-btn-down"><i class="fa fa-download"></i> Baixar</a>
                        <button type="button" class="rel-btn-action rel-btn-danger btn-remover-anexo" data-id-procedimento="<?= $proc['atendimento_procedimento_id'] ?>"><i class="fa fa-times"></i> Remover Arquivo</button>
                    <?php else: ?>
                        <button type="button" class="rel-btn-action rel-btn-primary" onclick="abrirModalUpload(<?= $proc['atendimento_procedimento_id'] ?>)"><i class="fa fa-paperclip"></i> Anexar Arquivo</button>
                    <?php endif; ?>
                    <button type="button" class="rel-btn-action rel-btn-danger rel-btn-remove-proc btn-remover-procedimento"
                            data-id-procedimento="<?= $proc['atendimento_procedimento_id'] ?>"
                            data-status-execucao="<?= htmlspecialchars($proc['status_execucao']) ?>"
                            data-status-pagamento="<?= htmlspecialchars($proc['status_pagamento']) ?>">
                        <i class="fa fa-trash"></i> Remover Procedimento
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php foreach($procedimentos_agrupados as $local => $procs_dente): ?>
        <div style="margin-bottom:20px;">
            <div style="font-size:0.82rem; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#00b894; margin-bottom:12px; border-left:3px solid #00b894; padding-left:10px;">Dente <?= htmlspecialchars($local) ?></div>
            <?php foreach($procs_dente as $proc): ?>
            <div class="rel-proc-card">
                <div class="rel-proc-grid">
                    <div class="rel-proc-item"><label>Data</label><span><?= date('d/m/Y H:i', strtotime($proc['data_atendimento'])) ?></span></div>
                    <div class="rel-proc-item"><label>Procedimento</label><span style="font-weight:600;"><?= htmlspecialchars($proc['procedimento_nome']) ?></span></div>
                    <div class="rel-proc-item"><label>Descrição</label><span><?= htmlspecialchars($proc['descricao'] ?: 'N/A') ?></span></div>
                    <div class="rel-proc-item">
                        <label>Status Execução</label>
                        <span class="rel-status-badge rel-status-<?= strtolower($proc['status_execucao']) ?>"><?= ucfirst($proc['status_execucao']) ?></span>
                    </div>
                    <div class="rel-proc-item">
                        <label>Status Pagamento</label>
                        <span class="rel-status-badge rel-status-<?= strtolower($proc['status_pagamento']) ?>"><?= ucfirst($proc['status_pagamento']) ?></span>
                    </div>
                </div>
                <div class="rel-proc-actions">
                    <?php if (!empty($proc['url_arquivo'])): ?>
                        <a href="<?= BASE_URL . htmlspecialchars($proc['url_arquivo']) ?>" target="_blank" class="rel-btn-action rel-btn-info"><i class="fa fa-eye"></i> Visualizar</a>
                        <a href="<?= BASE_URL . htmlspecialchars($proc['url_arquivo']) ?>" download class="rel-btn-action rel-btn-down"><i class="fa fa-download"></i> Baixar</a>
                        <button type="button" class="rel-btn-action rel-btn-danger btn-remover-anexo" data-id-procedimento="<?= $proc['atendimento_procedimento_id'] ?>"><i class="fa fa-times"></i> Remover Arquivo</button>
                    <?php else: ?>
                        <button type="button" class="rel-btn-action rel-btn-primary" onclick="abrirModalUpload(<?= $proc['atendimento_procedimento_id'] ?>)"><i class="fa fa-paperclip"></i> Anexar Arquivo</button>
                    <?php endif; ?>
                    <button type="button" class="rel-btn-action rel-btn-danger rel-btn-remove-proc btn-remover-procedimento"
                            data-id-procedimento="<?= $proc['atendimento_procedimento_id'] ?>"
                            data-status-execucao="<?= htmlspecialchars($proc['status_execucao']) ?>"
                            data-status-pagamento="<?= htmlspecialchars($proc['status_pagamento']) ?>">
                        <i class="fa fa-trash"></i> Remover Procedimento
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>

    <?php endif; ?>

    <?php if ($totalPaginas > 1): ?>
    <div class="rel-paginacao">
        <?php for ($i=1;$i<=$totalPaginas;$i++): $q=$_GET; $q['pagina']=$i; ?>
        <a href="?<?= http_build_query($q) ?>" class="<?= $i===$pagina?'ativo':'' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>

<?php elseif (isset($_GET['paciente_nome'])): ?>
<div class="rel-card" style="text-align:center; color:#94a3b8; padding:32px;">
    Nenhum paciente encontrado com o nome "<?= htmlspecialchars($paciente_nome) ?>".
</div>
<?php endif; ?>

<!-- Modais -->
<div id="modalTratamento" class="rel-modal">
    <div class="rel-modal-box">
        <div class="rel-modal-header">
            <h3 id="modal-title"></h3>
            <button class="rel-modal-close" onclick="fecharModal()">&#10005;</button>
        </div>
        <div class="rel-modal-body" id="modal-body"></div>
        <div class="rel-modal-footer">
            <button class="rel-modal-btn-close" onclick="fecharModal()"><i class="fa fa-times"></i> Fechar</button>
        </div>
    </div>
</div>

<div id="modalUpload" class="rel-modal">
    <div class="rel-modal-box" style="max-width:420px;">
        <div class="rel-modal-header">
            <h3>Anexar Arquivo</h3>
            <button class="rel-modal-close" onclick="fecharModalUpload()">&#10005;</button>
        </div>
        <form id="form-upload-arquivo" action="<?= BASE_URL ?>?rota=atendimentos.salvarArq" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="atendimento_procedimento_id" id="upload_atendimento_procedimento_id">
            <input type="hidden" name="paciente_nome_redirect" value="<?= htmlspecialchars($paciente_nome) ?>">
            <div style="margin:16px 0;">
                <label class="rel-field-label">Selecione o arquivo (PDF, JPG, PNG)</label>
                <input type="file" name="arquivo_procedimento" id="arquivo_procedimento" accept=".pdf,image/jpeg,image/png" required class="rel-field-input" style="width:100%;padding:8px;">
            </div>
            <div class="rel-modal-footer">
                <button type="button" class="rel-modal-btn-close" onclick="fecharModalUpload()">Cancelar</button>
                <button type="submit" class="rel-modal-btn-save"><i class="fa fa-upload"></i> Enviar</button>
            </div>
        </form>
    </div>
</div>

<div id="modalConfirm" class="rel-modal">
    <div class="rel-modal-box" style="max-width:380px; text-align:center;">
        <div class="rel-modal-header" style="justify-content:center; border-bottom:none;">
            <h3 id="confirm-title">Confirmação</h3>
        </div>
        <p id="confirm-message" style="color:#64748b; margin:8px 0 20px;"></p>
        <div class="rel-modal-footer" style="justify-content:center;">
            <button class="rel-modal-btn-close" onclick="fecharModalConfirm()">Cancelar</button>
            <button id="btn-confirm-yes" class="rel-modal-btn-danger">Sim, confirmar</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>
<script>
const modal = document.getElementById('modalTratamento');
const modalUpload = document.getElementById('modalUpload');
const modalConfirm = document.getElementById('modalConfirm');

<?php if ($paciente): ?>
const procedimentosPorLocal = <?= json_encode($procedimentos_agrupados ?? []) ?>;
procedimentosPorLocal['Todos'] = <?= json_encode($procedimentos_todos ?? []) ?>;
const denteStatus = <?= json_encode($dente_status_color ?? []) ?>;
<?php endif; ?>

function formatStatus(s) { if(!s) return 'N/A'; return s.replace(/_/g,' ').replace(/\b\w/g,l=>l.toUpperCase()); }

function abrirModal(numero, arcada) {
    modal.classList.add('show');
    document.getElementById('modal-title').innerText = arcada==='Geral' ? 'Tratamentos Gerais' : arcada+' - Dente '+numero;
    const body = document.getElementById('modal-body'); body.innerHTML='';
    if (typeof procedimentosPorLocal==='undefined') { body.innerHTML='<p>Nenhum paciente selecionado.</p>'; return; }
    const procs = procedimentosPorLocal[numero]||[];
    if (!procs.length) { body.innerHTML='<p style="color:#94a3b8;">Nenhum procedimento registrado.</p>'; return; }
    procs.forEach(proc => {
        const d = new Date(proc.data_atendimento);
        body.innerHTML += `<div class="rel-proc-card">
            <div class="rel-proc-grid">
                <div class="rel-proc-item"><label>Data</label><span>${d.toLocaleDateString('pt-BR')} ${d.toLocaleTimeString('pt-BR',{hour:'2-digit',minute:'2-digit'})}</span></div>
                <div class="rel-proc-item"><label>Procedimento</label><span style="font-weight:600;">${proc.procedimento_nome||''}</span></div>
                <div class="rel-proc-item"><label>Descrição</label><span>${proc.descricao||'N/A'}</span></div>
                <div class="rel-proc-item"><label>Execução</label><span class="rel-status-badge rel-status-${proc.status_execucao.toLowerCase()}">${formatStatus(proc.status_execucao)}</span></div>
                <div class="rel-proc-item"><label>Pagamento</label><span class="rel-status-badge rel-status-${proc.status_pagamento.toLowerCase()}">${formatStatus(proc.status_pagamento)}</span></div>
            </div>
        </div>`;
    });
}
function fecharModal() { modal.classList.remove('show'); }
function abrirModalUpload(id) { document.getElementById('upload_atendimento_procedimento_id').value=id; modalUpload.classList.add('show'); }
function fecharModalUpload() { modalUpload.classList.remove('show'); }
function fecharModalConfirm() { modalConfirm.classList.remove('show'); }

function showToast(msg, type='success') {
    const c = document.getElementById('toast-container');
    const t = document.createElement('div'); t.className='toast '+type; t.innerText=msg;
    c.appendChild(t); void t.offsetWidth; t.classList.add('show');
    setTimeout(()=>{ t.classList.remove('show'); setTimeout(()=>t.remove(),300); },3000);
}

let confirmCb=null;
function showConfirm(title,msg,cb) {
    document.getElementById('confirm-title').innerText=title;
    document.getElementById('confirm-message').innerText=msg;
    confirmCb=cb; modalConfirm.classList.add('show');
}
document.getElementById('btn-confirm-yes').addEventListener('click',()=>{ if(confirmCb) confirmCb(); fecharModalConfirm(); });
window.onclick = e => { if(e.target==modal) fecharModal(); if(e.target==modalUpload) fecharModalUpload(); if(e.target==modalConfirm) fecharModalConfirm(); };

// Odontograma
function initOdontograma() {
    const img=document.getElementById('odontograma-img'), svg=document.getElementById('odontograma-svg'), map=document.getElementById('image-map');
    if (!img||!svg||!map) return;
    const setup=()=>{ svg.setAttribute('viewBox',`0 0 ${img.naturalWidth} ${img.naturalHeight}`); for(let a of map.getElementsByTagName('area')) if(!a.dataset.originalCoords) a.dataset.originalCoords=a.getAttribute('coords'); imageMapResize(); drawHighlights(); };
    if(img.complete) setup(); else img.onload=setup;
}
function drawHighlights() {
    const svg=document.getElementById('odontograma-svg'), map=document.getElementById('image-map');
    svg.innerHTML='';
    if(typeof denteStatus==='undefined') return;
    const colors={red:'rgba(220,53,69,0.5)',green:'rgba(40,167,69,0.5)',yellow:'rgba(255,193,7,0.5)'};
    for(const local in denteStatus) {
        const color=denteStatus[local];
        map.querySelectorAll(`area[data-dente="${local}"]`).forEach(area=>{
            const raw=area.dataset.originalCoords; if(!raw) return;
            const c=raw.split(',').map(Number);
            const rect=document.createElementNS('http://www.w3.org/2000/svg','rect');
            rect.setAttribute('x',Math.min(c[0],c[2])); rect.setAttribute('y',Math.min(c[1],c[3]));
            rect.setAttribute('width',Math.abs(c[2]-c[0])); rect.setAttribute('height',Math.abs(c[3]-c[1]));
            rect.setAttribute('fill',colors[color]); svg.appendChild(rect);
        });
    }
}

document.addEventListener('DOMContentLoaded',()=>{
    <?php if ($paciente): ?> initOdontograma(); <?php endif; ?>
    document.body.addEventListener('click',e=>{
        if(e.target.classList.contains('btn-remover-anexo')) {
            const btn=e.target, id=btn.dataset.idProcedimento, cont=btn.closest('.rel-proc-actions');
            showConfirm('Remover Anexo','Deseja apagar este arquivo?',()=>{
                fetch(window.__BASE_URL+'?rota=atendimentos.remAnexo',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'id_procedimento='+encodeURIComponent(id)})
                .then(r=>r.json()).then(d=>{ if(d.status==='success'){showToast(d.message,'success'); cont.innerHTML=`<button type="button" class="rel-btn-action rel-btn-primary" onclick="abrirModalUpload(${id})"><i class="fa fa-paperclip"></i> Anexar Arquivo</button>`;}else showToast('Erro: '+d.message,'error'); }).catch(()=>showToast('Erro de comunicação.','error'));
            });
        }
        if(e.target.classList.contains('btn-remover-procedimento')) {
            const btn=e.target, id=btn.dataset.idProcedimento, se=btn.dataset.statusExecucao, sp=btn.dataset.statusPagamento, card=btn.closest('.rel-proc-card');
            if(se.toLowerCase()==='pendente'&&sp.toLowerCase()==='nao_aplicavel') {
                showConfirm('Remover Procedimento','Deseja remover este procedimento?',()=>{
                    fetch(window.__BASE_URL+'?rota=atendimentos.remProc',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:'id_procedimento='+encodeURIComponent(id)})
                    .then(r=>r.json()).then(d=>{ if(d.status==='success'){showToast(d.message,'success');card.remove();}else showToast('Erro: '+d.message,'error'); }).catch(()=>showToast('Erro de comunicação.','error'));
                });
            } else { showToast('Sem autorização para remover este procedimento.','error'); }
        }
    });
});

// Busca paciente
(function(){
    var _t=null;
    window.buscaPacRel=function(term){
        var lista=document.getElementById('lista_pac_rel'), status=document.getElementById('status_pac_rel');
        clearTimeout(_t); lista.innerHTML=''; lista.style.display='none';
        if(!term){status.innerHTML='Digite o nome do paciente para buscar.';return;}
        status.innerHTML='Buscando...';
        _t=setTimeout(()=>{
            fetch(window.__BASE_URL+'ajax/buscar_paciente.php?term='+encodeURIComponent(term))
            .then(r=>r.json()).then(data=>{
                lista.innerHTML='';
                if(!data.length){status.innerHTML='Nenhum paciente encontrado.';return;}
                data.forEach(p=>{
                    var li=document.createElement('li');
                    li.style.cssText='padding:10px 14px;cursor:pointer;border-bottom:1px solid #f1f5f9;font-size:14px;list-style:none;';
                    li.innerHTML='<strong>'+(p.nome||'').replace(/</g,'&lt;')+'</strong>'+(p.cpf?'<span style="color:#94a3b8;font-size:12px;"> · '+p.cpf+'</span>':'');
                    li.onmouseover=()=>li.style.background='#eff6ff'; li.onmouseout=()=>li.style.background='';
                    li.onmousedown=e=>{e.preventDefault();lista.style.display='none';window.location.href=window.__BASE_URL+'?rota=relatorios.paciente&paciente_nome='+encodeURIComponent(p.nome);};
                    lista.appendChild(li);
                });
                lista.style.display='block';
                status.innerHTML=data.length+' resultado(s). Clique para ver o relatório.';
            }).catch(()=>{status.innerHTML='Erro de comunicação.';});
        },250);
    };
    document.addEventListener('click',e=>{
        var lista=document.getElementById('lista_pac_rel'),campo=document.getElementById('busca_pac_rel');
        if(lista&&campo&&!campo.contains(e.target)) lista.style.display='none';
    });
})();
</script>