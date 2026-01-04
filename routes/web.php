<?php

use App\Http\Controllers\AnalisesController;
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

// rotas do setor financeiro
Route::prefix('financeiro')->name('financeiro.')->group(function () {

    // Base
    Route::view('/home', 'financeiro.home-financeiro')->name('home');
    Route::view('/relatorios', 'financeiro.relatorios')->name('relatorios');
    Route::view('/lancamentos', 'financeiro.lancamentos-financeiro')->name('lancamentos');
    Route::view('/contas', 'financeiro.contas-financeiro')->name('contas');

    // -----------------------------
    // RELATÓRIOS (inventadas)
    // -----------------------------
    Route::prefix('relatorios')->name('relatorios.')->group(function () {
        Route::view('rx_d', 'financeiro.relatorios.receita-despesas')->name('rx_d');
        Route::view('execucao', 'financeiro.relatorios.execucao')->name('execucao');
        Route::view('despesas-funcao', 'financeiro.relatorios.despesas-funcao')->name('despesas_funcao');
        Route::view('fornecedores', 'financeiro.relatorios.fornecedores')->name('fornecedores');
        Route::view('empenhos-liquidacoes-pagamentos', 'financeiro.relatorios.empenhos')->name('elp');
    });

    // -----------------------------
    // ORÇAMENTO (PPA/LDO/LOA)
    // -----------------------------
    Route::prefix('orcamento')->name('orcamento.')->group(function () {
        Route::view('loa', 'financeiro.placeholder')->name('loa');
        Route::view('ppa', 'financeiro.placeholder')->name('ppa');
        Route::view('ldo', 'financeiro.placeholder')->name('ldo');
        Route::view('creditos-adicionais', 'financeiro.placeholder')->name('creditos');
        Route::view('restos-a-pagar', 'financeiro.placeholder')->name('restos_pagar');
    });

    // -----------------------------
    // RECEITAS
    // -----------------------------
    Route::prefix('receitas')->name('receitas.')->group(function () {
        Route::view('arrecadacao', 'financeiro.placeholder')->name('arrecadacao');
        Route::view('fontes', 'financeiro.placeholder')->name('fontes');
        Route::view('transferencias', 'financeiro.placeholder')->name('transferencias');
        Route::view('divida-ativa', 'financeiro.placeholder')->name('divida_ativa');
        Route::view('projecoes', 'financeiro.placeholder')->name('projecoes');
    });

    // -----------------------------
    // DESPESAS
    // -----------------------------
    Route::prefix('despesas')->name('despesas.')->group(function () {
        Route::view('empenhos', 'financeiro.placeholder')->name('empenhos');
        Route::view('liquidacoes', 'financeiro.placeholder')->name('liquidacoes');
        Route::view('pagamentos', 'financeiro.placeholder')->name('pagamentos');
        Route::view('elemento', 'financeiro.placeholder')->name('elemento');
        Route::view('centros-custo', 'financeiro.placeholder')->name('centros_custo');
    });

    // -----------------------------
    // INVESTIMENTOS / CAPEX
    // -----------------------------
    Route::prefix('investimentos')->name('investimentos.')->group(function () {
        Route::view('capex', 'financeiro.investimentos.capex')->name('capex');
        Route::view('convenios', 'financeiro.placeholder')->name('convenios');
        Route::view('cronograma', 'financeiro.placeholder')->name('cronograma');
        Route::view('contrapartidas', 'financeiro.placeholder')->name('contrapartidas');
    });

    // -----------------------------
    // TESOURARIA
    // -----------------------------
    Route::prefix('tesouraria')->name('tesouraria.')->group(function () {
        Route::view('saldos', 'financeiro.placeholder')->name('saldos');
        Route::view('fluxo', 'financeiro.placeholder')->name('fluxo');
        Route::view('conciliacao', 'financeiro.placeholder')->name('conciliacao');
        Route::view('aplicacoes', 'financeiro.placeholder')->name('aplicacoes');
    });

    // -----------------------------
    // LRF / COMPLIANCE
    // -----------------------------
    Route::prefix('lrf')->name('lrf.')->group(function () {
        Route::view('pessoal', 'financeiro.placeholder')->name('pessoal');
        Route::view('saude', 'financeiro.placeholder')->name('saude');
        Route::view('educacao', 'financeiro.placeholder')->name('educacao');
        Route::view('divida', 'financeiro.placeholder')->name('divida');
    });
});

// rotas do setor da educacao
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
    Route::view('/relatorios/frequencia', 'educacao.relatorios.frequenciaescolar')->name('relatorios.frequencia');
    Route::view('/relatorios/evasao', 'educacao.relatorios.evasao')->name('relatorios.evasao');
    Route::view('/relatorios/aprendizagem', 'educacao.relatorios.aprendizagem')->name('relatorios.aprendizagem');
    Route::view('/relatorios/turmas', 'educacao.relatorios.turmas')->name('relatorios.turmas');
    Route::view('/relatorios/matriculas', 'educacao.relatorios.matriculas')->name('relatorios.matriculas');
    Route::view('/relatorios/transferencias', 'educacao.relatorios.transferencias')->name('relatorios.transferencias');
    Route::view('/relatorios/infraestrutura', 'educacao.relatorios.infraestrutura')->name('relatorios.infraestrutura');
    Route::view('/relatorios/merenda', 'educacao.relatorios.merenda')->name('relatorios.merenda');
    Route::view('/relatorios/transporte', 'educacao.relatorios.transporte')->name('relatorios.transporte');
    Route::view('/relatorios/inclusao', 'educacao.relatorios.inclusao')->name('relatorios.inclusao');

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

