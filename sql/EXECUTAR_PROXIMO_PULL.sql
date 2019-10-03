
DELETE FROM `tb_beneficios` WHERE ID_BENEF = 13;
DELETE FROM `tb_juncao_pc_bn` WHERE ID_BN = 13;
DELETE FROM `areadocliente_menu`  where nome = "Orientação Nutricional";




/* ABAIXO O QUE JÁ FOI EXECUTADO */






/* 26.09.2019 */

/*

INSERT INTO `areadocliente_info` (`ID_INFO`, `ID_PC_BENEF`, `LOGO`) VALUES (NULL, '11', 'logo_camps.png');
UPDATE `areadocliente_menu` SET `ICONE`='<div id="img-vantagens"></div>' WHERE NOME = "Clube de Vantagens";
UPDATE `areadocliente_menu` SET `ICONE`='<div id="img-saude"></div>'  WHERE `NOME` = 'Orientação Nutricional';
ALTER TABLE `areadocliente_menu` CHANGE `CONTEUDO` `CONTEUDO` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
UPDATE `areadocliente_menu` SET `ICONE`='<div id="img-sair"><i class="fas fa-sign-out-alt" style="transform:rotate(180deg)"></i></div>'  WHERE `NOME` = 'Sair';

INSERT INTO `areadocliente_menu` (`ID_MENU`, `ID_PC_BENEF`, `NOME`, `TIPO`, `CONTEUDO`, `ICONE`, `ORDEM`) VALUES (NULL, '11', 'Assistência Funeral 24hrs', 'HTML', '<section id=\"funeral\" class=\'\'>\r\n<div class=\"container\">\r\n <div>\r\n <p>Para acionar o Serviço de Assistência Funeral 24H, ligue para (11) 4196.8181 (aceita ligações à cobrar) ou 0800.727-9393</p>\r\n\r\n <p>Em caso de dúvidas ou informações gerais sobre suas coberturas, contatar diretamente a secretária do CAMPS</p>\r\n\r\n <button href=\"tel:551332261111\">clique aqui para ligar</button>\r\n\r\n <p></p>\r\n </div>\r\n \r\n <?php include (\"../skeleton/botao-voltar.php\"); ?>\r\n</div>\r\n</section>', '<div class=\"img-estrela\"></div>', '8'), (NULL, '11', 'Ana costa Saúde', 'HTML', '<style>\r\n#location {\r\n margin-top: 1rem !important;\r\n margin-bottom: 4rem !important;\r\n}\r\n#location li {\r\n margin-left: 60px !important;\r\n position: relative;\r\n}\r\n#location li:before {\r\n content: \"\\f3c5\";\r\n font-family: \'Font Awesome 5 Free\';\r\n font-weight: 900;\r\n position: absolute;\r\n font-size: 30px;\r\n line-height: 120px;\r\n left: -40px;\r\n color: #2A74B5;\r\n}\r\n</style>\r\n\r\n<section id=\"central\"> \r\n <div class=\"container\">\r\n <div style=\'margin-bottom:3rem;\'>\r\n <h1>Informações</h1>\r\n <h3>Atendimento:</h3>\r\n\r\n <ul id=\'contacts\'>\r\n <a href=\"tel:+551334768000\"><li><span><i class=\"fas fa-phone-alt\"></i>Agendamento de Consultas</span></li></a>\r\n\r\n <a href=\"tel:08007708708\"><li><span><i class=\"fas fa-headset\"></i>Telefone</span></li></a>\r\n </ul>\r\n </div>\r\n\r\n <h3>Endereço:</h3>\r\n\r\n <ul id=\'location\'>\r\n <li>\r\n <span>Sede administrativa<br>\r\n Av. Ana Costa, 468<br>\r\n Tel.: (13) 3285-1200</span>\r\n </li>\r\n <li>\r\n <span>HAC / Hospital<br>\r\n R. Pedro Américo, 60<br>\r\n Tel.: (13) 3228-9000</span>\r\n </li>\r\n <li>\r\n <span>HAC / Pronto-Socorro<br>\r\n R. Pedro Américo, 60<br>\r\n Tel.: (13) 3226-9245</span>\r\n </li>\r\n <li>\r\n <span>Centro de Diagnóstico<br>\r\n R. Amazonas, 142<br>\r\n Tel.: (13) 3226-9126</span>\r\n </li>\r\n <li>\r\n <span>Ambulatório de Especialidades Dr. Darcy Silvano<br>\r\n Av. Washington Luiz, 49<br>\r\n Tel.: (13) 3228-9000</span>\r\n </li>\r\n </ul>\r\n\r\n <h3>Clinícas Credenciadas:</h3>\r\n <p><a href=\"shorturl.at/pIOSY\">shorturl.at/pIOSY.</a> Em caso de dúvidas ou informações gerais sobre seu plano, contatar diretamente a secretaria do CAMPS.\r\n</p>\r\n </div>\r\n </section>', '<div class=\"img-estrela\"></div>', '7'), (NULL, '11', 'Seguro de vida', 'HTML', '<style>\r\n#seguroVida table {\r\n color: #1E3767;\r\n width: 100%;\r\n text-transform: capitalize;\r\n margin-top: 2rem;\r\n}\r\n#seguroVida table th {\r\n padding-bottom: 2rem;\r\n}\r\n #seguroVida table td {\r\n width: 50%;\r\n text-align: center;\r\n padding-bottom: 1rem;\r\n }\r\n</style>\r\n\r\n<section id=\"seguroVida\"> \r\n <div class=\"container\">\r\n\r\n <h1>Seguro de Vida</h1>\r\n\r\n <table>\r\n <tr>\r\n <th>Cobertura</th>\r\n <th>importância segurada*</th>\r\n </tr>\r\n <tr>\r\n <td>Morte</td>\r\n <td>15.000,00</td>\r\n </tr>\r\n <tr>\r\n <td>Cesta Básica em caso de morte</td>\r\n <td>200,00</td>\r\n </tr>\r\n <tr>\r\n <td>Invalidez por acidente</td>\r\n <td>15.000,00</td>\r\n </tr>\r\n <tr>\r\n <td>Morte Acidental</td>\r\n <td>15.000,00</td>\r\n </tr>\r\n <tr>\r\n <td>Assistência Funeral Titular</td>\r\n <td>3.000,00</td>\r\n </tr>\r\n </table>\r\n\r\n <p>* Para acessar as condições gerais ou obter mais informações, contatar diretamente a secretaria do CAMPS.</p>\r\n\r\n </div>\r\n </section>', '<div class=\"img-estrela\"></div>', '6') ;

*/









