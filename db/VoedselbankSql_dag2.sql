-- =========================================
-- VoedselbankSql_dag2.sql
-- =========================================

DROP DATABASE IF EXISTS VoedselbankSql_dag2;

CREATE DATABASE IF NOT EXISTS VoedselbankSql_dag2;

USE VoedselbankSql_dag2;

DROP TABLE IF EXISTS Voedselpakket_item;
DROP TABLE IF EXISTS Klant_Allergie;
DROP TABLE IF EXISTS Voedselpakket;
DROP TABLE IF EXISTS Voorraad;
DROP TABLE IF EXISTS Admin;
DROP TABLE IF EXISTS Allergie;
DROP TABLE IF EXISTS Leverancier;
DROP TABLE IF EXISTS Klant;
DROP TABLE IF EXISTS Inlog;

CREATE TABLE Inlog (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Email VARCHAR(100) NOT NULL UNIQUE
  , Wachtwoord VARCHAR(255) NOT NULL
  , Rol VARCHAR(20) NOT NULL
  , LaatsteLogin DATETIME NULL
);

CREATE TABLE Klant (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Inlog_Id INT NOT NULL
  , GezinsNaam VARCHAR(100) NOT NULL
  , Adres VARCHAR(255) NOT NULL
  , Telefoon VARCHAR(15) NULL
  , Email VARCHAR(100) NOT NULL UNIQUE
  , SpecifiekeWensen VARCHAR(255) NULL
  , Gezinssamenstelling VARCHAR(255) NULL
  , CONSTRAINT FK_Klant_Inlog
        FOREIGN KEY (Inlog_Id) REFERENCES Inlog(Id)
);

CREATE TABLE Leverancier (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Bedrijfsnaam VARCHAR(100) NOT NULL
  , Adres VARCHAR(255) NOT NULL
  , ContactNaam VARCHAR(100) NOT NULL
  , ContactEmail VARCHAR(100) NOT NULL
  , Telefoon VARCHAR(15) NULL
  , EerstvolgendeLevering DATETIME NULL
);

CREATE TABLE Allergie (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Naam VARCHAR(100) NOT NULL
  , Ernst VARCHAR(20) NULL
);

CREATE TABLE Voorraad (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Leverancier_Id INT NOT NULL
  , Streepjescode VARCHAR(50) NOT NULL
  , ProductNaam VARCHAR(100) NOT NULL
  , Categorie VARCHAR(100) NOT NULL
  , Aantal INT NOT NULL
  , CONSTRAINT UQ_Voorraad_Streepjescode UNIQUE (Streepjescode)
  , CONSTRAINT FK_Voorraad_Leverancier
        FOREIGN KEY (Leverancier_Id) REFERENCES Leverancier(Id)
);

CREATE TABLE Voedselpakket (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Klant_Id INT NOT NULL
  , DatumSamenstelling DATE NOT NULL
  , DatumUitgifte DATE NULL
  , CONSTRAINT FK_Voedselpakket_Klant
        FOREIGN KEY (Klant_Id) REFERENCES Klant(Id)
);

CREATE TABLE Voedselpakket_item (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Voedselpakket_Id INT NOT NULL
  , Voorraad_Id INT NOT NULL
  , Aantal INT NOT NULL
  , CONSTRAINT FK_VoedselpakketItem_Voedselpakket
	FOREIGN KEY (Voedselpakket_Id) REFERENCES Voedselpakket(Id)
  , CONSTRAINT FK_VoedselpakketItem_Voorraad
        FOREIGN KEY (Voorraad_Id) REFERENCES Voorraad(Id)
);

CREATE TABLE Klant_Allergie (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Klant_Id INT NOT NULL
  , Allergie_Id INT NOT NULL
  , CONSTRAINT FK_KlantAllergie_Klant
        FOREIGN KEY (Klant_Id) REFERENCES Klant(Id)
  , CONSTRAINT FK_KlantAllergie_Allergie
        FOREIGN KEY (Allergie_Id) REFERENCES Allergie(Id)
);

CREATE TABLE Admin (
    Id INT PRIMARY KEY AUTO_INCREMENT
  , Inlog_Id INT NOT NULL
  , Naam VARCHAR(100) NOT NULL
  , Email VARCHAR(100) NOT NULL UNIQUE
  , CONSTRAINT FK_Admin_Inlog
        FOREIGN KEY (Inlog_Id) REFERENCES Inlog(Id)
);