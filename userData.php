<?php
    class userData implements JsonSerializable{
        private $id;
        private $email;
        private $jelszo;
        private $nev;
        private $telefon;
        private $cim;
        function __construct($id,$email,$jelszo,$nev,$telefon,$cim)
        {
            $this->id=$id;
            $this->email=$email;
            $this->jelszo=$jelszo;
            $this->nev=$nev;
            $this->telefon=$telefon;
            $this->cim=$cim;
        }
        function GetId()
        {
            return $this->id;
        }
        function GetEmail()
        {
            return $this->email;
        }
        function SetEmail($email)
        {
            $this->email=$email;
        }
        function GetJelszo()
        {
            return $this->jelszo;
        }
        function SetJelszo($jelszo)
        {
            $this->jelszo=$jelszo;
        }
        function GetNev()
        {
            return $this->nev;
        }
        function SetNev($nev)
        {
            $this->nev=$nev;
        }
        function GetTelefon()
        {
            return $this->telefon;
        }
        function SetTelefon($telefon)
        {
            $this->telefon=$telefon;
        }
        function GetCim()
        {
            return $this->cim;
        }
        function SetCim($cim)
        {
            $this->cim=$cim;
        }
        public function jsonSerialize()
        {
            return [
                'id' => $this->GetId(),
                'email' => $this->GetEmail(),
                'jelszo' => $this->GetJelszo(),
                'nev' => $this->GetNev(),
                'telefon' => $this->GetTelefon(),
                'cim' => $this->GetCim(),
            ];
        }
    }
?>