/* 23.09.2019 */

/*
ALTER TABLE `tb_beneficios`
  DROP `HTML_BENEF`,
  DROP `VISIVEL`;

DELETE FROM `tb_beneficios` WHERE `tb_beneficios`.`ID_BENEF` = 1;
DELETE FROM `tb_beneficios` WHERE `tb_beneficios`.`ID_BENEF` = 2;
DELETE FROM `tb_beneficios` WHERE `tb_beneficios`.`ID_BENEF` = 3;
DELETE FROM `tb_beneficios` WHERE `tb_beneficios`.`ID_BENEF` = 5;
DELETE FROM `tb_beneficios` WHERE `tb_beneficios`.`ID_BENEF` = 7;
DELETE FROM `tb_beneficios` WHERE `tb_beneficios`.`ID_BENEF` = 8;


INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('1', 'ASSISTENCIA FUNERAL 24H - UNION');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('2', 'ASSISTENCIA FUNERAL 24H - PORTO SEGURO');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('3', 'SEGURO DE VIDA - PORTO SEGURO');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('4', 'SORTEIOS MENSAIS');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('5', 'CHECKUP ANUAL');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('6', 'CLUBE DE VANTAGENS');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('7', 'CONSULTAS');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('8', 'EXAMES');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('9', 'DISK SAUDE');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('10', 'ODONTO');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('11', 'CARTÃO FARMACIA - RD');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('12', 'CARTÃO FARMACIA - VIDALINK');
INSERT INTO tb_beneficios (ID_BENEF,NM_BENEF) VALUES ('13', 'ORIENTACAO NUTRICIONAL');


DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 1;
DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 2;
DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 3;
DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 4;
DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 5;
DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 6;
DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 7;
DELETE FROM `tb_pacote_beneficio` WHERE `tb_pacote_beneficio`.`ID_PC_BENEF` = 8;

INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('1', 'INDIVIDUAL_0001', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('2', 'INDIVIDUAL_0002', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('3', 'FAMILIAR_0001', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('4', 'FAMILIAR_0002', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('5', 'BASICO_0001', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('6', 'INTERMEDIARIO_0001', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('7', 'COMPLETO_0001', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('8', 'PME_0001', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('9', 'PME_0002', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('10', 'PME_0003', NULL);
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('11', 'CORP_0001', 'CAMPS');
INSERT INTO tb_pacote_beneficio (ID_PC_BENEF,NM_PC_BENEFI,DESCRITIVO) VALUES ('12', 'CORP_0002', 'SINDFESP');

DELETE FROM `areadocliente_menu`;

INSERT INTO `areadocliente_menu` (`ID_MENU`, `ID_PC_BENEF`, `NOME`, `TIPO`, `CONTEUDO`, `ICONE`, `ORDEM`) VALUES
(1, 1, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(2, 1, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(3, 2, 'Assistência Funeral 24H - Porto Seguro', 'MODULO', 'assistenciafuneral.index', '<div id=\"img-funeral\"></div>', 1),
(4, 1, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 2),
(5, 1, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(6, 1, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 4),
(8, 1, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 8),
(9, 1, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 9),
(18, 1, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 6),
(19, 1, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(20, 2, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(21, 2, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 9),
(22, 2, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 6),
(23, 2, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(24, 2, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 8),
(25, 2, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 12),
(26, 2, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 13),
(27, 2, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 10),
(28, 2, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 11),
(29, 2, 'Seguro de vida - porto Seguro', 'MODULO', 'segurodevidaportoseguro.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(30, 2, 'Sorteios Mensais', 'MODULO', 'sorteiosmensais.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(31, 2, 'CHECKUP ANUAL', 'MODULO', 'checkupanual.index', '<div id=\"img-cartao_virtual\"></div>', 4),
(33, 3, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(34, 3, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(35, 3, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 2),
(36, 3, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(37, 3, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 4),
(38, 3, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 8),
(39, 3, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 9),
(40, 3, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 6),
(41, 3, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(45, 4, 'Assistência Funeral 24H - Porto Seguro', 'MODULO', 'assistenciafuneral.index', '<div id=\"img-funeral\"></div>', 1),
(46, 4, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(47, 4, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 9),
(48, 4, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 6),
(49, 4, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(50, 4, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 8),
(51, 4, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 12),
(52, 4, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 13),
(53, 4, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 10),
(54, 4, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 11),
(55, 4, 'Seguro de vida - porto Seguro', 'MODULO', 'segurodevidaportoseguro.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(56, 4, 'Sorteios Mensais', 'MODULO', 'sorteiosmensais.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(57, 4, 'CHECKUP ANUAL', 'MODULO', 'checkupanual.index', '<div id=\"img-cartao_virtual\"></div>', 4),
(72, 5, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(73, 5, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(77, 5, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(78, 5, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 6),
(79, 5, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 4),
(85, 6, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(86, 6, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(87, 6, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 6),
(88, 6, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(89, 6, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 8),
(90, 6, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 9),
(91, 6, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 10),
(92, 6, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 4),
(96, 6, 'CHECKUP ANUAL', 'MODULO', 'checkupanual.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(97, 1, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(98, 2, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(99, 3, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(100, 4, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(101, 5, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(102, 6, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(103, 7, 'Assistência Funeral 24H - Porto Seguro', 'MODULO', 'assistenciafuneral.index', '<div id=\"img-funeral\"></div>', 1),
(104, 7, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(105, 7, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 9),
(106, 7, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 6),
(107, 7, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(108, 7, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 8),
(109, 7, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 12),
(110, 7, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 13),
(111, 7, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 10),
(112, 7, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 11),
(113, 7, 'Seguro de vida - porto Seguro', 'MODULO', 'segurodevidaportoseguro.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(114, 7, 'Sorteios Mensais', 'MODULO', 'sorteiosmensais.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(115, 7, 'CHECKUP ANUAL', 'MODULO', 'checkupanual.index', '<div id=\"img-cartao_virtual\"></div>', 4),
(116, 7, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(118, 8, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(119, 8, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(120, 8, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 2),
(121, 8, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(122, 8, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 4),
(123, 8, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 12),
(124, 8, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 13),
(125, 8, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 6),
(126, 8, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(130, 8, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(132, 9, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(133, 9, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 6),
(134, 9, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 3),
(135, 9, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 4),
(136, 9, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 5),
(137, 9, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 12),
(138, 9, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 13),
(139, 9, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(140, 9, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 8),
(143, 9, 'CHECKUP ANUAL', 'MODULO', 'checkupanual.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(144, 9, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(146, 10, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(147, 10, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(148, 10, 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', 4),
(149, 10, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(150, 10, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 6),
(151, 10, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 10),
(152, 10, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 11),
(153, 10, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 8),
(154, 10, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 9),
(157, 10, 'CHECKUP ANUAL', 'MODULO', 'checkupanual.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(158, 10, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(159, 10, 'Assistência funeral 24H - Union', 'MODULO', 'assistenciafuneralunion.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(161, 11, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(162, 11, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 4),
(164, 11, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(165, 11, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 3),
(166, 11, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 12),
(167, 11, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 13),
(168, 11, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(169, 11, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 6),
(173, 11, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(175, 12, 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', 0),
(176, 12, 'Cartão Farmácia - RD', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', 5),
(178, 12, 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', 3),
(179, 12, 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', 4),
(180, 12, 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', 13),
(181, 12, 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', 14),
(182, 12, 'Cartão Farmácia - VIDALINK', 'MODULO', 'cartaofarmaciavidalink.index', '<div id=\"img-cartao_virtual\"></div>', 6),
(183, 12, 'Orientação Nutricional', 'MODULO', 'orientacaonutricional.index', '<div id=\"img-cartao_virtual\"></div>', 7),
(187, 12, 'Clube de vantagens', 'MODULO', 'clubedevantagens.index', '<div id=\"img-cartao_virtual\"></div>', 2),
(188, 12, 'Assistência funeral 24H - Union', 'MODULO', 'assistenciafuneralunion.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(189, 5, 'Assistência funeral 24H - Union', 'MODULO', 'assistenciafuneralunion.index', '<div id=\"img-cartao_virtual\"></div>', 1),
(190, 6, 'Assistência funeral 24H - Union', 'MODULO', 'assistenciafuneralunion.index', '<div id=\"img-cartao_virtual\"></div>', 1);

CREATE TABLE `areadocliente_info` (
 `ID_INFO` int(11) NOT NULL AUTO_INCREMENT,
 `ID_PC_BENEF` int(11) NOT NULL,
 `LOGO` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
 PRIMARY KEY (`ID_INFO`),
 UNIQUE KEY `ID_PC_BENEF` (`ID_PC_BENEF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE areadocliente_info ADD FOREIGN KEY (ID_PC_BENEF) REFERENCES tb_pacote_beneficio (ID_PC_BENEF); 

UPDATE tb_pedido SET ID_PC_BENEF = 11 WHERE id_pedido = 1;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 2;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 3;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 4;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 5;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 6;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 7;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 8;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 9;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 10;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 11;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 12;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 13;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 14;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 15;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 16;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 17;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 18;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 19;
UPDATE tb_pedido SET ID_PC_BENEF = 9 WHERE id_pedido = 20;
UPDATE tb_pedido SET ID_PC_BENEF = 9 WHERE id_pedido = 21;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 22;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 23;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 24;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 25;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 26;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 27;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 28;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 29;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 30;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 31;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 32;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 33;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 34;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 35;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 36;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 37;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 38;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 39;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 40;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 41;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 42;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 43;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 44;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 45;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 46;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 47;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 48;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 49;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 50;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 51;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 52;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 53;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 54;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 55;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 56;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 57;
UPDATE tb_pedido SET ID_PC_BENEF = 9 WHERE id_pedido = 58;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 59;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 64;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 65;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 66;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 67;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 68;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 69;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 70;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 71;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 72;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 73;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 74;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 75;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 76;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 77;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 78;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 79;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 80;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 99;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 100;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 101;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 999;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1000;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1001;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1002;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1003;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1004;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1005;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1006;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1007;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1008;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1009;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1010;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1011;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1013;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1014;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1015;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 1017;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1018;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1019;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1024;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1025;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1026;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1027;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 1028;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1029;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1030;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1031;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1032;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1033;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 1034;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1035;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1036;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1037;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1038;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1039;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1040;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1041;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 1042;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1043;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1044;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1046;
UPDATE tb_pedido SET ID_PC_BENEF = 11 WHERE id_pedido = 1047;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1048;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1049;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1050;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1051;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1052;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1053;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1054;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1055;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1056;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1058;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1059;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1060;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1061;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1062;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1063;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1064;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1065;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1066;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1067;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1075;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1076;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1077;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1078;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1079;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1080;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1092;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1094;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1095;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1097;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1098;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1099;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1104;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1107;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1109;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1110;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1111;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1112;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1113;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1114;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1118;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1119;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1122;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1123;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1124;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1125;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1126;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1127;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1128;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1129;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1133;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1136;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1141;
UPDATE tb_pedido SET ID_PC_BENEF = 1 WHERE id_pedido = 1151;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1154;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1155;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1164;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1168;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1170;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1184;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1202;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1203;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1204;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1205;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1206;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1209;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1224;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1226;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1227;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1228;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1229;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1230;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1244;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1245;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1246;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1248;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1249;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1250;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1251;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1252;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1253;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1254;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1255;
UPDATE tb_pedido SET ID_PC_BENEF = 9 WHERE id_pedido = 1256;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1257;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1259;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1260;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1262;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1265;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1266;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1267;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1279;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1280;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1281;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1282;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1283;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1284;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1285;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1288;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1289;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1290;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1291;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1292;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1293;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1294;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1297;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1298;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1299;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1300;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1301;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1302;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1303;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1305;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 1306;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1311;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1312;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1313;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1314;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1316;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1317;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1318;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1319;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1320;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1321;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1322;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1323;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1324;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1325;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1326;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1327;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1328;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1329;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1330;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1331;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1332;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1333;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1334;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1335;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1336;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1342;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1344;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1345;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1346;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1347;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1348;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1349;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1356;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1357;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1358;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1359;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1361;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1362;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1363;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1367;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1368;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1369;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1370;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1377;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1378;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1379;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1380;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1382;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1383;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1384;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1385;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1394;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1395;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1396;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1397;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1398;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1399;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1401;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1428;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1444;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1445;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1446;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1447;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1448;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1449;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1450;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1455;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1456;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1457;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1458;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1473;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1474;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1475;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1476;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1477;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1478;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1479;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1480;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1481;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1483;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1484;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1485;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1487;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1488;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1508;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1509;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1510;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1511;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1512;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1524;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1525;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1526;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1532;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1536;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1537;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1550;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1551;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1552;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1553;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1559;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1560;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1561;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1563;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1564;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1565;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1566;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1567;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1568;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1569;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1570;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1571;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1575;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1576;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1577;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1578;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1579;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1580;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1581;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1592;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1593;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1594;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1595;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1597;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1599;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1600;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1605;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1608;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1609;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1610;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1611;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1612;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1613;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1614;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1615;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1616;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1617;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1618;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1619;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1620;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1621;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1622;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1623;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1625;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1626;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1627;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1628;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1629;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1630;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1631;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1632;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1633;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1634;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1635;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1636;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1637;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1638;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1640;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1641;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1642;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1643;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1644;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1645;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1646;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1647;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1648;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1649;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1650;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1651;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1652;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1653;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1654;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1655;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1656;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1657;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1658;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1659;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1660;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1661;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1662;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1663;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1664;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1665;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1666;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1667;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1668;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1669;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1670;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1671;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1672;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1673;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1674;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1675;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1676;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1677;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1678;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1679;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1680;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1681;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1682;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1683;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1684;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1685;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1686;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1687;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1688;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1689;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1690;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1691;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1692;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1693;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1694;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1695;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1696;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1697;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1698;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1699;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1700;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1701;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1702;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1703;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1704;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1705;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1706;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1707;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1708;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1709;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1710;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1711;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1712;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1713;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1714;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1715;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1716;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1717;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1718;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1719;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1720;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1721;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1722;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1723;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1724;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1725;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1726;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1727;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1728;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1729;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1730;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1731;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1732;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1733;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1734;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1735;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1736;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1737;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1738;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1739;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1740;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1741;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1742;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1744;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1745;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1746;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1747;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1748;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1749;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1750;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1751;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1752;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1753;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1754;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1755;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1756;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1757;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1758;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1759;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1760;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1761;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1762;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1763;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1764;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1765;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1766;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1767;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1768;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1769;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1770;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1771;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1772;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1773;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1774;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1776;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1777;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1778;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1779;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1780;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1781;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1782;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1783;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1784;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1785;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1786;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1787;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1788;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1789;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1790;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1791;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1792;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1794;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1795;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1796;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1797;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1798;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1799;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1800;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1801;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1802;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 1803;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1805;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1806;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1807;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1808;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1809;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1810;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1811;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1812;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1813;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1814;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1815;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1816;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1817;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1818;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1819;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1820;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1821;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1822;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1823;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1824;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1825;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1826;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1827;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1828;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 1829;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1830;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1831;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1832;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 1833;
UPDATE tb_pedido SET ID_PC_BENEF = 2 WHERE id_pedido = 1834;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1835;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1836;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1837;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1838;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1839;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1840;
UPDATE tb_pedido SET ID_PC_BENEF = 4 WHERE id_pedido = 1841;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 1842;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1843;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1844;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1845;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1846;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1847;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1848;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1851;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1852;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1853;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1854;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1855;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1856;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1857;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1858;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1859;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1860;
UPDATE tb_pedido SET ID_PC_BENEF = 5 WHERE id_pedido = 1861;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1862;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1863;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1864;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1865;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1866;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1867;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1868;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1869;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1870;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1871;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1872;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1873;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1874;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1875;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1876;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1877;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1878;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1879;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1880;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1881;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1882;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1883;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1884;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1885;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1886;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1887;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1888;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1889;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1890;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1891;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1892;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1893;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1895;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1896;
UPDATE tb_pedido SET ID_PC_BENEF = 8 WHERE id_pedido = 1897;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1898;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1899;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1900;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1901;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1902;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1903;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1904;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1905;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1906;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1907;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1908;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1909;
UPDATE tb_pedido SET ID_PC_BENEF = 6 WHERE id_pedido = 1910;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1911;
UPDATE tb_pedido SET ID_PC_BENEF = 3 WHERE id_pedido = 1912;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1913;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1914;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1915;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1916;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1917;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1918;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1919;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1920;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1921;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1922;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1923;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1924;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 1925;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1926;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1927;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1928;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1929;
UPDATE tb_pedido SET ID_PC_BENEF = 10 WHERE id_pedido = 1930;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1931;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1932;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1933;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1934;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1935;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1936;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1937;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1940;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1941;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1942;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1943;
UPDATE tb_pedido SET ID_PC_BENEF = 5 WHERE id_pedido = 1944;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1945;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1946;
UPDATE tb_pedido SET ID_PC_BENEF = 5 WHERE id_pedido = 1947;
UPDATE tb_pedido SET ID_PC_BENEF = 5 WHERE id_pedido = 1948;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1949;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1950;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1951;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1952;
UPDATE tb_pedido SET ID_PC_BENEF = 5 WHERE id_pedido = 1953;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1954;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1955;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1956;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1957;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1958;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1959;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1960;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1961;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1962;
UPDATE tb_pedido SET ID_PC_BENEF = 5 WHERE id_pedido = 1963;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1964;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1965;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1966;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1967;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1968;
UPDATE tb_pedido SET ID_PC_BENEF = 7 WHERE id_pedido = 1969;

*/







