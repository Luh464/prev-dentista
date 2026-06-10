<?php if (isset($_GET['msg'])): ?>
    <?php $msgs = ['regra_salva'=>'Regra salva com sucesso!','regra_excluida'=>'Regra removida!']; ?>
    <div class="cad-alert cad-alert-success"><i class="fa fa-check-circle"></i> <?= $msgs[$_GET['msg']] ?? 'OK' ?></div>
<?php endif; ?>
<?php if (isset($_GET['erro'])): ?>
    <?php $erros = ['percentual_invalido'=>'Percentual deve ser entre 0.01 e 100.','dentista_obrigatorio'=>'Selecione o dentista para regra individual.']; ?>
    <div class="cad-alert cad-alert-error"><i class="fa fa-exclamation-circle"></i> <?= $erros[$_GET['erro']] ?? 'Erro.' ?></div>
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
</style>

<h1 class="cad-page-title">Configurações</h1>

<div class="cfg-tabs">
    <a href="<?= BASE_URL ?>?rota=configuracao.taxas"     class="cfg-tab">Taxas de Cartão</a>
    <a href="<?= BASE_URL ?>?rota=configuracao.comissoes" class="cfg-tab active">Regras de Comissão</a>
    <a href="<?= BASE_URL ?>?rota=configuracoes"          class="cfg-tab">Meu Perfil</a>
</div>

<!-- Info -->
<div class="cad-form-card" style="background:#eef4fb; border:1px solid #bfdbfe;">
    <div style="display:flex; gap:12px; align-items:flex-start;">
        <i class="fa fa-info-circle" style="color:#005b96; font-size:1.2rem; margin-top:2px;"></i>
        <div>
            <div style="font-weight:700; color:#0f172a; margin-bottom:4px;">Como funciona o cálculo de comissão</div>
            <div style="font-size:0.85rem; color:#374151; line-height:1.6;">
                As regras são aplicadas por faixas progressivas. O sistema verifica se o faturamento bruto do dentista no mês está abaixo do <strong>Teto</strong> — se sim, aplica aquele percentual. Deixe o Teto em branco para a faixa final (sem limite). Para regras <strong>individuais</strong>, elas têm prioridade sobre as globais. Mudanças só afetam <strong>novos atendimentos</strong>.
            </div>
        </div>
    </div>
</div>

