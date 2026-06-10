<?php if (isset($_GET['erro']) && $_GET['erro'] === 'conflito_atendimento'): ?>
<div class="cad-alert cad-alert-error"><i class="fa fa-exclamation-circle"></i> Não é possível excluir o paciente, pois ele está vinculado a um ou mais atendimentos.</div>
<?php endif; ?>
<?php if (isset($_GET['msg'])): ?>
<?php if ($_GET['msg'] === 'sucesso'): ?>
<div class="cad-alert cad-alert-success"><i class="fa fa-check-circle"></i> Paciente salvo com sucesso!</div>
<?php elseif ($_GET['msg'] === 'excluido'): ?>
<div class="cad-alert cad-alert-success"><i class="fa fa-check-circle"></i> Paciente excluído com sucesso!</div>
<?php endif; ?>
<?php endif; ?>

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

<h1 class="cad-page-title">Cadastros</h1>

<!-- Abas -->
<div class="cad-tabs">
    <a href="<?= BASE_URL ?>?rota=pacientes"     class="cad-tab active"><i class="fa fa-user"></i> Pacientes</a>
    <?php if (is_admin()): ?>
    <a href="<?= BASE_URL ?>?rota=procedimentos" class="cad-tab"><i class="fa fa-stethoscope"></i> Procedimentos</a>
    <a href="<?= BASE_URL ?>?rota=despesas"      class="cad-tab"><i class="fa fa-money"></i> Despesas</a>
    <a href="<?= BASE_URL ?>?rota=usuarios"      class="cad-tab"><i class="fa fa-users"></i> Usuários</a>
    <?php endif; ?>
</div>

<!-- Formulário Novo Paciente -->
<div class="cad-form-card">
    <div class="cad-form-title"><i class="fa fa-user-plus" style="color:#005b96;"></i> Novo Paciente</div>
    <form action="<?= BASE_URL ?>?rota=pacientes.salvar" method="POST">
        <div class="cad-form-grid">
            <div class="cad-span-6">
                <label class="cad-field-label">Nome Completo</label>
                <input type="text" name="paciente_nome" class="cad-field-input" required>
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">CPF</label>
                <input type="text" name="paciente_cpf" class="cad-field-input" maxlength="14" oninput="mascaraCPF(this)">
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Data de Nascimento</label>
                <input type="date" name="paciente_data_nascimento" class="cad-field-input">
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Telefone</label>
                <input type="text" name="paciente_telefone" class="cad-field-input" maxlength="15" oninput="mascaraTelefone(this)">
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">E-mail</label>
                <input type="email" name="paciente_email" class="cad-field-input" onblur="validarEmail(this)">
                <span id="email-error" style="color:#ef4444;font-size:0.75rem;display:none;">E-mail inválido</span>
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">CEP</label>
                <input type="text" name="paciente_cep" class="cad-field-input" maxlength="9" oninput="mascaraCEP(this)">
            </div>
            <div class="cad-span-4">
                <label class="cad-field-label">Endereço</label>
                <input type="text" name="paciente_endereco" class="cad-field-input">
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Número</label>
                <input type="text" name="paciente_numero" class="cad-field-input">
            </div>
            <div class="cad-span-4">
                <label class="cad-field-label">Bairro</label>
                <input type="text" name="paciente_bairro" class="cad-field-input">
            </div>
            <div class="cad-span-4">
                <label class="cad-field-label">Cidade</label>
                <input type="text" name="paciente_cidade" class="cad-field-input">
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Estado</label>
                <input type="text" name="paciente_estado" class="cad-field-input" maxlength="2">
            </div>
        </div>
        <button type="submit" class="cad-btn-save"><i class="fa fa-check"></i> Salvar Paciente</button>
    </form>
</div>

<!-- Tabela de Pacientes -->
<div class="cad-card">
    <div class="cad-card-header">
        <h3>Pacientes Cadastrados</h3>
        <div style="display:flex; gap:12px; align-items:center;">
            <div class="cad-busca-pos">
                <div class="cad-busca-wrap">
                    <i class="fa fa-search"></i>
                    <input type="text" id="busca_pacientes"
                           placeholder="Buscar paciente..."
                           value="<?= htmlspecialchars($busca) ?>"
                           autocomplete="off">
                </div>
                <ul id="drop_pacientes"></ul>
            </div>
        </div>
    </div>

    <table class="cad-table mobile-card-table" id="tabela_pacientes">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th style="text-align:right;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($pacientes) > 0): ?>
                <?php foreach ($pacientes as $paciente): ?>
                <tr>
                    <td data-label="Nome" style="font-weight:600; color:#0f172a;"><?= htmlspecialchars($paciente['nome']) ?></td>
                    <td data-label="CPF" style="color:#64748b;"><?= htmlspecialchars($paciente['cpf'] ?? '—') ?></td>
                    <td data-label="Telefone" style="color:#64748b;"><?= htmlspecialchars($paciente['telefone'] ?? '—') ?></td>
                    <td data-label="Ações">
                        <div style="display:flex; gap:6px; justify-content:flex-end;">
                            <a href="<?= BASE_URL ?>?rota=pacientes.editar&id=<?= $paciente['id'] ?>" class="cad-btn-edit" title="Editar"><i class="fa fa-pencil"></i></a>
                            <a href="<?= BASE_URL ?>?rota=pacientes.excluir&id=<?= $paciente['id'] ?>" class="cad-btn-del" title="Remover" onclick="return confirm('Deseja remover este paciente?');"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr><td colspan="4" style="text-align:center; padding:40px; color:#94a3b8;">
                <i class="fa fa-users" style="display:block; font-size:2rem; margin-bottom:8px; color:#cbd5e1;"></i>
                Nenhum paciente cadastrado.
            </td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php if ($totalPaginas > 1): ?>
    <div class="cad-paginacao">
        <?php for ($i = 1; $i <= $totalPaginas; $i++):
            $queryParams = $_GET; $queryParams['pagina'] = $i;
            $url = '?' . http_build_query($queryParams);
        ?>
        <a href="<?= $url ?>" class="<?= $i === $pagina ? 'ativo' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