/* 13.09.2019 */

/*

CREATE TABLE `areadocliente_menu` (
 `ID_MENU` int(11) NOT NULL AUTO_INCREMENT,
 `ID_PC_BENEF` int(11) NOT NULL,
 `NOME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `TIPO` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `CONTEUDO` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
 `ICONE` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
 `ORDEM` int(11) NOT NULL,
 PRIMARY KEY (`ID_MENU`),
 KEY `fk_areadoclientemenu_tbpacotebeneficio` (`ID_PC_BENEF`),
 CONSTRAINT `fk_areadoclientemenu_tbpacotebeneficio` FOREIGN KEY (`ID_PC_BENEF`) REFERENCES `tb_pacote_beneficio` (`ID_PC_BENEF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `areadocliente_menu` (`ID_MENU`, `ID_PC_BENEF`, `NOME`, `TIPO`, `CONTEUDO`, `ICONE`, `ORDEM`) VALUES (NULL, '3', 'Cartão Dr. Benefício', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', '1'), (NULL, '3', 'Cartão Farmácia', 'MODULO', 'cartaofarmacia.index', '<div id=\"img-cartao_virtual\"></div>', '0'), (NULL, '3', 'Assistência Funeral 24H', 'MODULO', 'assistenciafuneral.index', '<div id=\"img-funeral\"></div>', '4'), (NULL, '3', 'Consultas e Exames', 'MODULO', 'consultasexames.index', '<div id=\"img-consultas\"></div>', '2'), (NULL, '3', 'Disk Saúde', 'MODULO', 'disksaude.index', '<div id=\"img-cartao_virtual\"></div>', '5'), (NULL, '3', 'Odonto', 'MODULO', 'odonto.index', '<div id=\"img-odonto\"></div>', '3'), (NULL, '3', 'Fale Conosco', 'MODULO', 'faleconosco.index', '<div id=\"img-cartao_virtual\"></div>', '6'), (NULL, '3', 'Sair', 'MODULO', 'logout', '<div id=\"img-sair\"></div>', '7'), (NULL, '5', 'Teste menu inicial', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', '0'), (NULL, '5', 'teste nome', 'MODULO', 'teste conteudo', '3432432', '1'), (NULL, '5', 'testando novamente', 'LINK', 'rewrew', '432432', '2'), (NULL, '1', 'Home', 'MODULO', 'home.index', 'teste', '0'), (NULL, '6', 'Teste menu inicial', 'MODULO', 'cartaovirtual.index', '<div id=\"img-cartao_virtual\"></div>', '0'), (NULL, '6', 'teste nome', 'MODULO', 'teste conteudo', '3432432', '1'), (NULL, '6', 'testando novamente', 'LINK', 'rewrew', '432432', '2');

*/