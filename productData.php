<?php
    class productData implements JsonSerializable{
        private $id;
        private $nev;
        private $fajl;
        private $ar;
        private $leiras;
        function __construct($id,$nev,$fajl,$ar,$leiras)
        {
            $this->id=$id;
            $this->nev=$nev;
            $this->fajl=$fajl;
            $this->ar=$ar;
            $this->leiras=$leiras;
        }
        function GetId()
        {
            return $this->id;
        }
        function GetFajl()
        {
            return $this->fajl;
        }
        function SetFajl($fajl)
        {
            $this->fajl=$fajl;
        }
        function GetNev()
        {
            return $this->nev;
        }
        function SetNev($nev)
        {
            $this->nev=$nev;
        }
        function GetAr()
        {
            return $this->ar;
        }
        function SetAR($AR)
        {
            $this->AR=$AR;
        }
        function GetLeiras()
        {
            return $this->leiras;
        }
        function SetLeiras($leiras)
        {
            $this->leiras=$leiras;
        }
        public function jsonSerialize()
        {
            return [
                'id' => $this->GetId(),
                'nev' => $this->GetNev(),
                'fajl' => $this->GetFajl(),
                'ar' => $this->GetAr(),
                'leiras' => $this->GetLeiras(),
            ];
        }
    }
?>