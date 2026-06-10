<style>
/* ── Cadastros compartilhado ── */
.cad-page-title { font-size:1.6rem; font-weight:700; color:#0f172a; margin:0 0 24px; }
.cad-alert { display:flex; align-items:center; gap:8px; padding:12px 16px; border-radius:10px; font-size:0.875rem; font-weight:600; margin-bottom:16px; }
.cad-alert-success { background:#e8fdf5; color:#059669; border:1px solid #a7f3d0; }
.cad-alert-error   { background:#fef2f2; color:#dc2626; border:1px solid #fecaca; }

/* Abas */
.cad-tabs { display:flex; gap:8px; margin-bottom:28px; flex-wrap:wrap; }
.cad-tab {
    display:inline-flex; align-items:center; gap:7px;
    padding:8px 18px; border-radius:50px;
    font-size:0.85rem; font-weight:600;
    text-decoration:none; border:1.5px solid #e2e8f0;
    color:#64748b; background:#fff;
    transition:all 0.2s; cursor:pointer;
}
.cad-tab:hover { border-color:#005b96; color:#005b96; background:#eef4fb; }
.cad-tab.active { background:#0f172a; color:#fff; border-color:#0f172a; }

/* Card principal */
.cad-card {
    background:#fff; border-radius:16px;
    border:1px solid #f0f4f8;
    box-shadow:0 2px 12px rgba(0,0,0,0.06);
    overflow:hidden; margin-bottom:20px;
}

/* Header do card */
.cad-card-header {
    display:flex; justify-content:space-between; align-items:center;
    padding:18px 24px; border-bottom:1px solid #f1f5f9;
}
.cad-card-header h3 { font-size:0.95rem; font-weight:700; color:#0f172a; margin:0; }

/* Busca */
.cad-busca-wrap {
    display:flex; align-items:center; gap:8px;
    background:#f8fafc; border:1.5px solid #e2e8f0;
    border-radius:8px; padding:8px 14px;
    transition:border-color 0.2s; max-width:280px;
}
.cad-busca-wrap:focus-within { border-color:#005b96; background:#fff; }
.cad-busca-wrap i { font-size:13px; color:#94a3b8; }
.cad-busca-wrap input {
    border:none; background:none; outline:none;
    font-size:0.85rem; color:#374151; font-family:inherit; width:200px;
}
.cad-busca-wrap input::placeholder { color:#94a3b8; }

/* Botão novo */
.cad-btn-novo {
    display:inline-flex; align-items:center; gap:6px;
    background:#0f172a; color:#fff; border:none; border-radius:8px;
    padding:9px 18px; font-size:0.875rem; font-weight:600;
    text-decoration:none; cursor:pointer; transition:background 0.2s;
    white-space:nowrap; font-family:inherit;
}
.cad-btn-novo:hover { background:#005b96; }

/* Tabela */
.cad-table { width:100%; border-collapse:collapse; }
.cad-table th {
    padding:11px 16px; font-size:0.7rem; font-weight:700;
    text-transform:uppercase; letter-spacing:0.5px; color:#64748b;
    text-align:left; border-bottom:1px solid #f1f5f9; background:#f8fafc;
}
.cad-table td {
    padding:13px 16px; font-size:0.875rem; color:#374151;
    border-bottom:1px solid #f8fafc; vertical-align:middle;
}
.cad-table tbody tr:last-child td { border-bottom:none; }
.cad-table tbody tr { transition:background 0.15s; }
.cad-table tbody tr:hover { background:#f8fafc; }

/* Botões ação */
.cad-btn-edit, .cad-btn-del {
    display:inline-flex; align-items:center; justify-content:center;
    width:32px; height:32px; border-radius:8px; border:none;
    cursor:pointer; font-size:14px; transition:all 0.2s;
    text-decoration:none;
}
.cad-btn-edit { background:#eef4fb; color:#005b96; }
.cad-btn-edit:hover { background:#005b96; color:#fff; }
.cad-btn-del  { background:#fef2f2; color:#ef4444; }
.cad-btn-del:hover  { background:#ef4444; color:#fff; }

/* Badge */
.cad-badge {
    display:inline-block; padding:3px 10px; border-radius:20px;
    font-size:0.72rem; font-weight:700; letter-spacing:0.2px;
}

/* Formulário inline */
.cad-form-card {
    background:#fff; border-radius:16px;
    border:1px solid #f0f4f8; box-shadow:0 2px 12px rgba(0,0,0,0.06);
    padding:24px; margin-bottom:20px;
}
.cad-form-title {
    font-size:0.95rem; font-weight:700; color:#0f172a; margin:0 0 20px;
    display:flex; align-items:center; gap:8px;
}
.cad-form-grid { display:grid; grid-template-columns:repeat(6,1fr); gap:16px; margin-bottom:20px; }
.cad-span-2 { grid-column:span 2; }
.cad-span-3 { grid-column:span 3; }
.cad-span-4 { grid-column:span 4; }
.cad-span-6 { grid-column:span 6; }
@media (max-width:768px) {
    .cad-span-2,.cad-span-3,.cad-span-4,.cad-span-6 { grid-column:span 6; }
    .cad-tabs { gap:6px; }
    .cad-tab { padding:7px 12px; font-size:0.8rem; }
}
.cad-field-label {
    display:block; font-size:0.72rem; font-weight:700;
    text-transform:uppercase; letter-spacing:0.5px; color:#64748b; margin-bottom:6px;
}
.cad-field-input {
    width:100%; background:#f8fafc; border:1.5px solid #e2e8f0;
    border-radius:10px; padding:10px 14px; font-size:0.875rem;
    color:#374151; font-family:inherit; outline:none;
    transition:border-color 0.2s; box-sizing:border-box;
}
.cad-field-input:focus { border-color:#005b96; background:#fff; }
.cad-btn-save {
    display:inline-flex; align-items:center; gap:7px;
    background:#00b894; color:#fff; border:none; border-radius:10px;
    padding:11px 24px; font-size:0.9rem; font-weight:700;
    cursor:pointer; font-family:inherit; transition:background 0.2s;
}
.cad-btn-save:hover { background:#019e7f; }

/* Paginação */
.cad-paginacao { display:flex; justify-content:flex-end; align-items:center; gap:4px; padding:14px 24px; border-top:1px solid #f1f5f9; }
.cad-paginacao a {
    display:inline-flex; align-items:center; justify-content:center;
    width:32px; height:32px; border-radius:8px; font-size:0.85rem;
    font-weight:600; text-decoration:none; transition:all 0.2s;
    color:#374151; background:#f1f5f9;
}
.cad-paginacao a.ativo { background:#0f172a; color:#fff; }
.cad-paginacao a:hover:not(.ativo) { background:#e2e8f0; }

/* Dropdown busca */
.cad-busca-pos { position:relative; }
#drop_pacientes {
    display:none; position:absolute; top:calc(100% + 4px); left:0; right:0;
    background:#fff; border:1.5px solid #e2e8f0; border-radius:10px;
    max-height:220px; overflow-y:auto; z-index:99999;
    box-shadow:0 8px 24px rgba(0,0,0,0.12); padding:4px 0; list-style:none; margin:0;
}
</style>
<?php if (isset($_GET['erro']) && $_GET['erro'] === 'conflito'): ?>
<div class="cad-alert cad-alert-error"><i class="fa fa-exclamation-circle"></i> Não é possível excluir o procedimento, pois ele está vinculado a atendimentos.</div>
<?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'sucesso'): ?>
<div class="cad-alert cad-alert-success"><i class="fa fa-check-circle"></i> Procedimento salvo com sucesso!</div>
<?php endif; ?>

<h1 class="cad-page-title">Cadastros</h1>

<div class="cad-tabs">
    <a href="<?= BASE_URL ?>?rota=pacientes"     class="cad-tab"><i class="fa fa-user"></i> Pacientes</a>
    <a href="<?= BASE_URL ?>?rota=procedimentos" class="cad-tab active"><i class="fa fa-stethoscope"></i> Procedimentos</a>
    <a href="<?= BASE_URL ?>?rota=despesas"      class="cad-tab"><i class="fa fa-money"></i> Despesas</a>
    <a href="<?= BASE_URL ?>?rota=usuarios"      class="cad-tab"><i class="fa fa-users"></i> Usuários</a>
</div>

<!-- Formulário Novo Procedimento -->
<div class="cad-form-card">
    <div class="cad-form-title"><i class="fa fa-plus-circle" style="color:#005b96;"></i> Novo Procedimento</div>
    <form action="<?= BASE_URL ?>?rota=procedimentos.salvar" method="POST">
        <div class="cad-form-grid">
            <div class="cad-span-6">
                <label class="cad-field-label">Nome do Procedimento</label>
                <input type="text" name="nome" class="cad-field-input" required>
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Categoria</label>
                <select name="categoria" class="cad-field-input" required>
                    <option value="geral">Geral</option>
                    <option value="especializado">Especializado</option>
                    <option value="protese">Prótese</option>
                </select>
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Tipo de Execução</label>
                <select name="tipo_execucao" class="cad-field-input" required>
                    <option value="geral">Clínico Geral</option>
                    <option value="especializado">Especializado (rateio automático)</option>
                    <option value="ortodoncia">Ortodontia (sem rateio)</option>
                </select>
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Arquivo</label>
                <select name="tipo" class="cad-field-input" required>
                    <option value="0">Sem Arquivo</option>
                    <option value="1">Com Arquivo</option>
                </select>
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Valor Base (R$)</label>
                <input type="number" step="0.01" name="valor_base" class="cad-field-input">
            </div>
        </div>
        <button type="submit" class="cad-btn-save"><i class="fa fa-check"></i> Salvar Procedimento</button>
    </form>
</div>

<!-- Tabela -->
<div class="cad-card">
    <div class="cad-card-header">
        <h3>Procedimentos Cadastrados</h3>
        <div class="cad-busca-wrap">
            <i class="fa fa-search"></i>
            <input type="text" id="busca_procs" placeholder="Buscar procedimento..." autocomplete="off">
        </div>
    </div>

    <table class="cad-table mobile-card-table" id="tabela_procs">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Tipo de Execução</th>
                <th>Valor Base</th>
                <th style="text-align:right;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($procedimentos) > 0): ?>
                <?php
                $cat_colors = [
                    'geral'        => ['bg'=>'#eef4fb','color'=>'#005b96'],
                    'especializado'=> ['bg'=>'#fdf4ff','color'=>'#9333ea'],
                    'protese'      => ['bg'=>'#fff7ed','color'=>'#ea580c'],
                ];
                $exec_colors = [
                    'geral'        => ['bg'=>'#f0fdf4','color'=>'#16a34a', 'label'=>'Clínico Geral'],
                    'especializado'=> ['bg'=>'#fdf4ff','color'=>'#9333ea', 'label'=>'Especializado'],
                    'ortodoncia'   => ['bg'=>'#fff7ed','color'=>'#ea580c', 'label'=>'Ortodontia'],
                ];
                $counter = 1;
                foreach ($procedimentos as $p):
                    $cc = $cat_colors[$p['categoria']] ?? ['bg'=>'#f1f5f9','color'=>'#64748b'];
                    $te = $exec_colors[$p['tipo_execucao'] ?? 'geral'] ?? ['bg'=>'#f1f5f9','color'=>'#64748b','label'=>'Geral'];
                ?>
                <tr>
                    <td style="color:#94a3b8;font-size:0.78rem;">C<?= str_pad($counter++,3,'0',STR_PAD_LEFT) ?></td>
                    <td style="font-weight:600;color:#0f172a;"><?= htmlspecialchars($p['nome']) ?></td>
                    <td>
                        <span class="cad-badge" style="background:<?= $cc['bg'] ?>;color:<?= $cc['color'] ?>;">
                            <?= ucfirst($p['categoria']) ?>
                        </span>
                    </td>
                    <td>
                        <span class="cad-badge" style="background:<?= $te['bg'] ?>;color:<?= $te['color'] ?>;">
                            <?= $te['label'] ?>
                        </span>
                    </td>
                    <td style="font-weight:600;">R$ <?= number_format($p['valor_base'], 2, ',', '.') ?></td>
                    <td>
                        <div style="display:flex;gap:6px;justify-content:flex-end;">
                            <a href="<?= BASE_URL ?>?rota=procedimentos.excluir&id=<?= $p['id'] ?>" class="cad-btn-del" title="Remover" onclick="return confirm('Remover este procedimento?');"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr><td colspan="6" style="text-align:center;padding:40px;color:#94a3b8;">
                <i class="fa fa-stethoscope" style="display:block;font-size:2rem;margin-bottom:8px;color:#cbd5e1;"></i>
                Nenhum procedimento cadastrado.
            </td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
(function(){
    var inp = document.getElementById('busca_procs');
    var tbl = document.getElementById('tabela_procs');
    if (!inp||!tbl) return;
    var _t = null;
    inp.addEventListener('input', function() {
        clearTimeout(_t);
        var term = this.value.toLowerCase().trim();
        _t = setTimeout(function(){
            tbl.querySelectorAll('tbody tr').forEach(function(row){
                row.style.display = (!term||row.textContent.toLowerCase().includes(term)) ? '' : 'none';
            });
        }, 150);
    });
})();
</script>