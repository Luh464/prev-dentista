<?php if (isset($_GET['msg'])): ?>
    <?php $msgs = ['taxa_salva'=>'Taxa salva!','taxa_atualizada'=>'Taxa atualizada!','taxa_excluida'=>'Taxa removida!']; ?>
    <div class="cad-alert cad-alert-success"><i class="fa fa-check-circle"></i> <?= $msgs[$_GET['msg']] ?? 'Operação realizada!' ?></div>
<?php endif; ?>
<?php if (isset($_GET['erro'])): ?>
    <?php $erros = ['dados_invalidos'=>'Dados inválidos. Verifique os campos.']; ?>
    <div class="cad-alert cad-alert-error"><i class="fa fa-exclamation-circle"></i> <?= $erros[$_GET['erro']] ?? 'Erro ao processar.' ?></div>
<?php endif; ?>

<style>
.cfg-tabs { display:flex !important; gap:8px; margin-bottom:28px; flex-wrap:wrap; }
.cfg-tabs .cfg-tab {
    display:inline-flex !important; align-items:center; gap:7px;
    padding:8px 18px !important; border-radius:50px !important; font-size:0.85rem; font-weight:600;
    text-decoration:none !important; border:1.5px solid #e2e8f0 !important; color:#64748b !important; background:#fff !important;
    transition:all 0.2s; white-space:nowrap;
}
.cfg-tabs .cfg-tab:hover { border-color:#005b96 !important; color:#fff !important; background:#005b96 !important; }
.cfg-tabs .cfg-tab.active { background:#005b96 !important; color:#fff !important; border-color:#005b96 !important; }

.taxa-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.taxa-bandeira-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #f0f4f8;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    overflow: hidden;
}

.taxa-bandeira-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 16px 20px;
    border-bottom: 1px solid #f1f5f9;
    background: #f8fafc;
}

.taxa-bandeira-icon {
    width: 36px; height: 36px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; font-weight: 700;
}

