<?php if (isset($_GET['msg']) && $_GET['msg'] === 'sucesso'): ?>
<div class="cad-alert cad-alert-success"><i class="fa fa-check-circle"></i> Dados atualizados com sucesso!</div>
<?php endif; ?>
<?php if (isset($_GET['erro'])): ?>
<div class="cad-alert cad-alert-error"><i class="fa fa-exclamation-circle"></i>
    <?php
    $erros = [
        'senha_incorreta'     => 'A senha antiga informada está incorreta.',
        'senhas_nao_coincidem'=> 'A nova senha e a confirmação não coincidem.',
        'campos_vazios'       => 'Preencha todos os campos de senha para realizar a alteração.',
    ];
    echo $erros[$_GET['erro']] ?? 'Ocorreu um erro ao salvar as alterações.';
    ?>
</div>
<?php endif; ?>

<style>
.cfg-tabs { display:flex !important; gap:8px; margin-bottom:28px; flex-wrap:wrap; }
.cfg-tabs .cfg-tab {
    display:inline-flex !important; align-items:center;
    padding:8px 18px !important; border-radius:50px !important; font-size:0.85rem; font-weight:600;
    text-decoration:none !important; border:1.5px solid #e2e8f0 !important; color:#64748b !important; background:#fff !important;
    transition:all 0.2s; white-space:nowrap;
}
.cfg-tabs .cfg-tab:hover { border-color:#005b96 !important; color:#fff !important; background:#005b96 !important; }
.cfg-tabs .cfg-tab.active { background:#005b96 !important; color:#fff !important; border-color:#005b96 !important; }
</style>

<h1 class="cad-page-title">Configurações</h1>

<div class="cfg-tabs">
    <?php if (is_admin()): ?>
    <a href="<?= BASE_URL ?>?rota=configuracao.taxas"     class="cfg-tab">Taxas de Cartão</a>
    <a href="<?= BASE_URL ?>?rota=configuracao.comissoes" class="cfg-tab">Regras de Comissão</a>
    <?php endif; ?>
    <a href="<?= BASE_URL ?>?rota=configuracoes"          class="cfg-tab active">Meu Perfil</a>
</div>

<div class="cad-form-card" style="max-width:680px;">
    <div class="cad-form-title"><i class="fa fa-user-circle" style="color:#005b96;"></i> Dados do Perfil</div>
    <form action="<?= BASE_URL ?>?rota=configuracoes.salvar" method="POST">
        <div class="cad-form-grid">
            <div class="cad-span-6">
                <label class="cad-field-label">Nome de Exibição</label>
                <input type="text" name="nome" class="cad-field-input" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
            </div>
            <div class="cad-span-6">
                <label class="cad-field-label">Login (Usuário)</label>
                <input type="text" class="cad-field-input" value="<?= htmlspecialchars($usuario['login']) ?>" disabled style="background:#f1f5f9; color:#94a3b8; cursor:not-allowed;">
                <small style="font-size:0.75rem; color:#94a3b8; margin-top:4px; display:block;">O login não pode ser alterado.</small>
            </div>
        </div>

        <div style="border-top:1px solid #f1f5f9; margin:20px 0 20px;"></div>

        <div class="cad-form-title" style="margin-bottom:16px;"><i class="fa fa-lock" style="color:#64748b;"></i> Alterar Senha</div>
        <p style="font-size:0.82rem; color:#94a3b8; margin-bottom:16px; margin-top:-8px;">Preencha apenas se quiser alterar sua senha.</p>

        <div class="cad-form-grid">
            <div class="cad-span-6">
                <label class="cad-field-label">Senha Atual</label>
                <input type="password" name="senha_antiga" class="cad-field-input">
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Nova Senha</label>
                <input type="password" name="nova_senha" class="cad-field-input">
            </div>
            <div class="cad-span-3">
                <label class="cad-field-label">Confirmar Nova Senha</label>
                <input type="password" name="confirmar_senha" class="cad-field-input">
            </div>
        </div>

        <div style="display:flex; gap:12px; margin-top:8px;">
            <button type="submit" class="cad-btn-save"><i class="fa fa-check"></i> Salvar Alterações</button>
            <a href="<?= BASE_URL ?>?rota=painel" style="display:inline-flex; align-items:center; gap:6px; background:#f1f5f9; color:#374151; border:none; border-radius:10px; padding:11px 20px; font-size:0.875rem; font-weight:600; text-decoration:none; transition:background 0.2s;">
                Cancelar
            </a>
        </div>
    </form>
</div>