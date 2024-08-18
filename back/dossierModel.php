<?php
class Dossier
{
    private int $id_dossier;
    private string $dateCreation; // Date in 'Y-m-d' format
    private int $idP;
    private int $idD;

    public function __construct(int $id_dossier, string $dateCreation, int $idP, int $idD)
    {
        $this->id_dossier = $id_dossier;
        $this->dateCreation = $dateCreation;
        $this->idP = $idP;
        $this->idD = $idD;
    }

    public function getIdDossier(): int
    {
        return $this->id_dossier;
    }

    public function getDateCreation(): string
    {
        return $this->dateCreation;
    }

    public function getIdP(): int
    {
        return $this->idP;
    }

    public function getIdD(): int
    {
        return $this->idD;
    }

    public function setIdDossier(int $id_dossier): void
    {
        $this->id_dossier = $id_dossier;
    }

    public function setDateCreation(string $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }

    public function setIdP(int $idP): void
    {
        $this->idP = $idP;
    }

    public function setIdD(int $idD): void
    {
        $this->idD = $idD;
    }
}
