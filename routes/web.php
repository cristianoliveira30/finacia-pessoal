<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', fn() => view('home'))->name('home');
// rotas de usuario
Route::get('/usuario/cadastro', fn() => view('usuario/cadastro'))->name('usuario/cadastro');
Route::get('/usuario/buscar', fn() => view('usuario/buscar'))->name('usuario/buscar');
// rotas Calendario
Route::get('/calendario/calendario', fn() => view('calendario/calendario'))->name('calendario/calendario');
Route::get('/calendario/calendario-pessoal', fn() => view('calendario/calendario-pessoal'))->name('calendario/calendario-pessoal');
// rotas Eleitor
Route::get('/eleitor/cadastro', fn() => view('eleitor/cadastro'))->name('eleitor/cadastro');
Route::get('/eleitor/buscar', fn() => view('eleitor/buscar'))->name('eleitor/buscar');
// rotas Atendimento
Route::get('/atendimento/cadastro', fn() => view('atendimento/cadastro'))->name('atendimento/cadastro');
Route::get('/atendimento/buscar', fn() => view('atendimento/buscar'))->name('atendimento/buscar');
// rotas Cadastro
Route::get('/acoes/cadastro', fn() => view('acoes/cadastro'))->name('acoes/cadastro');
Route::get('/acoes/buscar', fn() => view('acoes/buscar'))->name('acoes/buscar');
// rotas Message
Route::get('/message/envio', fn() => view('message/envio'))->name('message/envio');
// rota de relatorio
Route::get('/report', fn() => view('reports/default'))->name('report.default');

Route::prefix('financeiro')->name('financeiro.')->group(function () {

    // Base (as que você já tinha)
    Route::view('/home', 'financeiro.home-financeiro')->name('home');
    Route::view('/relatorios', 'financeiro.relatorios')->name('relatorios');
    Route::view('/lancamentos', 'financeiro.lancamentos')->name('lancamentos');
    Route::view('/contas', 'financeiro.contas')->name('contas');

    // -----------------------------
    // RELATÓRIOS (inventadas)
    // -----------------------------
    Route::view('/relatorios/receitas-despesas', 'financeiro.placeholder')->name('relatorios.rx_d');
    Route::view('/relatorios/execucao', 'financeiro.placeholder')->name('relatorios.execucao');
    Route::view('/relatorios/despesas-funcao', 'financeiro.placeholder')->name('relatorios.despesas_funcao');
    Route::view('/relatorios/fornecedores', 'financeiro.placeholder')->name('relatorios.fornecedores');
    Route::view('/relatorios/empenhos-liquidacoes-pagamentos', 'financeiro.placeholder')->name('relatorios.elp');

    // -----------------------------
    // ORÇAMENTO (PPA/LDO/LOA)
    // -----------------------------
    Route::view('/orcamento/loa', 'financeiro.placeholder')->name('orcamento.loa');
    Route::view('/orcamento/ppa', 'financeiro.placeholder')->name('orcamento.ppa');
    Route::view('/orcamento/ldo', 'financeiro.placeholder')->name('orcamento.ldo');
    Route::view('/orcamento/creditos-adicionais', 'financeiro.placeholder')->name('orcamento.creditos');
    Route::view('/orcamento/restos-a-pagar', 'financeiro.placeholder')->name('orcamento.restos_pagar');

    // -----------------------------
    // RECEITAS
    // -----------------------------
    Route::view('/receitas/arrecadacao', 'financeiro.placeholder')->name('receitas.arrecadacao');
    Route::view('/receitas/fontes', 'financeiro.placeholder')->name('receitas.fontes');
    Route::view('/receitas/transferencias', 'financeiro.placeholder')->name('receitas.transferencias');
    Route::view('/receitas/divida-ativa', 'financeiro.placeholder')->name('receitas.divida_ativa');
    Route::view('/receitas/projecoes', 'financeiro.placeholder')->name('receitas.projecoes');

    // -----------------------------
    // DESPESAS
    // -----------------------------
    Route::view('/despesas/empenhos', 'financeiro.placeholder')->name('despesas.empenhos');
    Route::view('/despesas/liquidacoes', 'financeiro.placeholder')->name('despesas.liquidacoes');
    Route::view('/despesas/pagamentos', 'financeiro.placeholder')->name('despesas.pagamentos');
    Route::view('/despesas/elemento', 'financeiro.placeholder')->name('despesas.elemento');
    Route::view('/despesas/centros-custo', 'financeiro.placeholder')->name('despesas.centros_custo');

    // -----------------------------
    // INVESTIMENTOS / CAPEX
    // -----------------------------
    Route::view('/investimentos/capex', 'financeiro.placeholder')->name('investimentos.capex');
    Route::view('/investimentos/convenios', 'financeiro.placeholder')->name('investimentos.convenios');
    Route::view('/investimentos/cronograma', 'financeiro.placeholder')->name('investimentos.cronograma');
    Route::view('/investimentos/contrapartidas', 'financeiro.placeholder')->name('investimentos.contrapartidas');

    // -----------------------------
    // TESOURARIA
    // -----------------------------
    Route::view('/tesouraria/saldos', 'financeiro.placeholder')->name('tesouraria.saldos');
    Route::view('/tesouraria/fluxo', 'financeiro.placeholder')->name('tesouraria.fluxo');
    Route::view('/tesouraria/conciliacao', 'financeiro.placeholder')->name('tesouraria.conciliacao');
    Route::view('/tesouraria/aplicacoes', 'financeiro.placeholder')->name('tesouraria.aplicacoes');

    // -----------------------------
    // LRF / COMPLIANCE
    // -----------------------------
    Route::view('/lrf/pessoal', 'financeiro.placeholder')->name('lrf.pessoal');
    Route::view('/lrf/saude', 'financeiro.placeholder')->name('lrf.saude');
    Route::view('/lrf/educacao', 'financeiro.placeholder')->name('lrf.educacao');
    Route::view('/lrf/divida', 'financeiro.placeholder')->name('lrf.divida');

    // -----------------------------
    // EXPORTAÇÕES / AUDITORIA
    // -----------------------------
    Route::view('/exportacoes', 'financeiro.placeholder')->name('exportacoes.index');
    Route::view('/auditoria/logs', 'financeiro.placeholder')->name('auditoria.logs');
});