// rotas do setor da saude
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
    Route::view('/relatorios/atendimentos', 'saude.relatorios.atendimentos')->name('relatorios.atendimentos');
    Route::view('/relatorios/espera', 'saude.relatorios.espera')->name('relatorios.espera');
    Route::view('/relatorios/producao-unidade', 'saude.relatorios.producao-unidade')->name('relatorios.producao_unidade');
    Route::view('/relatorios/producao-profissional', 'saude.relatorios.producao-profissional')->name('relatorios.producao_profissional');
    Route::view('/relatorios/no-show', 'saude.relatorios.no-show')->name('relatorios.no_show');
    Route::view('/relatorios/regulacao', 'saude.relatorios.regulacao')->name('relatorios.regulacao');
    Route::view('/relatorios/indicadores-sus', 'saude.relatorios.indicadores-sus')->name('relatorios.indicadores_sus');

    // -----------------------------
    // ATENÇÃO BÁSICA (APS/UBS/ESF)
    // -----------------------------
    Route::view('/atencao/ubs-unidades', 'saude.atencao.ubs-unidades')->name('atencao.ubs-unidades');
    Route::view('/atencao/equipes', 'saude.atencao.equipes')->name('atencao.equipes');
    Route::view('/atencao/visitas', 'saude.atencao.visitas')->name('atencao.visitas');
    Route::view('/atencao/acompanhamentos', 'saude.atencao.acompanhamentos')->name('atencao.acompanhamentos');

    // -----------------------------
    // URGÊNCIA / EMERGÊNCIA
    // -----------------------------
    Route::view('/urgencia/unidades', 'saude.urgencia.unidades-upa')->name('urgencia.unidades-upa');
    Route::view('/urgencia/classificacao', 'saude.urgencia.clasificacao-risco')->name('urgencia.classificacao-risco');
    Route::view('/urgencia/porta-medico', 'saude.urgencia.porta-medico')->name('urgencia.porta-medico');
    Route::view('/urgencia/leitos', 'saude.urgencia.leitos')->name('urgencia.leitos');

    // -----------------------------
    // VIGILÂNCIA EM SAÚDE
    // -----------------------------
    Route::view('/vigilancia/notificacoes', 'saude.vigilancia.notificacoes')->name('vigilancia.notificacoes');
    Route::view('/vigilancia/agravos', 'saude.vigilancia.caso-agravo')->name('vigilancia.cas0-agravo');
    Route::view('/vigilancia/fiscalizacao', 'saude.vigilancia.fiscalizacao')->name('vigilancia.fiscalizacao');
    Route::view('/vigilancia/indicadores', 'saude.vigilancia.indicadores-epidermico')->name('vigilancia.indicadores-epidermico');

    // -----------------------------
    // IMUNIZAÇÃO
    // -----------------------------
    Route::view('/imunizacao/cobertura', 'saude.imunizacao.cobertura-vacinal')->name('imunizacao.cobertura');
    Route::view('/imunizacao/campanhas', 'saude.imunizacao.campanhas')->name('imunizacao.campanhas');
    Route::view('/imunizacao/estoque', 'saude.imunizacao.estoque-vacina')->name('imunizacao.estoque-vacina');
    Route::view('/imunizacao/perdas', 'saude.imunizacao.perda')->name('imunizacao.perdas');

    // -----------------------------
    // FARMÁCIA / MEDICAMENTOS
    // -----------------------------
    Route::view('/farmacia/disponibilidade', 'saude.farmacia.disponibilidade')->name('farmacia.disponibilidade');
    Route::view('/farmacia/estoque', 'saude.farmacia.almoxarifado')->name('farmacia.almoxarifado');
    Route::view('/farmacia/consumo', 'saude.farmacia.consumo')->name('farmacia.consumo'); //alguma coisa abc
    Route::view('/farmacia/rupturas', 'saude.farmacia.rupturas')->name('farmacia.rupturas');

    // -----------------------------
    // REGULAÇÃO / FILAS
    // -----------------------------
    Route::view('/regulacao/fila-consultas', 'saude.regulacao.fila-consultas')->name('regulacao.fila-consultas');
    Route::view('/regulacao/fila-exames', 'saude.regulacao.fila-exames')->name('regulacao.fila-exames');
    Route::view('/regulacao/sla', 'saude.regulacao.sla-regulacao')->name('regulacao.sla-regulacao');
    Route::view('/regulacao/oferta-demanda', 'saude.regulacao.oferta-demanda')->name('regulacao.oferta-demanda');

    // -----------------------------
    // FINANCEIRO DA SAÚDE
    // -----------------------------
    Route::view('/financeiro/receitas', 'saude.financeiro.receita-transferencia')->name('financeiro.receita-transferencia');
    Route::view('/financeiro/despesas', 'saude.financeiro.despesas-programa')->name('financeiro.despesas-programa');
    Route::view('/financeiro/minimo', 'saude.financeiro.minimo-constitucional')->name('financeiro.minimo-constitucional');
    Route::view('/financeiro/fornecedores', 'saude.financeiro.contratos-fornecedores')->name('financeiro.contratos-fornecedores');

    // -----------------------------
    // EXPORTAÇÕES / AUDITORIA
    // -----------------------------
    Route::view('/exportacoes', 'saude.placeholder')->name('exportacoes.index');
    Route::view('/auditoria/logs', 'saude.placeholder')->name('auditoria.logs');
});

Route::post('/ai/analise', [AnalisesController::class, 'analise'])->name('ai.analise');

// rota modo TV
Route::prefix('tv')->name('tv')->group(function () {
    Route::get('/tv', fn() => view('home-tv'))->name('tv');
});
