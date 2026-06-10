<?php
// src/View/layout/header.php

function isActive(array|string $rotas): bool {
    $rota_atual = $_GET['rota'] ?? 'painel';
    if (!is_array($rotas)) $rotas = [$rotas];
    foreach ($rotas as $r) {
        if (str_starts_with($rota_atual, $r)) return true;
    }
    return false;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Prev Dentistas</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* ── Botão Sair estilo protótipo ── */
        .user-menu {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .user-menu span {
            font-size: 14px;
            color: rgba(255,255,255,0.85);
            font-weight: 500;
        }

        .btn-sair-novo {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: transparent;
            border: 1.5px solid rgba(255,255,255,0.35);
            border-radius: 50px;
            padding: 7px 18px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-sair-novo:hover {
            background: rgba(255,255,255,0.12);
            border-color: rgba(255,255,255,0.6);
            color: #fff;
        }

        .btn-sair-novo i {
            font-size: 14px;
        }

        /* Corrige quebra de linha nos itens do dropdown */
        .navbar .dropdown-content a {
            white-space: nowrap !important;
        }

        /* Garante que os links do menu principal também não quebram */
        .navbar .menu a {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <a href="<?= BASE_URL ?>?rota=painel" style="text-decoration:none; color:inherit;">🦷 Prev Dentistas</a>
        </div>

        <?php if (isset($_SESSION['usuario_id'])): ?>
        <div class="menu-toggle" id="mobile-menu">
            <span></span><span></span><span></span>
        </div>
        <?php endif; ?>

        <nav class="menu" id="navbar-menu">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="<?= BASE_URL ?>?rota=painel" class="<?= isActive('painel') ? 'active' : '' ?>">Dashboard</a>

                <a href="<?= BASE_URL ?>?rota=atendimentos.novo" class="<?= isActive(['atendimentos']) ? 'active' : '' ?>">Novo Atendimento</a>

                <?php if (is_admin() || is_dentista() || is_recepcionista()): ?>
                <a href="<?= BASE_URL ?>?rota=pacientes" class="<?= isActive(['procedimentos','despesas','usuarios','pacientes']) ? 'active' : '' ?>">Cadastros</a>
                <?php endif; ?>

                <a href="<?= BASE_URL ?>?rota=relatorios.diario" class="<?= isActive('relatorios') ? 'active' : '' ?>">Relatórios</a>

                <a href="<?= BASE_URL ?>?rota=configuracoes" class="<?= isActive('configuracoes') ? 'active' : '' ?>">Configuração</a>
            <?php endif; ?>
        </nav>

        <?php if (isset($_SESSION['usuario_id'])): ?>
            <div class="user-menu">
                <span>Olá, <?= htmlspecialchars($_SESSION['usuario_nome']) ?></span>
                <a href="<?= BASE_URL ?>?rota=logout" class="btn-sair-novo">
                    <i class="fa fa-sign-out"></i> Sair
                </a>
            </div>
        <?php endif; ?>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('mobile-menu');
            const navMenu    = document.getElementById('navbar-menu');

            if (menuToggle && navMenu) {
                menuToggle.addEventListener('click', function () {
                    navMenu.classList.toggle('active');
                });
            }

            document.querySelectorAll('.dropdown').forEach(function (dropdown) {
                dropdown.querySelector('a').addEventListener('click', function (e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        const content   = dropdown.querySelector('.dropdown-content');
                        const isVisible = content.style.display === 'block';
                        document.querySelectorAll('.dropdown-content').forEach(c => c.style.display = 'none');
                        content.style.display = isVisible ? 'none' : 'block';
                    }
                });
            });
        });
    </script>

    <main class="container">
    <script>
        window.__BASE_URL = '<?= BASE_URL ?>';
    </script>