<?php

/////////////////////////////////////////
//  LICENSE GAMES BY     : SOFTGAMINGS //
//  SOURCE CODE BUILD BY : ZULHAYKER   //
//  COPYRIGHT @2024------ALL RESERVED  //   
/////////////////////////////////////////

class zulhayker
{
    
    const AGENT_CODE    = "NfQaMz8tWk";   // AGEN CODE
    const SIGNATURE     = "5a717e80997746f22299a7d5f50e26f5";   // SIGNATURE  
    const URL_REQUEST   = "https://api.apimax.site/v2/";


    public function Create($username)
    {
        $action = self::URL_REQUEST . "CreateMember.aspx?agent_code=" . self::AGENT_CODE . "&username=" . urlencode($username) . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    public function GameList($provider)
    {
        $action = self::URL_REQUEST . "GetGameList.aspx?agent_code=" . self::AGENT_CODE . "&provider_code=" . $provider . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    public function ProviderList()
    {
        $action = self::URL_REQUEST . "GetProviderList.aspx?agent_code=" . self::AGENT_CODE . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    public function OpenGame($username, $game_code)
    {
        $action = self::URL_REQUEST . "OpenGame.aspx?agent_code=" . self::AGENT_CODE . "&username=" . urlencode($username) . "&gameid=" . $game_code . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    public function Transaksi($username, $amount, $type)
    {
        $action = self::URL_REQUEST . "MakeTransaction.ashx?agent_code=" . self::AGENT_CODE . "&username=" . urlencode($username) . "&amount=" . $amount . "&type=" . $type . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    public function GetBalance($username)
    {
        $action = self::URL_REQUEST . "GetBalance.aspx?agent_code=" . self::AGENT_CODE . "&username=" . urlencode($username) . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    public function InfoAgent()
    {
        $action = self::URL_REQUEST . "AgentInfo.ashx?agent_code=" . self::AGENT_CODE . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    public function HistoryBet()
    {
        $action = self::URL_REQUEST . "GetHistoryArchive.aspx?agent_code=" . self::AGENT_CODE . "&signature=" . self::SIGNATURE;
        return $this->connect($action);
    }

    private function Connect($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.47 Safari/537.36');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TCP_KEEPALIVE, 1);
        curl_setopt($ch, CURLOPT_TCP_KEEPIDLE, 2);
        curl_setopt($ch, CURLOPT_TCP_KEEPINTVL, 3);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}

$ZH = new zulhayker();