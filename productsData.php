<?php
    class productsData implements JsonSerializable{
        private $id;
        private $fajl;
        private $ar;
        private $tipus;
        function __construct($id,$fajl,$ar,$tipus)
        {
            $this->id=$id;
            $this->fajl=$fajl;
            $this->ar=$ar;
            $this->tipus=$tipus;
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
        function GetAr()
        {
            return $this->ar;
        }
        function SetAR($AR)
        {
            $this->AR=$AR;
        }
        function GetTipus()
        {
            return $this->tipus;
        }
        function SetTipus($tipus)
        {
            $this->tipus=$tipus;
        }
        public function jsonSerialize()
        {
            return [
                'id' => $this->GetId(),
                'fajl' => $this->GetFajl(),
                'ar' => $this->GetAr(),
                'tipus' => $this->GetTipus(),
            ];
        }
    }
?>