.taxa-bandeira-nome { font-size: 0.95rem; font-weight: 700; color: #0f172a; }

.taxa-parcela-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
    border-bottom: 1px solid #f8fafc;
    transition: background 0.15s;
}
.taxa-parcela-row:last-child { border-bottom: none; }
.taxa-parcela-row:hover { background: #f8fafc; }

.taxa-parcela-label { font-size: 0.82rem; color: #64748b; font-weight: 500; }
.taxa-parcela-valor { font-size: 0.9rem; font-weight: 700; color: #005b96; }
.taxa-parcela-valor.zero { color: #00b894; }

.taxa-edit-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 28px; height: 28px; border-radius: 7px;
    background: #eef4fb; color: #005b96; border: none;
    cursor: pointer; font-size: 12px; transition: all 0.2s;
    text-decoration: none;
}
.taxa-edit-btn:hover { background: #005b96; color: #fff; }
.taxa-del-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 28px; height: 28px; border-radius: 7px;
    background: #fef2f2; color: #ef4444; border: none;
    cursor: pointer; font-size: 12px; transition: all 0.2s;
    text-decoration: none;
}
.taxa-del-btn:hover { background: #ef4444; color: #fff; }

/* Modal edição inline */
.taxa-modal-overlay {
    display: none; position: fixed; inset: 0;
    background: rgba(10,25,50,0.5); z-index: 9000;
    align-items: center; justify-content: center;
    backdrop-filter: blur(3px);
}
.taxa-modal-overlay.open { display: flex; }
.taxa-modal-box {
    background: #fff; border-radius: 18px;
    width: 100%; max-width: 400px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.18);
    animation: modalIn 0.25s ease;
}
@keyframes modalIn { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
.taxa-modal-header {
    display: flex; justify-content: space-between; align-items: center;
    padding: 20px 24px; border-bottom: 1px solid #f1f5f9;
}
.taxa-modal-header h3 { font-size: 1rem; font-weight: 700; color: #0f172a; margin: 0; }
.taxa-modal-close { background:none; border:none; font-size:20px; color:#94a3b8; cursor:pointer; }
.taxa-modal-body { padding: 24px; }
.taxa-modal-footer { padding: 16px 24px; border-top: 1px solid #f1f5f9; display:flex; gap:10px; justify-content:flex-end; }
</style>

<h1 class="cad-page-title">Configurações</h1>

<div class="cfg-tabs">
    <a href="<?= BASE_URL ?>?rota=configuracao.taxas"     class="cfg-tab active">Taxas de Cartão</a>
    <a href="<?= BASE_URL ?>?rota=configuracao.comissoes" class="cfg-tab">Regras de Comissão</a>
    <a href="<?= BASE_URL ?>?rota=configuracoes"          class="cfg-tab">Meu Perfil</a>
</div>

<!-- Formulário nova taxa -->
<div class="cad-form-card">
    
    <form action="<?= BASE_URL ?>?rota=configuracao.taxas.salvar" method="POST">
        <div class="cad-form-grid">
            <div class="cad-span-2">
                <label class="cad-field-label">Bandeira</label>
                <select name="bandeira" class="cad-field-input" required>
                    <option value="">Selecione...</option>
                    <?php foreach (['Visa','Master','Elo','Amex','Hipercard','Debito','Pix','Dinheiro'] as $b): ?>
                    <option value="<?= $b ?>"><?= $b ?></option>
                    <?php endforeach; ?>
                    <option value="__nova__">+ Nova bandeira</option>
                </select>
            </div>
            <div class="cad-span-2" id="nova-bandeira-wrap" style="display:none;">
                <label class="cad-field-label">Nome da Bandeira</label>
                <input type="text" name="bandeira_nova" id="bandeira_nova" class="cad-field-input" placeholder="Ex: Cabal">
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Parcelas</label>
                <select name="parcelas" class="cad-field-input" required>
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?>x</option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Taxa (%)</label>
                <input type="number" step="0.01" min="0" max="100" name="taxa_percentual" class="cad-field-input" placeholder="Ex: 2.99" required>
            </div>
        </div>
        <button type="submit" class="cad-btn-save"><i class="fa fa-check"></i> Salvar Taxa</button>
    </form>
</div>

<!-- Tabela por bandeira -->
<?php if (!empty($taxas_agrupadas)): ?>
<div class="taxa-grid">
    <?php
    $bandeira_icons = [
        'Visa'      => ['VI', '#1A1F71'],
        'Master'    => ['MC', '#EB001B'],
        'Elo'       => ['EL', '#c8860a'],
        'Amex'      => ['AX', '#016FD0'],
        'Hipercard' => ['HC', '#B20014'],
        'Debito'    => ['DB', '#374151'],
        'Pix'       => ['PX', '#00B894'],
        'Dinheiro'  => ['DI', '#059669'],
    ];
    foreach ($taxas_agrupadas as $bandeira => $parcelas_taxa):
        $sigla = strtoupper(substr($bandeira, 0, 2));
        $icon = $bandeira_icons[$bandeira] ?? [$sigla, '#005b96'];
        ksort($parcelas_taxa);
    ?>
    <div class="taxa-bandeira-card">
        <div class="taxa-bandeira-header">
            <div class="taxa-bandeira-icon" style="background:<?= $icon[1] ?>20; color:<?= $icon[1] ?>; font-size:0.72rem; font-weight:800; letter-spacing:0.5px;">
                <?= $icon[0] ?>
            </div>
            <div>
                <div class="taxa-bandeira-nome"><?= htmlspecialchars($bandeira) ?></div>
                <div style="font-size:0.72rem; color:#94a3b8;"><?= count($parcelas_taxa) ?> configuração(ões)</div>
            </div>
        </div>
        <?php foreach ($parcelas_taxa as $parcela => $taxa): ?>
        <div class="taxa-parcela-row">
            <span class="taxa-parcela-label">
                <?= $parcela ?>x <?= $parcela === 1 ? '(à vista)' : '' ?>
            </span>
            <div style="display:flex; align-items:center; gap:10px;">
                <span class="taxa-parcela-valor <?= $taxa['taxa_percentual'] == 0 ? 'zero' : '' ?>">
                    <?= number_format($taxa['taxa_percentual'], 2, ',', '.') ?>%
                </span>
                <button class="taxa-edit-btn" title="Editar"
                        onclick="abrirEdicao(<?= $taxa['id'] ?>, '<?= htmlspecialchars($bandeira) ?>', <?= $parcela ?>, <?= $taxa['taxa_percentual'] ?>)">
                    <i class="fa fa-pencil"></i>
                </button>
                <a href="<?= BASE_URL ?>?rota=configuracao.taxas.excluir&id=<?= $taxa['id'] ?>"
                   class="taxa-del-btn" title="Remover"
                   onclick="return confirm('Remover esta taxa?')">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
<div class="cad-card" style="padding:40px; text-align:center; color:#94a3b8;">
    <i class="fa fa-credit-card" style="font-size:2rem; display:block; margin-bottom:10px; color:#cbd5e1;"></i>
    Nenhuma taxa cadastrada. Adicione a primeira acima.
</div>
<?php endif; ?>

<!-- Modal edição -->
<div class="taxa-modal-overlay" id="editModal">
    <div class="taxa-modal-box">
        <div class="taxa-modal-header">
            <h3 id="editModalTitle">Editar Taxa</h3>
            <button class="taxa-modal-close" onclick="fecharEdicao()"><i class="fa fa-times"></i></button>
        </div>
        <form action="<?= BASE_URL ?>?rota=configuracao.taxas.atualizar" method="POST">
            <div class="taxa-modal-body">
                <input type="hidden" name="id" id="edit_id">
                <div style="margin-bottom:16px;">
                    <label class="cad-field-label">Bandeira / Parcelas</label>
                    <input type="text" id="edit_info" class="cad-field-input" style="width:100%;" readonly>
                </div>
                <div>
                    <label class="cad-field-label">Taxa (%)</label>
                    <input type="number" step="0.01" min="0" max="100" name="taxa_percentual"
                           id="edit_taxa" class="cad-field-input" style="width:100%;" required>
                </div>
            </div>
            <div class="taxa-modal-footer">
                <button type="button" class="btn-fechar-detalhe" onclick="fecharEdicao()">Cancelar</button>
                <button type="submit" class="cad-btn-save"><i class="fa fa-check"></i> Salvar</button>
            </div>
        </form>
    </div>
</div>

<script>
// Nova bandeira custom
document.querySelector('select[name="bandeira"]').addEventListener('change', function() {
    const wrap = document.getElementById('nova-bandeira-wrap');
    const inp  = document.getElementById('bandeira_nova');
    if (this.value === '__nova__') {
        wrap.style.display = 'block';
        inp.name = 'bandeira';
        this.name = '_bandeira_select';
    } else {
        wrap.style.display = 'none';
        inp.name = 'bandeira_nova';
        this.name = 'bandeira';
    }
});

function abrirEdicao(id, bandeira, parcelas, taxa) {
    document.getElementById('edit_id').value    = id;
    document.getElementById('edit_info').value  = bandeira + ' · ' + parcelas + 'x';
    document.getElementById('edit_taxa').value  = taxa;
    document.getElementById('editModalTitle').textContent = 'Editar Taxa — ' + bandeira + ' ' + parcelas + 'x';
    document.getElementById('editModal').classList.add('open');
}

function fecharEdicao() {
    document.getElementById('editModal').classList.remove('open');
}

document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) fecharEdicao();
});
document.addEventListener('keydown', e => { if (e.key === 'Escape') fecharEdicao(); });
</script>