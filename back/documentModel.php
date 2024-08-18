<?php
class Document
{
    private int $id_document;
    private int $idDos;
    private string $type;
    private string $dateUpload; // Using string to represent the date
    private $contenu; // No specific type declaration for BLOB

    public function __construct(int $id_document, int $idDos, string $type, string $dateUpload, $contenu)
    {
        $this->id_document = $id_document;
        $this->idDos = $idDos;
        $this->type = $type;
        $this->dateUpload = $dateUpload;
        $this->contenu = $contenu;
    }

    public function getIdDocument()
    {
        return $this->id_document;
    }

    public function getIdDos()
    {
        return $this->idDos;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDateUpload()
    {
        return $this->dateUpload;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setIdDos(int $idDos)
    {
        $this->idDos = $idDos;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setDateUpload(string $dateUpload)
    {
        $this->dateUpload = $dateUpload;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
}