Route::prefix('educacao')->name('educacao.')->group(function () {

    // Base (as que você já tinha)
    Route::view('/home', 'educacao.home-educacao')->name('home');
    Route::view('/relatorios', 'educacao.relatorios-educacao')->name('relatorios');
    Route::view('/lancamentos', 'educacao.lancamentos-educacao')->name('lancamentos');
    Route::view('/contas', 'educacao.contas-educacao')->name('contas');

    // -----------------------------
    // DASHBOARD / VISÃO GERAL
    // -----------------------------
    Route::view('/painel/indicadores', 'educacao.placeholder')->name('painel.indicadores');
    Route::view('/painel/metas', 'educacao.placeholder')->name('painel.metas');

    // -----------------------------
    // RELATÓRIOS (BI educacional)
    // -----------------------------
    Route::view('/relatorios/frequencia', 'educacao.placeholder')->name('relatorios.frequencia');
    Route::view('/relatorios/evasao', 'educacao.placeholder')->name('relatorios.evasao');
    Route::view('/relatorios/aprendizagem', 'educacao.placeholder')->name('relatorios.aprendizagem');
    Route::view('/relatorios/turmas', 'educacao.placeholder')->name('relatorios.turmas');
    Route::view('/relatorios/matriculas', 'educacao.placeholder')->name('relatorios.matriculas');
    Route::view('/relatorios/transferencias', 'educacao.placeholder')->name('relatorios.transferencias');
    Route::view('/relatorios/infraestrutura', 'educacao.placeholder')->name('relatorios.infraestrutura');
    Route::view('/relatorios/merenda', 'educacao.placeholder')->name('relatorios.merenda');
    Route::view('/relatorios/transporte', 'educacao.placeholder')->name('relatorios.transporte');
    Route::view('/relatorios/inclusao', 'educacao.placeholder')->name('relatorios.inclusao');

    // -----------------------------
    // REDE / ESCOLAS
    // -----------------------------
    Route::view('/rede/escolas', 'educacao.placeholder')->name('rede.escolas');
    Route::view('/rede/unidades', 'educacao.placeholder')->name('rede.unidades');
    Route::view('/rede/mapa', 'educacao.placeholder')->name('rede.mapa');

    // -----------------------------
    // ALUNOS / MATRÍCULAS
    // -----------------------------
    Route::view('/alunos/cadastro', 'educacao.placeholder')->name('alunos.cadastro');
    Route::view('/alunos/buscar', 'educacao.placeholder')->name('alunos.buscar');
    Route::view('/matriculas/gestao', 'educacao.placeholder')->name('matriculas.gestao');
    Route::view('/matriculas/fila-creche', 'educacao.placeholder')->name('matriculas.fila_creche');

    // -----------------------------
    // PROFESSORES / RH EDUCAÇÃO
    // -----------------------------
    Route::view('/rh/professores', 'educacao.placeholder')->name('rh.professores');
    Route::view('/rh/lotacao', 'educacao.placeholder')->name('rh.lotacao');
    Route::view('/rh/ausencias', 'educacao.placeholder')->name('rh.ausencias');
    Route::view('/rh/formacao', 'educacao.placeholder')->name('rh.formacao');

    // -----------------------------
    // TRANSPORTE ESCOLAR
    // -----------------------------
    Route::view('/transporte/rotas', 'educacao.placeholder')->name('transporte.rotas');
    Route::view('/transporte/frota', 'educacao.placeholder')->name('transporte.frota');
    Route::view('/transporte/atrasos', 'educacao.placeholder')->name('transporte.atrasos');

    // -----------------------------
    // MERENDA / ALIMENTAÇÃO ESCOLAR
    // -----------------------------
    Route::view('/merenda/estoque', 'educacao.placeholder')->name('merenda.estoque');
    Route::view('/merenda/cardapios', 'educacao.placeholder')->name('merenda.cardapios');
    Route::view('/merenda/distribuicao', 'educacao.placeholder')->name('merenda.distribuicao');

    // -----------------------------
    // FINANCEIRO DA EDUCAÇÃO / FUNDEB
    // -----------------------------
    Route::view('/fundeb/receitas', 'educacao.placeholder')->name('fundeb.receitas');
    Route::view('/fundeb/aplicacao', 'educacao.placeholder')->name('fundeb.aplicacao');
    Route::view('/fundeb/indicadores', 'educacao.placeholder')->name('fundeb.indicadores');

    // -----------------------------
    // OBRAS / MANUTENÇÃO ESCOLAR
    // -----------------------------
    Route::view('/obras/ordens-servico', 'educacao.placeholder')->name('obras.ordens_servico');
    Route::view('/obras/cronograma', 'educacao.placeholder')->name('obras.cronograma');
    Route::view('/obras/pendencias', 'educacao.placeholder')->name('obras.pendencias');

    // -----------------------------
    // EXPORTAÇÕES / AUDITORIA
    // -----------------------------
    Route::view('/exportacoes', 'educacao.placeholder')->name('exportacoes.index');
    Route::view('/auditoria/logs', 'educacao.placeholder')->name('auditoria.logs');
});