<!-- Formulário nova regra -->
<div class="cad-form-card">
    
    <form action="<?= BASE_URL ?>?rota=configuracao.comissoes.salvar" method="POST">
        <div class="cad-form-grid">
            <div class="cad-span-2">
                <label class="cad-field-label">Tipo</label>
                <select name="tipo" id="tipo_regra" class="cad-field-input" required onchange="toggleDentista(this.value)">
                    <option value="global">Global (todos os dentistas)</option>
                    <option value="individual">Individual (por dentista)</option>
                </select>
            </div>
            <div class="cad-span-2" id="dentista_wrap" style="display:none;">
                <label class="cad-field-label">Dentista</label>
                <select name="dentista_id" class="cad-field-input">
                    <option value="">Selecione...</option>
                    <?php foreach ($dentistas as $d): ?>
                    <option value="<?= $d['id'] ?>"><?= htmlspecialchars($d['nome']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Categoria</label>
                <select name="categoria" class="cad-field-input" required>
                    <option value="geral">Clínico Geral</option>
                    <option value="especialista">Especialista</option>
                </select>
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Teto (R$) <small style="color:#94a3b8;">deixe vazio = sem limite</small></label>
                <input type="number" step="0.01" min="0" name="teto_valor" class="cad-field-input" placeholder="Ex: 10000.00">
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Percentual (%)</label>
                <input type="number" step="0.01" min="0.01" max="100" name="percentual" class="cad-field-input" placeholder="Ex: 20.00" required>
            </div>
            <div class="cad-span-2">
                <label class="cad-field-label">Ordem <small style="color:#94a3b8;">faixas em sequência</small></label>
                <input type="number" min="1" name="ordem" class="cad-field-input" value="1" required>
            </div>
        </div>
        <button type="submit" class="cad-btn-save"><i class="fa fa-check"></i> Salvar Regra</button>
    </form>
</div>

<!-- Tabela de regras -->
<div class="cad-card">
    <div class="cad-card-header">
        <h3>Regras Cadastradas</h3>
        <div style="font-size:0.8rem; color:#94a3b8;">Alterações afetam somente novos atendimentos</div>
    </div>

    <?php
    // Agrupa: global_geral, global_especialista, individual
    $globais_geral  = array_filter($regras, fn($r) => $r['tipo']==='global' && $r['categoria']==='geral');
    $globais_esp    = array_filter($regras, fn($r) => $r['tipo']==='global' && $r['categoria']==='especialista');
    $individuais    = array_filter($regras, fn($r) => $r['tipo']==='individual');

    $grupos = [
        ['titulo'=>'Global — Clínico Geral',   'icone'=>'fa-users',       'cor'=>'#005b96', 'regras'=>$globais_geral],
        ['titulo'=>'Global — Especialista',     'icone'=>'fa-user-md',     'cor'=>'#9333ea', 'regras'=>$globais_esp],
        ['titulo'=>'Regras Individuais',        'icone'=>'fa-user',        'cor'=>'#00b894', 'regras'=>$individuais],
    ];
    ?>

    <?php foreach ($grupos as $grupo): ?>
    <?php if (!empty($grupo['regras'])): ?>
    <div style="padding:0 0 0 0;">
        <div style="padding:14px 24px; background:#f8fafc; border-bottom:1px solid #f1f5f9; display:flex; align-items:center; gap:8px;">
            <i class="fa <?= $grupo['icone'] ?>" style="color:<?= $grupo['cor'] ?>;"></i>
            <span style="font-size:0.82rem; font-weight:700; color:#374151;"><?= $grupo['titulo'] ?></span>
        </div>
        <table class="cad-table">
            <thead>
                <tr>
                    <th>Ordem</th>
                    <?php if ($grupo['titulo'] === 'Regras Individuais'): ?><th>Dentista</th><?php endif; ?>
                    <th>Categoria</th>
                    <th>Teto (R$)</th>
                    <th>Percentual</th>
                    <th style="text-align:right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($grupo['regras'] as $r): ?>
                <tr>
                    <td><span style="background:#f1f5f9; padding:2px 8px; border-radius:6px; font-size:0.78rem; font-weight:700;"><?= $r['ordem'] ?>ª faixa</span></td>
                    <?php if ($grupo['titulo'] === 'Regras Individuais'): ?>
                    <td style="font-weight:600; color:#005b96;"><?= htmlspecialchars($r['dentista_nome'] ?? '—') ?></td>
                    <?php endif; ?>
                    <td>
                        <span class="cad-badge" style="background:<?= $r['categoria']==='especialista'?'#fdf4ff':'#eef4fb' ?>;color:<?= $r['categoria']==='especialista'?'#9333ea':'#005b96' ?>;">
                            <?= $r['categoria'] === 'especialista' ? 'Especialista' : 'Clínico Geral' ?>
                        </span>
                    </td>
                    <td style="color:#64748b;">
                        <?= $r['teto_valor'] ? 'Até R$ ' . number_format($r['teto_valor'], 2, ',', '.') : '<span style="color:#00b894; font-weight:600;">Sem limite</span>' ?>
                    </td>
                    <td style="font-size:1.1rem; font-weight:800; color:#0f172a;"><?= number_format($r['percentual'], 2, ',', '.') ?>%</td>
                    <td>
                        <div style="display:flex; gap:6px; justify-content:flex-end;">
                            <a href="<?= BASE_URL ?>?rota=configuracao.comissoes.excluir&id=<?= $r['id'] ?>"
                               class="cad-btn-del" title="Remover"
                               onclick="return confirm('Remover esta regra? Atendimentos já realizados não serão afetados.')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>

    <?php if (empty($regras)): ?>
    <div style="text-align:center; padding:40px; color:#94a3b8;">
        <i class="fa fa-percent" style="font-size:2rem; display:block; margin-bottom:10px; color:#cbd5e1;"></i>
        Nenhuma regra cadastrada.
    </div>
    <?php endif; ?>
</div>

<script>
function toggleDentista(val) {
    document.getElementById('dentista_wrap').style.display = val === 'individual' ? 'block' : 'none';
}
</script>