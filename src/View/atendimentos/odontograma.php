<div id="toast-notification" class="toast"></div>

<style>
    /* =====================================================
       CONFIRMAR PAGAMENTO — Estilo Protótipo
    ===================================================== */
    .pag-page { max-width: 700px; margin: 0 auto; padding: 0 0 40px; }

    /* Cabeçalho */
    .pag-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
    }

    .pag-back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px; height: 36px;
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

    .pag-back-btn:hover { background: #005b96; color: #fff; border-color: #005b96; }

    .pag-header h1 { font-size: 1.4rem; font-weight: 700; color: #0f172a; margin: 0; }
    .pag-header p  { font-size: 0.85rem; color: #94a3b8; margin: 2px 0 0; }

    /* Cards */
    .pag-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid #f0f4f8;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 20px 24px;
        margin-bottom: 16px;
    }

    /* Card do paciente */
    .pag-paciente-card {
        background: #fff;
        border-radius: 16px;
        border: 1px solid #f0f4f8;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 20px 24px;
        margin-bottom: 16px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .pag-paciente-label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        color: #64748b;
        margin-bottom: 4px;
    }

    .pag-paciente-nome {
        font-size: 1.2rem;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 6px;
    }

    .pag-paciente-meta {
        font-size: 0.78rem;
        color: #64748b;
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .pag-paciente-meta span { display: flex; align-items: center; gap: 4px; }

    .pag-valor-destaque {
        text-align: right;
    }

    .pag-valor-num {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.5px;
    }

    .badge-aguardando {
        display: inline-block;
        background: #fef3c7;
        color: #b45309;
        font-size: 0.72rem;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
        margin-top: 6px;
        letter-spacing: 0.2px;
    }

    /* Busca de paciente */
    .pag-busca-wrap {
        position: relative;
    }

    .pag-busca-input-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 14px;
        transition: border-color 0.2s;
    }

    .pag-busca-input-wrap:focus-within { border-color: #005b96; background: #fff; }
    .pag-busca-input-wrap i { font-size: 15px; color: #94a3b8; }

    .pag-busca-input-wrap input {
        flex: 1;
        border: none;
        background: none;
        outline: none;
        font-size: 0.9rem;
        color: #374151;
        font-family: inherit;
    }

    .pag-busca-input-wrap input::placeholder { color: #94a3b8; }

    #drop_odonto {
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
        list-style: none;
        margin: 0;
    }

    /* Card seção */
    .pag-section-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 16px;
    }

    /* Tabela procedimentos */
    .pag-table-wrap {
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #f1f5f9;
        margin-bottom: 16px;
    }

    .pag-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
    }

    .pag-table th {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        padding: 10px 14px;
        border-bottom: 1px solid #f1f5f9;
        text-align: left;
        background: #f8fafc;
    }

    .pag-table td {
        padding: 12px 14px;
        border-bottom: 1px solid #f8fafc;
        color: #374151;
    }

    .pag-table tr:last-child td { border-bottom: none; }

    .pag-table .td-valor { text-align: right; font-weight: 600; color: #374151; }

    .pag-total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 14px;
        margin-top: 4px;
        border-top: 1px solid #f1f5f9;
    }

    .pag-total-label { font-size: 0.875rem; color: #64748b; }

    .pag-total-valor {
        font-size: 1.2rem;
        font-weight: 800;
        color: #005b96;
        letter-spacing: -0.3px;
    }

    /* Formas de pagamento */
    .pag-forma-row {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
        align-items: center;
        flex-wrap: wrap;
    }

    .pag-forma-select {
        flex: 1;
        min-width: 140px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 0.875rem;
        color: #374151;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s;
        cursor: pointer;
    }

    .pag-forma-select:focus { border-color: #005b96; }

    .pag-forma-valor {
        flex: 1;
        min-width: 120px;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 0.875rem;
        color: #374151;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s;
    }

    .pag-forma-valor:focus { border-color: #005b96; }

    .pag-forma-parcelas {
        display: none;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 0.875rem;
        color: #374151;
        font-family: inherit;
        outline: none;
        min-width: 80px;
        cursor: pointer;
    }

    .pag-forma-parcelas:focus { border-color: #005b96; }

    .pag-forma-label {
        font-size: 0.78rem;
        color: #94a3b8;
        white-space: nowrap;
    }

    .btn-remover-forma {
        background: #fef2f2;
        border: none;
        border-radius: 8px;
        width: 34px; height: 34px;
        display: flex; align-items: center; justify-content: center;
        color: #ef4444;
        cursor: pointer;
        font-size: 15px;
        transition: all 0.2s;
        flex-shrink: 0;
    }

    .btn-remover-forma:hover { background: #ef4444; color: #fff; }

    .btn-add-forma {
        width: 100%;
        padding: 11px;
        background: transparent;
        border: 1.5px dashed #cbd5e1;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s;
        margin-top: 4px;
    }

    .btn-add-forma:hover { border-color: #005b96; color: #005b96; background: #eef4fb; }

    /* Resumo totais */
    .pag-resumo-totais {
        background: #f8fafc;
        border-radius: 10px;
        padding: 14px 16px;
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .pag-resumo-item { font-size: 0.85rem; }
    .pag-resumo-item .label { color: #64748b; font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.4px; display: block; margin-bottom: 2px; }
    .pag-resumo-item .valor { font-size: 1rem; font-weight: 700; color: #0f172a; }
    .pag-resumo-item .valor.ok { color: #00b894; }
    .pag-resumo-item .valor.erro { color: #ef4444; }

    /* Botões finais */
    .pag-actions {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-top: 20px;
    }

    .btn-imprimir-recibo {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: transparent;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 20px;
        font-size: 0.875rem;
        font-weight: 600;
        color: #64748b;
        cursor: pointer;
        font-family: inherit;
        text-decoration: none;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .btn-imprimir-recibo:hover { border-color: #005b96; color: #005b96; }

    .btn-confirmar-pag {
        flex: 1;
        padding: 14px;
        background: #00b894;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        font-family: inherit;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-confirmar-pag:hover { background: #019e7f; }
    .btn-confirmar-pag:disabled { opacity: 0.6; cursor: not-allowed; }

    /* Aviso sem atendimento */
    .pag-aviso {
        background: #fffbeb;
        border: 1.5px solid #fde68a;
        border-radius: 12px;
        padding: 20px 24px;
        margin-top: 16px;
    }

    .pag-aviso h3 { color: #b45309; font-size: 0.95rem; margin-bottom: 8px; }
    .pag-aviso p  { color: #374151; font-size: 0.875rem; margin-bottom: 12px; }

    .btn-lancar-novo {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #005b96;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 18px;
        font-size: 0.875rem;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
    }

    .btn-lancar-novo:hover { background: #004a7c; }

    /* Toast */
    .toast { position: fixed; top: 20px; right: 20px; padding: 14px 20px; border-radius: 10px; color: white; font-size: 14px; z-index: 9999; opacity: 0; visibility: hidden; transition: all 0.4s; transform: translateX(100%); font-family: inherit; }
    .toast.show { opacity: 1; visibility: visible; transform: translateX(0); }
    .toast.error   { background: #ef4444; }
    .toast.success { background: #00b894; }

    /* Busca dropdown */
    .busca-wrapper { position: relative; }
    .busca-dropdown { display:none; position:absolute; top:100%; left:0; right:0; background:#fff; border:1px solid #ccc; border-radius:4px; max-height:240px; overflow-y:auto; margin:2px 0 0; padding:0; list-style:none; z-index:99999; box-shadow:0 4px 12px rgba(0,0,0,.15); }
    .busca-status { font-size:12px; color:#888; margin-top:3px; display:block; min-height:16px; }
</style>

<div class="pag-page">

    <!-- Cabeçalho -->
    <div class="pag-header">
        <a href="<?= BASE_URL ?>?rota=painel" class="pag-back-btn" title="Voltar">&#8592;</a>
        <div>
            <h1>Confirmar Pagamento de Atendimento</h1>
            <p>Selecione o método de pagamento para dar baixa no procedimento.</p>
        </div>
    </div>

    <?php if (!$paciente_id || !$paciente_nome): ?>
    <!-- Busca de paciente (quando não veio direto do lançamento) -->
    <div class="pag-card">
        <div class="pag-section-title">
            <i class="fa fa-search" style="color:#005b96;"></i> Buscar Paciente
        </div>
        <div class="pag-busca-wrap">
            <div class="pag-busca-input-wrap">
                <i class="fa fa-user"></i>
                <input type="text" id="paciente_busca_odonto"
                       placeholder="Digite o nome do paciente..."
                       autocomplete="off"
                       value="<?= htmlspecialchars($paciente_nome ?? '') ?>"
                       oninput="buscaOdonto(this.value)">
            </div>
            <ul id="drop_odonto"></ul>
        </div>
        <small id="status_odonto" style="font-size:0.78rem; color:#64748b; margin-top:6px; display:block;">
            <?= !empty($paciente_nome) ? '✓ Paciente: <strong>'.htmlspecialchars($paciente_nome).'</strong>' : 'Digite o nome para buscar o paciente.' ?>
        </small>
    </div>
    <?php endif; ?>

    <?php if ($paciente_id && $paciente_nome): ?>

        <?php if (!$ultimo_atendimento_id): ?>
        <!-- Sem atendimento pendente -->
        <div class="pag-aviso">
            <h3>⚠ Nenhum atendimento pendente encontrado</h3>
            <p>O paciente <strong><?= htmlspecialchars($paciente_nome) ?></strong> não possui atendimentos aguardando pagamento.</p>
            <a href="<?= BASE_URL ?>?rota=atendimentos.novo" class="btn-lancar-novo">
                <i class="fa fa-plus"></i> Lançar Novo Atendimento
            </a>
        </div>

        <?php else: ?>

        <form id="form-pagamento" action="<?= BASE_URL ?>?rota=atendimentos.pagar" method="POST">
            <input type="hidden" name="paciente_id"    value="<?= (int)($paciente_id ?? 0) ?>">
            <input type="hidden" name="atendimento_id" value="<?= (int)($ultimo_atendimento_id ?? 0) ?>">
            <input type="hidden" id="valor_total_hidden" value="<?= number_format($valor_total, 2, '.', '') ?>">

            <!-- Card do paciente -->
            <div class="pag-paciente-card">
                <div>
                    <div class="pag-paciente-label">Paciente</div>
                    <div class="pag-paciente-nome"><?= htmlspecialchars($paciente_nome) ?></div>
                    <div class="pag-paciente-meta">
                        <?php
                            // Buscar dados do atendimento para exibir meta
                            $atendMeta = [];
                            foreach($atendimentos as $a) { $atendMeta = $a; break; }
                        ?>
                        <?php if (!empty($atendMeta['paciente_telefone'])): ?>
                        <span><i class="fa fa-phone" style="font-size:11px;"></i> <?= htmlspecialchars($atendMeta['paciente_telefone']) ?></span>
                        <?php endif; ?>
                        <?php if (!empty($atendMeta['dentista_nome'])): ?>
                        <span><i class="fa fa-user-md" style="font-size:11px;"></i> <?= htmlspecialchars($atendMeta['dentista_nome']) ?></span>
                        <?php endif; ?>
                        <span><i class="fa fa-calendar" style="font-size:11px;"></i> <?= date('d/m/Y') ?></span>
                        <span><?= count($atendimentos) ?> procedimento<?= count($atendimentos) !== 1 ? 's' : '' ?> realizado<?= count($atendimentos) !== 1 ? 's' : '' ?></span>
                    </div>
                </div>
                <div class="pag-valor-destaque">
                    <div class="pag-valor-num">R$ <?= number_format($valor_total, 2, ',', '.') ?></div>
                    <div class="badge-aguardando">⏳ Aguardando Baixa</div>
                </div>
            </div>

            <!-- Procedimentos realizados -->
            <div class="pag-card">
                <div class="pag-section-title">
                    <i class="fa fa-list-alt" style="color:#005b96;"></i> Procedimentos Realizados
                </div>

                <?php if (!empty($atendimentos)): ?>
                <div class="pag-table-wrap">
                <table class="pag-table">
                    <thead>
                        <tr>
                            <th>Procedimento</th>
                            <th>Dente(s)</th>
                            <th style="text-align:right;">Valor (R$)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($atendimentos as $at): ?>
                        <tr>
                            <td><?= htmlspecialchars($at['nome'] ?? $at['procedimento_nome'] ?? '') ?></td>
                            <td style="color:#64748b;"><?= htmlspecialchars($at['local'] ?? 'Todos') ?></td>
                            <td class="td-valor">R$ <?= number_format($at['valor_procedimento'], 2, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php else: ?>
                <p style="color:#94a3b8; font-size:0.875rem; padding:8px 0;">Nenhum procedimento listado.</p>
                <?php endif; ?>

                <div class="pag-total-row">
                    <span class="pag-total-label">Valor Total do Atendimento:</span>
                    <span class="pag-total-valor">R$ <?= number_format($valor_total, 2, ',', '.') ?></span>
                </div>
            </div>

            <!-- Formas de pagamento -->
            <div class="pag-card">
                <div class="pag-section-title">
                    <i class="fa fa-credit-card" style="color:#005b96;"></i> Formas de Pagamento
                </div>

                <div id="pagamentos_container"></div>

                <button type="button" id="add_pagamento" class="btn-add-forma">
                    + Adicionar Outra Forma de Pagamento
                </button>

                <div class="pag-resumo-totais">
                    <div class="pag-resumo-item">
                        <span class="label">Total informado</span>
                        <span class="valor" id="total_pago">R$ 0,00</span>
                    </div>
                    <div class="pag-resumo-item">
                        <span class="label">Restante</span>
                        <span class="valor" id="restante_pagar">R$ 0,00</span>
                    </div>
                </div>
            </div>

            <!-- Ações -->
            <div class="pag-actions">
                <a href="<?= BASE_URL ?>?rota=recibo&id=<?= (int)$ultimo_atendimento_id ?>"
                   target="_blank" class="btn-imprimir-recibo">
                    <i class="fa fa-print"></i> Imprimir Recibo
                </a>
                <button type="submit" class="btn-confirmar-pag" id="btn-confirmar">
                    <i class="fa fa-check"></i> Confirmar Pagamento
                </button>
            </div>
        </form>

        <?php endif; ?>
    <?php endif; ?>

</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

    var container    = document.getElementById('pagamentos_container');
    var addBtn       = document.getElementById('add_pagamento');
    var totalSpan    = document.getElementById('total_pago');
    var restanteSpan = document.getElementById('restante_pagar');
    var valorTotal   = parseFloat(document.getElementById('valor_total_hidden')?.value || 0);

    if (!container) return;

    var formasLabel = { dinheiro:'💵 Dinheiro', pix:'⚡ PIX', debito:'💳 Débito', credito:'💳 Crédito' };

    function criarLinhaPagamento(valorInicial) {
        var row = document.createElement('div');
        row.className = 'pag-forma-row';

        var sel = document.createElement('select');
        sel.name = 'pagamentos[forma][]';
        sel.className = 'pag-forma-select';
        Object.entries(formasLabel).forEach(function(e) {
            var o = document.createElement('option');
            o.value = e[0]; o.textContent = e[1];
            sel.appendChild(o);
        });

        var inp = document.createElement('input');
        inp.type = 'text';
        inp.name = 'pagamentos[valor][]';
        inp.placeholder = 'Valor (R$)';
        inp.className = 'pag-forma-valor';
        inp.value = valorInicial ? valorInicial.toFixed(2).replace('.', ',') : '';

        var labelPrincipal = document.createElement('span');
        labelPrincipal.className = 'pag-forma-label';
        labelPrincipal.textContent = container.children.length === 0 ? 'Pagamento principal' : '';

        var parcSel = document.createElement('select');
        parcSel.className = 'pag-forma-parcelas';
        for (var i = 1; i <= 12; i++) {
            var o2 = document.createElement('option');
            o2.value = i; o2.textContent = i + 'x';
            parcSel.appendChild(o2);
        }

        var rem = document.createElement('button');
        rem.type = 'button';
        rem.className = 'btn-remover-forma';
        rem.innerHTML = '<i class="fa fa-trash"></i>';
        rem.onclick = function() { row.remove(); recalcular(); };

        sel.addEventListener('change', function() {
            if (sel.value === 'credito') {
                parcSel.style.display = 'inline-block';
                parcSel.name = 'pagamentos[parcelas][]';
            } else {
                parcSel.style.display = 'none';
                parcSel.removeAttribute('name');
            }
        });

        inp.addEventListener('input', recalcular);

        row.appendChild(sel);
        row.appendChild(inp);
        row.appendChild(labelPrincipal);
        row.appendChild(parcSel);
        row.appendChild(rem);
        return row;
    }

    function recalcular() {
        var total = 0;
        document.querySelectorAll('input[name="pagamentos[valor][]"]').forEach(function(i) {
            var v = parseFloat(i.value.replace(',', '.'));
            if (!isNaN(v)) total += v;
        });
        var restante = valorTotal - total;
        if (totalSpan)    totalSpan.textContent = 'R$ ' + total.toFixed(2).replace('.', ',');
        if (restanteSpan) {
            restanteSpan.textContent = 'R$ ' + Math.abs(restante).toFixed(2).replace('.', ',');
            var ok = Math.abs(restante) < 0.01;
            restanteSpan.className = 'valor' + (ok ? ' ok' : ' erro');
        }
    }

    if (addBtn) {
        addBtn.addEventListener('click', function() {
            var total = 0;
            document.querySelectorAll('input[name="pagamentos[valor][]"]').forEach(function(i) {
                var v = parseFloat(i.value.replace(',', '.'));
                if (!isNaN(v)) total += v;
            });
            var restante = Math.max(0, valorTotal - total);
            container.appendChild(criarLinhaPagamento(restante > 0 ? restante : null));
            recalcular();
        });
    }

    // Primeira linha automática
    if (container) {
        container.appendChild(criarLinhaPagamento(valorTotal > 0 ? valorTotal : null));
        recalcular();
    }

    // Submit
    var formPag = document.getElementById('form-pagamento');
    if (formPag) {
        formPag.addEventListener('submit', function(e) {
            e.preventDefault();
            var btn = document.getElementById('btn-confirmar');

            var totalPago = 0;
            document.querySelectorAll('input[name="pagamentos[valor][]"]').forEach(function(i) {
                var v = parseFloat(i.value.replace(',', '.'));
                if (!isNaN(v)) totalPago += v;
            });

            if (valorTotal > 0 && Math.abs(totalPago - valorTotal) > 0.01) {
                showToast('A soma dos pagamentos (R$ ' + totalPago.toFixed(2).replace('.',',') + ') deve ser igual ao total (R$ ' + valorTotal.toFixed(2).replace('.',',') + ').', 'error');
                return;
            }
            if (totalPago <= 0) {
                showToast('Informe pelo menos um valor de pagamento.', 'error');
                return;
            }

            btn.disabled = true;
            btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Processando...';

            document.querySelectorAll('input[name="pagamentos[valor][]"]').forEach(function(i) {
                var v = i.value.trim().replace(',', '.');
                var partes = v.split('.');
                if (partes.length > 2) v = partes[0] + '.' + partes.slice(1).join('');
                i.value = parseFloat(v).toFixed(2);
            });

            var fd = new FormData(formPag);
            fetch(formPag.getAttribute('action'), { method: 'POST', body: fd })
                .then(function(r) { return r.text(); })
                .then(function(txt) {
                    var data;
                    try { data = JSON.parse(txt); } catch(ex) { throw new Error('Resposta inválida: ' + txt.substring(0,200)); }
                    if (data.sucesso) {
                        showToast(data.mensagem || 'Pagamento confirmado!', 'success');
                        setTimeout(function() { window.location.href = window.__BASE_URL + '?rota=painel'; }, 1500);
                    } else {
                        showToast(data.erro || 'Erro desconhecido.', 'error');
                        btn.disabled = false;
                        btn.innerHTML = '<i class="fa fa-check"></i> Confirmar Pagamento';
                    }
                })
                .catch(function(err) {
                    showToast('Erro de comunicação: ' + err.message, 'error');
                    btn.disabled = false;
                    btn.innerHTML = '<i class="fa fa-check"></i> Confirmar Pagamento';
                });
        });
    }

    function showToast(message, type) {
        var toast = document.getElementById('toast-notification');
        toast.textContent = message;
        toast.className = 'toast show ' + (type || 'success');
        setTimeout(function() { toast.className = 'toast'; }, 5000);
    }
});

// Busca odonto
var _tOdonto = null;
function buscaOdonto(term) {
    var lista  = document.getElementById('drop_odonto');
    var status = document.getElementById('status_odonto');
    clearTimeout(_tOdonto);
    if (lista) { lista.innerHTML = ''; lista.style.display = 'none'; }
    if (!term) { if(status) status.innerHTML = 'Digite o nome para buscar o paciente.'; return; }
    if(status) status.innerHTML = 'Buscando...';
    _tOdonto = setTimeout(function() {
        fetch(window.__BASE_URL + 'ajax/buscar_paciente.php?term=' + encodeURIComponent(term))
            .then(function(r){ return r.json(); })
            .then(function(data) {
                if (!lista) return;
                lista.innerHTML = '';
                if (!data.length) { if(status) status.innerHTML = 'Nenhum paciente encontrado.'; return; }
                data.forEach(function(p) {
                    var li = document.createElement('li');
                    li.style.cssText = 'padding:10px 14px;cursor:pointer;border-bottom:1px solid #f1f5f9;font-size:14px;list-style:none;';
                    li.innerHTML = '<strong>' + (p.nome||'').replace(/</g,'&lt;') + '</strong>'
                        + (p.cpf ? ' <span style="color:#94a3b8;font-size:12px;"> · CPF: '+p.cpf+'</span>' : '');
                    li.onmouseover = function(){ this.style.background='#eff6ff'; };
                    li.onmouseout  = function(){ this.style.background=''; };
                    li.onmousedown = function(e) {
                        e.preventDefault();
                        window.location.href = window.__BASE_URL + '?rota=atendimentos.pagamento&paciente_id=' + p.id;
                    };
                    lista.appendChild(li);
                });
                lista.style.display = 'block';
                if(status) status.innerHTML = data.length + ' encontrado(s). Clique para selecionar.';
            })
            .catch(function(){ if(status) status.innerHTML = 'Erro na busca.'; });
    }, 220);
}

document.addEventListener('click', function(e) {
    var lista = document.getElementById('drop_odonto');
    var input = document.getElementById('paciente_busca_odonto');
    if (lista && input && !input.contains(e.target) && !lista.contains(e.target))
        lista.style.display = 'none';
});
</script>