Route::prefix('saude')->name('saude.')->group(function () {

    // Base (as que você já tinha)
    Route::view('/home', 'saude.home-saude')->name('home');
    Route::view('/relatorios', 'saude.relatorios-saude')->name('relatorios');
    Route::view('/lancamentos', 'saude.lancamentos-saude')->name('lancamentos');
    Route::view('/contas', 'saude.contas-saude')->name('contas');

    // -----------------------------
    // PAINEL / GESTÃO
    // -----------------------------
    Route::view('/painel/indicadores', 'saude.placeholder')->name('painel.indicadores');
    Route::view('/painel/metas', 'saude.placeholder')->name('painel.metas');

    // -----------------------------
    // RELATÓRIOS (BI)
    // -----------------------------
    Route::view('/relatorios/atendimentos', 'saude.placeholder')->name('relatorios.atendimentos');
    Route::view('/relatorios/espera', 'saude.placeholder')->name('relatorios.espera');
    Route::view('/relatorios/producao-unidade', 'saude.placeholder')->name('relatorios.producao_unidade');
    Route::view('/relatorios/producao-profissional', 'saude.placeholder')->name('relatorios.producao_profissional');
    Route::view('/relatorios/no-show', 'saude.placeholder')->name('relatorios.no_show');
    Route::view('/relatorios/regulacao', 'saude.placeholder')->name('relatorios.regulacao');
    Route::view('/relatorios/indicadores-sus', 'saude.placeholder')->name('relatorios.indicadores_sus');

    // -----------------------------
    // ATENÇÃO BÁSICA (APS/UBS/ESF)
    // -----------------------------
    Route::view('/aps/unidades', 'saude.placeholder')->name('aps.unidades');
    Route::view('/aps/equipes', 'saude.placeholder')->name('aps.equipes');
    Route::view('/aps/visitas', 'saude.placeholder')->name('aps.visitas');
    Route::view('/aps/cronicos', 'saude.placeholder')->name('aps.cronicos');

    // -----------------------------
    // URGÊNCIA / EMERGÊNCIA
    // -----------------------------
    Route::view('/urgencia/unidades', 'saude.placeholder')->name('urgencia.unidades');
    Route::view('/urgencia/classificacao', 'saude.placeholder')->name('urgencia.classificacao');
    Route::view('/urgencia/porta-medico', 'saude.placeholder')->name('urgencia.porta_medico');
    Route::view('/urgencia/leitos', 'saude.placeholder')->name('urgencia.leitos');

    // -----------------------------
    // VIGILÂNCIA EM SAÚDE
    // -----------------------------
    Route::view('/vigilancia/notificacoes', 'saude.placeholder')->name('vigilancia.notificacoes');
    Route::view('/vigilancia/agravos', 'saude.placeholder')->name('vigilancia.agravos');
    Route::view('/vigilancia/fiscalizacao', 'saude.placeholder')->name('vigilancia.fiscalizacao');
    Route::view('/vigilancia/indicadores', 'saude.placeholder')->name('vigilancia.indicadores');

    // -----------------------------
    // IMUNIZAÇÃO
    // -----------------------------
    Route::view('/imunizacao/cobertura', 'saude.placeholder')->name('imunizacao.cobertura');
    Route::view('/imunizacao/campanhas', 'saude.placeholder')->name('imunizacao.campanhas');
    Route::view('/imunizacao/estoque', 'saude.placeholder')->name('imunizacao.estoque');
    Route::view('/imunizacao/perdas', 'saude.placeholder')->name('imunizacao.perdas');

    // -----------------------------
    // FARMÁCIA / MEDICAMENTOS
    // -----------------------------
    Route::view('/farmacia/disponibilidade', 'saude.placeholder')->name('farmacia.disponibilidade');
    Route::view('/farmacia/estoque', 'saude.placeholder')->name('farmacia.estoque');
    Route::view('/farmacia/curva-abc', 'saude.placeholder')->name('farmacia.curva_abc');
    Route::view('/farmacia/rupturas', 'saude.placeholder')->name('farmacia.rupturas');

    // -----------------------------
    // REGULAÇÃO / FILAS
    // -----------------------------
    Route::view('/regulacao/fila-consultas', 'saude.placeholder')->name('regulacao.fila_consultas');
    Route::view('/regulacao/fila-exames', 'saude.placeholder')->name('regulacao.fila_exames');
    Route::view('/regulacao/sla', 'saude.placeholder')->name('regulacao.sla');
    Route::view('/regulacao/oferta-demanda', 'saude.placeholder')->name('regulacao.oferta_demanda');

    // -----------------------------
    // FINANCEIRO DA SAÚDE
    // -----------------------------
    Route::view('/financeiro/receitas', 'saude.placeholder')->name('financeiro.receitas');
    Route::view('/financeiro/despesas', 'saude.placeholder')->name('financeiro.despesas');
    Route::view('/financeiro/minimo', 'saude.placeholder')->name('financeiro.minimo');
    Route::view('/financeiro/fornecedores', 'saude.placeholder')->name('financeiro.fornecedores');

    // -----------------------------
    // EXPORTAÇÕES / AUDITORIA
    // -----------------------------
    Route::view('/exportacoes', 'saude.placeholder')->name('exportacoes.index');
    Route::view('/auditoria/logs', 'saude.placeholder')->name('auditoria.logs');
});

// rota modo TV
Route::prefix('tv')->name('tv')->group(function () {
    Route::get('/tv', fn() => view('home-tv'))->name('tv');
});
