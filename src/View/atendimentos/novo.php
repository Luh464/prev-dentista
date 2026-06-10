<div id="toast-notification" class="toast"></div>

<style>
    /* =====================================================
       NOVO ATENDIMENTO — Layout estilo protótipo
    ===================================================== */

    .atend-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 0 40px;
    }

    /* Cabeçalho da página */
    .atend-page-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
    }

    .atend-back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 50%;
        color: #374151;
        text-decoration: none;
        font-size: 18px;
        transition: all 0.2s;
        flex-shrink: 0;
        box-shadow: 0 1px 4px rgba(0,0,0,0.06);
    }

    .atend-back-btn:hover { background: #005b96; color: #fff; border-color: #005b96; }

    .atend-page-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0f172a;
        margin: 0;
    }

    .atend-page-header p {
        font-size: 0.85rem;
        color: #94a3b8;
        margin: 2px 0 0;
    }

    /* Layout principal: conteúdo + sidebar */
    .atend-layout {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 24px;
        align-items: start;
    }

    /* Cards */
    .atend-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid #f0f4f8;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 24px;
        margin-bottom: 20px;
    }

    .atend-card:last-child { margin-bottom: 0; }

    .atend-card-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 20px;
    }

    .atend-card-title span { font-size: 18px; }

    /* Labels e inputs */
    .atend-field { margin-bottom: 16px; }
    .atend-field:last-child { margin-bottom: 0; }

    .atend-label {
        display: block;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #64748b;
        margin-bottom: 6px;
    }

    .atend-input-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 14px;
        transition: border-color 0.2s, background 0.2s;
    }

    .atend-input-wrap:focus-within {
        border-color: #005b96;
        background: #fff;
    }

    .atend-input-wrap i { font-size: 15px; color: #94a3b8; }

    .atend-input-wrap input,
    .atend-input-wrap select {
        flex: 1;
        border: none;
        background: none;
        outline: none;
        font-size: 0.9rem;
        color: #374151;
        font-family: inherit;
    }

    .atend-input-plain {
        width: 100%;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 0.9rem;
        color: #374151;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    .atend-input-plain:focus { border-color: #005b96; background: #fff; }

    .atend-fields-row {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 16px;
    }

    /* Badge paciente selecionado */
    .paciente-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #e8fdf5;
        color: #059669;
        border-radius: 20px;
        padding: 3px 10px;
        font-size: 0.75rem;
        font-weight: 700;
        margin-left: 8px;
    }

    .btn-limpar-paciente {
        background: none;
        border: none;
        color: #94a3b8;
        cursor: pointer;
        font-size: 16px;
        padding: 0;
        line-height: 1;
        transition: color 0.15s;
    }

    .btn-limpar-paciente:hover { color: #ef4444; }

    /* Lista dropdown pacientes */
    #lista_pacientes {
        display: none;
        position: absolute;
        top: calc(100% + 4px);
        left: 0; right: 0;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        max-height: 220px;
        overflow-y: auto;
        z-index: 99999;
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        padding: 4px 0;
    }

    /* Odontograma */
    .odonto-wrap {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
    }

    .odonto-legend {
        display: flex;
        gap: 16px;
        justify-content: center;
        margin-top: 10px;
        font-size: 0.78rem;
        color: #64748b;
    }

    .odonto-legend span { display: flex; align-items: center; gap: 5px; }

    .odonto-legend .dot {
        width: 10px; height: 10px;
        border-radius: 50%;
        display: inline-block;
    }

    .dot-saudavel { background: #d1d5db; }
    .dot-tratado  { background: #005b96; }

    /* Catálogo de procedimentos */
    .catalogo-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
    }

    .catalogo-label {
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #64748b;
    }

    .btn-add-proc {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        border: 1.5px dashed #cbd5e1;
        border-radius: 8px;
        padding: 7px 14px;
        font-size: 0.82rem;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s;
    }

    .btn-add-proc:hover { border-color: #005b96; color: #005b96; background: #eef4fb; }

    /* Catálogo lista */
    .catalogo-list {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 16px;
    }

    .catalogo-list-header {
        padding: 10px 16px;
        background: #f1f5f9;
        border-bottom: 1px solid #e2e8f0;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
    }

    .catalogo-item {
        display: flex;
        align-items: center;
        padding: 11px 16px;
        border-bottom: 1px solid #f1f5f9;
        cursor: pointer;
        transition: background 0.15s;
        gap: 12px;
    }

    .catalogo-item:last-child { border-bottom: none; }
    .catalogo-item:hover { background: #eff6ff; }

    .catalogo-item input[type="checkbox"] {
        accent-color: #005b96;
        width: 16px; height: 16px;
        flex-shrink: 0;
        cursor: pointer;
    }

    .catalogo-item-nome {
        flex: 1;
        font-size: 0.875rem;
        color: #374151;
    }

    .catalogo-item-local {
        font-size: 0.75rem;
        color: #94a3b8;
        min-width: 40px;
    }

    .catalogo-item-valor {
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        min-width: 80px;
        text-align: right;
    }

    /* Tabela de procedimentos adicionados */
    .procs-table-wrap {
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .procs-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
    }

    .procs-table th {
        background: #f8fafc;
        padding: 10px 14px;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    .procs-table td {
        padding: 12px 14px;
        border-bottom: 1px solid #f1f5f9;
        color: #374151;
        vertical-align: middle;
    }

    .procs-table tr:last-child td { border-bottom: none; }

    .procs-table .btn-remover {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px; height: 28px;
        background: #fef2f2;
        border: none;
        border-radius: 6px;
        color: #ef4444;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.2s;
    }

    .procs-table .btn-remover:hover { background: #ef4444; color: #fff; }

    .procs-table-empty {
        text-align: center;
        padding: 24px;
        color: #94a3b8;
        font-size: 0.875rem;
    }

    /* Pendentes */
    .pendente-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 16px;
        background: #fffbeb;
        border: 1px solid #fde68a;
        border-radius: 10px;
        margin-bottom: 8px;
    }

    .pendente-item-info { font-size: 0.85rem; color: #374151; }
    .pendente-item-info strong { color: #0f172a; }

    .btn-finalizar-pendente {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #00b894;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 7px 14px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        white-space: nowrap;
        transition: background 0.2s;
    }

    .btn-finalizar-pendente:hover { background: #019e7f; }

    /* SIDEBAR — Resumo */
    .atend-sidebar {
        position: sticky;
        top: 90px;
    }

    .resumo-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid #f0f4f8;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .resumo-header {
        padding: 18px 20px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
        font-weight: 700;
        color: #0f172a;
    }

    .resumo-dentista-info {
        padding: 12px 20px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.75rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .resumo-paciente-box {
        margin: 12px 16px;
        background: #f8fafc;
        border-radius: 10px;
        padding: 10px 14px;
        display: none;
    }

    .resumo-paciente-box.visible { display: block; }

    .resumo-paciente-label {
        font-size: 0.65rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #94a3b8;
        margin-bottom: 3px;
    }

    .resumo-paciente-nome {
        font-size: 0.9rem;
        font-weight: 700;
        color: #0f172a;
    }

    .resumo-paciente-tel {
        font-size: 0.78rem;
        color: #64748b;
    }

    .resumo-procs-list {
        padding: 12px 20px;
        min-height: 60px;
        border-bottom: 1px solid #f1f5f9;
    }

    .resumo-proc-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 6px 0;
        border-bottom: 1px solid #f8fafc;
        font-size: 0.82rem;
    }

    .resumo-proc-item:last-child { border-bottom: none; }
    .resumo-proc-nome { color: #374151; }
    .resumo-proc-valor { font-weight: 600; color: #0f172a; }

    .resumo-nenhum {
        text-align: center;
        color: #94a3b8;
        font-size: 0.82rem;
        padding: 8px 0;
    }

    .resumo-total-wrap {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .resumo-total-label { font-size: 0.875rem; color: #64748b; }

    .resumo-total-valor {
        font-size: 1.6rem;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.5px;
    }

    .resumo-actions { padding: 16px; display: flex; flex-direction: column; gap: 8px; }

    .btn-alerta-proc {
        width: 100%;
        padding: 11px;
        background: #fef3c7;
        color: #b45309;
        border: 1px solid #fde68a;
        border-radius: 10px;
        font-size: 0.82rem;
        font-weight: 600;
        text-align: center;
        font-family: inherit;
        cursor: default;
    }

    .btn-lancar {
        width: 100%;
        padding: 13px;
        background: #00b894;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        font-family: inherit;
        transition: background 0.2s, opacity 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-lancar:hover { background: #019e7f; }
    .btn-lancar:disabled { opacity: 0.5; cursor: not-allowed; }

    .btn-cancelar-atend {
        width: 100%;
        padding: 11px;
        background: transparent;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s;
        text-align: center;
        text-decoration: none;
        display: block;
    }

    .btn-cancelar-atend:hover { border-color: #ef4444; color: #ef4444; }

    /* Modal */
    .toast { position: fixed; top: 20px; right: 20px; padding: 15px 20px; border-radius: 10px; color: white; font-size: 15px; z-index: 9999; opacity: 0; visibility: hidden; transition: opacity 0.4s, visibility 0.4s, transform 0.4s; transform: translateX(100%); font-family: inherit; }
    .toast.show { opacity: 1; visibility: visible; transform: translateX(0); }
    .toast.error   { background: #ef4444; }
    .toast.success { background: #00b894; }

    .modal { display: none; position: fixed; z-index: 10000; inset: 0; background: rgba(10,25,50,0.5); justify-content: center; align-items: center; backdrop-filter: blur(3px); }
    .modal.show { display: flex; }

    .modal-content {
        background: #fff;
        border-radius: 18px;
        padding: 28px;
        width: 500px;
        max-width: 95vw;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    }

    .modal-content h3 { font-size: 1rem; font-weight: 700; color: #0f172a; margin-bottom: 20px; }

    .modal-proc-row {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 14px;
        margin-bottom: 12px;
    }

    .modal-proc-row select,
    .modal-proc-row textarea,
    .modal-proc-row input[type="number"] {
        width: 100%;
        background: #fff;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        padding: 9px 12px;
        font-size: 0.875rem;
        color: #374151;
        font-family: inherit;
        outline: none;
        margin-top: 8px;
        box-sizing: border-box;
        transition: border-color 0.2s;
    }

    .modal-proc-row select:focus,
    .modal-proc-row textarea:focus,
    .modal-proc-row input[type="number"]:focus { border-color: #005b96; }

    .modal-proc-row label { font-size: 0.78rem; font-weight: 600; color: #64748b; display: flex; align-items: center; gap: 6px; margin-top: 8px; }
    .modal-proc-row label input[type="checkbox"] { accent-color: #005b96; }

    .modal-proc-valor { font-size: 0.875rem; font-weight: 700; color: #005b96; margin-top: 6px; }

    .modal-total { text-align: right; font-size: 0.95rem; margin: 12px 0; color: #374151; }
    .modal-total strong { color: #0f172a; }

    .modal-actions { display: flex; gap: 10px; margin-top: 16px; }

    .btn-modal-add {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f1f5f9;
        border: none;
        border-radius: 8px;
        padding: 9px 16px;
        font-size: 0.82rem;
        font-weight: 600;
        color: #374151;
        cursor: pointer;
        font-family: inherit;
        transition: background 0.2s;
    }

    .btn-modal-add:hover { background: #e2e8f0; }

    .btn-modal-salvar {
        flex: 1;
        padding: 11px;
        background: #005b96;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 700;
        cursor: pointer;
        font-family: inherit;
        transition: background 0.2s;
    }

    .btn-modal-salvar:hover { background: #004a7c; }

    .btn-modal-cancelar {
        padding: 11px 18px;
        background: transparent;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s;
    }

    .btn-modal-cancelar:hover { border-color: #94a3b8; }

    /* Canvas odontograma */
    .canvas-container { position: relative; width: 100%; max-width: 1000px; margin: 0 auto; line-height: 0; }
    .img-odontograma { display: block; width: 100%; height: auto; position: relative; z-index: 1; }
    .odontograma-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 2; pointer-events: none; }
    area { cursor: pointer; outline: none; }

    @media (max-width: 900px) {
        .atend-layout { grid-template-columns: 1fr; }
        .atend-sidebar { position: static; }
        .atend-fields-row { grid-template-columns: 1fr; }
    }
</style>

<form id="form-atendimento" action="<?= BASE_URL ?>?rota=atendimentos.salvar" method="POST" enctype="multipart/form-data">
<input type="hidden" name="paciente_id" id="paciente_id">
<input type="hidden" name="paciente_nome" id="paciente_nome_hidden">

<div class="atend-page">

    <!-- Cabeçalho -->
    <div class="atend-page-header">
        <a href="<?= BASE_URL ?>?rota=painel" class="atend-back-btn" title="Voltar">&#8592;</a>
        <div>
            <h1>Novo Lançamento de Atendimento</h1>
            <p>Preencha os dados do paciente e procedimentos realizados.</p>
        </div>
    </div>

    <div class="atend-layout">

        <!-- Coluna principal -->
        <div class="atend-main">

            <!-- Card: Dados do Paciente -->
            <div class="atend-card">
                <div class="atend-card-title">
                    <span>👤</span> Dados do Paciente
                </div>

                <div class="atend-field">
                    <label class="atend-label">Buscar Paciente</label>
                    <div style="position:relative;">
                        <div class="atend-input-wrap">
                            <i class="fa fa-search"></i>
                            <input type="text" id="paciente_busca"
                                   placeholder="Digite o nome do paciente..."
                                   autocomplete="off"
                                   oninput="buscarPacienteNativo(this.value)">
                            <button type="button" class="btn-limpar-paciente" id="btn_limpar_paciente"
                                    onclick="limparPaciente()" style="display:none;" title="Limpar">&#10005;</button>
                        </div>
                        <ul id="lista_pacientes"></ul>
                    </div>
                    <small id="paciente_status" style="font-size:0.78rem; margin-top:4px; display:block; color:#64748b;"></small>
                </div>

                <div class="atend-field">
                    <label class="atend-label">Telefone</label>
                    <div class="atend-input-wrap">
                        <i class="fa fa-phone"></i>
                        <input type="text" id="paciente_telefone_display" placeholder="(00) 00000-0000" readonly>
                    </div>
                </div>
            </div>

            <!-- Card: Dados do Atendimento -->
            <div class="atend-card">
                <div class="atend-card-title">
                    <span>📋</span> Dados do Atendimento
                </div>

                <div class="atend-fields-row">
                    <div class="atend-field">
                        <label class="atend-label">Dentista Responsável</label>
                        <select name="id_dentista" id="dentista" required class="atend-input-plain">
                            <option value="">Selecione...</option>
                            <?php foreach($dentistas as $d): ?>
                                <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nome']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="atend-field">
                        <label class="atend-label">Data do Atendimento</label>
                        <input type="date" name="data_atendimento" class="atend-input-plain"
                               value="<?= date('Y-m-d') ?>" required>
                    </div>
                    <div class="atend-field">
                        <label class="atend-label">Tipo de Atendimento</label>
                        <select name="tipo_atendimento" class="atend-input-plain">
                            <option value="particular">Particular</option>
                            <option value="convenio">Convênio</option>
                            <option value="gratuito">Gratuito</option>
                        </select>
                    </div>
                </div>

                <!-- Odontograma -->
                <div class="atend-field" style="margin-top: 8px;">
                    <div class="odonto-wrap">
                        <div style="font-size:0.72rem; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#64748b; margin-bottom:10px;">
                            🦷 Odontograma — Dentes afetados pelos procedimentos selecionados
                        </div>
                        <div class="canvas-container">
                            <img src="<?= BASE_URL ?>assets/img/odontograma.png" usemap="#image-map" class="img-odontograma" id="odontograma-img">
                            <svg class="odontograma-overlay" id="odontograma-svg"></svg>
                            <map name="image-map" id="image-map">
                                <area target="" onclick="marcarDente(this, 18, 'Arcada Superior')" alt="Molar 18" id="d18" title="3º Molar" coords="53,251,99,157" shape="rect">
                                <area target="" onclick="marcarDente(this, 17, 'Arcada Superior')" alt="Molar 17" id="d17" title="2º Molar" coords="147,156,103,249" shape="rect">
                                <area target="" onclick="marcarDente(this, 16, 'Arcada Superior')" alt="Molar 16" title="Molar 16" coords="207,155,151,246" shape="rect">
                                <area target="" onclick="marcarDente(this, 15, 'Arcada Superior')" alt="Premolar 15" title="Premolar 15" coords="241,152,209,242" shape="rect">
                                <area target="" onclick="marcarDente(this, 14, 'Arcada Superior')" alt="Premolar 14" title="Premolar 14" coords="274,149,246,241" shape="rect">
                                <area target="" onclick="marcarDente(this, 13, 'Arcada Superior')" alt="Canino 13" title="Canino 13" coords="314,148,277,238" shape="rect">
                                <area target="" onclick="marcarDente(this, 12, 'Arcada Superior')" alt="Inciso 12" title="Inciso 12" coords="352,152,317,243" shape="rect">
                                <area target="" onclick="marcarDente(this, 11, 'Arcada Superior')" alt="Inciso 11" title="Inciso 11" coords="397,153,355,246" shape="rect">
                                <area target="" onclick="marcarDente(this, 21, 'Arcada Superior')" alt="Inciso 21" title="Inciso 21" coords="442,154,403,244" shape="rect">
                                <area target="" onclick="marcarDente(this, 22, 'Arcada Superior')" alt="Inciso 22" title="Inciso 22" coords="479,153,446,243" shape="rect">
                                <area target="" onclick="marcarDente(this, 23, 'Arcada Superior')" alt="Canino 23" title="Canino 23" coords="521,142,481,243" shape="rect">
                                <area target="" onclick="marcarDente(this, 24, 'Arcada Superior')" alt="Premolar 24" title="Premolar 24" coords="561,146,525,239" shape="rect">
                                <area target="" onclick="marcarDente(this, 25, 'Arcada Superior')" alt="Premolar 25" title="Premolar 25" coords="590,146,564,237" shape="rect">
                                <area target="" onclick="marcarDente(this, 26, 'Arcada Superior')" alt="Molar 26" title="Molar 26" coords="648,148,593,238" shape="rect">
                                <area target="" onclick="marcarDente(this, 27, 'Arcada Superior')" alt="Molar 27" title="Molar 27" coords="703,151,653,239" shape="rect">
                                <area target="" onclick="marcarDente(this, 28, 'Arcada Superior')" alt="Molar 28" id="d28" title="3º Molar" coords="741,149,705,241" shape="rect">
                                <area target="" onclick="marcarDente(this, 48, 'Arcada Inferior')" alt="Molar 48" id="d48" title="Molar 48" coords="51,285,103,360" shape="rect">
                                <area target="" onclick="marcarDente(this, 47, 'Arcada Inferior')" alt="Molar 47" title="Molar 47" coords="109,284,160,363" shape="rect">
                                <area target="" onclick="marcarDente(this, 46, 'Arcada Inferior')" alt="Molar 46" title="Molar 46" coords="167,281,219,363" shape="rect">
                                <area target="" onclick="marcarDente(this, 45, 'Arcada Inferior')" alt="Premolar 45" title="Premolar 45" coords="221,278,258,378" shape="rect">
                                <area target="" onclick="marcarDente(this, 44, 'Arcada Inferior')" alt="Premolar 44" title="Premolar 44" coords="260,275,296,390" shape="rect">
                                <area target="" onclick="marcarDente(this, 43, 'Arcada Inferior')" alt="Canino 43" title="Canino 43" coords="298,276,336,384" shape="rect">
                                <area target="" onclick="marcarDente(this, 42, 'Arcada Inferior')" alt="Inciso 42" title="Inciso 42" coords="338,275,368,384" shape="rect">
                                <area target="" onclick="marcarDente(this, 41, 'Arcada Inferior')" alt="Inciso 41" title="Inciso 41" coords="370,276,395,383" shape="rect">
                                <area target="" onclick="marcarDente(this, 31, 'Arcada Inferior')" alt="Inciso 31" title="Inciso 31" coords="398,275,426,380" shape="rect">
                                <area target="" onclick="marcarDente(this, 32, 'Arcada Inferior')" alt="Inciso 32" title="Inciso 32" coords="428,275,454,382" shape="rect">
                                <area target="" onclick="marcarDente(this, 33, 'Arcada Inferior')" alt="Canino 33" title="Canino 33" coords="456,274,493,391" shape="rect">
                                <area target="" onclick="marcarDente(this, 34, 'Arcada Inferior')" alt="Premolar 34" title="Premolar 34" coords="496,274,531,383" shape="rect">
                                <area target="" onclick="marcarDente(this, 35, 'Arcada Inferior')" alt="Premolar 35" title="Premolar 35" coords="534,274,571,379" shape="rect">
                                <area target="" onclick="marcarDente(this, 36, 'Arcada Inferior')" alt="Molar 36" title="Molar 36" coords="575,274,636,384" shape="rect">
                                <area target="" onclick="marcarDente(this, 37, 'Arcada Inferior')" alt="Molar 37" title="Molar 37" coords="640,274,688,384" shape="rect">
                                <area target="" onclick="marcarDente(this, 38, 'Arcada Inferior')" alt="Molar 38" title="Molar 38" coords="694,272,742,375" shape="rect">
                                <area target="" onclick="marcarDente(this, 'Todos', 'Geral')" alt="Todos" title="Todos" coords="85,31,727,83" shape="rect">
                                <area target="" onclick="marcarDente(this, 'Todos', 'Geral')" alt="Todos" title="Todos" coords="72,449,727,498" shape="rect">
                            </map>
                        </div>
                        <div class="odonto-legend">
                            <span><span class="dot dot-saudavel"></span> Saudável</span>
                            <span><span class="dot dot-tratado"></span> Tratado neste atendimento</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Procedimentos -->
            <div class="atend-card">
                <div class="catalogo-header">
                    <span class="catalogo-label">Procedimentos Realizados</span>
                    <button type="button" class="btn-add-proc" id="btn-adicionar-procedimento">
                        <i class="fa fa-plus"></i> Adicionar Procedimento
                    </button>
                </div>

                <!-- Pendentes anteriores -->
                <div id="procedimentos_pendentes_container"></div>

                <!-- Catálogo (oculto inicialmente) -->
                <div id="catalogo-container" style="display:none; margin-bottom:16px;">
                    <div class="catalogo-list">
                        <!-- Header com busca -->
                        <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; padding:12px 16px; background:#f1f5f9; border-bottom:1px solid #e2e8f0;">
                            <span style="font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#64748b; white-space:nowrap;">Catálogo de Procedimentos</span>
                            <div style="display:flex; align-items:center; gap:8px; background:#fff; border:1.5px solid #e2e8f0; border-radius:8px; padding:6px 12px; flex:1; max-width:260px;">
                                <i class="fa fa-search" style="color:#94a3b8; font-size:13px;"></i>
                                <input type="text" id="catalogo-busca"
                                       placeholder="Filtrar procedimento..."
                                       style="border:none; background:none; outline:none; font-size:0.82rem; color:#374151; width:100%; font-family:inherit;"
                                       oninput="filtrarCatalogo(this.value)">
                            </div>
                        </div>
                        <!-- Lista de itens -->
                        <div id="catalogo-items" style="max-height:320px; overflow-y:auto;">
                        <?php foreach($procedimentos as $p): ?>
                        <div class="catalogo-item"
                             data-id="<?= $p['id'] ?>"
                             data-nome="<?= htmlspecialchars($p['nome'] . ' (' . $p['categoria'] . ')') ?>"
                             data-valor="<?= $p['valor_base'] ?>"
                             data-categoria="<?= $p['categoria'] ?>"
                             data-tipo-execucao="<?= $p['tipo_execucao'] ?? 'geral' ?>"
                             data-search="<?= strtolower(htmlspecialchars($p['nome'])) ?>">
                            <input type="checkbox" class="catalogo-check">
                            <span class="catalogo-item-nome"><?= htmlspecialchars($p['nome']) ?></span>
                            <span style="font-size:0.7rem; background:#eef4fb; color:#005b96; padding:2px 8px; border-radius:20px; white-space:nowrap; font-weight:600;"><?= htmlspecialchars($p['categoria']) ?></span>
                            <span class="catalogo-item-valor">R$ <?= number_format($p['valor_base'], 2, ',', '.') ?></span>
                        </div>
                        <?php endforeach; ?>
                        </div>
                        <!-- Mensagem vazio -->
                        <div id="catalogo-vazio" style="display:none; text-align:center; padding:24px; color:#94a3b8; font-size:0.875rem;">
                            <i class="fa fa-search" style="display:block; font-size:1.5rem; margin-bottom:8px; color:#cbd5e1;"></i>
                            Nenhum procedimento encontrado.
                        </div>
                    </div>
                </div>

                <!-- Tabela de procedimentos adicionados -->
                <div id="procedimentos_adicionados_container">
                    <div class="procs-table-wrap">
                        <table class="procs-table">
                            <thead>
                                <tr>
                                    <th>Cód.</th>
                                    <th>Procedimento</th>
                                    <th>Dente(s)</th>
                                    <th style="text-align:right;">Valor</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="procs-tbody">
                                <tr id="procs-empty-row">
                                    <td colspan="5" class="procs-table-empty">Nenhum procedimento adicionado.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div id="procedimentos_a_deletar_container"></div>
            </div>

        </div><!-- /atend-main -->

        <!-- Sidebar: Resumo -->
        <div class="atend-sidebar">
            <div class="resumo-card">
                <div class="resumo-header">🔥 Resumo</div>
                <div class="resumo-dentista-info" id="resumo-dentista-info">
                    Selecione um dentista
                </div>

                <div class="resumo-paciente-box" id="resumo-paciente-box">
                    <div class="resumo-paciente-label">Paciente</div>
                    <div class="resumo-paciente-nome" id="resumo-paciente-nome">—</div>
                    <div class="resumo-paciente-tel" id="resumo-paciente-tel"></div>
                </div>

                <div class="resumo-procs-list" id="resumo-procs-list">
                    <div class="resumo-nenhum">Nenhum procedimento</div>
                </div>

                <div class="resumo-total-wrap">
                    <span class="resumo-total-label">Total a Pagar</span>
                    <span class="resumo-total-valor" id="total-procedimentos-valor">R$ 0,00</span>
                </div>

                <div class="resumo-actions">
                    <div class="btn-alerta-proc" id="resumo-alerta" style="display:none;">
                        ⚠ Adicione ao menos 1 procedimento
                    </div>
                    <button type="submit" class="btn-lancar" id="btn-lancar-atend">
                        <i class="fa fa-check"></i> Lançar Atendimento
                    </button>
                    <a href="<?= BASE_URL ?>?rota=painel" class="btn-cancelar-atend">Cancelar</a>
                </div>
            </div>
        </div>

    </div><!-- /atend-layout -->
</div><!-- /atend-page -->
</form>

<!-- Modal de tratamento por dente -->
<div id="modalTratamento" class="modal">
    <div class="modal-content">
        <h3><i class="fa fa-tooth" style="color:#005b96; margin-right:6px;"></i> <span id="modal-title"></span></h3>
        <input type="hidden" id="inputDente">
        <input type="hidden" id="inputArcada">

        <div id="procedimentos-modal-container"></div>

        <div class="modal-total">
            Total: <strong id="modal-total-valor">R$ 0,00</strong>
        </div>

        <div class="modal-actions">
            <button type="button" id="add-procedimento-modal" class="btn-modal-add">
                <i class="fa fa-plus"></i> Adicionar
            </button>
            <button type="button" onclick="fecharModal()" class="btn-modal-cancelar">Cancelar</button>
            <button type="button" id="salvar-tratamento-modal" class="btn-modal-salvar">Salvar</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/image-map-resizer/1.0.10/js/imageMapResizer.min.js"></script>

<script>
// --- ODONTOGRAMA ---
function filtrarCatalogo(term) {
    const items = document.querySelectorAll('#catalogo-items .catalogo-item');
    const vazio = document.getElementById('catalogo-vazio');
    const t = term.toLowerCase().trim();
    let visiveis = 0;
    items.forEach(function(item) {
        const nome = item.dataset.search || item.querySelector('.catalogo-item-nome').textContent.toLowerCase();
        const cat  = (item.dataset.categoria || '').toLowerCase();
        const match = !t || nome.includes(t) || cat.includes(t);
        item.style.display = match ? '' : 'none';
        if (match) visiveis++;
    });
    if (vazio) vazio.style.display = visiveis === 0 ? 'block' : 'none';
}

function initOdontograma() {
    const img = document.getElementById('odontograma-img');
    const svg = document.getElementById('odontograma-svg');
    const map = document.getElementById('image-map');
    const areas = map.getElementsByTagName('area');
    const setup = () => {
        svg.setAttribute('viewBox', `0 0 ${img.naturalWidth} ${img.naturalHeight}`);
        for (let area of areas) area.dataset.originalCoords = area.coords;
        imageMapResize();
    };
    if (img.complete) { setup(); } else { img.onload = setup; }
}

function marcarDente(areaElement, dente, arcada) {
    const svg = document.getElementById('odontograma-svg');
    const rawCoords = areaElement.dataset.originalCoords;
    if (!rawCoords) { window.abrirModal(dente, arcada); return; }
    const coords = rawCoords.split(',').map(Number);
    const idMarca = `marca-${dente}`;
    const marcaExistente = document.getElementById(idMarca);
    if (marcaExistente) { marcaExistente.remove(); }
    else {
        const x = Math.min(coords[0], coords[2]);
        const y = Math.min(coords[1], coords[3]);
        const width = Math.abs(coords[2] - coords[0]);
        const height = Math.abs(coords[3] - coords[1]);
        const rect = document.createElementNS("http://www.w3.org/2000/svg", "rect");
        rect.setAttribute("x", x); rect.setAttribute("y", y);
        rect.setAttribute("width", width); rect.setAttribute("height", height);
        rect.setAttribute("fill", "rgba(0,91,150,0.25)");
        rect.setAttribute("stroke", "#005b96"); rect.setAttribute("stroke-width", "2");
        rect.id = idMarca;
        svg.appendChild(rect);
    }
    window.abrirModal(dente, arcada);
}

function showToast(message, type = 'success') {
    const toast = document.getElementById('toast-notification');
    if (toast) {
        toast.textContent = message;
        toast.className = 'toast show ' + type;
        setTimeout(() => { toast.className = toast.className.replace(' show', ''); }, 5000);
    }
}

$(document).ready(function() {
    initOdontograma();

    // Atualiza info do dentista no resumo
    $('#dentista').on('change', function() {
        const nome = $(this).find('option:selected').text();
        const data = $('input[name="data_atendimento"]').val();
        const dataFormatada = data ? new Date(data + 'T00:00:00').toLocaleDateString('pt-BR') : '';
        $('#resumo-dentista-info').text(nome && nome !== 'Selecione...' ? nome.toUpperCase() + (dataFormatada ? ' · ' + dataFormatada : '') : 'Selecione um dentista');
    });

    $('input[name="data_atendimento"]').on('change', function() {
        $('#dentista').trigger('change');
    });

    // Botão adicionar procedimento — toggle catálogo
    $('#btn-adicionar-procedimento').on('click', function() {
        const cat = $('#catalogo-container');
        cat.toggle();
        if (cat.is(':visible')) {
            $(this).html('<i class="fa fa-times"></i> Fechar Catálogo');
            // Foca no campo de busca ao abrir
            setTimeout(() => { document.getElementById('catalogo-busca')?.focus(); }, 100);
        } else {
            $(this).html('<i class="fa fa-plus"></i> Adicionar Procedimento');
            // Limpa busca ao fechar
            const busca = document.getElementById('catalogo-busca');
            if (busca) { busca.value = ''; filtrarCatalogo(''); }
        }
    });

    // Clique em item do catálogo
    $(document).on('click', '.catalogo-item', function(e) {
        if ($(e.target).is('input[type="checkbox"]')) return;
        const check = $(this).find('.catalogo-check');
        check.prop('checked', !check.prop('checked')).trigger('change');
    });

    $(document).on('change', '.catalogo-check', function() {
        const item = $(this).closest('.catalogo-item');
        const id       = item.data('id');
        const nome     = item.data('nome');
        const valor    = item.data('valor');
        const categoria = item.data('categoria');

        if ($(this).is(':checked')) {
            // Abre modal para selecionar dente
            const tipoExecucao = item.data('tipo-execucao') || 'geral';
            window._catalogoItemPendente = { id, nome, valor, categoria, tipoExecucao };
            window.abrirModal('Todos', 'Geral');
        }
    });

    // Busca de paciente
    let _buscaTimer = null;
    let _pacienteSelecionado = false;

    window.buscarPacienteNativo = function(term) {
        const lista    = document.getElementById('lista_pacientes');
        const status   = document.getElementById('paciente_status');
        const hiddenId = document.getElementById('paciente_id');
        const btnLimpar = document.getElementById('btn_limpar_paciente');
        if (_pacienteSelecionado) return;
        clearTimeout(_buscaTimer);
        if (term.length === 0) { lista.style.display='none'; lista.innerHTML=''; status.textContent=''; return; }
        status.textContent = 'Buscando...';
        lista.style.display = 'none';
        _buscaTimer = setTimeout(function() {
            fetch(window.__BASE_URL + 'ajax/buscar_paciente.php?term=' + encodeURIComponent(term))
                .then(r => r.json())
                .then(data => {
                    lista.innerHTML = '';
                    if (data.length === 0) {
                        hiddenId.value = '';
                        document.getElementById('paciente_nome_hidden').value = term;
                        lista.style.display = 'none';
                        status.textContent = '⚠ Não cadastrado — será criado ao salvar.';
                        status.style.color = '#e67e22';
                        btnLimpar.style.display = 'inline-block';
                        return;
                    }
                    status.textContent = data.length + ' encontrado(s). Selecione:';
                    data.forEach(function(p) {
                        const li = document.createElement('li');
                        li.style.cssText = 'padding:10px 14px; cursor:pointer; border-bottom:1px solid #f1f5f9; font-size:14px; list-style:none;';
                        li.innerHTML = '<strong>' + escHTML(p.nome) + '</strong>'
                            + (p.cpf ? ' <span style="color:#94a3b8;font-size:12px;"> · CPF: ' + escHTML(p.cpf) + '</span>' : '')
                            + (p.telefone ? ' <span style="color:#94a3b8;font-size:12px;"> · ' + escHTML(p.telefone) + '</span>' : '');
                        li.addEventListener('mouseover', function() { this.style.background='#eff6ff'; });
                        li.addEventListener('mouseout',  function() { this.style.background=''; });
                        li.addEventListener('mousedown', function(e) { e.preventDefault(); selecionarPaciente(p); });
                        lista.appendChild(li);
                    });
                    lista.style.display = 'block';
                })
                .catch(function(err) { status.textContent = 'Sem conexão com o servidor.'; console.error(err); });
        }, 200);
    };

    function escHTML(str) {
        return String(str||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }

    function selecionarPaciente(p) {
        document.getElementById('paciente_busca').value = p.nome;
        document.getElementById('paciente_id').value    = p.id;
        document.getElementById('paciente_nome_hidden').value = '';
        document.getElementById('lista_pacientes').style.display = 'none';
        const status = document.getElementById('paciente_status');
        status.textContent = '✓ Paciente selecionado';
        status.style.color = '#00b894';
        document.getElementById('paciente_busca').readOnly = true;
        document.getElementById('btn_limpar_paciente').style.display = 'inline-block';
        _pacienteSelecionado = true;
        // Atualiza telefone
        document.getElementById('paciente_telefone_display').value = p.telefone || '';
        // Atualiza resumo
        $('#resumo-paciente-nome').text(p.nome);
        $('#resumo-paciente-tel').text(p.telefone || '');
        $('#resumo-paciente-box').addClass('visible');
        carregarProcedimentosPendentes(p.id);
    }

    window.limparPaciente = function() {
        document.getElementById('paciente_busca').value = '';
        document.getElementById('paciente_id').value    = '';
        document.getElementById('paciente_nome_hidden').value = '';
        document.getElementById('paciente_telefone_display').value = '';
        const lista = document.getElementById('lista_pacientes');
        lista.style.display = 'none'; lista.innerHTML = '';
        const status = document.getElementById('paciente_status');
        status.textContent = ''; status.style.color = '#64748b';
        document.getElementById('paciente_busca').readOnly = false;
        document.getElementById('btn_limpar_paciente').style.display = 'none';
        _pacienteSelecionado = false;
        document.getElementById('paciente_busca').focus();
        $('#procedimentos_pendentes_container').empty();
        $('#resumo-paciente-box').removeClass('visible');
        $('#odontograma-svg').empty();
    };

    document.addEventListener('click', function(e) {
        const lista = document.getElementById('lista_pacientes');
        if (!document.getElementById('paciente_busca').contains(e.target)) {
            if (lista) lista.style.display = 'none';
        }
    });

    const procedimentos = <?= json_encode($procedimentos) ?>;
    const dentistas     = <?= json_encode($dentistas) ?>;

    function carregarProcedimentosPendentes(pacienteId) {
        const container = $('#procedimentos_pendentes_container');
        container.html('');
        $.ajax({
            url: window.__BASE_URL + "?rota=atendimentos.pendentes",
            dataType: "json",
            data: { paciente_id: pacienteId },
            success: function(data) {
                container.empty();
                if (data && data.length > 0) {
                    data.forEach(proc => {
                        const html = `
                            <div class="pendente-item" id="pendente-${proc.atendimento_procedimento_id}">
                                <div class="pendente-item-info">
                                    <strong>${proc.procedimento_nome}</strong><br>
                                    Local: ${proc.local} · ${proc.descricao || ''}
                                </div>
                                <button type="button" class="btn-finalizar-pendente finalizar-pendente-btn"
                                        data-proc-id="${proc.id_procedimento}"
                                        data-proc-nome="${proc.procedimento_nome} (${proc.categoria})"
                                        data-proc-valor="${proc.valor_procedimento / proc.quantidade}"
                                        data-proc-local="${proc.local}"
                                        data-proc-custo-auxiliar="${proc.custo_auxiliar || 0}"
                                        data-proc-descricao="${proc.descricao}"
                                        data-original-id="${proc.atendimento_procedimento_id}"
                                        data-proc-categoria="${proc.categoria}"
                                        data-proc-natureza="${proc.natureza || ''}">
                                    <i class="fa fa-check"></i> Finalizar Agora
                                </button>
                            </div>`;
                        container.append(html);
                    });
                }
            },
            error: () => {}
        });
    }

    $(document).on('click', '.finalizar-pendente-btn', function() {
        const btn = $(this);
        const originalId = btn.data('original-id');
        criarLinhaProcedimentoPrincipal(
            btn.data('proc-id'), btn.data('proc-nome'), 1,
            btn.data('proc-valor'), btn.data('proc-local'),
            btn.data('proc-descricao'), 'finalizado',
            btn.data('proc-custo-auxiliar'), originalId,
            btn.data('proc-natureza'), btn.data('proc-categoria')
        );
        $('#procedimentos_a_deletar_container').append(
            `<input type="hidden" name="procedimentos_a_deletar[]" value="${originalId}" id="delete-${originalId}">`
        );
        $(`#pendente-${originalId}`).remove();
    });

    // --- MODAL ---
    const modal = document.getElementById('modalTratamento');
    const modalTitle = document.getElementById('modal-title');
    const inputDente = document.getElementById('inputDente');
    const inputArcada = document.getElementById('inputArcada');
    const procedimentosModalContainer = document.getElementById('procedimentos-modal-container');

    window.abrirModal = function(numero, arcada) {
        modal.classList.add('show');
        modalTitle.innerText = arcada === 'Geral' ? 'Tratamento geral' : arcada + ' — Dente ' + numero;
        inputDente.value = numero;
        inputArcada.value = arcada;
        procedimentosModalContainer.innerHTML = '';
        adicionarLinhaProcedimentoModal();
        updateModalTotal();
    };

    window.fecharModal = function() {
        modal.classList.remove('show');
        window._catalogoItemPendente = null;
    };

    window.onclick = function(event) {
        if (event.target == modal) fecharModal();
    };

    function adicionarLinhaProcedimentoModal() {
        const row = document.createElement('div');
        row.classList.add('modal-proc-row');

        const select = document.createElement('select');
        let option = document.createElement('option');
        option.value = ''; option.textContent = 'Selecione o procedimento...';
        select.appendChild(option);
        procedimentos.forEach(p => {
            let opt = document.createElement('option');
            opt.value = p.id;
            opt.textContent = `${p.nome} (${p.categoria})`;
            opt.dataset.valor = p.valor_base;
            opt.dataset.categoria = p.categoria;
            select.appendChild(opt);
        });

        // Se veio do catálogo, pré-seleciona
        if (window._catalogoItemPendente) {
            const item = window._catalogoItemPendente;
            for (let opt of select.options) {
                if (opt.value == item.id) { opt.selected = true; break; }
            }
        }

        const valorDiv = document.createElement('div');
        valorDiv.classList.add('modal-proc-valor');

        // ── Container de rateio (especializado, exceto ortodoncia) ──
        const rateioContainer = document.createElement('div');
        rateioContainer.className = 'rateio-container';
        rateioContainer.style.cssText = 'display:none; margin-top:10px; padding:12px; background:#eef4fb; border-radius:8px; border:1.5px solid #bfdbfe;';
        rateioContainer.innerHTML = `
            <div style="font-size:0.72rem; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#005b96; margin-bottom:10px;">
                Rateio do Procedimento Especializado
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                <div>
                    <label style="font-size:0.72rem; font-weight:700; color:#64748b; display:block; margin-bottom:4px;">
                        Dentista Indicador <span style="background:#fef3c7; color:#b45309; padding:1px 6px; border-radius:10px; font-size:0.68rem;">10%</span>
                    </label>
                    <select class="rateio-indicador" style="width:100%; background:#fff; border:1.5px solid #e2e8f0; border-radius:8px; padding:8px 10px; font-size:0.82rem; color:#374151; font-family:inherit; outline:none;">
                        <option value="">Selecione...</option>
                        ${dentistas.map(d => `<option value="${d.id}">${d.nome}</option>`).join('')}
                    </select>
                    <div style="font-size:0.72rem; color:#64748b; margin-top:3px;">Clínico que avaliou e fechou o negócio</div>
                </div>
                <div>
                    <label style="font-size:0.72rem; font-weight:700; color:#64748b; display:block; margin-bottom:4px;">
                        Dentista Especialista <span style="background:#e0e7ff; color:#4338ca; padding:1px 6px; border-radius:10px; font-size:0.68rem;">50%</span>
                    </label>
                    <select class="rateio-especialista" style="width:100%; background:#fff; border:1.5px solid #e2e8f0; border-radius:8px; padding:8px 10px; font-size:0.82rem; color:#374151; font-family:inherit; outline:none;">
                        <option value="">Selecione...</option>
                        ${dentistas.map(d => `<option value="${d.id}">${d.nome}</option>`).join('')}
                    </select>
                    <div style="font-size:0.72rem; color:#64748b; margin-top:3px;">Especialista que executou</div>
                </div>
            </div>
            <div class="rateio-preview" style="margin-top:10px; font-size:0.78rem; color:#374151; background:#fff; border-radius:6px; padding:8px 10px; display:none;">
            </div>
        `;

        const naturezaContainer = document.createElement('div');
        naturezaContainer.style.display = 'none';
        const naturezaLabel = document.createElement('label');
        naturezaLabel.textContent = 'Tipo de Procedimento Especializado';
        const naturezaSelect = document.createElement('select');
        naturezaSelect.name = 'procedimentos_modal[natureza][]';
        const naturezas = {'': 'Selecione...', 'orto': 'Orto', 'canal': 'Canal', 'protese': 'Prótese', 'cirurgia_especializada': 'Cirurgia Especializada'};
        for (const key in naturezas) { let opt = document.createElement('option'); opt.value = key; opt.textContent = naturezas[key]; naturezaSelect.appendChild(opt); }
        naturezaContainer.appendChild(naturezaLabel);
        naturezaContainer.appendChild(naturezaSelect);

        const custoAuxiliarInput = document.createElement('input');
        custoAuxiliarInput.type = 'number'; custoAuxiliarInput.name = 'procedimentos_modal[custo_auxiliar][]';
        custoAuxiliarInput.step = '0.01'; custoAuxiliarInput.value = '250.00';
        custoAuxiliarInput.placeholder = 'Custo Auxiliar (R$)'; custoAuxiliarInput.style.display = 'none';

        select.addEventListener('change', function() {
            const opt = this.options[this.selectedIndex];
            const valor = opt.dataset.valor || 0;
            valorDiv.textContent = valor ? `R$ ${parseFloat(valor).toFixed(2)}` : '';
            naturezaContainer.style.display = 'none'; naturezaSelect.required = false; naturezaSelect.value = '';
            custoAuxiliarInput.style.display = 'none'; custoAuxiliarInput.required = false; custoAuxiliarInput.value = '';
            rateioContainer.style.display = 'none';

            // Busca tipo_execucao do procedimento
            const procData = procedimentos.find(p => p.id == opt.value);
            const tipoExec = procData ? (procData.tipo_execucao || 'geral') : 'geral';

            if (opt.dataset.categoria === 'especializado') {
                naturezaContainer.style.display = 'block'; naturezaSelect.required = true;
                // Mostra rateio se não for ortodoncia
                if (tipoExec !== 'ortodoncia') {
                    rateioContainer.style.display = 'block';
                    atualizarPreviewRateio(rateioContainer, parseFloat(valor) || 0);
                }
            }
            else if (opt.dataset.categoria === 'protese') { custoAuxiliarInput.style.display = 'block'; custoAuxiliarInput.required = true; }
            updateModalTotal();
        });

        // Dispara se pré-selecionado
        if (select.value) select.dispatchEvent(new Event('change'));

        naturezaSelect.addEventListener('change', function() {
            if (this.value === 'protese') { custoAuxiliarInput.style.display = 'block'; custoAuxiliarInput.required = true; }
            else { custoAuxiliarInput.style.display = 'none'; custoAuxiliarInput.required = false; custoAuxiliarInput.value = ''; }
        });

        const descricao = document.createElement('textarea');
        descricao.name = 'procedimentos_modal[descricao][]';
        descricao.placeholder = 'Descrição (opcional)'; descricao.rows = 2;

        const finalizadoLabel = document.createElement('label');
        const finalizadoCheckbox = document.createElement('input');
        finalizadoCheckbox.type = 'checkbox'; finalizadoCheckbox.name = 'procedimentos_modal[finalizado][]';
        finalizadoCheckbox.value = '1'; finalizadoCheckbox.checked = true;
        finalizadoCheckbox.addEventListener('change', updateModalTotal);
        finalizadoLabel.appendChild(finalizadoCheckbox);
        finalizadoLabel.append(' Finalizado');

        row.appendChild(select);
        row.appendChild(valorDiv);
        row.appendChild(rateioContainer);
        row.appendChild(naturezaContainer);
        row.appendChild(custoAuxiliarInput);
        row.appendChild(descricao);
        row.appendChild(finalizadoLabel);
        procedimentosModalContainer.appendChild(row);

        // Atualiza preview ao mudar dentistas do rateio
        rateioContainer.querySelectorAll('select').forEach(s => {
            s.addEventListener('change', () => {
                const opt = select.options[select.selectedIndex];
                atualizarPreviewRateio(rateioContainer, parseFloat(opt.dataset.valor) || 0);
            });
        });

        updateModalTotal();
    }

    function updateModalTotal() {
        let total = 0;
        procedimentosModalContainer.querySelectorAll('.modal-proc-row').forEach(row => {
            const cb = row.querySelector('input[type="checkbox"]');
            if (cb && cb.checked) {
                const sel = row.querySelector('select');
                const opt = sel.options[sel.selectedIndex];
                if (opt && opt.dataset.valor) total += parseFloat(opt.dataset.valor);
            }
        });
        document.getElementById('modal-total-valor').textContent = `R$ ${total.toFixed(2)}`;
    }

    $('#add-procedimento-modal').on('click', adicionarLinhaProcedimentoModal);

    // --- TABELA DE PROCEDIMENTOS ADICIONADOS ---
    let _procCounter = 0;

    function criarLinhaProcedimentoPrincipal(procedimentoId, procedimentoNome, quantidade, valor, local, descricao, status_execucao, custoAuxiliar = 0, originalId = null, natureza = '', categoria = '', indicadorId = '', especialistaId = '') {
        _procCounter++;
        const uniqueId = 'proc-' + Date.now() + '-' + _procCounter;
        const originalIdAttr = originalId ? `data-original-id="${originalId}"` : '';
        const codigo = 'C' + String(_procCounter).padStart(3, '0');

        // Badge de rateio para procedimentos especializados
        let rateioInfo = '';
        if (categoria === 'especializado' && natureza !== 'orto') {
            const nomeIndicador   = indicadorId   ? (dentistas.find(d => d.id == indicadorId)?.nome   || '?') : '—';
            const nomeEspecialista = especialistaId ? (dentistas.find(d => d.id == especialistaId)?.nome || '?') : '—';
            rateioInfo = `<div style="font-size:0.68rem; color:#64748b; margin-top:3px; display:flex; gap:4px; flex-wrap:wrap;">
                <span style="background:#fef3c7; color:#b45309; padding:1px 6px; border-radius:10px;">Indicador: ${nomeIndicador}</span>
                <span style="background:#e0e7ff; color:#4338ca; padding:1px 6px; border-radius:10px;">Especialista: ${nomeEspecialista}</span>
            </div>`;
        }

        const tr = $(`
            <tr id="${uniqueId}"
                data-valor="${valor}"
                data-status_execucao="${status_execucao}"
                data-proc-id="${procedimentoId}"
                data-proc-nome="${procedimentoNome}"
                data-proc-local="${local}"
                data-proc-descricao="${descricao || ''}"
                data-custo-auxiliar="${custoAuxiliar}"
                data-natureza="${natureza}"
                data-categoria="${categoria}"
                data-indicador-id="${indicadorId}"
                data-especialista-id="${especialistaId}"
                ${originalIdAttr}>
                <input type="hidden" name="procedimentos[id][]" value="${procedimentoId}">
                <input type="hidden" name="procedimentos[quantidade][]" value="${quantidade}">
                <input type="hidden" class="valor-input" name="procedimentos[valor][]" value="${valor}">
                <input type="hidden" name="procedimentos[local][]" value="${local}">
                <input type="hidden" name="procedimentos[descricao][]" value="${descricao || ''}">
                <input type="hidden" name="procedimentos[custo_auxiliar][]" value="${custoAuxiliar}">
                <input type="hidden" class="status-execucao-input" name="procedimentos[status_execucao][]" value="${status_execucao}">
                <input type="hidden" name="procedimentos[natureza][]" value="${natureza}">
                <input type="hidden" name="procedimentos[indicador_id][]" value="${indicadorId}">
                <input type="hidden" name="procedimentos[especialista_id][]" value="${especialistaId}">
                <td style="color:#94a3b8; font-size:0.78rem;">${codigo}</td>
                <td>${procedimentoNome}${rateioInfo}</td>
                <td style="color:#64748b;">${local}</td>
                <td style="text-align:right; font-weight:700; color:#00b894;">R$ ${parseFloat(valor).toFixed(2)}</td>
                <td>
                    <button type="button" class="btn-remover" title="Remover">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        `);

        tr.find('.btn-remover').on('click', function() { removerProcedimento(uniqueId); });

        $('#procs-empty-row').remove();
        $('#procs-tbody').append(tr);
        updateTotalAPagar();
        updateResumoProcs();
    }

    function updateTotalAPagar() {
        let total = 0;
        $('#procs-tbody tr[id^="proc-"]').each(function() {
            if ($(this).attr('data-status_execucao') === 'finalizado' || true) {
                total += parseFloat($(this).attr('data-valor') || 0);
            }
        });
        const formatted = 'R$ ' + total.toFixed(2).replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $('#total-procedimentos-valor').text(formatted);
    }

    function updateResumoProcs() {
        const list = $('#resumo-procs-list');
        list.empty();
        const rows = $('#procs-tbody tr[id^="proc-"]');
        if (rows.length === 0) {
            list.html('<div class="resumo-nenhum">Nenhum procedimento</div>');
            $('#resumo-alerta').show();
        } else {
            $('#resumo-alerta').hide();
            rows.each(function() {
                const nome  = $(this).attr('data-proc-nome') || '';
                const valor = parseFloat($(this).attr('data-valor') || 0);
                list.append(`<div class="resumo-proc-item"><span class="resumo-proc-nome">${nome.split('(')[0].trim()}</span><span class="resumo-proc-valor">R$ ${valor.toFixed(2).replace('.', ',')}</span></div>`);
            });
        }
    }

    function removerProcedimento(elementId) {
        const row = $('#' + elementId);
        if (!row.length) return;
        const originalId = row.data('original-id');
        if (originalId) {
            const container = $('#procedimentos_pendentes_container');
            if (!container.find(`#pendente-${originalId}`).length) {
                container.append(`
                    <div class="pendente-item" id="pendente-${originalId}">
                        <div class="pendente-item-info">
                            <strong>${row.data('proc-nome')}</strong><br>
                            Local: ${row.data('proc-local')}
                        </div>
                        <button type="button" class="btn-finalizar-pendente finalizar-pendente-btn"
                                data-proc-id="${row.data('proc-id')}"
                                data-proc-nome="${row.data('proc-nome')}"
                                data-proc-valor="${row.data('valor')}"
                                data-proc-local="${row.data('proc-local')}"
                                data-proc-descricao="${row.data('proc-descricao')}"
                                data-proc-custo-auxiliar="${row.data('custo-auxiliar') || 0}"
                                data-original-id="${originalId}"
                                data-proc-categoria="${row.data('categoria')}"
                                data-proc-natureza="${row.data('natureza')}">
                            <i class="fa fa-check"></i> Finalizar Agora
                        </button>
                    </div>`);
            }
            $(`#delete-${originalId}`).remove();
        }
        row.remove();
        if ($('#procs-tbody tr[id^="proc-"]').length === 0) {
            $('#procs-tbody').append('<tr id="procs-empty-row"><td colspan="5" class="procs-table-empty">Nenhum procedimento adicionado.</td></tr>');
        }
        updateTotalAPagar();
        updateResumoProcs();
    }

    // --- PREVIEW DE RATEIO ---
    function atualizarPreviewRateio(container, valor) {
        const preview = container.querySelector('.rateio-preview');
        if (!preview || !valor) return;
        const pctIndicador  = 10;
        const pctEspecialista = 50;
        const pctClinica    = 40;
        const vlIndicador   = (valor * pctIndicador  / 100).toFixed(2);
        const vlEspecialista= (valor * pctEspecialista/ 100).toFixed(2);
        const vlClinica     = (valor * pctClinica    / 100).toFixed(2);
        preview.style.display = 'block';
        preview.innerHTML = `
            <div style="font-size:0.7rem; font-weight:700; color:#64748b; margin-bottom:6px; text-transform:uppercase; letter-spacing:0.4px;">Distribuição de R$ ${valor.toFixed(2).replace('.',',')}</div>
            <div style="display:flex; gap:6px; flex-wrap:wrap;">
                <span style="background:#fef3c7; color:#b45309; padding:3px 8px; border-radius:20px; font-size:0.72rem; font-weight:700;">Indicador ${pctIndicador}% = R$ ${vlIndicador.replace('.',',')}</span>
                <span style="background:#e0e7ff; color:#4338ca; padding:3px 8px; border-radius:20px; font-size:0.72rem; font-weight:700;">Especialista ${pctEspecialista}% = R$ ${vlEspecialista.replace('.',',')}</span>
                <span style="background:#e8fdf5; color:#059669; padding:3px 8px; border-radius:20px; font-size:0.72rem; font-weight:700;">Clínica ${pctClinica}% = R$ ${vlClinica.replace('.',',')}</span>
            </div>
        `;
    }

    // --- SALVAR MODAL ---
    document.getElementById('salvar-tratamento-modal').addEventListener('click', function() {
        const dente  = inputDente.value;
        const arcada = inputArcada.value;
        const local  = (arcada === 'Geral') ? 'Todos' : dente;

        let formValido = true;
        procedimentosModalContainer.querySelectorAll('.modal-proc-row').forEach(row => {
            const select = row.querySelector('select');
            const opt    = select.options[select.selectedIndex];
            if (!opt || !opt.value) return;
            const categoria     = opt.dataset.categoria;
            const naturezaSelect = row.querySelector('select[name="procedimentos_modal[natureza][]"]');
            const custoInput     = row.querySelector('input[name="procedimentos_modal[custo_auxiliar][]"]');
            if (naturezaSelect) naturezaSelect.style.border = '1.5px solid #e2e8f0';
            if (custoInput) custoInput.style.border = '1.5px solid #e2e8f0';
            if (categoria === 'especializado' && (!naturezaSelect || !naturezaSelect.value)) {
                formValido = false;
                if (naturezaSelect) naturezaSelect.style.border = '2px solid #ef4444';
            }
            const isProtese = (categoria === 'protese') || (categoria === 'especializado' && naturezaSelect && naturezaSelect.value === 'protese');
            if (isProtese && (!custoInput || !custoInput.value || parseFloat(custoInput.value) <= 0)) {
                formValido = false;
                if (custoInput) custoInput.style.border = '2px solid #ef4444';
            }
        });

        if (!formValido) { showToast('Verifique os campos obrigatórios.', 'error'); return; }

        procedimentosModalContainer.querySelectorAll('.modal-proc-row').forEach(row => {
            const select = row.querySelector('select');
            const opt    = select.options[select.selectedIndex];
            if (!opt.value) return;
            const descricao      = row.querySelector('textarea').value;
            const naturezaSelect = row.querySelector('select[name="procedimentos_modal[natureza][]"]');
            const natureza       = naturezaSelect ? naturezaSelect.value : '';
            let custoAuxiliar    = row.querySelector('input[name="procedimentos_modal[custo_auxiliar][]"]').value || 0;
            const finalizado     = row.querySelector('input[type="checkbox"]').checked;
            const status_execucao = finalizado ? 'finalizado' : 'pendente';
            const categoria      = opt.dataset.categoria;

            // Captura dados de rateio
            const rateioContainer = row.querySelector('.rateio-container');
            let indicadorId   = '';
            let especialistaId = '';
            if (rateioContainer && rateioContainer.style.display !== 'none') {
                indicadorId   = rateioContainer.querySelector('.rateio-indicador')?.value   || '';
                especialistaId = rateioContainer.querySelector('.rateio-especialista')?.value || '';
            }

            if (categoria === 'especializado' && (natureza === 'canal' || natureza === 'cirurgia_especializada')) {
                custoAuxiliar = parseFloat(opt.dataset.valor) * 0.50;
            }
            criarLinhaProcedimentoPrincipal(opt.value, opt.textContent, 1, opt.dataset.valor, local, descricao, status_execucao, custoAuxiliar, null, natureza, categoria, indicadorId, especialistaId);
        });

        fecharModal();
        updateTotalAPagar();
        // Desmarca checkbox do catálogo
        $('.catalogo-check').prop('checked', false);
    });

    // --- SUBMIT ---
    const form = document.getElementById('form-atendimento');
    form.addEventListener('submit', async function(event) {
        event.preventDefault();
        const submitButton = document.getElementById('btn-lancar-atend');
        const pacienteId   = document.getElementById('paciente_id').value;
        const pacienteNome = document.getElementById('paciente_busca').value;
        if (!pacienteId && !pacienteNome) { showToast('Selecione ou cadastre um paciente.', 'error'); return; }
        if (pacienteId) {
            try {
                const response = await fetch(`${window.__BASE_URL}?rota=atendimentos.verPagPend&paciente_id=${pacienteId}`);
                const data = await response.json();
                if (data.pendente) { alert(`${pacienteNome} tem um pagamento pendente. Finalize o anterior primeiro.`); return; }
            } catch (error) { showToast('Erro ao verificar pagamentos pendentes.', 'error'); return; }
        }
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Salvando...';
        const formData = new FormData(form);
        try {
            const response = await fetch(window.__BASE_URL + '?rota=atendimentos.salvar', { method: 'POST', body: formData });
            const result   = await response.json();
            if (result.sucesso) {
                showToast(result.mensagem, 'success');
                setTimeout(() => { window.location.href = result.redirectUrl || window.__BASE_URL + '?rota=painel'; }, 1500);
            } else {
                showToast(result.erro || 'Ocorreu um erro desconhecido.', 'error');
                submitButton.disabled = false;
                submitButton.innerHTML = '<i class="fa fa-check"></i> Lançar Atendimento';
            }
        } catch (error) {
            showToast('Erro de comunicação. Verifique o console.', 'error');
            submitButton.disabled = false;
            submitButton.innerHTML = '<i class="fa fa-check"></i> Lançar Atendimento';
        }
    });

    // Inicializa resumo
    updateResumoProcs();
    $('#resumo-alerta').show();
});
</script>