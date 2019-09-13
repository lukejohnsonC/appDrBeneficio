




/* ABAIXO O QUE JÁ FOI EXECUTADO */

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