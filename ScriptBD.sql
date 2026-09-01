/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/SQLTemplate.sql to edit this template
 */
/**
 * Author:  vitor
 * Created: 11 de jun. de 2023
 */

CREATE TABLE "pessoa" (
	"id"	INTEGER NOT NULL,
        "senha" TEXT,
	"nome"	TEXT NOT NULL,
	"sobrenome"	TEXT NOT NULL,
	"cpf"	INTEGER NOT NULL UNIQUE,
	"idade"	INTEGER NOT NULL,
	"flag"	INTEGER NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);