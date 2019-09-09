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





/* ABAIXO O QUE JÁ FOI EXECUTADO */