</div>

<script>
function mascaraCPF(i) {
    var v = i.value.replace(/\D/g,"");
    v = v.replace(/(\d{3})(\d)/,"$1.$2");
    v = v.replace(/(\d{3})(\d)/,"$1.$2");
    v = v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    i.value = v;
}
function mascaraTelefone(i) {
    var v = i.value.replace(/\D/g,"");
    v = v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v = v.replace(/(\d)(\d{4})$/,"$1-$2");
    i.value = v;
}
function mascaraCEP(i) {
    var v = i.value.replace(/\D/g,"");
    v = v.replace(/^(\d{5})(\d)/,"$1-$2");
    i.value = v;
}
function validarEmail(field) {
    const u = field.value.substring(0, field.value.indexOf("@"));
    const d = field.value.substring(field.value.indexOf("@")+1);
    const err = document.getElementById('email-error');
    if (!field.value) { err.style.display='none'; return; }
    const ok = u.length>=1 && d.length>=3 && !u.includes("@") && !d.includes("@") && !u.includes(" ") && !d.includes(" ") && d.includes(".") && d.indexOf(".")>=1 && d.lastIndexOf(".")<d.length-1;
    err.style.display = ok ? 'none' : 'block';
}
</script>

<script>
(function() {
    window.buscaLiveTable = function(cfg) {
        var input = document.getElementById(cfg.inputId);
        var table = document.getElementById(cfg.tableId);
        if (!input || !table) return;
        input.addEventListener('keydown', function(e) { if (e.key==='Enter') e.preventDefault(); });
        var _t = null;
        input.addEventListener('input', function() {
            clearTimeout(_t);
            var term = this.value.toLowerCase().trim();
            _t = setTimeout(function() {
                table.querySelectorAll('tbody tr').forEach(function(row) {
                    var txt = cfg.colIndex!==undefined ? (row.cells[cfg.colIndex]?row.cells[cfg.colIndex].textContent.toLowerCase():'') : row.textContent.toLowerCase();
                    row.style.display = (!term||txt.includes(term)) ? '' : 'none';
                });
            }, 150);
        });
    };
    window.buscaLiveDropdown = function(cfg) {
        var input = document.getElementById(cfg.inputId);
        var lista = document.getElementById(cfg.listId);
        var status = cfg.statusId ? document.getElementById(cfg.statusId) : null;
        if (!input||!lista) return;
        input.addEventListener('keydown', function(e) { if (e.key==='Enter'){e.preventDefault();lista.style.display='none';} });
        var _t = null;
        input.addEventListener('input', function() {
            var term = this.value; clearTimeout(_t);
            lista.innerHTML=''; lista.style.display='none';
            if (!term) { if(status) status.textContent=''; return; }
            if(status) status.textContent='Buscando...';
            _t = setTimeout(function() {
                fetch(window.__BASE_URL+'ajax/buscar_paciente.php?term='+encodeURIComponent(term))
                    .then(function(r){return r.json();})
                    .then(function(data) {
                        lista.innerHTML='';
                        if (!data.length) { if(status) status.textContent='Nenhum encontrado.'; return; }
                        data.forEach(function(p) {
                            var li = document.createElement('li');
                            li.style.cssText='padding:10px 14px;cursor:pointer;border-bottom:1px solid #f1f5f9;font-size:14px;list-style:none;';
                            li.innerHTML='<strong>'+esc(p.nome)+'</strong>'+(p.cpf?' <span style="color:#94a3b8;font-size:12px;"> · '+esc(p.cpf)+'</span>':'');
                            li.onmouseover=function(){this.style.background='#eff6ff';};
                            li.onmouseout=function(){this.style.background='';};
                            li.onmousedown=function(e){e.preventDefault();lista.style.display='none';if(cfg.onSelect)cfg.onSelect(p);};
                            lista.appendChild(li);
                        });
                        lista.style.display='block';
                        if(status) status.textContent=data.length+' encontrado(s).';
                    }).catch(function(){if(status)status.textContent='Erro.';});
            }, 220);
        });
        document.addEventListener('click', function(e) {
            if (!input.contains(e.target)&&!lista.contains(e.target)) lista.style.display='none';
        });
    };
    function esc(s){return String(s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');}
})();
buscaLiveTable({ inputId:'busca_pacientes', tableId:'tabela_pacientes', colIndex:0 });
buscaLiveDropdown({
    inputId:'busca_pacientes', listId:'drop_pacientes',
    onSelect: function(p) { window.location.href = window.__BASE_URL+'?rota=pacientes.editar&id='+p.id; }
});
</script>